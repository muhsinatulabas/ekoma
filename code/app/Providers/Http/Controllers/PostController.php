<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\MultiplePost;
use App\Modul;
use App\PCLPNU;
use App\KategoriPosting;
use DB;


class PostController extends Controller
{
  //Ambil Data Modul
  public function getModulPost($post){
    $url='post/'.$post.'/list';
    $data=Modul::where('url','=',$url)->first();
    return $data;
  }

  //Detil Posting
  public function detil($post,$id){
    $data['detil']=MultiplePost::select('multiple_post.*','m_user.nama_lengkap','pc_lpnu.nama_cabang')
      ->join('m_user','m_user.id','multiple_post.fid_user')
      ->leftJoin('pc_lpnu','pc_lpnu.id','multiple_post.fid_pc_lpnu')->find($id);
    $data['pesantren']=$this->getPostKategori($post,1,'all');
    $data['koperasi']=$this->getPostKategori($post,2,'all');
    $data['investasi']=$this->getPostKategori($post,5,'all');
    $title=$this->getModulPost($post)->nama_modul;
    $master_controller=new MasterController;
    $master['kategori']=$master_controller->getDataMaster()['kategori'];
    return view('website.post.detil')
      ->with('title',$title)
      ->with('master',$master)
      ->with('data',$data)
      ->with('post',$post);
  }

  //Ambil 3 Posting Data per jenis Modul, Kategori, dan pc_lpnu
  public function getPostKategori($post,$kategori,$pc_lpnu){
    $data=MultiplePost::select('multiple_post.*')
      ->join('kategori_post','kategori_post.fid_posting','multiple_post.id')
      ->where('kategori_post.fid_kategori','=',$kategori)
      ->where('fid_modul','=',$this->getModulPost($post)->id);
    if($pc_lpnu!='all'){
      $data=$data->where('fid_pc_lpnu','=',$pc_lpnu);
    }
    $data = $data->limit(3)->get();
    return $data;
  }

  //Ambil Posting Data peh Halaman
  public function getPost($post,$kategori,$pc_lpnu,$search,$page){
    DB::statement("set sql_mode=''");
    DB::statement("set global sql_mode=''");
    $perpage = 10;
    $query=MultiplePost::select('multiple_post.*','m_user.nama_lengkap','pc_lpnu.nama_cabang')
      ->join('m_user','m_user.id','multiple_post.fid_user')
      ->leftJoin('pc_lpnu','pc_lpnu.id','multiple_post.fid_pc_lpnu')
      ->join('m_hak_akses','m_hak_akses.id','=','m_user.fid_hak_akses');

    if($post !='all'){
      $query = $query->where('fid_modul','=',$this->getModulPost($post)->id);
    }

    if($search != 'all'){
      $search = explode('=',$search);
      $query = $query->whereRaw("(multiple_post.judul LIKE '%".$search[1]."%' or m_user.nama_lengkap LIKE '%".$search[1]."%' )");
    }

    if($pc_lpnu !='all'){
      $query = $query->where('multiple_post.fid_pc_lpnu','=',$pc_lpnu);
    }

    if($kategori !='all'){
      $query = $query->join('kategori_post','kategori_post.fid_posting','multiple_post.id')
                      ->where('kategori_post.fid_kategori','=',$kategori);
    }

    $data['datatotal'] = $query->count();
    $data['pagetotal'] = ceil($query->count() / $perpage);
    $data['perpage'] = $perpage;
    $data['pageposition'] = $page;
    $result = $query->skip(($page-1)*$perpage)->take($perpage)->get();
    $data['data'] = $result;
    return $data;

  }

  //Return View Posting dari Website
  public function index($post,$kategori='all',$pc_lpnu='all',$search='all',$page=1){
    $data=$this->getPost($post,$kategori,$pc_lpnu,$search,$page);
    $data_kategori['pesantren']=$this->getPostKategori($post,1,'all');
    $data_kategori['koperasi']=$this->getPostKategori($post,2,'all');
    $data_kategori['investasi']=$this->getPostKategori($post,5,'all');
    $title=$this->getModulPost($post)->nama_modul;

    $master_controller=new MasterController;
    $master['kategori']=$master_controller->getDataMaster()['kategori'];

    return view('website.post.index')
      ->with('search',$search)
      ->with('title',$title)
      ->with('master',$master)
      ->with('kategori',$kategori)
      ->with('pc_lpnu',$pc_lpnu)
      ->with('data_kategori',$data_kategori)
      ->with('data',$data)
      ->with('post',$post);
  }

