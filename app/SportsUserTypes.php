<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportsUserTypes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sports_user_types';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type',
    ];
    
}
