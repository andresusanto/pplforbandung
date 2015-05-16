@extends("layouts.masterfront")
@section('content')
	
	{!! Form::open(['url'=>"updateakun",'class'=>"form-login", 'method'=>'PATCH'])!!}
	  <h2 class="bold centered">Mengedit Akun</h2>
	  <br>
	  <div class="form-group col-sm-8">
	      <label class="col-sm-3 col-sm-3 control-label">Nama</label>
	      <div class="col-sm-9">
	          <input type="text" name='nama' value="{{$user->nama}}" class="form-control" required>
	      </div>
	  </div>
	  <div class="form-group col-sm-8">
	      <label class="col-sm-3 col-sm-3 control-label">Email</label>
	      <div class="col-sm-9">
	          <input type="text" name='email' value="{{$user->email}}" class="form-control" required>
	      </div>
	  </div>
	  <div class="form-group col-sm-8">
	      <label class="col-sm-3 col-sm-3 control-label">Password</label>
	      <div class="col-sm-9">
	          <input type="password" name="password" value="{{$user->password}}" class="form-control" required>
	      </div>
	  </div>
	 <div class="form-group col-sm-8">
	      <label class="col-sm-3 col-sm-3 control-label"></label>
	      <div class="col-sm-9">
	          <input type="hidden" name="nama_gambar" value="" class="form-control">
	      </div>
	  </div>
	  <p class="centered"><a href="home"><img src="{{asset('assets/img/user/empty.jpg') }}" class="" width="100"></a></p>
	
	  <div class="col-sm-1"></div><button class="btn  btn-success"  type="submit"></i> Upload Picture</button>
		<br><br>
		<div class="centered">
	 	 <button class="btn btn-theme btn-primary"  type="submit">Save</button>
	 	</div>
	{!!Form::close()!!}

@stop