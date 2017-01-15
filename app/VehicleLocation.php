<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleLocation extends Model {

    protected $visible = ['lat', 'lon', 'accuracy', 'connection_type', 'created_at'];

    protected $dates = ['created_at', 'updated_at'];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }
}
