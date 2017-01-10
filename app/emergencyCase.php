<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use App\User;
use App\emergencyCaseLocation;
use App\involvedUsers;
use DB;





class emergencyCase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $dates = ['created_at', 'updated_at'];
    
    /**
     * Get the Locations
     *
     * @return obj
     */
    public static function getLocationsAttribute()
    {
        return emergencyCaseLocation::where('emergency_case_id', $this->id)->orderBy('created_at', 'desc')->get();
    }
    
    protected $appends = ['locations'];
}
