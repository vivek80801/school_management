<?php

namespace Modules\ClassSection\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\ClassSection\Database\Factories\ClassSectionFactory;

/**
 * @property string $name
 */
class ClassSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ClassSectionFactory
    // {
    //     // return ClassSectionFactory::new();
    // }
}
