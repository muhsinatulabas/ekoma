<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Modul;
use App\PCLPNU;
use App\Kategori;
use App\Pengusaha;
use App\UnitUsaha;
use App\Quote;
use App\SusunanPengurus;
use App\AlbumGallery;
use App\Gallery;


class ApiController extends Controller
{
  public function getUser($id){
    $data=User::find($id);
    return response()->json($data);
  }

  public function getModul($id){
    $data=Modul::find($id);
    return response()->json($data);
  }

  public function getPCLPNU($id){
    $data=PCLPNU::find($id);
    return response()->json($data);
  }

  public function getKategori($id){
    $data=Kategori::find($id);
    return response()->json($data);
  }

  public function getPengusaha($id){
    $data=Pengusaha::find($id);
    return response()->json($data);
  }

  public function getPerusahaan($id){
    $data=UnitUsaha::find($id);
    return response()->json($data);
  }

  public function getQuote($id){
    $data=Quote::find($id);
    return response()->json($data);
  }

  public function getPengurus($id){
    $data=SusunanPengurus::find($id);
    return response()->json($data);
  }

  public function getAlbum($id){
    $data=AlbumGallery::find($id);
    return response()->json($data);
  }

  public function getGallery($id){
    $data=Gallery::find($id);
    return response()->json($data);
  }
}
