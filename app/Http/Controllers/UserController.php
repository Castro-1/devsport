<?php

// Andrés Prada Rodríguez

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $id = $request->user()->id;
        $request->validate([
            'age' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'gender' => 'required|in:male,female,other',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'age' => $request->input('age'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'gender' => $request->input('gender'),
        ]);

        return redirect()->back()->with('success', 'User information updated successfully!');
    }
}
