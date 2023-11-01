<?php

namespace App\Http\Controllers;

use App\Models\data_mapel;
use App\Models\nama_guru;
use App\Models\Tugas;
use Illuminate\Http\Request;


class DataMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = data_mapel::all(); // Ambil semua data guru dari basis data

        return view('data_mapel.mapel', compact('data')); // Kirim data guru ke tampilan
    }


    //ini nganu setiap mapel bdea beda
    public function mapelIndonesia()
    {
        $tugas = Tugas::whereHas('data_mapel', function ($query) {
            $query->where('nama_mapel', 'bahasa indonesia')->wherein('status', ['menunggu', 'mengajukan ulang']);
        })->paginate(5);
        $nama_guru = nama_guru::all();
        $nama_mapel = data_mapel::all();
        return view('dashboard_component.tugasIndonesia', compact('tugas', 'nama_guru', 'nama_mapel')); // Kirim data guru ke tampilan
    }
    public function mapelAgama()
    {
        $tugas = Tugas::whereHas('data_mapel', function ($query) {$query->where('nama_mapel', 'Pendidikan Agama Islam')->wherein('status', ['menunggu', 'mengajukan ulang']);})->paginate(5);
        $nama_guru = nama_guru::all();
        $nama_mapel = data_mapel::all();
        return view('dashboard_component.tugasagama', compact('tugas', 'nama_guru', 'nama_mapel')); // Kirim data guru ke tampilan
    }
    public function mapelMatematika()
    {
        $tugas = Tugas::whereHas('data_mapel', function ($query) {
            $query->where('nama_mapel', 'Matematika')->wherein('status', ['menunggu', 'mengajukan ulang']);
        })->paginate(5);
        $nama_guru = nama_guru::all();
        $nama_mapel = data_mapel::all();
        return view('dashboard_component.tugasmatematika', compact('tugas', 'nama_guru', 'nama_mapel')); // Kirim data guru ke tampilan
    }

    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required',

        ],[
            'nama_mapel.required' => 'Nama Mapel Wajib Diisi'
        ]);

        data_mapel::create([
            'nama_mapel' => $request->input('nama_mapel'),
        ]);

        return redirect()->route('mapel.index')->with('success', 'Data mapel telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(data_mapel $data_mapel)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    //     public function edit($id)
    // {
    //     $mapel = data_mapel::find($id); // Mengambil data mapel yang akan diedit berdasarkan ID

    //     return view('data_mapel.mapel', compact('mapel'));
    // }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, data_mapel $data_mapel)
{
    $request->validate([
        'nama_mapel' => 'required',
    ], [
        'nama_mapel.required' => 'Nama Mapel Wajib Diisi'
    ]);

    $data_mapel->update([
        'nama_mapel' => $request->input('nama_mapel'),
    ]);

    return redirect()->route('mapel.index')->with('success', 'Data mapel telah diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data_mapel = data_mapel::findOrFail($id);
        $jumlah = Tugas::where('mapel_id',$data_mapel->id)->count();
        if ($jumlah > 0) {
            return redirect()->route('mapel.index')->with('error', 'Data mapel tidak dapat dihapus karena masih digunakan.');
        }
        else{
            $data_mapel->delete();
        }

        return redirect()->route('mapel.index')->with('success', 'Data mapel telah dihapus.');
    }
}
