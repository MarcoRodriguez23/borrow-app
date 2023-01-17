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
      //trayendo los ids de mis contactos
      $ids=(auth()->user()->contactings->pluck('id')->toArray());
      $myitems = auth()->user()->items;
      $items = Item::whereIn('user_id',$ids)->latest()->get();

      return view('dashboard',[
        'myitems' => $myitems,
        'items' => $items
    ]);
    }
}
