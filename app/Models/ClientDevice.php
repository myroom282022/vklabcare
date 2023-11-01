<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip_address',
        'device_id',
        'device_name',
        'device_platform',
        'device_type',
        'device_ipaddress',
        'browser_name',
        'browser_version',
        'countryName',
        'regionName',
        'cityName',
        'zipCode',
        'latitude',
        'longitude',
        'regionCode',
        'countryCode',
        'isoCode',
        'postalCode',
        'metroCode',
        'areaCode',
        'timezone'
    ];
    public function bookingOrder(){
        return $this->belongsTo(PackageBook::class , 'user_id' ,'user_id');
    }
}
