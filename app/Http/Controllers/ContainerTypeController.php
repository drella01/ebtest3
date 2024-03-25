<?php

namespace App\Http\Controllers;

use App\Models\ContainerType;
use Illuminate\Http\Request;

class ContainertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $containerTypes=ContainerType::all();
        return view('containerType.index', compact('containerTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('containerType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = ContainerType::create($request->all());
        return redirect()->route('containertypes.index')->with('info','Alta realizada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContainerType  $containerType
     * @return \Illuminate\Http\Response
     */
    public function show(ContainerType $containerType,$id)
    {
        $container = ContainerType::find($id);
        return view('containerType.show', compact('container'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContainerType  $containerType
     * @return \Illuminate\Http\Response
     */
    public function edit(ContainerType $containerType,$id)
    {
        $container = ContainerType::find($id);
        return view('containerType.edit', compact('container'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContainerType  $containerType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContainerType $containerType, $id)
    {
        $container = ContainerType::find($id);
        $container->update($request->all());
        return redirect()->route('containertypes.index')->with('info','Actualización realizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContainerType  $containerType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContainerType $containerType, $id)
    {
        $container = ContainerType::find($id);
        $container->delete();
        return redirect()->route('containertypes.index')->with('info','Registro eliminado');

    }
}
