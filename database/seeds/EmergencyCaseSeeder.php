<?php

use App\EmergencyCase;
use App\EmergencyCaseLocation;
use Illuminate\Database\Seeder;

class EmergencyCaseSeeder extends Seeder {

    public function run()
    {

        $case = factory(EmergencyCase::class)->make();
        $case->save();

        for($i=0; $i<=10; $i++) {
            $location = factory(EmergencyCaseLocation::class)->make();
            $location->emergency_case_id = $case->id;
            $location->save();
        }

    }

}
