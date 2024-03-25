<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Container;

class ContainerType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cargo_type'];

    public function containers()
    {
        return $this->hasMany(Container::class, 'containerType_id');
    }


}
