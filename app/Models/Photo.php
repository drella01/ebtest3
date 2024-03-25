<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Vehicle;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'url','vehicle_id','ordered'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
