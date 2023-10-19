<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'package_name',
        'package_description',
        'description_not_add',
        'package_price',
        'package_discount_price',
        'package_image',
        'package_type',
        'package_discount_percentage',
        'package_category_name',
        'package_slug_name',
    ];

    public function getProduct(){
        return $this->hasMany(Product::class, 'package_name','package_name');
    }
    public function belongsPackageCategory(){
        return $this->hasMany(PackageCategory::class, 'package_category_name','package_category_name');
    }
    
    public function belongsPackage(){
        return $this->belongsTo(PackageBook::class , 'package_id' ,'id');
    }
    
}
