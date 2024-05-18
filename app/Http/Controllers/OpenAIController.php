<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Routine;
use App\Models\Trainingcontext;
use App\Models\User;
use OpenAI;

class OpenAIController extends Controller
{
    public function generateroutine(string $trainingcontext_id, string $user_id)
    {
        $viewData = [];
        $viewData['title'] = __('openai.title.generateroutine');
        $viewData['subtitle'] = __('openai.subtitle.generateroutine');

        $apiKey = env('OPENAI_API_KEY');
        $client = OpenAI::client($apiKey);

        $newRoutine = new Routine();
        $newRoutine->setTrainingcontextId($trainingcontext_id);

        $trainingcontext = Trainingcontext::findOrFail($trainingcontext_id);
        $user = User::findOrFail($user_id);
        $exercises = Exercise::all();

        // Preparar el prompt
        $prompt = __('openai.prompt.intro')."\n\n";
        $prompt .= __('openai.prompt.user_info', [
            'name' => $user->getName(),
            'age' => $user->getAge(),
            'weight' => $user->getWeight(),
            'height' => $user->getHeight(),
            'gender' => $user->getGender(),
        ]);
        $prompt .= "\n\n";
        $prompt .= __('openai.prompt.training_info', [
            'name' => $trainingcontext->getName(),
            'time' => $trainingcontext->getTime(),
            'place' => $trainingcontext->getPlace(),
            'frequency' => $trainingcontext->getFrequency(),
            'objectives' => $trainingcontext->getObjectives(),
            'specifications' => $trainingcontext->getSpecifications(),
        ]);

        $prompt .= "\n\n".__('openai.prompt.exercises')."\n";
        foreach ($exercises as $exercise) {
            $prompt .= '- '.$exercise->getName().': '.$exercise->getMusclegroup().$exercise->getRecommendations()."\n";
        }

        // Llamar a la API de OpenAI
        $response = $client->completions()->create([
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => $prompt,
            'max_tokens' => 500,
            'temperature' => 0,
        ]);

        $text = $response['choices'][0]['text'];

        $newRoutine->setName(__('openai.routine.generated_name'));
        $newRoutine->setSpecifications($text);
        $newRoutine->save();

        return redirect()->back()->with('viewData', $viewData);
    }
}
