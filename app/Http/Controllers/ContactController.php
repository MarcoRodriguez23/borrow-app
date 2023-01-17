<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $solicitudes = Contact::where('contact_id',auth()->user()->id)->latest()->paginate(8);
        return view('contact.index',[
            'solicitudes' => $solicitudes
        ]);
    }

    public function store(User $user)
    {
        $user->contactings()->attach(auth()->user()->id);
        return back();
    }

    public function destroy(Contact $contact)
    {
      $contact->delete();
      return back();
    }
}
