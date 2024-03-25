<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;
use App\Models\ContainerType;

class Container extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id','containerType_id','large','width','height','floor_height',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function type()
    {
        return $this->belongsTo(ContainerType::class,'containerType_id');
    }
}
