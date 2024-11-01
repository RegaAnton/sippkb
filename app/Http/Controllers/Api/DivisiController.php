<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Support\Facades\Validator;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $db = Divisi::orderBy('Nama_Divisi')->get();
        
        return response()->json([
            'status' => true,
            'pesan' => 'Data Divisi Berhasil Ditampilkan',
            'data' => $db
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'Nama_Divisi' => 'required',
        ]);

        if($validasi->fails()){
            return response()->json([
                'status' => false,
                'erorr' => $validasi->errors()
            ]);
        }

        $data = [
            'Nama_Divisi' => $request->Nama_Divisi,
            'created' => Carbon::now()->toTimeString() . ' ' . Carbon::now()->toDateString(),
            'updated' => Carbon::now()->toTimeString() . ' ' .Carbon::now()->toDateString(),
        ];

        $db = Divisi::create($data);

        return response()->json([
            'status' => true,
            'pesan' => 'Data Divisi Berhasil Ditambahkan',
            'data' => $db
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $db = Divisi::findOrFail($id);

        return response()->json([
            'status' => true,
            'pesan' => 'Data Divisi Berhasil Ditemukan',
            'data' => $db
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'Nama_Divisi' =>'required'
        ]);

        if($validasi->fails()){
            return response()->json([
                'status' => false,
                'erorr' => $validasi->errors()
            ]);
        }

        $data = [
            'Nama_Divisi' => $request->Nama_Divisi,
            'updated' => Carbon::now()->toTimeString() . ' ' .Carbon::now()->toDateString(),
        ];

        $db = Divisi::findOrFail($id);
        $db->update($data);

        return response()->json([
            'status' => true,
            'pesan' => 'Data Divisi Berhasil Diubah',
            'data' => $db
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = Divisi::findOrFail($id);
        $db->delete();

        return response()->json([
            'status' => true,
            'pesan' => 'Data Divisi Berhasil Dihapus'
        ]);
    }
}
