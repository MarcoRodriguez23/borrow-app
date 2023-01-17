<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
      $solicitudes = Contact::where('contact_id',auth()->user()->id)->where('accept',0)->get();
      return view('contact.index',[
        'solicitudes' => $solicitudes
      ]);
    }

    public function store(User $user)
    {
      $user->contactings()->attach(auth()->user()->id);
      return back();
    }

    public function update(Contact $contact)
    {
      $contact->accept = 1;
      $contact->save();
      return back();
    }

    public function destroy(Contact $contact)
    {
      $contact->delete();
      return back();
    }
}
