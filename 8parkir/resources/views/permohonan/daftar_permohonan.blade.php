@extends('app')

@if(Session::has('user'))
@section('navbar')
    <li><a href="{{URL::route('home')}}"><i class="icon-dashboard"></i><span>Beranda</span> </a> </li>
    <li><a href="{{URL::route('form_permohonan')}}"><i class="icon-list-alt"></i><span>Ajukan Permohonan</span> </a> </li>
    <li class="active"><a href="{{URL::route('daftar_permohonan')}}"><i class="icon-list-ul"></i><span>Daftar Permohonan</span> </a></li>
    <li><a href="{{URL::route('daftar_izin')}}"><i class="icon-list-ul"></i><span>Daftar Izin</span> </a> </li>
@stop

    @section('content')
    <div class="span12">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
          <h3>Daftar Permohonan</h3>
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
                @foreach($permohonans as $permohonan)
                <tr>
                    <td>{{ $permohonan->lokasi_tanah  }}</td>
                    <td>{{ $permohonan->biaya_retribusi  }}</td>
                    <td>{{ $permohonan->tanggal_dibuat  }}</td>
                    <td>{{ $permohonan->tanggal_expired  }}</td>
                    <td>{{ $permohonan->status_permohonan  }}</td>
                    <td>
                        @if($permohonan->status_permohonan == "Menunggu Validasi")
                            {!! Form::open(['route' => 'editPermohonan']) !!}
                                {!! Form::hidden('id', $permohonan->id) !!}
                                <button class="btn-icon-only icon-edit"></button>
                                <a type="button" class="btn-icon-only icon-trash" href="#" onclick="deleteFunction({{ $permohonan->id }}); return false();"></a>
                            {!! Form::close() !!}
                        @elseif($permohonan->status_permohonan == "Menunggu Pembayaran Retribusi")
                            {!! Form::open(['route' => 'bayarRetribusi']) !!}
                                {!! Form::hidden('id', $permohonan->id) !!}
                                <button class="btn btn-sm btn-success">Bayar Retribusi</button>
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
        var url = '{{URL::route("delete_permohonan", [":id"])}}';
        if (confirm("Hapus Permohonan")){
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