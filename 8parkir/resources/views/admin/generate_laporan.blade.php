@extends('admin.app')

@section('sidebar')

<li class="mt">
  <a href="{{URL::route('admin/home')}}">
      <i class="fa fa-dashboard"></i>
      <span>Beranda</span>
  </a>
</li>

<li class="sub-menu">
  <a href="{{URL::route('admin/daftar_permohonan')}}" >
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
<li class="active" class="sub-menu">
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
              <h4><i class="fa fa-angle-right"></i> Detail Permohonan</h4>
              <hr>
              <thead>
              <tr>
                  <th>ID pemohon</th>
                  <th>Lokasi Tanah</th>
                  <th>Biaya Retribusi</th>
                  <th>Tanggal Mulai Kontrak</th>
                  <th>Tanggal Berakhir Kontrak</th>
                  <th>Status</th>
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
                </tr>
                @endforeach  
              </tbody>
          </table>
        </div>
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
              <h4><i class="fa fa-angle-right"></i> Detail Perizinan</h4>
              <hr>
              <thead>
              <tr>
                  <th>ID pemohon</th>
                  <th>Lokasi Tanah</th>
                  <th>Biaya Retribusi</th>
                  <th>Tanggal Mulai Kontrak</th>
                  <th>Tanggal Berakhir Kontrak</th>
                  <th>Status</th>
              </tr>
              </thead>
              <tbody>
                @foreach($perizinans as $perizinan)
                <tr>
                    <td>{{ $perizinan->id_pemohon  }}</td>
                    <td>{{ $perizinan->lokasi_tanah  }}</td>
                    <td>{{ $perizinan->biaya_retribusi  }}</td>
                    <td>{{ $perizinan->tanggal_dibuat  }}</td>
                    <td>{{ $perizinan->tanggal_expired  }}</td>
                    <td>{{ $perizinan->status_perizinan  }}</td>
                </tr>
                @endforeach  
              </tbody>
          </table>
        </div>
        <section class="task-panel tasks-widget">
            <div class="panel-heading">
                <div class="pull-left"><h5><i class="fa fa-tasks"></i> Detail Laporan</h5></div>
                <br>
            </div>
              <div class="panel-body">
                  <div class="task-content">

                      <ul class="task-list">
                          <li>
                              <div class="task-title">
                                  <span class="task-title-sp">Jumlah Permohonan Berjenis Organisasi</span>
                                  <span class="badge bg-theme">{{$sjpemohon}}</span>
                              </div>
                          </li>
                          <li>
                              <div class="task-title">
                                  <span class="task-title-sp">Jumlah Permohonan Berjenis Perorangan</span>
                                  <span class="badge bg-theme">{{count($permohonans) - $sjpemohon}}</span>
                              </div>
                          </li>
                          <li>
                              <div class="task-title">
                                  <span class="task-title-sp">Jumlah Permohonan Berjenis Parkir</span>
                                  <span class="badge bg-theme">{{$sjpermohonan}}</span>
                              </div>
                          </li>
                          <li>
                              <div class="task-title">
                                  <span class="task-title-sp">Jumlah Permohonan Berjenis Terminal</span>
                                  <span class="badge bg-theme">{{count($permohonans) - $sjpermohonan}}</span>
                              </div>
                          </li>
                          <li>
                              <div class="task-title">
                                  <span class="task-title-sp">Jumlah Permohonan</span>
                                  <span class="badge bg-theme">{{count($permohonans)}}</span>
                              </div>
                          </li>                                      
                      </ul>
                      <br>
                      <ul class="task-list">
                          <li>
                              <div class="task-title">
                                  <span class="task-title-sp">Jumlah Perizinan Berjenis Organisasi</span>
                                  <span class="badge bg-theme">{{$pjpemohon}}</span>
                              </div>
                          </li>
                          <li>
                              <div class="task-title">
                                  <span class="task-title-sp">Jumlah Perizinan Berjenis Perorangan</span>
                                  <span class="badge bg-theme">{{count($perizinans) - $pjpemohon}}</span>
                              </div>
                          </li>
                          <li>
                              <div class="task-title">
                                  <span class="task-title-sp">Jumlah Perizinan Berjenis Parkir</span>
                                  <span class="badge bg-theme">{{$pjpermohonan}}</span>
                              </div>
                          </li>
                          <li>
                              <div class="task-title">
                                  <span class="task-title-sp">Jumlah Perizinan Berjenis Terminal</span>
                                  <span class="badge bg-theme">{{count($perizinans) - $pjpermohonan}}</span>
                              </div>
                          </li>
                          <li>
                              <div class="task-title">
                                  <span class="task-title-sp">Jumlah Perizinan</span>
                                  <span class="badge bg-theme">{{count($perizinans)}}</span>
                              </div>
                          </li>                                      
                      </ul>
                  </div>

                  <div class=" add-task-row">
                    {!! Form::open(['route' => 'admin/generatePDF', 'role' => 'form']) !!}
                        {!! Form::hidden('tanggal_awal', $tanggal_awal) !!}
                        {!! Form::hidden('tanggal_akhir', $tanggal_akhir) !!}
                        {!! Form::hidden('sjpemohon', $sjpemohon) !!}
                        {!! Form::hidden('sjpermohonan', $sjpermohonan) !!}
                        {!! Form::hidden('pjpemohon', $pjpemohon) !!}
                        {!! Form::hidden('pjpermohonan', $pjpermohonan) !!}
                        {!! Form::submit('Generate PDF', ['class' => 'btn btn-success pull-left']) !!}
                    {!! Form::close() !!}
                  </div>
              </div>
          </section>
  </div><!-- /col-md-12 -->
  <!--CUSTOM CHART START -->
  <div class="border-head">
      <h3>Chart Laporan</h3>
  </div>
  <div class="custom-bar-chart">
      <ul class="y-axis">
          <li><span>100</span></li>
          <li><span>80</span></li>
          <li><span>60</span></li>
          <li><span>40</span></li>
          <li><span>20</span></li>
          <li><span>0</span></li>
      </ul>
      <div class="bar">
          <div class="title">Jumlah Permohonan</div>
          <div class="value tooltips" data-original-title="{{count($permohonans)}}" data-toggle="tooltip" data-placement="top"><?php $x = count($permohonans)/100*100; echo $x; ?>%</div>
      </div>
      <div class="bar ">
          <div class="title">Jumlah Perizinan</div>
          <div class="value tooltips" data-original-title="{{count($perizinans)}}" data-toggle="tooltip" data-placement="top"><?php $x = count($perizinans)/100*100; echo $x; ?>%</div>
      </div>
      <div class="bar ">
          <div class="title">Jumlah Permohonan Parkir</div>
          <div class="value tooltips" data-original-title="{{$sjpermohonan}}" data-toggle="tooltip" data-placement="top"><?php $x = $sjpermohonan/100*100; echo $x; ?>%</div>
      </div>
      <div class="bar ">
          <div class="title">Jumlah Permohonan Terminal</div>
          <div class="value tooltips" data-original-title="{{count($permohonans) - $sjpermohonan}}" data-toggle="tooltip" data-placement="top"><?php $x = (count($permohonans) - $sjpermohonan)/100*100; echo $x; ?>%</div>
      </div>
      <div class="bar">
          <div class="title">Jumlah Perizinan Parkir</div>
          <div class="value tooltips" data-original-title="{{$pjpermohonan}}" data-toggle="tooltip" data-placement="top"><?php $x = $pjpermohonan/100*100; echo $x; ?>%</div>
      </div>
      <div class="bar ">
          <div class="title">Jumlah Perizinan Terminal</div>
          <div class="value tooltips" data-original-title="{{count($perizinans) - $pjpermohonan}}" data-toggle="tooltip" data-placement="top"><?php $x = (count($perizinans) - $pjpermohonan)/100*100; echo $x; ?>%</div>
      </div>
  </div>
  <!--custom chart end-->
</div><!-- /row -->

@endsection