<?php

namespace Modules\ClassRoom\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\ClassRoom\Database\Factories\ClassRoomFactory;

/**
 * @property string $name
 */
class ClassRoom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ClassRoomFactory
    // {
    //     // return ClassRoomFactory::new();
    // }
}
