<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function index(User $user)
    {
        return view('profile.index',[
            'user' => $user
        ]);
    }
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if($request->photo){
            $photo = $request->file('photo');
            $nombrephoto = Str::uuid(). "." . $photo->extension();
            $photoServidor = Image::make($photo);
            //para recortar
            $photoServidor->fit(1000,1000);
            //si la carpeta no existe, crearla
            if (!is_dir(public_path('profiles'))) {
                mkdir(public_path('profiles'));
            }
            $PhotoPath = public_path('profiles').'/'.$nombrephoto;
            
            $photoServidor->save($PhotoPath);
            $request->user()->photo = $nombrephoto;
            // unlink(public_path('profiles'.auth()->user()->photo));
        }

        if($request->imagen){
            $imagen = $request->file('imagen');
            $nombreimagen = Str::uuid(). "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            //si la carpeta no existe, crearla
            if (!is_dir(public_path('fondos'))) {
                mkdir(public_path('fondos'));
            }
            $imagenPath = public_path('fondos').'/'.$nombreimagen;
            
            $imagenServidor->save($imagenPath);
            $request->user()->imagen = $nombreimagen;
            // unlink(public_path('fondos'.auth()->user()->photo));
        }
        

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
