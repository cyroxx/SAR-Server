<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;
class emergencyCaseLocation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function emergency_case()
    {
        return $this->belongsTo('App\emergencyCase')->withTimestamps();
    }
}
