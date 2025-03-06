<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = 'hospitals'; // Table name
    protected $primaryKey = 'hospital_id'; // Custom Primary Key
    public $timestamps = true; // Enable timestamps
    protected $fillable = [
        'hospital_name',
        'hospital_code',
        'hospital_address',
        'hospital_contact_number',
        'hospital_email',
        'hospital_website',
        'hospital_status',
    ];
}
