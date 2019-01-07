@php
    if($data['pagetotal'] <= 10){
        $awal = 1;
        $akhir = $data['pagetotal'];

        $shortAwal = false;
        $shortAkhir = false;
    }else{
        if(($data['pageposition']+5) >= $data['pagetotal']){
            $awal = $data['pagetotal']-7;
            $akhir = $data['pagetotal'];
            $shortAwal = true;
            $shortAkhir = false;
        }elseif($data['pageposition'] > 7){
            $awal = $data['pageposition']-4;
            $akhir = $data['pageposition']+4;
            $shortAwal = true;
            $shortAkhir = true;
        }else{
            $awal = 1;
            $akhir = 10;
            $shortAwal = false;
            $shortAkhir = true;
        }
    }
@endphp

<div class="row">
  <ul class="pagination clearfix page_margin_top_section">
    <li class="left"><a @if($data['pageposition'] != 1) href="{{ url($pageurl.'/'.$search.'/1') }}" @endif>&nbsp;</a></li>
    {{-- <li class="page-item"><a @if($data['pageposition'] != 1) href="{{ url($pageurl.'/'.$search.'/'.($data['pageposition']-1)) }}" @endif class="page-link"><i class="fa fa-angle-left"></i></a></li> --}}
    @if($shortAwal == true)
        <li><a class="page-link">...</a></li>
    @endif
    @for($i=$awal; $i <= $akhir; $i++)
        <li class="@if($data['pageposition']==$i) selected @endif"><a href="{{ url($pageurl.'/'.$search.'/'.$i) }}" class="page-link">{{ $i }}</a></li>
    @endfor
    @if($shortAkhir == true)
        <li><a class="page-link">...</a></li>
    @endif
    {{-- <li><a @if($data['pageposition'] != $data['pagetotal']) href="{{ url($pageurl.'/'.$search.'/'.($data['pageposition']+1)) }}" @endif class="page-link"><i class="fa fa-angle-right"></i></a></li> --}}
    <li class="right"><a @if($data['pageposition'] != $data['pagetotal']) href="{{ url($pageurl.'/'.$search.'/'.$data['pagetotal']) }}" @endif class="page-link">&nbsp;</a></li>
  </ul>
</div>
