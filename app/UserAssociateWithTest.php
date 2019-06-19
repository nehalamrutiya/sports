<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAssociateWithTest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_associate_with_test';
    
    protected $fillable = ['test_id','user_id','distance'];
    
}
