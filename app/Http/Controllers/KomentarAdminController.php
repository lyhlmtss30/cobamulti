<?php

namespace App\Http\Controllers;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komentar = Komentar::all();
        return view('dashboard_component.komentaradmin', compact('komentar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;

        Komentar::create([
            'user_id' => $user,
            'pesan' => $request->input('pesan'),
        ]);

        return redirect()->route('komentar.index')->with('success', 'Komentar telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komentar = Komentar::find($id); // Mencari komentar berdasarkan ID

        if (!$komentar) {
            return redirect()->route('komentaradmin.index')->with('failed', 'Komentar tidak ditemukan.');
        }

        // if (Auth::user()->id === $komentar->user_id) {
        //     $komentar->delete();
        //     return redirect()->route('komentaradmin.index')->with('success', 'Komentar telah dihapus.');
        // } else {
        //     return redirect()->route('komentaradmin.index')->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        // }

        if (Auth::user()->role === 'admin') {
            $komentar->delete();
            return redirect()->route('komentaradmin.index')->with('success', 'Komentar telah dihapus.');
        } else {
            return redirect()->route('komentaradmin.index')->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        }
    }
}
