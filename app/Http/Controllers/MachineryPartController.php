<?php

namespace App\Http\Controllers;

use App\Models\MachineryPart;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Type;

use Validator;
use Storage;
use File;

class MachineryPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $type = Type::find(9);
            $machineryParts = MachineryPart::with('photos')->whereType_id($type->id)->get();
            return view('machineryparts.index',compact('type','machineryParts'))->with('info','BUENOS DIAS');
        } catch (\Throwable $th) {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('machineryparts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $part = MachineryPart::create($request->all());

        if($request->has('photo')){
            $rules=[];
            $x = 1;
            foreach($request->photo as $key=>$photo){
                $rules = array('photo'=>'mimes:pdf,png,jpeg,jpg,gif|max:20000');
                $validator = Validator::make(array('photo' => $photo), $rules);
                if($validator->fails())
                {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $path = 'photos/repuesto'.$part->id;
                $response = Storage::makeDirectory('public/'.$path);
                $filename = $photo->getClientOriginalName();
                $extension = $photo->getClientOriginalExtension();
                $filename = 'repuesto'.$part->id.'_'.$key.'.'.$extension;
                $url = Storage::putFileAs('public/'.$path, $photo, $filename);
                $url = str_replace('public','storage',$url);
                $photo = Photo::create(['url'=>$url,'ordered'=>$x]);
                $part->photos()->save($photo);
                $x += 1;
            }
        }
        return  redirect()->route('type.index')->with('info', 'Repuesto creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MachineryPart  $machineryPart
     * @return \Illuminate\Http\Response
     */
    public function show(MachineryPart $machineryPart)
    {
        $photos = $machineryPart->photos()->orderBy('ordered')->get();
        $i = 0;
        $j = $machineryPart->photos()->count();
        return view('machineryparts.show',compact('photos','machineryPart','i','j'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MachineryPart  $machineryPart
     * @return \Illuminate\Http\Response
     */
    public function edit(MachineryPart $machineryPart)
    {
        return view('machineryparts.edit',compact('machineryPart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MachineryPart  $machineryPart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MachineryPart $machineryPart)
    {
        $ref=str_pad($machineryPart->id,4,'0',STR_PAD_LEFT);
        $reference = 'REP-'.$ref;
        $machineryPart->update(['reference' => $reference, 'description'=> $request->description, 'type_id'=>$request->type_id]);
        return  redirect()->route('machineryparts.index')->with('info', 'Repuesto modificado');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MachineryPart  $machineryPart
     * @return \Illuminate\Http\Response
     */
    public function destroy(MachineryPart $machineryPart)
    {
        $type = Type::find(9)->name;

        $machineryPart->photos()->delete();
        $dir = 'photos/repuesto'.$machineryPart->id;
        Storage::disk('public')->deleteDirectory($dir);
        $machineryPart->delete();
        return redirect()->route('type.index')->with('info','Repuesto eliminado');
        //return $machineryPart;
    }
}