  //Return Posting Data di Halaman Admin
  public function admin($post,$kategori='all',$pc_lpnu='all',$search='all',$page=1){
    $title_post=$this->getModulPost($post)->nama_modul;
    $master_controller=new MasterController;
    $master['kategori']=$master_controller->getDataMaster()['kategori'];
    $master['pc-lpnu']=$master_controller->getDataMaster()['pc-lpnu'];
    $modul=$master_controller->getModulSidebar(0);
    $data=$this->getPost($post,$kategori,$pc_lpnu,$search,$page);
    return view('admin-page.post.index')
      ->with('post',$post)
      ->with('kategori',$kategori)
      ->with('pc_lpnu',$pc_lpnu)
      ->with('master',$master)
      ->with('search',$search)
      ->with('data',$data)
      ->with('title_post',$title_post)
      ->with('modul',$modul);
  }

  //Form Posting Data
  public function form($post,$parameter='add'){
    $title_post=$this->getModulPost($post)->nama_modul;
    $master_controller=new MasterController;
    $modul=$master_controller->getModulSidebar(0);
    $master=$master_controller->getDataMaster();
    if($parameter!='add'){
      $pisah_paramater=explode('=',$parameter);
      $data['post']=MultiplePost::find($pisah_paramater[1]);

      foreach ($master['kategori'] as $key => $value) {
        $cek_kategori_posting=KategoriPosting::where('fid_posting','=',$pisah_paramater[1])->where('fid_kategori','=',$value->id)->first();
        if(!empty($cek_kategori_posting)){
          $master['kategori'][$key]->selected='selected';
        }
        else{
          $master['kategori'][$key]->selected='';
        }
      }

    }
    else{
      $data='';
    }
    return view('admin-page.post.form')
      ->with('post',$post)
      ->with('data',$data)
      ->with('master',$master)
      ->with('parameter',$parameter)
      ->with('title_post',$title_post)
      ->with('modul',$modul);
  }

  //Cari Data Posting
  public function search(Request $request,$post){
    if($request->input('search') != ''){
        $restrict = array('/');
        $keyword = str_replace($restrict,"",$request->input('search'));
        $search = 'search='.$keyword;
        return redirect($request->url.'/'.$search);
    }
    else{
        return redirect($request->url);
    }
  }

  //Filter Data Posting
  public function filter(Request $request,$post){
    return redirect('admin/post/'.$post.'/list/'.$request->kategori.'/'.$request->pc_lpnu);
  }

  //Proses Posting Data - Tambah, Edit, Hapus
  public function proses(Request $request,$post,$parameter){
    date_default_timezone_set("Asia/Bangkok");
    if($parameter=='add'){
      $kolom=new MultiplePost;
      $action='add';
    }
    else{
      $pisah=explode('=',$parameter);
      $action=$pisah[0];
      $kolom=MultiplePost::find($pisah[1]);
    }
    $kolom->judul=$request->judul;
    $kolom->content=$request->content;
    $kolom->fid_pc_lpnu=$request->pc_lpnu;
    $kolom->sumber=$request->sumber;
    $kolom->headline=$request->headline;
    $kolom->fid_modul=$this->getModulPost($post)->id;
    $kolom->fid_user=Session::get('useractive')->id;
    $kolom->tanggal=date('Y-m-d H:i:s');
    if($post=='video'){
      $kolom->link_video=$request->link_video;
    }
    if($request->hasFile('file')){
      if(!empty($kolom->file)){
        unlink(storage_path('app/'.$kolom->file));
      }
      $uploadedFile = $request->file('file');
      $path = $uploadedFile->store('posting');
      $kolom->file=$path;
    }

    if($action=='delete'){
      if(!empty($kolom->file)){
        unlink(storage_path('app/'.$kolom->file));
      }
      $kolom->delete();
      return redirect('admin/post/'.$post.'/list')
        ->with('message','Data '.$this->getModulPost($post)->nama_modul.'berhasil dihapus')
        ->with('message_type','success');
    }
    else{
      $kolom->save();
      if(!empty($request->kategori)){
        $kategori=KategoriPosting::where('fid_posting','=',$kolom->id)->delete();
        foreach ($request->kategori as $key) {
          $kategori=new KategoriPosting;
          $kategori->fid_posting=$kolom->id;
          $kategori->fid_kategori=$key;
          $kategori->save();
        }
      }
      return redirect('admin/post/'.$post.'/list')
        ->with('message','Data '.$this->getModulPost($post)->nama_modul.'berhasil disimpan')
        ->with('message_type','success');
    }
  }
}
