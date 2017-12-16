<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Owner;

class KamarController extends Controller
{
    public function index() {
      $owners = Owner::all();
      return response()->json($owners);
    }

    public function create(Request $request) {
      $owner = new Owner();

      $owner->username = $request->username;
      $owner->password = Hash::make($request->password);
      $owner->telepon = $request->telepon;
      $owner->nama = $request->nama;
      $owner->alamat = $request->alamat;
      $owner->save();

      return response()->json(['status'=>'benar']);
    }

    public function update(Request $request, $username, $password) {
      $hasher = app()->make('hash');
      $result = Owner::where('username', $username)->get();

      if (!$result->isEmpty()) {
        $pass = $result->makeVisible(['password'])[0]->password;
        if (Hash::check($password, $pass)) {
          return response()->json(['status'=>'benar']);
        }
      }
      return response()->json(['status'=>'salah']);
    }
}
