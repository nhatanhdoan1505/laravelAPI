<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function postComic(Request $request) {
        $room = new Room();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $fileName=$file->getClientOriginalName('image');
            $file->move('/image/product', $fileName);
        }
        $file_name = null;
        if($request->file('image') != null){
            $file_name = $request->file('image')->getClientOriginalName();
        }
        $room->name = $request->name;
        $room->image = $file_name;
        $room->type = $request->type;
        $room->number = $request->number;
        $room->area = $request->area;
        $room->price = $request->price;
        $room->save();
        return $this->getForm();
    }

    public function showRoom(){
        $rooms = Room::all();
        return view('room', ['rooms'=>$rooms]);
    }
}
