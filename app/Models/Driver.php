<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'email',
        'description',
        'mobile_num',
        'telephone_num',
        'emergency_num',
        'company_name',
        'address',
        'city',
        'post_code',
        'county',
        'country',
        'unique_id',
        'commission',
        'vehicle_make',
        'vehicle_model',
        'vehicle_body_type',
        'vehicle_color',
        'vehicle_plates',
        'driving_license',
        'driving_license_expiry_date',
        'pco_license',
        'pco_license_expiry_date',
        'phv_license',
        'phv_license_expiry_date',
        'mot_license',
        'mot_license_expiry_date',
        'mot_license_expiry_time',
        'insurance',
        'insurance_expiry_date',
        'insurance_expiry_time',
        'national_insurance_num',
        'bank_account',
        'is_active',
    ];
}
