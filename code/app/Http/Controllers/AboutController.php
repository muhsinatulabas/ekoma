<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\SinglePost;
use App\KategoriPosting;
use App\Quote;
use App\SusunanPengurus;
use App\Jabatan;
use App\Gallery;
use App\AlbumGallery;
use DB;

class AboutController extends Controller
{

  //---------------------------------------------------------------------------------------------------------------//
  //-------------------------------------------------TENTANG KAMI--------------------------------------------------//
  //---------------------------------------------------------------------------------------------------------------//
  public function getPengurus($search,$page){
    DB::statement("set sql_mode=''");
    DB::statement("set global sql_mode=''");
    $perpage = 10;
    $query=SusunanPengurus::select('pengurus_lpnu.*','m_jabatan.jabatan')
      ->leftJoin('m_jabatan','m_jabatan.id','=','pengurus_lpnu.fid_jabatan');

    if($search != 'all'){
      $search = explode('=',$search);
      $query = $query->whereRaw("(nama_lengkap LIKE '%".$search[1]."%' or jabatan LIKE '%".$search[1]."%' )");
    }

    $data['datatotal'] = $query->count();
    $data['pagetotal'] = ceil($query->count() / $perpage);
    $data['perpage'] = $perpage;
    $data['pageposition'] = $page;
    $result = $query->skip(($page-1)*$perpage)->take($perpage)->get();

    $data['data'] = $result;
    return $data;
  }

  public function getFolder(){
    $data=AlbumGallery::get();
    return $data;
  }

  public function getGallery($id){
    $data=Gallery::where('fid_album','=',$id)->get();
    return $data;
  }


  public function getData(){
    $data['selayang-pandang']=SinglePost::where('judul','=','Selayang Pandang')->first();
    $data['visi']=SinglePost::where('judul','=','Visi')->first();
    $data['misi']=SinglePost::where('judul','=','Misi')->first();

    return $data;
  }

  public function getPengurusWeb(){
    $data=Jabatan::whereRaw("id NOT IN('3','5','7')")->get();
    foreach ($data as $key => $value) {
      if($value->id==2){
        $data[$key]->jabatan='Ketua dan Wakil Ketua';
        $data[$key]->pengurus=SusunanPengurus::select('pengurus_lpnu.*','m_jabatan.jabatan')
          ->leftJoin('m_jabatan','m_jabatan.id','=','pengurus_lpnu.fid_jabatan')
          ->whereRaw('pengurus_lpnu.fid_jabatan = 2 OR pengurus_lpnu.fid_jabatan = 3' )->get();
      }
      elseif($value->id==4){
        $data[$key]->jabatan='Sekretaris dan Wakil Sekretaris';
        $data[$key]->pengurus=SusunanPengurus::select('pengurus_lpnu.*','m_jabatan.jabatan')
          ->leftJoin('m_jabatan','m_jabatan.id','=','pengurus_lpnu.fid_jabatan')
          ->whereRaw('pengurus_lpnu.fid_jabatan = 4 OR pengurus_lpnu.fid_jabatan = 5' )->get();
      }
      elseif($value->id==6){
        $data[$key]->jabatan='Bendahara dan Wakil Bendahara';
        $data[$key]->pengurus=SusunanPengurus::select('pengurus_lpnu.*','m_jabatan.jabatan')
          ->leftJoin('m_jabatan','m_jabatan.id','=','pengurus_lpnu.fid_jabatan')
          ->whereRaw('pengurus_lpnu.fid_jabatan = 6 OR pengurus_lpnu.fid_jabatan = 7' )->get();
      }
      else{
        $data[$key]->pengurus=SusunanPengurus::select('pengurus_lpnu.*','m_jabatan.jabatan')
          ->leftJoin('m_jabatan','m_jabatan.id','=','pengurus_lpnu.fid_jabatan')
          ->where('pengurus_lpnu.fid_jabatan','=',$value->id)->get();
      }
    }
    return $data;
  }


  public function index($submenu,$id='all'){
    if($submenu=='pengurus'){
      $data=$this->getPengurusWeb();
    }
    elseif($submenu=='gallery'){
      if($id=='all'){
        $data['data']=$this->getFolder();
      }
      else{
        $data['data']=$this->getGallery($id);
        $data['nama-album']=AlbumGallery::find($id);
      }
    }
    else{
      $data=$this->getData();
    }
    return view('website.about.'.$submenu)
      ->with('id',$id)
      ->with('data',$data);
  }

