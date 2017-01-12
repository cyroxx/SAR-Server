<?php
namespace App\Http\Controllers;

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
        return \App\EmergencyCase::with('locations')->findOrFail($id);
    }
}
