<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\PCLPNU;
use App\UnitUsaha;
use App\Pengusaha;
use DB;

class PengusahaController extends Controller
{
    //Cari Data Pengusaha
    public function searchPengusaha(Request $request){
      if($request->input('search') != ''){
          $restrict = array('/');
          $keyword = str_replace($restrict,"",$request->input('search'));
          $search = 'search='.$keyword;
          return redirect($request->url.'/all/all/'.$search);
      }
      else{
          return redirect($request->url);
      }
    }

    //Ambil Data Pengusaha
    public function getPengusaha($pc_lpnu,$level,$search,$page){
      DB::statement("set sql_mode=''");
      DB::statement("set global sql_mode=''");
      $perpage = 12;
      $query=Pengusaha::select('pengusaha_nu.*','pc_lpnu.nama_cabang','m_level_pengusaha.level_pengusaha','m_level_pengusaha.color')
        ->leftJoin('m_level_pengusaha','m_level_pengusaha.id','pengusaha_nu.fid_level_pengusaha')
        ->leftJoin('pc_lpnu','pc_lpnu.id','pengusaha_nu.fid_pc_lpnu');

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

    //Form Data Pengusaha - Tambah dan Edit
    public function form($action='tambah',$id='all'){
      $master_controller=new MasterController;
      $modul=$master_controller->getModulSidebar(0);
      $master=$master_controller->getDataMaster();
      $data=Pengusaha::find($id);
      return view('admin-page.pengusaha.form')
        ->with('master',$master)
        ->with('action',$action)
        ->with('id',$id)
        ->with('modul',$modul)
        ->with('data',$data);
    }

    //Return Data Pengusaha di Halaman Admin
    public function admin($pc_lpnu='all',$level='all',$search='all',$page=1){
      $master_controller=new MasterController;
      $modul=$master_controller->getModulSidebar(0);
      $data=$this->getPengusaha($pc_lpnu,$level,$search,$page);
      return view('admin-page.pengusaha.index')
        ->with('search',$search)
        ->with('pc_lpnu',$pc_lpnu)
        ->with('level',$level)
        ->with('modul',$modul)
        ->with('data',$data);
    }

    //Return Data Pengusaha di Halaman Website
    public function index($pc_lpnu='all',$level='all',$search='all',$page=1){
      $data=$this->getPengusaha($pc_lpnu,$level,$search,$page);
      return view('website.pengusaha.index')
        ->with('search',$search)
        ->with('pc_lpnu',$pc_lpnu)
        ->with('level',$level)
        ->with('data',$data);
    }

    public function deletePerusahaan($id){
      $peerusahaan=UnitUsaha::where('fid_pengusaha','=',$id)->get();
      foreach ($peerusahaan as $key => $value) {
        $data=UnitUsaha::find($value->id);
        if(!empty($data->foto)){
          unlink(storage_path('app/'.$data->foto));
        }
        $data->delete();
      }
    }

    //Proses Data Pengusaha
    public function prosesPengusaha(Request $request,$action,$id){
      if($id=='all'){
        $kolom=new Pengusaha;
      }
      else{
        $kolom=Pengusaha::find($id);
      }
      $kolom->nama_lengkap=$request->nama_lengkap;
      $kolom->deskripsi=$request->deskripsi;
      $kolom->title=$request->title;
      $kolom->fid_level_pengusaha=$request->level_pengusaha;
      $kolom->fid_pc_lpnu=$request->pc_lpnu;
      $kolom->email=$request->email;
      $kolom->no_hp=$request->hp;
      $kolom->alamat=$request->alamat;
      $kolom->nik=$request->nik;
      if($request->hasFile('foto')){
        if(!empty($kolom->foto)){
          unlink(storage_path('app/'.$kolom->file));
        }
        $uploadedFile = $request->file('foto');
        $path = $uploadedFile->store('profil-pengusaha');
        $kolom->foto=$path;
      }
      if($action=='delete'){
        $this->deletePerusahaan($id);
        $kolom->delete();
        return redirect('admin/pengusaha/list')
          ->with('message','Data Pengusaha NU berhasil dihapus')
          ->with('message_type','success');
      }
      else{
        $kolom->save();
        return redirect('admin/pengusaha/list')
          ->with('message','Data Pengusaha NU berhasil disimpan')
          ->with('message_type','success');
      }
    }


    public function getDetil($id){
      $data['pengusaha']=Pengusaha::select('pengusaha_nu.*','pc_lpnu.nama_cabang','m_level_pengusaha.level_pengusaha','m_level_pengusaha.color')
        ->leftJoin('m_level_pengusaha','m_level_pengusaha.id','pengusaha_nu.fid_level_pengusaha')
        ->leftJoin('pc_lpnu','pc_lpnu.id','pengusaha_nu.fid_pc_lpnu')
        ->find($id);
      $data['perusahaan']=UnitUsaha::where('fid_pengusaha','=',$id)->get();
      return $data;
    }

    //Detil Data Pengusaha pada Halaman Admin
    public function detilAdmin($id){
      $master_controller=new MasterController;
      $modul=$master_controller->getModulSidebar(0);
      $data=$this->getDetil($id);
      return view('admin-page.pengusaha.detil')
        ->with('modul',$modul)
        ->with('id',$id)
        ->with('data',$data);
    }

    //Detil Data Pengusaha pada Halaman Website
    public function detilWebsite($id){
      $data=$this->getDetil($id);
      // return $data['perusahaan'];
      return view('website.pengusaha.detil')
        ->with('id',$id)
        ->with('data',$data);
    }

    public function prosesUnitUsaha(Request $request,$id,$action='save'){
      if($action=='save'){
        if($request->id==0){
          $kolom=new UnitUsaha;
        }
        else{
          $kolom=UnitUsaha::find($request->id);
        }
        $kolom->nama_perusahaan=$request->nama_perusahaan;
        $kolom->badan_hukum=$request->badan_hukum;
        $kolom->deskripsi=$request->deskripsi;
        $kolom->fid_pengusaha=$id;
        if($request->hasFile('logo')){
          if(!empty($kolom->logo_perusahaan)){
            unlink(storage_path('app/'.$kolom->logo_perusahaan));
          }
          $uploadedFile = $request->file('logo');
          $path = $uploadedFile->store('logo-perusahaan');
          $kolom->logo_perusahaan=$path;
        }
        $kolom->save();
        return redirect('admin/pengusaha/detil/'.$id)
          ->with('message','Data Perusahaan / Unit Usaha berhasil disimpan')
          ->with('message_type','success');
      }
      else{
        $pisah=explode('=',$action);
        $kolom=UnitUsaha::find($pisah[1]);
        if(!empty($kolom->foto)){
          unlink(storage_path('app/'.$kolom->foto));
        }
        $kolom->delete();
        return redirect('admin/pengusaha/detil/'.$id)
          ->with('message','Data Perusahaan / Unit Usaha berhasil dihapus')
          ->with('message_type','success');
      }
    }
}
