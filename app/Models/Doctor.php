<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors'; 
    protected $primaryKey = 'doctor_id';
    public $timestamps = true; 
    protected $fillable = [
        'dr_first_name',
        'dr_last_name',
        'dr_nic',
        'dr_contact',
        'dr_specialty',
        'dr_email',
        'dr_address',
        'dr_gender',
        'dr_pic',
        'dr_license_num', 
        'dr_credentials',
        'dr_experience',
        'dr_status',
    ];
}
