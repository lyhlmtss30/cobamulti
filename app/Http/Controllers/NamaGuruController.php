<?php

namespace App\Http\Controllers;

use App\Models\nama_guru;
use Illuminate\Http\Request;

class NamaGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data_guru.guru');
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
    public function show(nama_guru $nama_guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nama_guru $nama_guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, nama_guru $nama_guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nama_guru $nama_guru)
    {
        //
    }
}
