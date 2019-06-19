<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportsTest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sports_test';
    
    protected $fillable = ['test_type_id','test_date'];
    
    
    public function sportsTestTypes()
    {
        return $this->belongsTo('App\SportsTestTypes');
    }
    
    public function userAssociateWithTest()
    {
        return $this->belongsTo('App\UserAssociateWithTest');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
