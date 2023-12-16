<?php

namespace App\Http\Controllers;

use Helper;
use Illuminate\Http\Request;
class ValidationController extends Controller
{
    public function status(Request $request) {
        $validationResult = Helper::validate($request->all());

        if ($validationResult === true) {
            // Proses lebih lanjut karena data valid
            return response()->json(['success' => 'Data valid']);
        } else {
            // Tanggapi jika data tidak valid
            return response()->json(['error' => $validationResult], 422);
        }
    }
}
