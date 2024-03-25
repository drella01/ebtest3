<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Type;
use App\Models\Photo;
use App\Models\Document;
use App\Models\InfoVehicle;
use App\Models\Rent;
use App\Models\Axle;
use App\Models\TankTrailer;
use App\Models\Container;
use App\Models\Adr;
use App\Models\Provider;
use App\Models\Ad;
use App\Models\Cab;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand','model','registration','reference','chassis_number','reg_date','kms','type_id','cargo_type','tara','mma','power','gearbox','break_retarder',
        'break_retarder_type','differential_lock','euro_standard','abs','adr','buy_price','sale_price','rent_price','description','axles','config_axles','axles_brand','drive_axles','fifth_wheel_height','chasis_height',
        'buy_date','sale_date', 'provider_id', 'client_id','chassis_height','height', 'width', 'large','kingpin_height','n_tyres','tyres','aluminum_rims','hydraulic_equipment','engine_displacement','n_gears','bolt_diameter',
        'lifting_axle','tank_capacity','trailer_hitch',
    ];

    /* Relations */

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function pdf()
    {
        return $this->hasOne(InfoVehicle::class);
    }

    public function cab()
    {
        return $this->hasOne(Cab::class);
    }


    public function axlesDetail()
    {
        return $this->hasMany(Axle::class);
    }

    public function tankTrailer()
    {
        return $this->hasOne(TankTrailer::class);
    }

    public function container()
    {
        return $this->hasOne(Container::class);
    }

    public function adr()
    {
        return $this->hasOne(Adr::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    /* Filters */

    public function scopeFilterBrand($query, $search)
    {
        if (trim($search) != '') return $query->where('brand', 'LIKE', '%' . $search . '%');
        return $query;
    }

    /* Decorators */

    public function idxtra($registration)
    {
        $int = filter_var($registration, FILTER_SANITIZE_NUMBER_INT);
        $int = substr($int,-4);
        $idXtra = 'GC-'.$int;
        return $this->reference = $idXtra;
    }

    public function brandToLower($brand)
    {
        return $this->brand = strtolower($brand);
    }

}
