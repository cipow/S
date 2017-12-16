<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Owner;
use App\Kamar;

class OwnerController extends Controller
{
    public function __construct() {
      $this->middleware('auth', ['only' => [
          'updateProfil',
          'uploadFoto',
          'geolocation',
          'listKamar',
          'createKamar',
          'updateKamar',
          'deleteKamar'
        ]]);
    }

    public function index() {
      $owners = Owner::all();
      return response()->json(['count'=>$owners->count(),'data'=>$owners]);
    }

    public function authentication(Request $request) {
      $result = Owner::where('username', $request->username)->get();

      if (!$result->isEmpty()) {
        $pass = $result->makeVisible(['password'])[0]->password;
        if (Hash::check($request->password, $pass)) {
          $apikey = base64_encode(str_random(40));
          Owner::where('username', $request->username)->update([
            'api_token' => $apikey
          ]);

          return response()->json(['status'=>'success', 'api_token'=>$apikey]);
        } else {
          return response()->json(['status'=>'wrong password']);
        }
      }
      return response()->json(['status'=>'no found']);
    }

    public function create(Request $request) {
      $owner = new Owner();

      $owner->username = $request->username;
      $owner->password = Hash::make($request->password);
      $owner->telepon = $request->telepon;
      $owner->nama = $request->nama;
      $owner->alamat = $request->alamat;
      $owner->save();

      return response()->json(['status'=>'created']);
    }

    private function getUsername($apikey) {
      $user = Owner::where('api_token', $apikey)->first();
      return $user->username;
    }

    public function updateProfil(Request $request) {
      $username = $this->getUsername($request->header('Authorization'));
      Owner::where('username', $username)->update([
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'alamat' => $request->alamat,
        'nama_kos' => $request->nama_kos,
        'lain_lain' => $request->lain_lain
      ]);

      return response()->json(['status'=>'updated']);

    }

    public function uploadFoto(Request $request) {
      $username = $this->getUsername($request->header('Authorization'));
      $destinationPath = 'owners/image/';

      if($request->hasFile('foto')) {
        if($request->file('foto')->isValid()) {
          $file = $request->file('foto');
          $extension = $file->getClientOriginalExtension();
          $filename = $username.'.'.$extension;

          $file->move($destinationPath, $filename);
          Owner::where('username', $username)->update([
            'foto' => url('/'.$destinationPath.$filename)
          ]);

          return response()->json(['status'=>'uploaded']);

        } else {
          return response()->json(['status'=>'upload unsuccessfully']);
        }
      } else {
        return response()->json(['status'=>'file not found']);
      }
    }

    public function geolocation(Request $request) {
      $username = $this->getUsername($request->header('Authorization'));
      Owner::where('username', $username)->update(['geo'=>$request->geo]);
      return response()->json(['status'=>'updated']);
    }

    public function listKamar(Request $request) {
      $username = $this->getUsername($request->header('Authorization'));
      $kamars = Owner::where('username', $username)->first();
      return response()->json(['count'=>$kamars->kamars()->count(),'data'=>$kamars->kamars]);
    }

    public function createKamar(Request $request) {
      $username = $this->getUsername($request->header('Authorization'));
      $destinationPath = 'kamars/cover/';
      $fileSave = '';

      if($request->hasFile('cover')) {
        if($request->file('cover')->isValid()) {
          $file = $request->file('cover');
          $fileName = $username.'-'.$request->jenis.'.'.$file->getClientOriginalExtension();
          $file->move($destinationPath, $fileName);

          $fileSave = url('/'.$destinationPath.$fileName);
        }
      } else {
        $fileSave = 'no image';
      }

      $kamar = new Kamar();
      $kamar->cover = $fileSave;
      $kamar->tipe = $request->tipe;
      $kamar->jenis = $request->jenis;
      $kamar->harga = $request->harga;
      $kamar->total = $request->total;
      $kamar->fasilitas = $request->fasilitas;
      $kamar->username = $username;

      $user = Owner::where('username', $username)->first();
      $user->kamars()->save($kamar);

      return response()->json(['status'=>'created']);
    }

    public function updateKamar(Request $request, $id) {

    }

    public function deleteKamar(Request $request, $id) {

    }

}
