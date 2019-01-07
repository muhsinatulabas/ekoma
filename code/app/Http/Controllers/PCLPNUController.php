<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\MultiplePost;
use App\Modul;
use App\PCLPNU;
use App\KategoriPosting;
use App\Pengusaha;
use DB;


class PCLPNUController extends Controller
{

  //Ambil Data PC LPNU per Halaman
  public function getPCLPNU($search,$page){
    DB::statement("set sql_mode=''");
    DB::statement("set global sql_mode=''");
    $perpage = 10;
    $query=PCLPNU::select('*');
    if($search != 'all'){
      $search = explode('=',$search);
      $query = $query->whereRaw("(nama_cabang LIKE '%".$search[1]."%' or ketua LIKE '%".$search[1]."%' )");
    }

    $data['datatotal'] = $query->count();
    $data['pagetotal'] = ceil($query->count() / $perpage);
    $data['perpage'] = $perpage;
    $data['pageposition'] = $page;
    $result = $query->skip(($page-1)*$perpage)->take($perpage)->get();
    $data['data'] = $result;
    return $data;
  }

  //Return View PC LPNU di Halaman Admin
  public function admin($search='all',$page=1){
    $data=$this->getPCLPNU($search,$page);
    $master_controller=new MasterController;
    $modul=$master_controller->getModulSidebar(0);
    return view('admin-page.pc-lpnu.index')
      ->with('search',$search)
      ->with('modul',$modul)
      ->with('data',$data);
  }

  //Form PC LPNU di Halaman Admin
  public function form($action='tambah',$id='all'){
    $data=PCLPNU::find($id);
    $master_controller=new MasterController;
    $modul=$master_controller->getModulSidebar(0);
    return view('admin-page.pc-lpnu.form')
    ->with('modul',$modul)
    ->with('action',$action)
    ->with('id',$id)
    ->with('data',$data);
  }

  //Proses Data PC LPNU
  public function proses(Request $request,$action,$id){
    if($id=='all'){
      $kolom=new PCLPNU;
    }
    else{
      $kolom=PCLPNU::find($request->id);
    }
    $kolom->nama_cabang=$request->nama_cabang;
    $kolom->deskripsi=$request->deskripsi;
    $kolom->ketua=$request->ketua;
    $kolom->email=$request->email;
    $kolom->no_hp=$request->hp;
    $kolom->alamat=$request->alamat;
    if($request->hasFile('foto-ketua')){
      if(!empty($kolom->foto_ketua)){
        unlink(storage_path('app/'.$kolom->foto_ketua));
      }
      $uploadedFile = $request->file('foto-ketua');
      $path = $uploadedFile->store('profil-pengurus');
      $kolom->foto_ketua=$path;
    }

    if($action=='delete'){
      $kolom->delete();
      return redirect('admin/pc-lpnu/list')
        ->with('message','Data PC LPNU berhasil dihapus')
        ->with('message_type','success');
    }
    else{
      $kolom->save();
      return redirect('admin/pc-lpnu/list')
        ->with('message','Data PC LPNU berhasil disimpan')
        ->with('message_type','success');
    }

  }

  //Mencari Data PC LPNU
  public function search(Request $request){
    if($request->input('search') != ''){
      $restrict = array('/');
      $keyword = str_replace($restrict,"",$request->input('search'));
      $search = 'search='.$keyword;
      return redirect('admin/pc-lpnu/list/'.$search);
    }
    else{
      return redirect('admin/pc-lpnu/list');
    }
  }

  //Return View PC LPNU di Halaman Website
  public function index(){
    $data['posting']=MultiplePost::select('multiple_post.*','pc_lpnu.nama_cabang')
      ->leftJoin('pc_lpnu','pc_lpnu.id','multiple_post.fid_pc_lpnu')
      ->where('multiple_post.fid_pc_lpnu','!=',0)->limit(9)->get();

    $data['pengusaha']=Pengusaha::select('pengusaha_nu.*','pc_lpnu.nama_cabang','m_level_pengusaha.level_pengusaha','m_level_pengusaha.color')
    ->leftJoin('pc_lpnu','pc_lpnu.id','=','pengusaha_nu.fid_pc_lpnu')
    ->leftJoin('m_level_pengusaha','m_level_pengusaha.id','=','pengusaha_nu.fid_level_pengusaha')
    ->limit(10)->get();

    $data['pc-lpnu']=PCLPNU::get();

    return view ('website.pc-lpnu.index')
      ->with('data',$data);
  }

  public function getPengusaha($pclpnu,$level,$search,$page){
    DB::statement("set sql_mode=''");
    DB::statement("set global sql_mode=''");
    $perpage = 12;
    $query=Pengusaha::select('pengusaha_nu.*','pc_lpnu.nama_cabang','m_level_pengusaha.level_pengusaha','m_level_pengusaha.color')
      ->leftJoin('m_level_pengusaha','m_level_pengusaha.id','pengusaha_nu.fid_level_pengusaha')
      ->leftJoin('pc_lpnu','pc_lpnu.id','pengusaha_nu.fid_pc_lpnu');

    if($pclpnu !='all'){
      $query = $query->where('fid_pc_lpnu','=',$pclpnu);
    }

    if($level !='all'){
      $query = $query->where('fid_level_pengusaha','=',$level);
    }

    if($search != 'all'){
      $search = explode('=',$search);
      $query = $query->whereRaw("(pengusaha_nu.nama_lengkap LIKE '%".$search[1]."%' or pc_lpnu.nama_cabang LIKE '%".$search[1]."%' )");
    }

    $data['datatotal'] = $query->count();
    $data['pagetotal'] = ceil($query->count() / $perpage);
    $data['perpage'] = $perpage;
    $data['pageposition'] = $page;
    $result = $query->skip(($page-1)*$perpage)->take($perpage)->get();
    $data['data'] = $result;
    return $data;
  }

  public function detil($id,$tab='profil',$kategori='all',$search='all',$page=1){
    $post_controller=new PostController;
    if($tab=='berita' || $tab=='agenda'){
      $data=$post_controller->getPost($tab,$kategori,$id,$search,$page);
      $data['pesantren']=$post_controller->getPostKategori($tab,1,$id);
      $data['koperasi']=$post_controller->getPostKategori($tab,2,$id);
      $data['investasi']=$post_controller->getPostKategori($tab,5,$id);
    }

    if($tab=='pengusaha'){
      $data=$this->getPengusaha($id,$kategori,$search,$page);
    }

    $master_controller=new MasterController;
    $master['kategori']=$master_controller->getDataMaster()['kategori'];
    $data['informasi']=PCLPNU::find($id);
    return view ('website.pc-lpnu.detil')
      ->with('id',$id)
      ->with('tab',$tab)
      ->with('search',$search)
      ->with('master',$master)
      ->with('data',$data);
  }
}
