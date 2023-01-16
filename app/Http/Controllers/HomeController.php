<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        // $ids=(auth()->user()->contacts->pluck('id')->toArray());
        $myitems = auth()->user()->items;

        return view('dashboard',[
            'myitems' => $myitems
        ]);
    }
}
