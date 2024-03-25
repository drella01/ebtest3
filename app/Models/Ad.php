<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;
use App\Models\Provider;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id','provider_id','reference','date_from','date_to','price','url'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
