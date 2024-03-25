<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;
use App\Models\Ad;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'vat', 'address', 'phone1','phone2', 'city', 'postal_code','province','email','type'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'provider_id');
    }

    public function ads()
    {
        return $this->hasMany(Ad::class, 'provider_id');
    }


}
