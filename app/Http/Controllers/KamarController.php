<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Owner;
use App\Kamar;
use App\Preview;

class KamarController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['except' => [
        'getAll'
      ]]);
  }

  public function getAll(Request $request) {
    $harga = 100000000;
    if ($request->has('harga')) {
      $harga = $request->harga;
    }

    if ($request->has('sisa')) {
      if ($request->sisa == 1) {
        $kamars = Kamar::where('harga','<=',$harga)
                  ->where('jumlah','>',0);
      }
    } else {
      $kamars = Kamar::where('harga','<=',$harga);
    }

    $kamars = $kamars->get();
    foreach ($kamars as $kamar) {
      $kamar->owner = Kamar::find($kamar->id)->owner;
      $kamar->gambar = Kamar::find($kamar->id)->previews;
    }

    return response()->json(['count'=>$kamars->count(),'data'=>$kamars]);
  }

  public function postPreview(Request $request, $id) {
    $username = $this->getUsername($request->header('Authorization'));
    $kamar = Kamar::find($id);

    if(empty($kamar)) {
      return response()->json(['status'=>'not found']);
    }

    $destinationPath = 'kamars/preview/';
    $fileSave = '';

    if($request->hasFile('preview')) {
      if($request->file('preview')->isValid()) {
        $file = $request->file('preview');
        $fileName = $username.'-'.$kamar->jenis.'-'
                    .$file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        $fileSave = url('/'.$destinationPath.$fileName);


        $preview = new Preview();
        $preview->gambar = $fileSave;

        $kamar->previews()->save($preview);
        return response()->json(['status'=>'uploaded']);
      }
    }
  }

  public function deletePreview($id) {
    $preview = Preview::find($id)->delete();
    if(empty($preview)) {
      return response()->json(['status'=>'not found']);
    }

    return response()->json(['status'=>'deleted']);
  }

  private function getUsername($apikey) {
    $user = Owner::where('api_token', $apikey)->first();
    return $user->username;
  }

  public function listKamar(Request $request) {
    $username = $this->getUsername($request->header('Authorization'));
    $kamars = Owner::where('username', $username)->first();
    return response()->json(['count'=>$kamars->kamars()->count(),'data'=>$kamars->kamars]);
  }

  public function getKamar(Request $request, $id) {
    $username = $this->getUsername($request->header('Authorization'));

    $result = Kamar::where([
        'id' => $id,
        'username' => $username
      ])->first();

    if(empty($result)) {
      return response()->json(['status'=>'not found']);
    }
    $result->gambar = Kamar::find($id)->previews;

    return response()->json($result);
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
    $kamar->jumlah = $request->jumlah;
    $kamar->fasilitas = $request->fasilitas;

    $user = Owner::where('username', $username)->first();
    $user->kamars()->save($kamar);

    return response()->json(['status'=>'created']);
  }

  public function updateKamarInfo(Request $request, $id) {
    $username = $this->getUsername($request->header('Authorization'));

    $result = Kamar::where([
        'id' => $id,
        'username' => $username
      ])->first();

    if(empty($result)) {
      return response()->json(['status'=>'not found']);
    }

    $result->tipe = $request->tipe;
    $result->jenis = $request->jenis;
    $result->harga = $request->harga;
    $result->fasilitas = $request->fasilitas;
    $result->save();

    return response()->json(['status'=>'updated']);
  }

  public function updateKamarCover(Request $request, $id) {
    $username = $this->getUsername($request->header('Authorization'));
    $result = Kamar::where([
        'id' => $id,
        'username' => $username
      ])->first();

    if(empty($result)) {
      return response()->json(['status'=>'not found']);
    }

    $destinationPath = 'kamars/cover/';
    $fileSave = '';

    if($request->hasFile('cover')) {
      if($request->file('cover')->isValid()) {
        $file = $request->file('cover');
        $fileName = $username.'-'.$result->jenis.'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        $fileSave = url('/'.$destinationPath.$fileName);
      }
    } else {
      $fileSave = 'no image';
    }

    $result->cover = $fileSave;
    $result->save();

    return response()->json(['status'=>'updated']);


  }

  public function updateKamarJumlah(Request $request, $id) {
    $username = $this->getUsername($request->header('Authorization'));

    $result = Kamar::where([
        'id' => $id,
        'username' => $username
      ])->first();

    if(empty($result)) {
      return response()->json(['status'=>'not found']);
    }

    $result->jumlah = $request->jumlah;
    $result->save();

    return response()->json(['status'=>'updated']);
  }

  public function deleteKamar(Request $request, $id) {
    $username = $this->getUsername($request->header('Authorization'));

    $result = Kamar::where([
        'id' => $id,
        'username' => $username
      ])->first();

    if(empty($result)) {
      return response()->json(['status'=>'not found']);
    }

    $result->delete();
    return response()->json(['status'=>'deleted']);
  }
}
