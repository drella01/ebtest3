<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Validator;
use Storage;
use File;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vehicle $vehicle)
    {
        return $vehicle->photos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vehicle $vehicle)
    {
        $rules=[];
        $x = 1;
        foreach($request->photo as $photo){
            $rules = array('photo'=>'mimes:pdf,png,jpeg,jpg,gif|max:20000');
            $validator = Validator::make(array('photo' => $photo), $rules);
            if($validator->fails())
            {
                $errors = $validator->errors();
                return redirect()->back()->withErrors($errors);
            }
            $path = 'photos/'.$vehicle->registration;
            if(Storage::exists('public/'.$path)){
                $x = count(Storage::files('public/'.$path))+1;
            } else {
                Storage::makeDirectory('public/'.$path);
            }
            $extension = $photo->getClientOriginalExtension();
            $filename = $vehicle->registration.'_'.uniqid().'.'.$extension;
            $url = Storage::putFileAs('public/'.$path, $photo, $filename);
            $url = str_replace('public','storage',$url);
            $photo = Photo::create(['url'=>$url,'ordered'=>$x]);
            $vehicle->photos()->save($photo);
            $x += 1;
        }
        return redirect()->back()->with('info','Foto/s añadida');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo, Vehicle $vehicle)
    {
        return $vehicle;//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo, Request $request)
    {
        $photos=Photo::where('vehicle_id',$photo->vehicle_id)->get();
        $item1 = explode('/',$photo->url)[1];
        $item2 = explode('/',$photo->url)[2];
        $item3 = explode('/',$photo->url)[3];
        $url = $item1.'/'.$item2.'/'.$item3;
        if(File::exists('storage/app/public/'.$url)){
            File::delete('storage/app/public/'.$url);
        }
        $photo->delete();
        return back();
    }

    /**
     * Remove select specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroyselection(Vehicle $vehicle)
    {
        $photos = Photo::where('vehicle_id',$vehicle->id)->orderBy('ordered')->get();
        dd($vehicle);
        $test=collect();
        foreach ($photos as $key => $photo) {
            if($request->has('check'.$key)){
                $test->push($photo->url);
            }
        }
        dd($test);
        //File::delete($photo->url);
        //$photo->delete();
        return back();
    }

    public function reorderAll(Vehicle $vehicle)
    {
        $photos = Photo::where('vehicle_id',$vehicle->id)->orderBy('ordered')->get();
        return view('reorder', compact('photos','vehicle'));
    }

    public function reorder(Request $request)
    {
        $photos = Photo::where('vehicle_id',$request->vehicle)->get();

        foreach ($request->values as $key => $value) {
            $photo = $photos->find($value);
            $photo->ordered = $key;
            $photo->update();
        }

        return response()->json(['redirect' => url('/photos')]);
    }
}
