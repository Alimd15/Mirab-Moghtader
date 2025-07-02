<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $brand
 * @property string $category
 * @property float $price
 * @property string $description
 * @property string $image_file_name
 * @property \Carbon\Carbon $created_at
 *
 * Validation rules:
 *   name: required, string, max:100
 *   brand: required, string, max:100
 *   category: required, string, max:100
 *   price: required, numeric, digits_between:1,16, decimal:2
 *   description: required, string
 *   image_file_name: string, max:100
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'category',
        'price',
        'description',
        'image_file_name',
        'created_at',
    ];
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public $timestamps = false; // Set to true if you want Laravel to manage created_at/updated_at
}
