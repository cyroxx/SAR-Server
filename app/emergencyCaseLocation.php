<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyCaseLocation extends Model
{
	protected $visible = ['lat', 'lon', 'accuracy', 'connection_type', 'created_at'];

    protected $dates = ['created_at', 'updated_at'];

    public function emergencyCase()
    {
        return $this->belongsTo('App\EmergencyCase');
    }
}