  public function admin($about,$id='all',$search='all',$page=1){
    $master_controller=new MasterController;
    $modul=$master_controller->getModulSidebar(0);

    if($about=='pengurus'){
      $data=$this->getPengurus($search,$page);
    }
    elseif($about=='gallery'){
      if($id=='all'){
        $data['data']=$this->getFolder();
      }
      else{
        $data['data']=$this->getGallery($id);
        $data['nama-album']=AlbumGallery::find($id);
        // return $data;
      }
    }
    else{
      $data=$this->getData();
    }


    $master['jabatan']=$master_controller->getDataMaster()['jabatan'];

    return view('admin-page.about.'.$about)
      ->with('about',$about)
      ->with('id',$id)
      ->with('master',$master)
      ->with('search',$search)
      ->with('data',$data)
      ->with('modul',$modul);
  }

  public function proses(Request $request,$about,$parameter){
    date_default_timezone_set("Asia/Bangkok");
    if($about=='selayang-pandang'){
      $title='Selayang Pandang';
      $kolom=SinglePost::where('judul','=','Selayang Pandang');
      $kolom = $kolom->update(['content'=>$request->selayang]);
    }
    elseif($about=='visi-misi'){
      $title='Visi dan Misi';

      $kolom_visi=SinglePost::where('judul','=','Visi');
      $kolom_visi = $kolom_visi->update(['content'=>$request->visi]);

      $kolom_misi=SinglePost::where('judul','=','Misi');
      $kolom_misi = $kolom_misi->update(['content'=>$request->misi]);
    }

    return redirect('admin/about/'.$about.'/list')
      ->with('message','Data '.$title.' berhasil disimpan')
      ->with('message_type','success');
  }

  //Proses Data User
  public function prosesPengurus(Request $request, $action='save'){
    if($action=='save'){
      if($request->id==0){
        $kolom=new SusunanPengurus;
      }
      else{
        $kolom=SusunanPengurus::find($request->id);
      }
      $kolom->nama_lengkap=$request->nama_lengkap;
      $kolom->fid_jabatan=$request->jabatan;
      $kolom->fid_pc_lpnu=0;
      $kolom->email=$request->email;
      $kolom->no_hp=$request->hp;
      $kolom->alamat=$request->alamat;
      if($request->hasFile('foto')){
        if(!empty($kolom->foto)){
          unlink(storage_path('app/'.$kolom->foto));
        }
        $uploadedFile = $request->file('foto');
        $path = $uploadedFile->store('profil-pengurus');
        $kolom->foto=$path;
      }
      $kolom->save();
      return redirect('admin/about/pengurus')
        ->with('message','Pengurus LPNU berhasil disimpan')
        ->with('message_type','success');
    }
    else{
      $pisah=explode('=',$action);
      $kolom=SusunanPengurus::find($pisah[1]);
      if(!empty($kolom->foto)){
        unlink(storage_path('app/'.$kolom->foto));
      }
      $kolom->delete();
      return redirect('admin/about/pengurus')
        ->with('message','Pengurus LPNU berhasil dihapus')
        ->with('message_type','success');
    }
  }

  public function deleteGallery($id){
    $gallery=Gallery::where('fid_album','=',$id)->get();
    foreach ($gallery as $key => $value) {
      $data=Gallery::find($value->id);
      if(!empty($data->foto)){
        unlink(storage_path('app/'.$data->foto));
      }
      $data->delete();
    }
  }

