<?php
use App\User;
use App\Perizinan;
use App\FormulirHO;
use App\FormulirSIUP;
$i = 0;
?>

@extends("layouts.masterfront")
<?php
    $jenis_izin_title = "error";
    switch ($str) {
      case "semua":
      $jenis_izin_title = "Izin";
      break;
      case "ho":
      $jenis_izin_title = "Izin Gangguan (HO)";
      break;
      case "siup":
      $jenis_izin_title = "Izin Usaha Perdagangan (SIUP)";
      break;
      case "ilo":
      $jenis_izin_title = "Izin Lokasi (ILO)";
      break;
      case "imb":
      $jenis_izin_title = "Izin Mendirikan Bangunan (IMB)";
      break;
      case "iui":
      $jenis_izin_title = "Izin Usaha Industri (IUI)";
      break;
    }
    ?>
@section('content')
<div class="content-panel">
	<table class="table table-striped table-advance table-hover">
		<h4><i class="fa fa-angle-right"></i> Daftar {{$jenis_izin_title}} yang Diterbitkan</h4>
		<hr>
		<thead>
			<tr>
				<th> No.</th>
				<th class="hidden-phone"><i class="fa fa-question-circle"></i> Jenis Perizinan</th>
				<th><i class=" fa fa-edit"></i> Nama Akun Pemohon</th>
				<th class"centered pull-right text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Terbit</th>

					<th class"centered text-center">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Detail Perizinan</th>

				</tr>
			</thead>
			<tbody>
				@foreach ($arrayFormulir as $formulir)
				<?php
				$user = User::find($formulir->id_pemohon);
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
					<td><span >{{$user->nama}}</span></td>
					<td>
						{{$formulir->updated_at}}
					</td>
					<td>
						<?php
							$detailUrl = "detailformulir/".$formulir->jenis_izin."/".$formulir->id_izin;
						 ?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = {{URL::to($detailUrl)}}  class="btn btn-info btn-xs"><i class="fa fa-check">&nbsp;&nbsp;Detail</i></a>

					</td>
				</tr>
				@endforeach

			</tbody>
		</table>

		<?php if(count($arrayFormulir)==0){ ?>

					<h4 class = "centered">Belum ada izin yang diterbitkan</h4>
				<?php } ?>
	</div><!-- /content-panel -->
	@stop
