<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Vehicle;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'url','vehicle_id','valid_date','description'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
