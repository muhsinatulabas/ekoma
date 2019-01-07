<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\MultiplePost;
use App\Modul;
use App\PCLPNU;
use App\KategoriPosting;
use App\Quote;
use DB;

class DashboardController extends Controller
{
    //Get Data Posting
    public function getPost($modul,$kategori,$headline,$limit,$offset){
      $data=MultiplePost::select('multiple_post.*','m_modul.nama_modul')
            ->join('m_user','m_user.id','multiple_post.fid_user')
            ->join('m_modul','m_modul.id','multiple_post.fid_modul')
            ->leftJoin('pc_lpnu','pc_lpnu.id','multiple_post.fid_pc_lpnu');
      if($modul!='all'){
        $data=$data->where('multiple_post.fid_modul','=',$modul);
      }
      if($kategori!='all'){
        $data=$data->join('kategori_post','kategori_post.fid_posting','multiple_post.id')
          ->where('kategori_post.fid_kategori','=',$kategori);
      }
      if($headline=='1'){
        $data=$data->where('multiple_post.headline','=','1');
      }
      $data=$data->limit($limit)->get();

      return $data;
    }

    public function index(){
      $data['headline-post']=$this->getPost('all','all',1,5,0);
      $data['berita-post-single']=$this->getPost(1,'all','all',1,0);
      $data['berita-post']=$this->getPost(1,'all','all',4,0);
      $data['agenda-post-single']=$this->getPost(2,'all','all',1,0);
      $data['agenda-post']=$this->getPost(2,'all','all',4,0);
      $data['pesantren-post']=$this->getPost('all',1,'all',5,0);
      $data['koperasi-post']=$this->getPost('all',2,'all',5,0);
      $data['quote']=Quote::where('tampil','=','1')->limit('5')->get();
      return view('website.dashboard')->with('data',$data);
    }
}
