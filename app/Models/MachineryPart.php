<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Type;
use App\Models\Photo;

class MachineryPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'description','type_id','reference',
    ];

    /* Relations */

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

}

