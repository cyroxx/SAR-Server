<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\EmergencyCaseLocation;

class EmergencyCase extends Model
{
    protected $fillable = [
        'additional_informations',
        'archived',
        'boat_condition',
        'boat_status',
        'boat_type',
        'children_on_board',
        'created_at',
        'disabled_on_board',
        'engine_working',
        'operation_area',
        'other_involved',
        'passenger_count',
        'updated_at',
        'women_on_board',
    ];

    protected $dates = ['created_at', 'updated_at'];
    protected $appends = ['locations'];

    public function getLocationsAttribute()
    {
        return EmergencyCaseLocation::where('emergency_case_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
