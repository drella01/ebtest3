<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Vehicle;
use App\Models\User;


class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id','user_id','from_date','to_date','amount','description'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
