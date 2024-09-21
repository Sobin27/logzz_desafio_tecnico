<?php

namespace App\Models;

use App\Core\Traits\Mapper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $category
 * @property string $image_url
 */
class Products extends Model
{
    use HasFactory, Mapper;

    public $table = 'products';

    public $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image_url',
        'created_by',
        'updated_by'
    ];
}
