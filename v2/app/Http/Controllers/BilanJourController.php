<?php

namespace App\Http\Controllers;

use App\BilanJour;
use Illuminate\Http\Request;

class BilanJourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('reporting.bilanjour');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BilanJour  $bilanJour
     * @return \Illuminate\Http\Response
     */
    public function show(BilanJour $bilanJour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BilanJour  $bilanJour
     * @return \Illuminate\Http\Response
     */
    public function edit(BilanJour $bilanJour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BilanJour  $bilanJour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BilanJour $bilanJour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BilanJour  $bilanJour
     * @return \Illuminate\Http\Response
     */
    public function destroy(BilanJour $bilanJour)
    {
        //
    }
}
