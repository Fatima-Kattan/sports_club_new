<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Database\QueryException;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'email' => 'required|string|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = $request->user();
        
        try {
            $user->full_name = $validated['full_name'];
            $user->phone_number = $validated['phone_number'];
            $user->birth_date = $validated['birth_date'];
            $user->gender = $validated['gender'];
            
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                
                if ($user->image) {
                    
                    $oldImagePath = public_path($user->image);
                    
                    
                    if (!str_starts_with($user->image, 'images/users/')) {
                        $oldImagePath = public_path('images/users/' . $user->image);
                    }
                    
                    if (File::exists($oldImagePath) && basename($oldImagePath) !== 'user.jpg') {
                        File::delete($oldImagePath);
                    }
                }

                
                $imageName = time() . '_' . $file->getClientOriginalName(); 

                
                $uploadPath = public_path('images/users');
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true, true);
                }

                
                $file->move($uploadPath, $imageName);

                
                $user->image = 'images/users/' . $imageName;
            }
            
            
            if (strtolower($user->email) !== strtolower($validated['email'])) {
                $user->email = $validated['email'];
                $user->email_verified_at = null;
            }
            
            $user->save();
            
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
            
        } catch (QueryException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        
        if ($user->image && $user->image !== 'images/users/user.jpg') {
            $imagePath = public_path($user->image);
            
            if (!str_starts_with($user->image, 'images/users/')) {
                $imagePath = public_path('images/users/' . $user->image);
            }
            
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        Auth::logout();
        $user->delete();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}