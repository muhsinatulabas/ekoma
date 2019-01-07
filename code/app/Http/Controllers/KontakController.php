<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\SinglePost;
use App\KategoriPosting;

class KontakController extends Controller
{
  public function getDataKontak(){
    $data['alamat-lpnu']=SinglePost::where('judul','=','Alamat LPNU')->first()->content;
    $data['alamat-pwnu']=SinglePost::where('judul','=','Alamat PWNU')->first()->content;
    $data['hp']=SinglePost::where('judul','=','Handphone')->first()->content;
    $data['email']=SinglePost::where('judul','=','Email')->first()->content;
    $data['facebook']=SinglePost::where('judul','=','Facebook')->first()->content;
    $data['twitter']=SinglePost::where('judul','=','Twitter')->first()->content;
    $data['instagram']=SinglePost::where('judul','=','Instagram')->first()->content;
    $data['youtube']=SinglePost::where('judul','=','Youtube')->first()->content;

    return $data;
  }
  public function admin(){
    $master_controller=new MasterController;
    $modul=$master_controller->getModulSidebar(0);
    $data=$this->getDataKontak();
    return view('admin-page.kontak.index')
      ->with('data',$data)
      ->with('modul',$modul);
  }
  public function proses(Request $request){
    $kolom_alamat_lpnu=SinglePost::where('judul','=','Alamat LPNU');
    $kolom_alamat_lpnu = $kolom_alamat_lpnu->update(['content'=>$request->alamat_lpnu]);

    $kolom_alamat_pwnu=SinglePost::where('judul','=','Alamat PWNU');
    $kolom_alamat_pwnu = $kolom_alamat_pwnu->update(['content'=>$request->alamat_pwnu]);

    $kolom_alamat_hp=SinglePost::where('judul','=','Handphone');
    $kolom_alamat_hp = $kolom_alamat_hp->update(['content'=>$request->no_hp]);

    $kolom_alamat_email=SinglePost::where('judul','=','Email');
    $kolom_alamat_email = $kolom_alamat_email->update(['content'=>$request->email]);

    $kolom_alamat_facebook=SinglePost::where('judul','=','Facebook');
    $kolom_alamat_facebook = $kolom_alamat_facebook->update(['content'=>$request->facebook]);

    $kolom_alamat_twitter=SinglePost::where('judul','=','Twitter');
    $kolom_alamat_twitter = $kolom_alamat_twitter->update(['content'=>$request->twitter]);

    $kolom_alamat_instagram=SinglePost::where('judul','=','Instagram');
    $kolom_alamat_instagram = $kolom_alamat_instagram->update(['content'=>$request->instagram]);

    $kolom_alamat_youtube=SinglePost::where('judul','=','Youtube');
    $kolom_alamat_youtube = $kolom_alamat_youtube->update(['content'=>$request->youtube]);

    return redirect('admin/kontak')
      ->with('message','Data Kontak Kami berhasil disimpan')
      ->with('message_type','success');
  }
}
