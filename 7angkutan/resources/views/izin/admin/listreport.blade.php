@extends('layouts.admin')
@section('content')
<div class='row'>
	<div>
			<div class="panel panel-primary">
			  <div class="panel-heading"><h7>Laporan</h7></div>
			  	<table class='table table-hover' style='font-size:12px;'>

                    <?php $now = new DateTime();
                    $currentMonth = (int)$now->format('m');
                    $monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September"
                        ,"Oktober","November","Desember"];?>

                    @for ($i = 1; $i < $currentMonth; $i++)
                        <tr>
                            <td> <a href= {{route('izin.admin.report',['month'=>$i])}}>Laporan Bulan {{$monthName[$i-1]}}</a></td>
                        </tr>
                    @endfor
				</table>
			</div>

		</div>
</div>
@endsection