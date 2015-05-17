@extends('app')
@if(Session::has('user'))
    @section('navbar')
    <li><a href="{{URL::route('home')}}"><i class="icon-dashboard"></i><span>Beranda</span> </a> </li>
    <li><a href="{{URL::route('form_permohonan')}}"><i class="icon-list-alt"></i><span>Ajukan Permohonan</span> </a> </li>
    <li><a href="{{URL::route('daftar_permohonan')}}"><i class="icon-list-ul"></i><span>Daftar Permohonan</span> </a></li>
    <li class="active"><a href="{{URL::route('daftar_izin')}}"><i class="icon-list-ul"></i><span>Daftar Izin</span> </a> </li>
@stop

    @section('content')
    <div class="span12">
      <div class="widget">
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Pembayaran Retribusi</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div class="widget big-stats-container">
            <div class="widget-content">
              <img src="{{asset('image/logo-pemkot-bandung.png')}}" height="100" width="100"></img>
              <h6 class="bigstats">Lampirkan Bukti Pembayaran Untuk Memperpanjang Kontrak</h6>
              {!! Form::open(['route' => 'updateBayarPerpanjangKontrak', 'role' => 'form', 'files' => 'true']) !!}
                    <div class="form-group">
                        {!! Form::label('bukti_pembayaran', 'Bukti Pembayaran (file harus berbentuk JPG):') !!}
                        <div class="input-group">
                            {!! Form::File('bukti_pembayaran', ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    @if ($errors->has('enroll')) <p class="help-block" style="color:red"> {{ $errors->first('enroll') }} </p> @endif
                    {!! Form::hidden('id', $perizinan->id) !!}
                    {!! Form::submit('Entri Bukti Pembayaran', ['class' => 'btn btn-success pull-right']) !!}
                {!! Form::close() !!}
            </div>
            <!-- /widget-content --> 
            
          </div>
        </div>
      </div>
      <!-- /widget --> 
    </div>
    <!-- /span12 -->
@else
    {{Redirect::route('home')}}
@endif
@endsection