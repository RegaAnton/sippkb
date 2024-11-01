<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $db = Pegawai::orderBy('Nama_Lengkap')->get();
        
        return response()->json([
            'status' => true,
            'pesan' => 'Data Pegawai Berhasil Ditampilkan',
            'data' => $db
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'Nama_Lengkap' =>'required'
        ]);

        if($validasi->fails()){
            return response()->json([
                'status' => false,
                'erorr' => $validasi->errors()
            ]);
        }

        $data = [
            'Nama_Lengkap' => $request->Nama_Lengkap,
            'created' => Carbon::now()->toTimeString() . ' ' . Carbon::now()->toDateString(),
            'updated' => Carbon::now()->toTimeString() . ' ' .Carbon::now()->toDateString(),
        ];

        $db = Pegawai::create($data);

        return response()->json([
            'status' => true,
            'pesan' => 'Data Pegawai Berhasil Ditambahkan',
            'data' => $db
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $db = Pegawai::findOrFail($id);

        return response()->json([
            'status' => true,
            'pesan' => 'Data Pegawai Berhasil Ditemukan',
            'data' => $db
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'Nama_Lengkap' =>'required'
        ]);

        if($validasi->fails()){
            return response()->json([
                'status' => false,
                'erorr' => $validasi->errors()
            ]);
        }

        $data = [
            'Nama_Lengkap' => $request->Nama_Lengkap,
            'updated' => Carbon::now()->toTimeString() . ' ' .Carbon::now()->toDateString(),
        ];

        $db = Pegawai::findOrFail($id);
        $db->update($data);

        return response()->json([
            'status' => true,
            'pesan' => 'Data Pegawai Berhasil Diubah',
            'data' => $db
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = Pegawai::findOrFail($id);
        $db->delete();

        return response()->json([
            'status' => true,
            'pesan' => 'Data Pegawai Berhasil Dihapus'
        ]);
    }
}
