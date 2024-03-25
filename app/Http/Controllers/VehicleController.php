<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Type;
use App\Models\Document;
use App\Models\Photo;
use App\Models\InfoVehicle;
use App\Models\Cab;
use App\Models\Brand;
use App\Models\Axle;
use App\Models\Adr;
use App\Models\TankTrailer;
use App\Models\Provider;
use App\Models\Container;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVehicleRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Validator;
use Storage;
use File;

class VehicleController extends Controller
{

    protected $FIELDS;
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show','adminpdf']]);
        $this->FIELDS = [
            "id","provider_id","type_id","cargo_type","brand","model","registration","chassis_number","reg_date","kms","tara","mma","height", "width", "large",
            "sale_price", "rent_price","power","engine_displacement","n_gears","gearbox","break_retarder","break_retarder_type","euro_standard","abs","n_tyres","tyres","aluminum_rims","chassis_height","fifth_wheel_height","kingpin_height","bolt_diameter",
            "adr","axles","config_axles","drive_axles","description","created_at","updated_at","hydraulic_equipment",'axles_brand','tank_capacity','differential_lock','trailer_hitch',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Type $types, $id)
    {
        try {
            $type = Type::whereName($id)->first();
            $vehicles = Vehicle::with('photos','documents','axlesDetail','tankTrailer.type')->whereType_id($type->id)->get();
            return view('vehicles.index',compact('types','type','vehicles'))->with('info','BUENOS DIAS');
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
        $types = Type::all();
        $providers = Provider::orderBy('name')->get();
        $brands = Brand::all();
        $FIELDS = $this->FIELDS;
        $test = [];
        $vehicle = new Vehicle;
        return view('vehicles.create',compact('types','providers','brands','test','vehicle','FIELDS'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * \Illuminate\Http\Request  $request
     * @param  \App\Http\Requests\CreateVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVehicleRequest $request)
    {
        //dd($request->all());
        $vehicle = Vehicle::create($request->all());
        $vehicle->reference = $vehicle->idxtra($vehicle->registration);
        $vehicle->brand = $vehicle->brandToLower($vehicle->brand);
        $vehicle->update();

        if($request->cab_type){
            $cab = Cab::create(['cab_type'=>request('cab_type'),'tachograph'=>request('tachograph'),'air_conditioning'=>request('air_conditioning'),'seats'=>request('seats'),'beds'=>request('beds'),'heat'=>request('heat')]);
            $vehicle->cab()->save($cab);
        }

        if($request->volume){
            $tank = TankTrailer::create($request->all());
            $vehicle->tankTrailer()->save($tank);
        } elseif ($request->large) {
            $tank = TankTrailer::create(['large' => request('container_large'),'width' => request('container_width'),'height' => request('container_height'),'madeof' =>request('container_madeof'), 'containerType_id'=>request('2containerType_id'),'tank_brand'=>request('container_tank_brand'),'floor_height'=>request('floor_height')]);
            $vehicle->tankTrailer()->save($tank);
        }
        $vehicle->tankTrailer->types()->attach(request('containerType_id'));

        if($request->adr_code){
            $adr = Adr::create(['adr_code'=>request('adr_code'),'adr_code'=>$request->adr_code,'adr_class'=>$request->adr_class,'date_from'=>$request->date_from,'date_to'=>$request->date_to]);
            $vehicle->adr()->save($adr);
        }

        for($x=0;$x<$request->axles;$x++){
            if($request->brake[$x]){
                $axle = Axle::create(['isDir'=>$request->isDir[$x],'brake'=>$request->brake[$x],'suspension'=>$request->suspension[$x],'left_tyre'=>$request->left_tyre[$x],'right_tyre'=>$request->right_tyre[$x],'wheelbase'=>$request->wheelbase[$x]]);//'lifting_axle'=>$request->lifting_axle[$x],
                $vehicle->axlesDetail()->save($axle);
            }
        }

        if($request->has('photo')){
            $rules=[];
            $x = 1;
            foreach($request->photo as $photo){
                $rules = array('photo'=>'mimes:pdf,png,jpeg,jpg,gif|max:20000');
                $validator = Validator::make(array('photo' => $photo), $rules);
                if($validator->fails())
                {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $path = 'photos/'.$vehicle->registration;
                $response = Storage::makeDirectory('public/'.$path);
                $filename = $photo->getClientOriginalName();
                $extension = $photo->getClientOriginalExtension();
                $filename = $vehicle->registration.'_'.$x.'.'.$extension;
                $url = Storage::putFileAs('public/'.$path, $photo, $filename);
                $url = str_replace('public','storage',$url);
                $photo = Photo::create(['url'=>$url,'ordered'=>$x]);
                $vehicle->photos()->save($photo);
                $x += 1;
            }
        }

        /** Generamos pdf y almacenamos en Storage*/
        $pdf = PDF::loadView('vehicles.infopdf',['vehicle' => $vehicle]);
        $pdf->setPaper('a4');
        $url = 'storage/pdf/'.$vehicle->registration.'.pdf';
        $pdf->save('storage/pdf/'.$vehicle->registration.'.pdf');
        $vehiclepdf = InfoVehicle::create(['url'=>$url]);
        $vehicle->pdf()->save($vehiclepdf);

        if($request->has('document')){
            $rules=[];
            $y=1;
            foreach($request->document as $document){
                $rules = array('document'=>'mimes:pdf,png,jpeg,jpg,gif,doc|max:2000');
                $validator = Validator::make(array('document' => $document), $rules);
                if($validator->fails())
                {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $path = 'public/documents/'.$vehicle->registration;
                $response = Storage::makeDirectory($path);
                $extension = $document->getClientOriginalExtension();
                $documentname = $vehicle->registration.'_'.$y.'.'.$extension;
                $url = Storage::putFileAs($path, $document, $documentname);
                $url = str_replace('public','storage',$url);
                $document = Document::create(['url'=>$url]);
                $vehicle->documents()->save($document);
                $y += 1;
            }
        }

        return redirect()->route('vehicles.create')->with('info','Vehículo dado de alta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //dd($vehicle->tankTrailer->type);
        $photos = $vehicle->photos()->orderBy('ordered')->get();
        $i = 0;
        $j = $vehicle->photos()->count();
        return view('vehicles.show',compact('photos','vehicle','i','j'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $FIELDS= $this->FIELDS;
        $providers = Provider::all();
        $types = Type::all();
        $vehicle = $vehicle->with('photos','tankTrailer','axlesDetail','container')->find($vehicle->id);
        $photos = $vehicle->photos()->get();
        return view('vehicles.edit',compact('photos','vehicle','FIELDS','providers','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //dd(request('containerType_id'));
        $a = collect();
        $vehicle->idxtra(request('registration'));
        $vehicle->update();

        if($vehicle->cab){
            $cab = $vehicle->cab;
            $cab->update(['cab_type'=>request('cab_type'),'tachograph'=>request('tachograph'),'air_conditioning'=>request('air_conditioning'),'seats'=>request('seats'),'beds'=>request('beds'),'heat'=>request('heat')]);
        }elseif($request->cab_type){
            $cab = Cab::create(['cab_type'=>request('cab_type'),'tachograph'=>request('tachograph'),'air_conditioning'=>request('air_conditioning'),'seats'=>request('seats'),'beds'=>request('beds'),'heat'=>request('heat')]);
            $vehicle->cab()->save($cab);
        }

        if($vehicle->adr()->first()){
            $adr = $vehicle->adr()->first();
            $adr->update(['adr_code'=>request('adr_code'),'adr_class'=>$request->adr_class,'date_to'=>$request->date_to]);
        }
        elseif($request->adr_class){
            $adr = Adr::create(['adr_code'=>request('adr_code'),'adr_class'=>$request->adr_class,'date_to'=>$request->date_to]);
            $vehicle->adr()->save($adr);
        }

        foreach ($vehicle->axlesDetail as $key => $axle) {
            $axle->update(['isDir'=>$request->isDir[$key],'brake'=>$request->brake[$key],'suspension'=>$request->suspension[$key],
            'left_tyre'=>$request->left_tyre[$key],'right_tyre'=>$request->right_tyre[$key],'wheelbase'=>$request->wheelbase[$key]]);//,'lifting_axle'=>$request->lifting_axle[$key]
        }

        if(request('addbrake')){
            for($x=0;$x<count($request->addbrake);$x++){
                if(!empty($request->addbrake[$x])){
                    //dd([$request->addisDir[$x],$request->addbrake[$x],$request->addsuspension[$x],$request->addleft_tyre[$x],$request->addright_tyre[$x]]);//,$request->addlifting_axle[$x],$request->addwheelbase[$x]]);
                    $axle = Axle::create(['isDir'=>$request->addisDir[$x],'brake'=>$request->addbrake[$x],'suspension'=>$request->addsuspension[$x],'left_tyre'=>$request->addleft_tyre[$x],'right_tyre'=>$request->addright_tyre[$x],'wheelbase'=>$request->addwheelbase[$x]]);
                    $vehicle->axlesDetail()->save($axle);
                }
            }
        }

        if($vehicle->tankTrailer){
            $vehicle->tankTrailer->update([
                'volume' => request('volume'),'compartments' => request('compartments'),'tank_brand' => request('tank_brand'),'madeof' => request('madeof'),'fuel' => request('fuel'),'degassed' => request('degassed'),
                'liters1' => request('liters1'),'liters2' => request('liters2'), 'liters3' => request('liters3'), 'liters4' => request('liters4'), 'liters5' => request('liters5'),'liters6' => request('liters6'),
                'counter' => request('counter'),'bombBrand' => request('bombBrand'),'minLPM' => request('minLPM'),'maxLPM' => request('maxLPM'),'hose' => request('hose'),
                'hose1Lenght' => request('hose1Lenght'),'hose1Diameter' => request('hose1Diameter'), 'hose2Lenght' => request('hose2Lenght'),'hose2Diameter' => request('hose2Diameter'),
                'thickness' => request('thickness'),'heating' => request('heating'), 'heating_type' => request('heating_type'),'insulation' => request('insulation'),'pressure_test' => request('pressure_test'),'max_pressure' => request('max_pressure'),
                'bomb' => request('bomb'),
                'large' => request('container_large'),'width' => request('container_width'),'height' => request('container_height'),'madeof' =>request('container_madeof'), 'containerType_id'=>request('2containerType_id'),'tank_brand'=>request('container_tank_brand'),'floor_height' =>request('floor_height')
            ]);
        } elseif($request->volume){
            $tank = TankTrailer::create($request->all());
            //$tank = TankTrailer::create(['large' => request('container_large'),'width' => request('container_width'),'height' => request('container_height'),'madeof' =>request('container_madeof'), 'containerType_id'=>request('2containerType_id'),'tank_brand'=>request('container_tank_brand')]);
            $vehicle->tankTrailer()->save($tank);
        } elseif($request->large){
            $tank = TankTrailer::create(['large' => request('container_large'),'width' => request('container_width'),'height' => request('container_height'),'madeof' =>request('container_madeof'), 'containerType_id'=>request('2containerType_id'),'tank_brand'=>request('container_tank_brand'),'floor_height' =>request('floor_height')]);
            $vehicle->tankTrailer()->save($tank);
        }

        $vehicle->update([
            'brand' => request('brand'),'model' => request('model'),'registration' => request('registration'), 'chassis_number' => request('chassis_number'),'reg_date' => request('reg_date'), 'chassis_height' => request('chassis_height'), 'gearbox' => request('gearbox'),
            'kms' => request('kms'),'type_id' => request('type_id'),'cargo_type' => request('cargo_type'),'tara' => request('tara'),'mma' => request('mma'), 'height' => request('height'), 'width' => request('width'), 'large' => request('large'),
            'adr'=>request('adr'),'sale_price' => request('sale_price'),'rent_price' => request('rent_price'),'description' => request('description'),'axles' => request('axles'),'config_axles' => request('config_axles'),'wheelbase' => request('wheelbase'),'axles_brand' => request('axles_brand'),
            'aluminum_rims'=>request('aluminum_rims'),'kingpin_height'=>request('kingpin_height'),'bolt_diameter'=>request('bolt_diameter'),'fifth_wheel_height'=>request('fifth_wheel_height'),'abs'=>request('abs'),'n_tyres'=>request('n_tyres'),'tyres'=>request('tyres'),
            'euro_standard'=>request('euro_standard'),'engine_displacement'=>request('engine_displacement'),'n_gears'=>request('n_gears'),'lifting_axle'=>request('lifting_axle'),'power'=>request('power'),'drive_axles'=>request('drive_axles'),
            'break_retarder'=>request("break_retarder"),"break_retarder_type"=>request('break_retarder_type'),'hydraulic_equipment'=>request('hydraulic_equipment'),'tank_capacity'=>request('tank_capacity'),'differential_lock'=>request('differential_lock'),'trailer_hitch'=>request('trailer_hitch'),
        ]);
        if (request('containerType_id')) {
            //$vehicle->tankTrailer->types()->sync(request('containerType_id'));
            $vehicle->tankTrailer->update(['containerType_id'=> request('containerType_id')]);
        }
        if (request('2containerType_id')) {
            $vehicle->tankTrailer->update(['containerType_id'=> request('2containerType_id')]);
        }

        if(!$vehicle->pdf){
            $pdf = PDF::loadView('vehicles.infopdf',['vehicle' => $vehicle]);
            $pdf->setPaper('a4');
            $url = 'storage/pdf/'.$vehicle->registration.'.pdf';
            $pdf->save('storage/pdf/'.$vehicle->registration.'.pdf');
            $vehiclepdf = InfoVehicle::create(['url'=>$url]);
            $vehicle->pdf()->save($vehiclepdf);
        } else {
            $pdf = PDF::loadView('vehicles.infopdf',['vehicle' => $vehicle]);
            $pdf->setPaper('a4');
            $url = 'storage/pdf/'.$vehicle->registration.'.pdf';
            $pdf->save('storage/pdf/'.$vehicle->registration.'.pdf');
        }
        return redirect()->route('vehicles.show',$vehicle)->with('info', 'Vehículo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $type = Type::find($vehicle->type_id)->first()->name;

        $vehicle->axlesDetail()->delete();
        $vehicle->photos()->delete();
        $dir = 'photos/'.$vehicle->registration;
        Storage::disk('public')->deleteDirectory($dir);
        $dirDoc = 'documents/'.$vehicle->registration;
        if(Storage::disk('public')->directories($dirDoc)){
            Storage::disk('public')->deleteDirectory($dirDoc);
        }
        if($vehicle->documents->count()){
            $vehicle->documents()->delete();
        }
        $file = storage_path('app/public/pdf/'.$vehicle->registration.'.pdf');
        if($file){
            File::delete($file);
        }
        $vehicle->pdf()->delete();
        $vehicle->delete();
        return redirect()->route('type.index')->with('info','Vehículo eliminado');
    }

    public function list()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.list', compact('vehicles'));
    }

    public function adminpdf(Vehicle $vehicle)
    {
        $pdf = PDF::loadView('vehicles.infopdfAdmin',['vehicle' => $vehicle]);
        return $pdf->download($vehicle->reference.'.pdf');
    }
}
