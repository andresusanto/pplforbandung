@extends("layouts.masterfront")
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading inline text-center" ><h3>Upload Dokumen untuk Persyaratan Izin Usaha Industri (IUI)</h3></div>

	<div class="panel-body">
		<div class="col-md-2">	</div>

		<div class="col-md-8">
			<?php
				$urlUpload ="uploaddokumenawal/".$str."/".$id;
			?>
			<br>
			{!! Form::open(array('url'=>$urlUpload,'method'=>'PATCH', 'visibility'=> 'hidden' ,'files'=>true, 'class'=>'form-horizontal')) !!}
			<div class="row form-group">
				<label class="col-md-4 control-label">DokumenA :</label>
				<div class="col-md-8">



			          {!! Form::file('image', ['class'=>'form-control']) !!}
					  <p class="errors">{{$errors->first('image')}}</p>
					@if(Session::has('error'))
					<p class="errors">{{ Session::get('error') }}</p>
					@endif
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">DokumenB :</label>
				<div class="col-md-8">

			          {!! Form::file('image',['class'=>'form-control']) !!}
					  <p class="errors">{{$errors->first('image')}}</p>
					@if(Session::has('error'))
					<p class="errors">{{ Session::get('error') }}</p>
					@endif
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">DokumenC :</label>
				<div class="col-md-8">

			          {!! Form::file('image',['class'=>'form-control']) !!}
					  <p class="errors">{{$errors->first('image')}}</p>
					@if(Session::has('error'))
					<p class="errors">{{ Session::get('error') }}</p>
					@endif
				</div>
			</div>
			<div class="row form-group">

				<div class="row pull-center col-sm-9">


				</div>


				<div class="col-md-12 text-center">
					{!! Form::submit('Upload', array('class'=>'send-btn ','class'=>'btn-success btn' , 'class'=>'btn get')) !!}

				</div>
			</div>
			{!! Form::close() !!}
		</div>
		<div class="span3">	</div>
	</div>
</div>
@stop
