<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $solicitudes = auth()->user()->contacts;
        return view('contact.index',[
            'solicitudes' => $solicitudes
        ]);
    }

    public function store(User $user)
    {
        // dd($user);
        $user->contacts()->attach(auth()->user()->id);
        return back();
    }
}
