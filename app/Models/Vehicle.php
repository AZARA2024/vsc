<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

     // Define the attributes that are mass assignable
     protected $fillable = [
        'plateNumber',
        'vehicleNumber',
        'manufacturer',
        'carType',
        'inspectionDate',
        'inspectionCompany',
        'serviceType',
        'dateOfEnd',
        'serialNumber',
        'status',
    ];

    // Define the attributes that should be cast to native types
    protected $casts = [
        'inspectionDate' => 'date',
        'dateOfEnd' => 'date',
    ];
}
