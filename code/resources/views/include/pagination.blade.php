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
    <div class="col-sm-6">
        <ul class="pagination">
            <li class="page-item"><a @if($data['pageposition'] != 1) href="{{ url($pageurl.'/'.$search.'/1') }}" @endif class="page-link"><i class="fa fa-angle-double-left"></i></a></li>
            <li class="page-item"><a @if($data['pageposition'] != 1) href="{{ url($pageurl.'/'.$search.'/'.($data['pageposition']-1)) }}" @endif class="page-link"><i class="fa fa-angle-left"></i></a></li>

            @if($shortAwal == true)
                <li class="page-item"><a class="page-link">...</a></li>
            @endif
            @for($i=$awal; $i <= $akhir; $i++)
                <li class="page-item @if($data['pageposition']==$i) active @endif"><a href="{{ url($pageurl.'/'.$search.'/'.$i) }}" class="page-link">{{ $i }}</a></li>
            @endfor
            @if($shortAkhir == true)
                <li class="page-item"><a class="page-link">...</a></li>
            @endif

            <li class="page-item"><a @if($data['pageposition'] != $data['pagetotal']) href="{{ url($pageurl.'/'.$search.'/'.($data['pageposition']+1)) }}" @endif class="page-link"><i class="fa fa-angle-right"></i></a></li>
            <li class="page-item"><a @if($data['pageposition'] != $data['pagetotal']) href="{{ url($pageurl.'/'.$search.'/'.$data['pagetotal']) }}" @endif class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
    </div>
    <div class="col-sm-6 text-right">
        <p style="margin-bottom: 0;margin-top:5px;font-size:13px;letter-spacing: 0.5px; font-style: italic;color:#8c8c8c">Page {{ $data['pageposition'] }} of {{ $data['pagetotal'] }} from {{ $data['datatotal'] }} entries</p>
    </div>
</div>
