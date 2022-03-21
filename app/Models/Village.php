<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
     /**
     * Define table name
     * @var string
     */
    protected $table = 'village';

    protected $fillable = [
        'name'
    ];
}
