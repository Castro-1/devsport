{{-- Andrés Prada Rodriguez --}}

@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['title'])
@section('content')
    <h1>{{ __('trainingcontext.training_contexts') }}</h1>
    @if (is_null($viewData['user']->getAge()))
        <p>{{ __('trainingcontext.update_profile_message') }}</p>
        <form class="form-row row" action="{{ route('user.update', $viewData) }}" method="post">
            @csrf
            @method('PUT')

            <label for="age">{{ __('trainingcontext.age') }}:</label>
            <input type="number" name="age" id="age" value="{{ old('age', $viewData['user']->age) }}" required>

            <label for="weight">{{ __('trainingcontext.weight') }}:</label>
            <input type="number" name="weight" id="weight" value="{{ old('weight', $viewData['user']->weight) }}" step="any" required>

            <label for="height">{{ __('trainingcontext.height') }}:</label>
            <input type="number" name="height" id="height" value="{{ old('height', $viewData['user']->height) }}" step="any" required>

            <label for="gender">{{ __('trainingcontext.gender') }}:</label>
            <select name="gender" id="gender" required>
                <option value="male" {{ old('gender', $viewData['user']->gender) === 'male' ? 'selected' : '' }}>{{ __('trainingcontext.male') }}</option>
                <option value="female" {{ old('gender', $viewData['user']->gender) === 'female' ? 'selected' : '' }}>{{ __('trainingcontext.female') }}</option>
                <option value="other" {{ old('gender', $viewData['user']->gender) === 'other' ? 'selected' : '' }}>{{ __('trainingcontext.other') }}</option>
            </select>

            <button type="submit">{{ __('trainingcontext.update_button') }}</button>
        </form>
    @else
        @if ($viewData['trainingcontexts']->isEmpty())
            <p>{{ __('trainingcontext.no_training_contexts_found') }}</p>
            <a class="btn btn-outline-secondary mb-2" href="{{ route('trainingcontext.create') }}">{{ __('trainingcontext.create_new_context_button') }}</a>
        @else
            <ul>
                @foreach ($viewData['trainingcontexts'] as $trainingcontext)
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <h5 class="card-title">{{ $trainingcontext->getName() }}</h5>
                                <a href="{{ route('trainingcontext.show', $trainingcontext->getId() ) }}" class="btn btn-outline-secondary">{{ __('trainingcontext.view_details_button') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
            <a class="btn btn-outline-secondary mb-2" href="{{ route('trainingcontext.create') }}">{{ __('trainingcontext.create_new_context_button') }}</a>
        @endif
    @endif
@endsection
