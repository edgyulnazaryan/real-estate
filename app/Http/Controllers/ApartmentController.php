<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;


class ApartmentController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $apartment = new Apartment();
        
        $apartment-> type = $request -> input('type');
        $apartment-> buy_type = $request -> input('buy_type');
        $apartment-> status = $request -> input('status');
        $apartment-> wall = $request -> input('wall');
        $apartment-> address = $request -> input('address');
        $apartment-> price = $request -> input('price');
        $apartment-> room = $request -> input('room');
        $apartment-> area = $request -> input('area');
        $apartment-> floor = $request -> input('floor');
        $apartment-> info = $request -> input('info');

        $arr = [];

        $destination = base_path() . '/public/image';

        for ($i=0; $i < count($request->file('image')); $i++) 
        { 
            $arr[$i] = $request->file('image')[$i]->getClientOriginalName();
            $request->file('image')[$i]->move($destination, $arr[$i]);

            $apartment->image = $request -> file('image')[$i];
            
        }

        $apartment->image = json_encode($arr);

        $apartment -> save();
        return redirect()->route('home');
    }

    public function show()
    {
        $data = Apartment::all();
        return view('show')->with('data', $data);
    }

    public function details($id)
    {
        $data = Apartment::find($id);
        return view('apartment_detail', ['data' => $data]);
    }

    public function search(Request $request)
    {
        $data = Apartment::query();
        
        $type = $request->type;
        $wall = $request->wall;
        $buy_type = $request->buy_type;

        $min = $request->min;
        $max = $request->max;

        $area = $request->area;

        $room = $request->room;

        $data = $data->when($min, function ($query, $min) use($data) 
                {
                    return $data->where('price', '>=', $min);
                });
        $data = $data->when($max, function ($query, $max) use($data)
                {
                    return $data->where('price', '<=', $max);
                });
        
        $data = $data->when($wall, function ($query, $value) use($wall,$data)
                {
                    return $data->whereIn('wall', $wall);
                });

        $data = $data->when($type, function ($query, $value) use($type,$data)
                {
                    return $data->whereIn('type', $type);
                });

        $data = $data->when($buy_type, function ($query, $value) use($buy_type,$data)
                {
                    return $data->whereIn('buy_type', $buy_type);
                });

        $data = $data->when($area, function ($query, $value) use($area,$data)
                {
                    return $data->where('area', '>=', $area);
                });

        $data = $data->when($room, function ($query, $value) use($room,$data)
                {
                    return $data->where('room', '>=', $room);
                });   
        
        /* 
        $data=$data->whereIn('wall', $wall)
                           ->whereIn('type', $type)
                           ->whereIn('buy_type', $buy_type);
        */
        return $data->get();


    }
}
