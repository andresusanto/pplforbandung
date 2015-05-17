@extends('admin.app')

@section('sidebar')

<li class="mt">
  <a href="{{URL::route('admin/home')}}">
      <i class="fa fa-dashboard"></i>
      <span>Beranda</span>
  </a>
</li>

<li class="sub-menu">
  <a class="active" href="{{URL::route('admin/daftar_permohonan')}}" >
      <i class="fa fa-list"></i>
      <span>Daftar Permohonan</span>
  </a>
</li>

<li class="sub-menu">
  <a href="{{URL::route('admin/daftar_izin')}}" >
      <i class="fa fa-list"></i>
      <span>Daftar Perizinan</span>
  </a>
</li>
<li class="sub-menu">
  <a href="{{URL::route('admin/laporan')}}" >
      <i class="fa fa-book"></i>
      <span>Laporan</span>
  </a>
</li>

@stop

@section('content')
<div class="row mt">
  <div class="col-md-12">
      <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
              <h4><i class="fa fa-angle-right"></i> Daftar Permohonan</h4>
              <hr>
              <thead>
              <tr>
                  <th>ID pemohon</th>
                  <th>Lokasi Tanah</th>
                  <th>Biaya Retribusi</th>
                  <th>Tanggal Mulai Kontrak</th>
                  <th>Tanggal Berakhir Kontrak</th>
                  <th>Status</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach($permohonans as $permohonan)
                <tr>
                    <td>{{ $permohonan->id_pemohon  }}</td>
                    <td>{{ $permohonan->lokasi_tanah  }}</td>
                    <td>{{ $permohonan->biaya_retribusi  }}</td>
                    <td>{{ $permohonan->tanggal_dibuat  }}</td>
                    <td>{{ $permohonan->tanggal_expired  }}</td>
                    <td>{{ $permohonan->status_permohonan  }}</td>
                    <td>
                        {!! Form::open(['url' => 'admin/editPermohonan']) !!}
                            {!! Form::hidden('id', $permohonan->id) !!}
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>                        
                            <a class="btn btn-danger btn-xs" href="#" onclick="deleteFunction({{ $permohonan->id }}); return false();"><i class="fa fa-trash-o "></i></a>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach  
              </tbody>
          </table>
      </div><!-- /content-panel -->
  </div><!-- /col-md-12 -->
</div><!-- /row -->

@stop

@section('script')
<script type="text/javascript">
    function deleteFunction(ID){
        var url = '{{URL::route("admin/delete_permohonan", [":id"])}}';
        if (confirm("Hapus Permohonan?")){
            url = url.replace(':id', ID);
            location.href= url;
        }
    }
</script>

@endsection