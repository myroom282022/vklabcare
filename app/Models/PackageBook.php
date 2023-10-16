<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'package_id',
    ];
    public function getPackage(){
        return $this->hasMany(Package::class , 'id'  ,'package_id');
    }
}
