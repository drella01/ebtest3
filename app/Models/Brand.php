<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type_id'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'brand_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'brand_types');
    }

}
