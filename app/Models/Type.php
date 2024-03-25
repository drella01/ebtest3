<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Vehicle;
use App\Models\MachineryPart;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'type_id');
    }

    public function machineryParts()
    {
        return $this->hasMany(MachineryPart::class, 'type_id');
    }

    public function types()
    {
        return $this->hasMany(Type::class, 'brand_types');
    }

    public function scopeFilterBrand($query, $search)
    {
        if (trim($search) != '') return $query->where('brand', 'LIKE', '%' . $search . '%');
        return $query;
    }

}
