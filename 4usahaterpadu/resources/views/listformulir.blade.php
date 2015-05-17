<?php
use App\User;
use App\Perizinan;
use App\FormulirHO;
use App\FormulirSIUP;
$i = 0;
?>

@extends("layouts.masterfront")

@section('content')
<div class="content-panel">
	<table class="table table-striped table-advance table-hover">
		<h4><i class="fa fa-angle-right"></i> Daftar Formulir yang Anda Ajukan</h4>
		<hr>
		<thead>
			<tr>
				<th> No.</th>
				<th class="hidden-phone"><i class="fa fa-question-circle"></i> Jenis Perizinan</th>
				<th  class="centered text-center"><i class=" fa fa-edit"></i> Status</th>
				<th class="text-center"></th>

				<th class="centered text-center">
					<?php if ((\Session::get('peran')==1) || (\Session::get('peran')==2)) {
						echo "Action";
					}else {
						?>Action</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					@foreach ($arrayFormulir as $formulir)
					<?php

					$jenis_izin = "error";
					switch ($formulir->jenis_izin) {
						case "ho":
						$jenis_izin = "Izin Gangguan (HO)";
						break;
						case "siup":
						$jenis_izin = "Izin Usaha Perdagangan (SIUP)";
						break;
						case "ilo":
						$jenis_izin = "Izin Lokasi (ILO)";
						break;
						case "imb":
						$jenis_izin = "Izin Mendirikan Bangunan (IMB)";
						break;
						case "iui":
						$jenis_izin = "Izin Usaha Industri (IUI)";
						break;
					}
					$i++;
					?>
					<tr>
						<td><a href="basic_table.html#">{{$i}}</a></td>
						<td class="hidden-phone">{{$jenis_izin}}</td>
						<td  class="centered text-center"><span data-toggle="modal"
							<?php if($formulir->status=='Dibatalkan'){ ?>
							class="btn btn-danger btn-xs"  data-target="#Dibatalkan"
							<?php }else if($formulir->status=='Terverifikasi'){  ?>
							class="btn btn-info btn-xs" data-target="#Terverifikasi"
							<?php }else if($formulir->status=='Tertunda'){  ?>
							class="btn btn-warning btn-xs" data-target="#Tertunda"
							<?php } else if($formulir->status=='Ditolak'){  ?>
							class="btn btn-danger btn-xs" data-target="#Ditolak"
							<?php } else if($formulir->status=='Disahkan'){  ?>
							class="btn btn-success btn-xs" data-target="#Disahkan"
							<?php } else if($formulir->status=='Disetujui (Belum Lengkap)'){ ?>
							class="btn btn-success btn-xs"  data-target="#DisetujuiBL"
							<?php } else if($formulir->status=='Disetujui (Sudah Lengkap)'){ ?>
							class="btn btn-success btn-xs"  data-target="#DisetujuiSL"
							<?php } ?>
							>{{$formulir->status}}</span></td>
							<td>
								<a href = "{{"detailformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}" class="btn btn-info btn-xs"><i class="fa fa-check">&nbsp;&nbsp;Detail</i></a>
							</td>
							<td class="pull-right">
								<?php if(\Session::get('peran')==3 && $formulir->status != 'Disahkan' && $formulir->status != 'Ditolak'){ ?>
								<?php if($formulir->status == 'Disetujui (Belum Lengkap)') {?>
								<a href = "{{"editformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}"  class="btn btn-success btn-xs"><i class="fa fa-upload">&nbsp;&nbsp;Lengkapi</i></a>&nbsp;&nbsp;
								<a href = "{{"editformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}"  class="btn btn-primary btn-xs"><i class="fa fa-pencil">&nbsp;&nbsp;Edit</i></a>&nbsp;&nbsp;
								<a href = "{{"uploaddokumenawal/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}"  class="btn btn-primary btn-xs"><i class="fa fa-pencil">&nbsp;&nbsp;Dokumen</i></a>&nbsp;&nbsp;
								<?php }else  if($formulir->status != 'Terverifikasi' && $formulir->status != 'Disetujui (Sudah Lengkap)' ){ ?>
								<a href = "{{"editformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}"  class="btn btn-primary btn-xs"><i class="fa fa-pencil">&nbsp;&nbsp;Edit</i></a>&nbsp;&nbsp;
								<a href = "{{"uploaddokumenawal/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}"  class="btn btn-primary btn-xs"><i class="fa fa-pencil">&nbsp;&nbsp;Dokumen</i></a>&nbsp;&nbsp;
								<?php } ?>
								<?php } else  if(\Session::get('peran')==2 && ($formulir->status!='Dibatalkan') && ($formulir->status!='Ditolak')) {?>
								<?php if($formulir->status == "Disetujui (Belum Lengkap)") {?>
								<a href = "{{"verifikasikelengkapanformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}"  class="btn btn-success btn-xs"><i class="fa fa-pencil">&nbsp;&nbsp;Verifikasi 2</i></a>&nbsp;&nbsp;
								<?php }else{ ?>
								<a href = "{{"verifikasiformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}"  class="btn btn-success btn-xs"><i class="fa fa-pencil">&nbsp;&nbsp;Verifikasi 1</i></a>&nbsp;&nbsp;
								<?php } ?>
								<?php } ?>
								<?php if(\Session::get('peran')==1){ ?>

								<?php if ($formulir->status!='Disahkan'){?>
								<?php if ($formulir->status!='Disetujui (Sudah Lengkap)'){?>
								<a href = "{{"menyetujuiformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}"  class="btn btn-success btn-xs"><i class="fa fa-pencil">&nbsp;&nbsp;Menerima</i></a>&nbsp;&nbsp;
								<?php }else{ ?>
								<a href = "{{"menerbitkanformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}"  class="btn btn-success btn-xs"><i class="fa fa-pencil">&nbsp;&nbsp;Mengesahkan</i></a>&nbsp;&nbsp;
								<?php } ?>
								<a  href = "{{"menolakformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}" class=" centered text-center btn btn-danger btn-xs"><i class="fa fa-trash-o ">&nbsp;&nbsp;Menolak</i></a>
								<?php } ?>
								<?php }else if(\Session::get('peran')==3){
									if ($formulir->status == 'Disahkan'){?>
									<a  href = "{{"menyembunyikanformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}" class=" centered text-center btn btn-danger btn-xs"><i class="fa fa-trash-o ">&nbsp;&nbsp;Sembunyikan</i></a>
									<?php }else if($formulir->status =='Ditolak' ||  $formulir->status =='Dibatalkan' ) {?>
									<a  href = "{{"deleteformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}" class=" centered text-center btn btn-danger btn-xs"><i class="fa fa-trash-o ">&nbsp;&nbsp;Menghapus</i></a>
									<?php } else if($formulir->status !='Ditolak' &&  $formulir->status !='Dibatalkan' &&  $formulir->status !='Terverifikasi'  &&  $formulir->status !='Disetujui (Sudah Lengkap)') { ?>
									<a  href = "{{"deleteformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}" class=" centered text-center btn btn-danger btn-xs"><i class="fa fa-trash-o ">&nbsp;&nbsp;Membatalkan</i></a>
									<?php } ?>
									<?php } else{?>
									<?php if($formulir->status =='Ditolak' ||  $formulir->status =='Dibatalkan' ) {?>
									<a  href = "{{"deleteformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}" class=" centered text-center btn btn-danger btn-xs"><i class="fa fa-trash-o ">&nbsp;&nbsp;Menghapus</i></a>
									<?php }else{ ?>
									<a  href = "{{"menolakformulir/".$formulir->jenis_izin."/"}}{{$formulir->id_izin}}" class=" centered text-center btn btn-danger btn-xs"><i class="fa fa-trash-o ">&nbsp;&nbsp;Menolak</i></a>
									<?php } ?>
									<?php } ?>
								</td>
							</tr>
							@endforeach

						</tbody>
					</table>

					<?php if(count($arrayFormulir)==0){ ?>

					<h4 class = "centered">Tidak ada formulir</h4>
					<?php } ?>
				</div><!-- /content-panel -->

				<!-- Modal -->
				<div class="modal fade" id="DisetujuiBL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Disetujui (Belum Lengkap)</h4>
							</div>
							<div class="modal-body">
								Permohonan izin Anda sudah disetujui oleh Walikota. Anda harus melengkapi dokumen lain sesuai persyaratan. Perhatikan deadline pengumpulan dokumen tersebut!
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
							</div>
						</div>
					</div>
				</div>


				<div class="modal fade" id="DisetujuiSL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Disetujui (Sudah Lengkap)</h4>
							</div>
							<div class="modal-body">
								Permohonan izin Anda sudah disetujui oleh Walikota dan dokumen Anda sudah dinyatakan lengkap oleh petugas BPPT. Izin Anda akan segera diterbitkan setelah dikonfirmasi oleh Walikota.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="Tertunda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Tertunda</h4>
							</div>
							<div class="modal-body">
								Permohonan izin Anda masih tertunda. Tim teknis BPPT akan memverifikasi formulir yang sudah Anda isi.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
							</div>
						</div>
					</div>
				</div>


				<div class="modal fade" id="Disahkan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Disahkan</h4>
							</div>
							<div class="modal-body">
								Selamat, permohonan izin Anda sudah diterbitkan!
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
							</div>
						</div>
					</div>
				</div>


				<div class="modal fade" id="Terverifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Terverifikasi</h4>
							</div>
							<div class="modal-body">
								Formulir izin yang Anda isi sudah diverifikasi oleh tim teknis BPPT. Walikota akan mempelajari izin Anda lebih lanjut.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="Ditolak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Ditolak</h4>
							</div>
							<div class="modal-body">
								Maaf izin Anda ditolak.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="Dibatalkan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Dibatalkan</h4>
							</div>
							<div class="modal-body">
								Maaf izin ini telah dibatalkan. Silahkan dihapus jika tidak ada data yang penting.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
							</div>
						</div>
					</div>
				</div>













				@stop
