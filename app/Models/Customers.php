<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
     /**
     * Define table name
     * @var string
     */
    protected $table = 'customers';

    /**
     * Set hidden field
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Define fillable field
     * @var array
     */
    protected $fillable = [
        'name',
        'name_of_aqiqah',
        'gender_of_aqiqah',
        'birth_of_date',
        'father_name',
        'mother_name',
        'address',
        'district_id',
        'village_id',
        'postalcode',
        'phone_1',
        'phone_2'
    ];
}
