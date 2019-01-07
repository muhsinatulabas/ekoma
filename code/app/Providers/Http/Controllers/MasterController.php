<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\HakAkses;
use App\Modul;
use App\PCLPNU;
use App\Kategori;
use App\LevelPengusaha;
use App\Jabatan;
use DB;

class MasterController extends Controller
{

  public function getDataMaster(){
    $master['hak-akses']=HakAkses::get();
    $master['modul']=Modul::get();
    $master['pc-lpnu']=PCLPNU::get();
    $master['kategori']=Kategori::get();
    $master['level-pengusaha']=LevelPengusaha::get();
    $master['jabatan']=Jabatan::get();
    return $master;
  }

  public function getModulSidebar($parent){
    $modul=Modul::where('parent','=',$parent)->orderBy('urutan')->get();
    foreach ($modul as $key => $value) {
      $modul[$key]->submodul=$this->getModulSidebar($value->id);
    }
    return $modul;
  }

  public function dashboard(){
    $modul=$this->getModulSidebar(0);
    return view('admin-page.dashboard')
      ->with('modul',$modul);
  }

  //---------------------------------------------------------------------------------------------------//
  //---------------------------------------------MASTER USER-------------------------------------------//
  //---------------------------------------------------------------------------------------------------//

  //Ambil Data User per Page
  public function getUser($search,$page){
    DB::statement("set sql_mode=''");
    DB::statement("set global sql_mode=''");
    $perpage = 10;
    $query=User::select('m_user.*','m_hak_akses.hak_akses','pc_lpnu.nama_cabang')
      ->leftJoin('pc_lpnu','pc_lpnu.id','m_user.fid_pc_lpnu')
      ->join('m_hak_akses','m_hak_akses.id','=','m_user.fid_hak_akses');

    if($search != 'all'){
      $search = explode('=',$search);
      $query = $query->whereRaw("(m_user.nama_lengkap LIKE '%".$search[1]."%' or m_hak_akses.hak_akses LIKE '%".$search[1]."%' )");
    }

    $data['datatotal'] = $query->count();
    $data['pagetotal'] = ceil($query->count() / $perpage);
    $data['perpage'] = $perpage;
    $data['pageposition'] = $page;
    $result = $query->skip(($page-1)*$perpage)->take($perpage)->get();
    $data['data'] = $result;
    return $data;
  }
  //Cari Data User
  public function searchUser(Request $request){
    if($request->input('search') != ''){
        $restrict = array('/');
        $keyword = str_replace($restrict,"",$request->input('search'));
        $search = 'search='.$keyword;
        return redirect('admin/master/user/'.$search);
    }
    else{
        return redirect('admin/master/user');
    }
  }
  //Return View User
  public function user($search='all',$page=1){
    $master=$this->getDataMaster();
    $data=$this->getUser($search,$page);
    $modul=$this->getModulSidebar(0);
    return view('admin-page.data-master.user')
      ->with('search',$search)
      ->with('master',$master)
      ->with('modul',$modul)
      ->with('data',$data);
  }
  //Proses Data User
  public function prosesUser(Request $request, $action='save'){
    if($action=='save'){
      if($request->id==0){
        $kolom=new User;
      }
      else{
        $kolom=User::find($request->id);
      }
      $kolom->username=$request->username;
      $kolom->nama_lengkap=$request->nama_lengkap;
      if(!empty($request->password)){
        $kolom->password=encrypt($request->password);
      }
      $kolom->fid_hak_akses=$request->hak_akses;
      $kolom->fid_pc_lpnu=$request->pc_lpnu;
      $kolom->email=$request->email;
      $kolom->no_hp=$request->hp;
      $kolom->save();
      return redirect('admin/master/user')
        ->with('message','Master User berhasil disimpan')
        ->with('message_type','success');
    }
    else{
      $pisah=explode('=',$action);
      $kolom=User::find($pisah[1]);
      $kolom->delete();
      return redirect('admin/master/user')
        ->with('message','Master User berhasil dihapus')
        ->with('message_type','success');
    }
  }

  //----------------------------------------------------------------------------------------------------//
  //---------------------------------------------MASTER MODUL-------------------------------------------//
  //----------------------------------------------------------------------------------------------------//

  //Ambil Modul per Parent
  public function getModul(){
    $data=Modul::get();
    foreach ($data as $key => $value) {
      $parent_modul=Modul::find($value->parent);
      if(!empty($parent_modul)){
        $data[$key]->parent_modul=$parent_modul->nama_modul;
      }
      else{
        $data[$key]->parent_modul='Tidak Mempunyai Sub Modul';
      }

    }
    return $data;
  }

  //Return View Modul
  public function modul(){
    $data=$this->getModul();
    $master=$this->getDataMaster();
    $modul=$this->getModulSidebar(0);
    return view('admin-page.data-master.modul')
      ->with('master',$master)
      ->with('modul',$modul)
      ->with('data',$data);
  }

  public function prosesModul(Request $request, $action='save'){
    if($action=='save'){
      if($request->id==0){
        $kolom=new Modul;
      }
      else{
        $kolom=Modul::find($request->id);
      }
      $kolom->nama_modul=$request->nama_modul;

      $kolom->jenis_data=$request->jenis_data;
      $kolom->parent=$request->parent;
      $kolom->icon=$request->icon;
      $kolom->save();
      return redirect('admin/master/modul')
        ->with('message','Master Modul berhasil disimpan')
        ->with('message_type','success');
    }
    else{
      $pisah=explode('=',$action);
      $kolom=Modul::find($pisah[1]);
      $kolom->delete();
      return redirect('admin/master/modul')
        ->with('message','Master Modul berhasil dihapus')
        ->with('message_type','success');
    }
  }

}
