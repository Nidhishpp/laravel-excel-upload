<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Imports\ProfileImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function upload(Request $request)
    {

        $request->validate([
            'excel' => 'required|file'
        ]);

        $ret = Excel::import(new ProfileImport, request()->file('excel'));

        Session::flash('status', "success");
        return redirect()
            ->back();
        // return response()->json([
        //     'data'    => $ret,
        //     'status'  => 'success',
        //     'message' => 'Upload Success'
        // ], 200);
    }
}
