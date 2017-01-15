<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\EmergencyCaseLocation;

class EmergencyCase extends Model {

    protected $fillable = [
        'additional_informations',
        'archived',
        'boat_condition',
        'boat_status',
        'boat_type',
        'children_on_board',
        'disabled_on_board',
        'engine_working',
        'operation_area',
        'other_involved',
        'passenger_count',
        'women_on_board',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function locations() {
        return $this->hasMany('App\EmergencyCaseLocation');
    }
}
