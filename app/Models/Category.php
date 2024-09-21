<?php

namespace App\Models;

use App\Core\Traits\Mapper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $name
 */
class Category extends Model
{
    use HasFactory, Mapper;

    public $table = 'category';
    public $fillable = ['name'];
}
