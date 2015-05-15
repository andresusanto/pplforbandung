<?php use App\Models\Dokumen ?>
@extends('layouts.admin')
@section('content')
<div class ='row'>
	<h3 style='margin-top:5px;'>Detail Izin: {{$izin->jenisIzin->nama}}</h3>
</div>

@if ($izin->spam)
        <div class='alert alert-danger'>Dokumen ini ditandai <i>spam</i> oleh admin. Silakan hubungi admin untuk keterangan lebih lanjut</div>
    @endif

<!-- Pemohon -->
<div class ='row'>
	<div class='col-md-12'>
        <div class='col-md-2'>Nama</div><div class='col-md-10'>{{$izin->pengguna->nama}}</div>
        <div class='col-md-2'>No KTP</div><div class='col-md-10'>{{$izin->pengguna->no_ktp}}</div>
        <div class='col-md-2'>Alamat</div><div class='col-md-10'>{{$izin->pengguna->alamat}}</div>
        <div class='col-md-2'>Nama Perusahaan</div><div class='col-md-10'>{{$izin->nama_perusahaan}}</div>
        <div class='col-md-2'>Alamat Perusahaan</div><div class='col-md-10'>{{$izin->alamat_perusahaan}}</div>
        <div class='col-md-2'>Alamat Garasi</div><div class='col-md-10'>{{$izin->alamat_garasi}}</div>
        <div class='col-md-2'>No NPWP</div><div class='col-md-10'>{{$izin->npwp}}</div>
    </div>
    <div class='clearfix'></div>
</div><!-- end of Pemohon -->

<!-- Keterangan -->
    <div class ='row' style='margin-top:10px;'>
        <div>
            <b>Berlaku hingga</b><br/>
            <p>
             @if ($izin->tanggal_perpanjangan != null)
                {{$izin->tanggal_perpanjangan}}
            @else
                Izin belum diterima, atau masa berlaku belum ditentukan
            @endif
            </p>

            <b>Status</b><br/>
                <p>{{$izin->getCurrentNamaStatus()}}</p>

            <b>Keterangan</b><br/>
                @if ($izin->deskripsi == '')
                    <p>---</p>
                @else
                    <p>{{$izin->deskripsi}}</p>
                @endif

            <b>Biaya</b><br/>
            <p>
                @if ($izin->biaya == '')
                    <p>Akan diberitahukan kemudian</p>
                @else
                    <p><span class='currency'>{{$izin->biaya}}</span></p>
                @endif
            </p>
        </div>
    </div><!-- end of Keterangan -->

<!-- Tabel Dokumen -->
<div class='row'>
	<div class ='col-xs-12'>
		<div class="panel panel-primary">
		  <div class="panel-heading"><h7>Dokumen yang harus dipenuhi</h7></div>
		  	<table class='table table-hover' style='font-size:12px;'>
				<tr>
					<th>No. </th>
					<th>Nama </th>
					<th>Status </th>
					<th style="text-align:center;">Operasi </th>
				</tr>
                <?php $i = 0; ?>
                @foreach ($izin->dokumens as $dokumen)
                <tr>
                    <td>{{++$i}}</td>
                    <td>
                        {{$dokumen->nama}}<br/>
                        @if ($dokumen->template->butuh_upload)
                            @if ($dokumen->url == null)
                            Belum upload file
                            @else
                            <a href="{{asset($dokumen->url)}}">Lihat hasil upload</a> 
                            @endif
                            
                            |

                            @if ($dokumen->template->url != '')
                            <a href="{{asset($dokumen->template->url)}}">Download template</a>
                            @else
                            Template tidak tersedia
                            @endif
                        @else
                            <a href='#'>Lihat data</a>
                        @endif
                        
                        
                    </td>
                    <td>
                    	@if($dokumen->status == DOKUMEN::STATUS_BELUM)
                    		<span class = 'label label-default'>Belum Diupload</span>
                    	@elseif($dokumen->status == DOKUMEN::STATUS_PENDING)
                    		<span class = 'label label-primary'>Sedang Diperiksa</span>
                    	@elseif($dokumen->status == DOKUMEN::STATUS_OK)
                    		<span class = 'label label-success'>Sudah diterima</span>
                    	@elseif($dokumen->status == DOKUMEN::STATUS_BERMASALAH)
                    		<span class = 'label label-warning'>Bermasalah</span>
                    	@elseif($dokumen->status == Dokumen::STATUS_BUTUH_PERPANJANGAN)
                                <span class='label label-warning'>Butuh Perpanjangan</span>
                        @endif
                    </td>
                    <!-- end of status Dokumen -->

                    <!--tombol Download, setujui dan tidak setujui -->
                    @if($dokumen->status == Dokumen::STATUS_BELUM)
                    	<td><a href = {{route('izin.admin.dokumen.agree',['id'=>$izin->id,'dokumen_id'=>$dokumen->id])}} class = 'btn btn-success btn-sm' disabled>Setujui</a>
                    	<a href = {{route('izin.admin.dokumen.disagree',['id'=>$izin->id,'dokumen_id'=>$dokumen->id])}} class = 'btn btn-warning btn-sm' disabled>Tidak setujui</a></td>
                    @else
                    	<td><a href = {{route('izin.admin.dokumen.agree',['id'=>$izin->id,'dokumen_id'=>$dokumen->id])}} class = 'btn btn-success btn-sm'>Setujui</a>
                    	<a href = {{route('izin.admin.dokumen.disagree',['id'=>$izin->id,'dokumen_id'=>$dokumen->id])}} class = 'btn btn-warning btn-sm'>Tidak setujui</a></td>
                    @endif
                    <!-- end of tombol Download, setujui dan tidak setujui-->

                </tr>
                @endforeach
			</table>
		</div>
	</div>
<div><!-- end Tabel Dokumen -->

<div class='row'>
	<a href={{route('izin.admin.update',['id'=>$izin->id])}} class="btn btn-primary">Ubah Status</a>
</div>

<br>
@endsection

@section('scripts')
@parent
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.currency').formatCurrency({region: 'id-ID'});
    });
</script>
@endsection
