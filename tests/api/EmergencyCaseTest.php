<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmergencyCaseTest extends TestCase
{
    use DatabaseMigrations;

    public function testEmergencyCaseRetrieval()
    {
        $case = factory(App\EmergencyCase::class)->make();
        $case->save();

        $req = $this->get('/api/v1/cases/' . $case->id, []);
        $req->seeJson([
            'id' => $case->id,
            'locations' => [],
            'archived' => 0
        ]);
    }

    public function testEmergencyCaseRetrievalWithLocations()
    {
        $case = factory(App\EmergencyCase::class)->make();
        $case->save();

        $location = factory(App\EmergencyCaseLocation::class)->make();
        $location->emergency_case_id = $case->id;
        $location->save();

        $req = $this->get('/api/v1/cases/' . $case->id, []);
        $req->seeJson([
         'id' => $case->id,
         'locations' => [
            [
                'lat' => $location->lat,
                'lon' => $location->lon,
                'accuracy' => $location->accuracy,
                'connection_type' => $location->connection_type,
                'created_at' => (string) $location->created_at
            ]
         ],
         'archived' => 0
        ]);
    }
}
