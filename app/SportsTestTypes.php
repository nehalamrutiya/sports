<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportsTestTypes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sports_test_types';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'test_type_name',
    ];
    
}
