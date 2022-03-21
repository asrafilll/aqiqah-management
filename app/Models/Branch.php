<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /**
     * Define table name
     * @var string
     */
    protected $table = 'branch';

    protected $fillable = [
        'name'
    ];
}
