@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $message_title }}</div>

				<div class="panel-body">
					<font color="{{$message_color}}">{{$message_body}}</font><br/><br/><small>Harap tunggu beberapa detik sampai anda dialihkan ...</small>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
setTimeout(function(){
	window.location = '{{$message_redirect}}';
}, 3000);
</script>
@endsection
