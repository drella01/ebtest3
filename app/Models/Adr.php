<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class Adr extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id','adr_class','adr_code','date_from','date_to'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
