<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image; 

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(User $user)
    {   
       
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required|url',
            'image' => '',
        ]);

       
        if(request('image'))
        {
            $imagePath = request()->image->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(100, 100);
            $image->save();

        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));


        return redirect("/profile/{$user->id}");
    }
}
