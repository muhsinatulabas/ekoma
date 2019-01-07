<div class="row  page_margin_top_section">
  <div class="column column_2_3">
    {!!$data['informasi']->deskripsi!!}
  </div>
  <div class="column column_1_3">
    <div class="frame-image-avatar" style="background-image:url('{{asset('')}}')"></div>
    <div style="color:#202020;float:left;margin-left:10px">
      <span style="font-size:20px;font-weight:bold">{{$data['informasi']->ketua}}</span><br>Ketua {{$data['informasi']->nama_cabang}}
    </div>
    <br></br>
    <h4 class="box_header page_margin_top_section">Informasi Kontak</h4>
    <ul class="page_margin_top">
			<li class="item_content clearfix">
				<span class="features_icon envelope animated_element animation-scale"></span>
				<div class="text">
					<h3>Alamat Sekretariat</h3>
					<p>{{$data['informasi']->alamat}}</p>
				</div>
			</li>
			<li class="item_content border_top clearfix">
				<span class="features_icon mobile animated_element animation-scale"></span>
				<div class="text">
					<h3>HP dan E-mail</h3>
					<p>Handphone: {{$data['informasi']->no_hp}}<br>E-mail:{{$data['informasi']->email}}</p>
				</div>
			</li>
		</ul>
    <h4 class="box_header page_margin_top_section">MWC NU</h4>
  </div>
</div>
