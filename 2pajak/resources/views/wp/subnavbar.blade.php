<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">

        <li><a href="{{route("wp_home")}}"><i class='icon-home'></i><span>Home</span></a></li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class='icon-money'></i><span>Pajak</span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('pajak_search') }}">Daftar Pajak</a></li>
            <li><a href="{{ route('pembayaran') }}">Bayar Pajak</a></li>
            <li><a href="{{ route('pembayaran_bukti') }}">Bukti Pembayaran Pajak</a></li>
            <li><a href="{{ route('pajak_tambah')}}">Tambah jenis pajak</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="{{route("wp_permintaan_home")}}"><i class='icon-hand-up'></i><span>Pengajuan</span><b class="caret"></b></a>
        <!--li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class='icon-hand-up'></i><span>Pengajuan</span><b class="caret"></b></a>
          <!--ul class="dropdown-menu">
            <li><a href="#">Pengajuan Pengurangan Sanksi</a></li>
            <li><a href="#">Pengajuan Keberatan Pajak</a></li>
            <li><a href="#">Pengajuan Pencabutan</a></li>
          </ul-->
        </li>
        
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->