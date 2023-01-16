<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{
    public function show(Item $item)
    {
        $user = $item->user;
        // $fotos = $item->photos;
        return view('item.show',[
            'item' => $item,
            'user' => $user,
            // 'fotos' => $fotos,
        ]);
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'price'=>'required|numeric',
            'init_date'=>'required|date',
            'last_date'=>'required|date',
            'condition'=>'required|string',
            'description'=>'required|max:200',
        ]);

        Item::create([
            'title' => $request->title,
            'price' => $request->price,
            'init_date' => $request->init_date,
            'last_date' => $request->init_date,
            'condition' => $request->condition,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(Item $item)
    {
        return view('item.edit',[
            'item' => $item
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'price'=>'required|numeric',
            'init_date'=>'required|date',
            'last_date'=>'required|date',
            'condition'=>'required|string',
            'description'=>'required|max:200',
        ]);

        $item->title = $request->title;
        $item->price = $request->price;
        $item->init_date = $request->init_date;
        $item->last_date = $request->last_date;
        $item->condition = $request->condition;
        $item->description = $request->description;


        if($request->foto){
            $img = $request->file('foto');
            $nombrefoto = Str::uuid(). "." . $img->extension();
            
            // ---------servidor------------
            $imgServer = Image::make($img);

            if (!is_dir(public_path('articulos'))) {
                mkdir(public_path('articulos'));
            }

            $imgPath = public_path('articulos').'/'.$nombrefoto;
            $imgServer->save($imgPath);

            // -------------base de datos---------------
            Photo::create([
                'item_id' => $item->id,
                'photo' => $nombrefoto,
            ]);
        }


        $item->save();

        return redirect()->route('dashboard');
    }

}
