<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'package_category_name',
    ];
    public function getPackageCategory(){
        return $this->hasMany(Package::class, 'package_category_name','package_category_name');
    }
}