  public function prosesGallery(Request $request,$id,$action='save'){
    //Proses Album GAllery
    if($id=='all'){
      //Tambah dan Edit
      if($action=='save'){
        if($request->id==0){
          $kolom=new AlbumGallery; //Tambah
        }
        else{
          $kolom=AlbumGallery::find($request->id); //Edit
        }
        $kolom->album=$request->nama_album;
        $kolom->save();
        return redirect('admin/about/gallery')
          ->with('message','Album Gallery berhasil disimpan')
          ->with('message_type','success');
      }
      else{
        $pisah=explode('=',$action);
        $kolom=AlbumGallery::find($pisah[1]);
        $this->deleteGallery($kolom->id); //Hapus Gallery
        $kolom->delete();
        return redirect('admin/about/gallery')
          ->with('message','Album Gallery berhasil dihapus')
          ->with('message_type','success');
      }
    }
    //Proses Foto gallery
    else{
      //Tambah dan Edit
      if($action=='save'){
        if($request->id==0){
          $kolom=new Gallery; //Tambah
        }
        else{
          $kolom=Gallery::find($request->id); //Edit
        }
        $kolom->caption=$request->caption;
        $kolom->fid_album=$id;
        $kolom->fid_user=Session::get('useractive')->id;
        $kolom->tanggal=date('Y-m-d');
        if($request->hasFile('foto')){
          if(!empty($kolom->foto)){
            unlink(storage_path('app/'.$kolom->foto));
          }
          $uploadedFile = $request->file('foto');
          $path = $uploadedFile->store('gallery');
          $kolom->foto=$path;
        }
        $kolom->save();
        return redirect('admin/about/gallery/'.$id)
          ->with('message','Gallery berhasil disimpan')
          ->with('message_type','success');
      }
      else{
        $pisah=explode('=',$action);
        $kolom=Gallery::find($pisah[1]);
        if(!empty($kolom->foto)){
          unlink(storage_path('app/'.$kolom->foto));
        }
        $kolom->delete();
        return redirect('admin/about/gallery/'.$id)
          ->with('message','Gallery berhasil dihapus')
          ->with('message_type','success');
      }
    }
  }

  //---------------------------------------------------------------------------------------------------------------//
  //--------------------------------------------------QUOTE--------------------------------------------------------//
  //---------------------------------------------------------------------------------------------------------------//


  public function getQuote($search,$page){

    DB::statement("set sql_mode=''");
    DB::statement("set global sql_mode=''");
    $perpage = 10;
    $query=Quote::select('*');

    if($search != 'all'){
      $search = explode('=',$search);
      $query = $query->whereRaw("(nama_lengkap LIKE '%".$search[1]."%' or jabatan LIKE '%".$search[1]."%' )");
    }

    $data['datatotal'] = $query->count();
    $data['pagetotal'] = ceil($query->count() / $perpage);
    $data['perpage'] = $perpage;
    $data['pageposition'] = $page;
    $result = $query->skip(($page-1)*$perpage)->take($perpage)->get();

    foreach ($result as $key => $value) {
      if($value->tampil=='1'){
        $result[$key]->tampil='Tampil';
      }
      else{
        $result[$key]->tampil='Tidak Tampil';
      }
    }
    $data['data'] = $result;
    return $data;
  }

  //Proses Data User
  public function prosesQuote(Request $request, $action='save'){
    if($action=='save'){
      if($request->id==0){
        $kolom=new Quote;
      }
      else{
        $kolom=Quote::find($request->id);
      }
      $kolom->nama_lengkap=$request->nama_lengkap;
      $kolom->jabatan=$request->jabatan;
      $kolom->quote=$request->quote;
      $kolom->tampil=$request->tampil;
      if($request->hasFile('foto')){
        if(!empty($kolom->foto)){
          unlink(storage_path('app/'.$kolom->foto));
        }
        $uploadedFile = $request->file('foto');
        $path = $uploadedFile->store('profil-quote');
        $kolom->foto=$path;
      }
      $kolom->save();
      return redirect('admin/quote')
        ->with('message','Quote berhasil disimpan')
        ->with('message_type','success');
    }
    else{
      $pisah=explode('=',$action);
      $kolom=Quote::find($pisah[1]);
      if(!empty($kolom->foto)){
        unlink(storage_path('app/'.$kolom->foto));
      }
      $kolom->delete();
      return redirect('admin/quote')
        ->with('message','Quote berhasil dihapus')
        ->with('message_type','success');
    }
  }

  public function quote($search='all',$page=1){
    $master_controller=new MasterController;
    $modul=$master_controller->getModulSidebar(0);
    $data=$this->getQuote($search,$page);
    return view('admin-page.about.quote')
      ->with('search',$search)
      ->with('data',$data)
      ->with('modul',$modul);
  }
}
