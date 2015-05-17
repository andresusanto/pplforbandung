@extends('app')

@if(Session::has('user'))
@section('navbar')
    <li><a href="{{URL::route('home')}}"><i class="icon-dashboard"></i><span>Beranda</span> </a> </li>
    <li><a href="{{URL::route('form_permohonan')}}"><i class="icon-list-alt"></i><span>Ajukan Permohonan</span> </a> </li>
    <li><a href="{{URL::route('daftar_permohonan')}}"><i class="icon-list-ul"></i><span>Daftar Permohonan</span> </a></li>
    <li class="active"><a href="{{URL::route('daftar_izin')}}"><i class="icon-list-ul"></i><span>Daftar Izin</span> </a> </li>
@stop
    @section('content')
    <div class="span12">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
          <h3>Daftar Perizinan</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th> Lokasi Tanah </th>
                <th> Biaya Retribusi</th>
                <th> Tanggal Mulai Kontrak</th>
                <th> Tanggal Akhir Kontrak</th>
                <th> Status</th>
                <th class="td-actions"> </th>
              </tr>
            </thead>
            <tbody>
                @foreach($perizinans as $perizinan)
                <tr>
                    <td>{{ $perizinan->lokasi_tanah  }}</td>
                    <td>{{ $perizinan->biaya_retribusi  }}</td>
                    <td>{{ $perizinan->tanggal_dibuat  }}</td>
                    <td>{{ $perizinan->tanggal_expired  }}</td>
                    <td>{{ $perizinan->status_perizinan  }}</td>
                    <td>
                        @if($perizinan->status_perizinan == "Aktif")
                            <button class="btn btn-sm btn-success" href="#" onclick="deleteFunction({{ $perizinan->id }}); return false();">Batalkan Kontrak</button>
                        @elseif($perizinan->status_perizinan == "Tidak Aktif")
                        {!! Form::open(['route' => 'perpanjangKontrak']) !!}
                                {!! Form::hidden('id', $perizinan->id) !!}
                                <button class="btn btn-sm btn-success">Perpanjang Kontrak</button>
                        {!! Form::close() !!}
                        @elseif($perizinan->status_perizinan == "Menunggu Pembayaran")
                        {!! Form::open(['route' => 'bayarPerpanjangKontrak']) !!}
                                {!! Form::hidden('id', $perizinan->id) !!}
                                <button class="btn btn-sm btn-success">Pembayaran Kontrak Baru</button>
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /widget-content --> 
      </div>
      <!-- /widget --> 
    </div>
    <!-- /span12 -->
    @stop
    @section('script')
    <script type="text/javascript">
        function deleteFunction(ID){
        var url = '{{URL::route("delete_perizinan", [":id"])}}';
        if (confirm("Batalkan Kontrak?")){
            url = url.replace(':id', ID);
            location.href= url;
        }
    }
    </script>
    @stop
@else
    {{Redirect::route('home')}}
@endif

@endsection