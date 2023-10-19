<?php

namespace App\Http\Controllers;

use App\Models\data_mapel;
use Illuminate\Http\Request;

class DataMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data_mapel.mapel');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(data_mapel $data_mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(data_mapel $data_mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, data_mapel $data_mapel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(data_mapel $data_mapel)
    {
        //
    }
}
