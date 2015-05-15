@extends('layouts.admin')
@section('content')

<!-- Form Edit -->
<div class='row'>
	<div class ='col-xs-6'>
	  	<div class='form-header'>Update Izin</div>
        <form action='{{route('izin.admin.update.submit',['id'=>$izin->id])}}' method='post'>

        	<div>
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		</div>

        	<div class='form-group'>
        		<label>Status</label>
        		<select name='status' class='form-control' value={{$currentStatus}}>
        			@foreach ($listStatus as $status)
        				<option value='{{$status->id}}'>{{$status->nama}}</option>
        			@endforeach
        		</select>
        	</div>

        	<div class='form-group'>
        		<label>Deskripsi</label>
        		<textarea name='deskripsi' type='text'class='form-control'>{{$izin->deskripsi}}</textarea>
        	</div>

                <div class='form-group'>
                        <label>Biaya (Rp)</label>
                        <input name='biaya' type='number'class='form-control' value={{$izin->biaya}} min=0></input>
                </div>
        	<button type='submit' class='btn btn-primary'>Ubah</button>
        </form>
	</div>
</div><!-- end Form Edit -->

@endsection