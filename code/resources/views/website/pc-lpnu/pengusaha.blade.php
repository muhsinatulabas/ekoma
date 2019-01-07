<div class="row page_margin_top_section">
  @foreach ($data['data'] as $key => $value)
    <div class="column column_1_4">
      <a href="">
  			<div class="frame-image-avatar2" style="background-image:url('{{asset('storage/'.$value->foto)}}');"></div>
  		</a>
      <div style="text-align:center">
        <h4 style="margin-top:10px"><a href="">{{$value->nama_lengkap}}</a></h4>
        <span style="color:#347630">{{$value->deskripsi}}</span>
      </div>
    </div>
  @endforeach
</div>
