<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Vehicle extends Model {

    protected $fillable = [
        'user_id'                 
        'title'
        'tracking_type'
        'sat_number'               
        'public'             
        'api_key'           
        'marker_color'        
        'location_alarm_enabled'
        'location_alarm_recipients'
        'logo_url'
        'speed_over_ground'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function locations() {
        return $this->hasMany('App\VehicleLocation');
    }
}
