<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::latest()->get();
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => ['required', 'string', 'min:2', 'max:50', 'regex:/^[A-Za-z\s\-\']+$/'],
            'email' => ['required', 'email', 'max:255', 'unique:profiles,email'],
            'dob'   => ['required', 'date', 'before:today'],
            'phone' => ['required', 'string', 'regex:/^\+?[0-9\s\-()]{7,15}$/'],
        ]);
        // validated requests all data so we should not use it. 
        $profile = Profile::create([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            'dob'   => $request->input('dob'),
            'phone' => $request->input('phone'),
        ]);

         return redirect()
                    ->route('profile.show', $profile)
                    ->with('success', 'Profile created successfully.');
    }  

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name'  => ['required', 'string', 'min:2', 'max:50', 'regex:/^[A-Za-z\s\-\']+$/'],
            'email' => ['required', 'email', 'max:255', Rule::unique('profiles', 'email')->ignore($profile->id)],
            'dob'   => ['required', 'date', 'before:today'],
            'phone' => ['required', 'string', 'regex:/^\+?[0-9\s\-()]{7,15}$/'],
        ]);
        $profile->update(
            $request->only(['name', 'email', 'dob', 'phone'])
        );
        
        return redirect()->route('profile.index')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profile.index')
            ->with('success', 'Profile deleted successfully.');
    }
}
