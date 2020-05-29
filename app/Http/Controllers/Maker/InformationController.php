<?php

namespace App\Http\Controllers\Maker;

use App\Http\Controllers\Controller;
use App\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Information::class,'information');
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('Maker.Information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Information  $information
     *
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Information  $information
     *
     */
    public function edit(Information $information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Information  $information
     *
     */
    public function update(Request $request, Information $information)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Information  $information
     *
     */
    public function destroy(Information $information)
    {
        //
    }
}
