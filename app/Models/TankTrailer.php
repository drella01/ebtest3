<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;
use App\Models\ContainerType;

class TankTrailer extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id','tank_brand','madeof','product_type','volume','compartments','liters1','liters2','liters3','liters4','liters5','liters6',
        'degassed','counter','bombBrand','minLPM','maxLPM','hose','hose1Lenght','hose1Diameter','hose2Lenght','hose2Diameter','pressure_test','max_pressure',
        'thickness','heating','heating_type','insulation','bomb','large','width','height','containerType_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function type()
    {
        return $this->belongsTo(ContainerType::class,'containerType_id');
    }

    public function types()
    {
        return $this->belongsToMany(ContainerType::class,'container_type_tank_trailer','tankTrailer_id','containerType_id');
    }


}
