<?php

namespace App\Http\Controllers;

use Helper;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * View all Data using Eloquent
     */
    
    public function show() {
        $siswa = Siswa::all();
        return response()->json([
            "data" => $siswa
        ]);
    }
    /**
     * Create new Siswa using Eloquent
     */
    public function create(Request $request)
    {
        $siswa = new Siswa([
            'nis' => $request->get('nis'),
            'nama' => $request->get('nama'),
            'jurusan' => $request->get('jurusan')
        ]);
        if ($siswa->save()) {
            return response()->json([
                "msg" => "Data berhasil disimpan",
            ], 200);
        } else {
            return response()->json([
                "msg" => "Terjadi kesalahan saat menyimpan data"
            ], 500);
        }
    }
    /**
     * Update data siswa using Eloquent
     */
    
    public function update(Request $request)
    {
        $siswa = Siswa::where('nis', $request->get("nis"))->first();
        $siswa->nis = $request->get('nis');
        $siswa->nama = $request->get('nama');
        $siswa->jurusan = $request->get('jurusan');
        if ($siswa->save()) {
            return response()->json([
                "msg" => "Akun dengan berhasil di update"
            ], 200);
        } else {
            return response()->json([
                "msg" => "Terjadi kesalahan saat mengupdate data"
            ], 500);
        }
    }
    /**
     * Delete data using Eloquent
     */
    
    public function destroy(Request $request)
    {
        $siswa = Siswa::where('nis', $request->get('nis'))->first();
        if ($siswa->delete()) {
            return response()->json([
                "msg" => "Akun berhasil di hapus"
            ], 200);
        } else {
            return response()->json([
                "msg" => "Terjadi kesalahan saat menghapus data"
            ], 500);
        }
    }
    /**
     * Get Siswa
     */
     public function detail($nis) 
     {
        $siswa = Siswa::where('nis', $nis)->first();
        if($siswa) {
            return response()->json([
                "msg" => "Akun dengan nis $nis Ditemukan",
                "data" => $siswa
            ], 200);
        } else {
            return response()->json([
                "msg" => "Terjadi kesalahan saat menghapus data"
            ], 500);
        }
     }
}