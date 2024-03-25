<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class Cab extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id', 'cab_type', 'air_conditioning', 'tachograph', 'seats','beds','heat',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

}
