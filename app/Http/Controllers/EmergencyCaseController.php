<?php
namespace App\Http\Controllers;

use App\EmergencyCase;
use Illuminate\Http\Request;

class EmergencyCaseController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()
            ->json(EmergencyCase::with('locations')->findOrFail($id));
    }
}
