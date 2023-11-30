<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * View all Data using Eloquent
     */
    
    public function view() {
        $siswa = Siswa::all();
        return response()->json([
            "data" => $siswa
        ]);
    }
    /**
     * View all Data using QueryBuilder
     */
    public function show() {
        $siswa = DB::table('siswa')->get();
        return response()->json([
            "data" => $siswa
        ], 200);
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
                "msg" => "Data berhasil disimpan"
            ], 200);
        } else {
            return response()->json([
                "msg" => "Terjadi kesalahan saat menyimpan data"
            ], 500);
        }
    }
    
    /**
     * Create new Siswa using QueryBuilder
     */
    
    public function store(Request $request) {
        $siswa = new Siswa([
            'nis' => $request->get('nis'),
            'nama' => $request->get('nama'),
            'jurusan' => $request->get('jurusan')
        ]);
        if(DB::table('siswa')->insert($siswa->toArray())){
            return response()->json([
                "msg" => "Data berhasil disimpan"
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
     * Update data siswa QueryBuilder
     */
    
    public function edit(Request $request) {
        $siswa = new Siswa([
            'nis' => $request->get('nis'),
            'nama' => $request->get('nama'),
            'jurusan' => $request->get('jurusan')
        ]);
        if(DB::table('siswa')->where('nis', $request->get('nis'))->update($siswa->toArray())) {
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
     * Delete data using Eloquent
     */
    
    public function delete(Request $request) {
        if(DB::table('siswa')->where('nis', $request->get('nis'))->delete()) {
            return response()->json([
                "msg" => "Akun berhasil di hapus"
            ], 200);
        } else {
            return response()->json([
                "msg" => "Terjadi kesalahan saat menghapus data"
            ], 500);
        }
    }
}