@extends('layouts.masterfront')

@section('content')
	<div class="col-md-12 mt">
      	<div class="content-panel">
              <table class="table   table-hover">
      	  	  <div class="row centered"><h4></i> Daftar Perizinan</h4></div>
      	  	  <hr>
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Izin</th>
                      <th>Penjelasan</th>
                      <th>Fromulir</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td>1</td>
                      <td>Izin Gangguan / HO</td>
                      <td><a href="detailperizinan/ho" type="button" class=" text-center btn-sm btn-info">Pelajari</a></td>
                      <td><a href="isiform/ho" type="button" class=" text-center btn-sm btn-primary">Isi Sekarang <i class="fa fa-angle-right"></i> </a></td>
                  </tr>

                  <tr>
                      <td>2</td>
                      <td>Izin Usaha Perdagangan / SIUP</td>
                      <td><a href="detailperizinan/siup" type="button" class=" text-center btn-sm btn-info">Pelajari</a></td>
                      <td><a href="isiform/siup" type="button" class=" text-center btn-sm btn-primary">Isi Sekarang <i class="fa fa-angle-right"></i> </a></td>
                  </tr>
                  <tr>
                      <td>3</td>
                      <td>Izin Usaha Industri / IUI</td>
                      <td><a href="detailperizinan/iui" type="button" class=" text-center btn-sm btn-info">Pelajari</a></td>
                      <td><a href="isiform/iui" type="button" class=" text-center btn-sm btn-primary">Isi Sekarang <i class="fa fa-angle-right"></i> </a></td>
                  </tr>
                  </tbody>
              </table>
      	  </div><! --/content-panel -->
      </div><!-- /col-md-12 -->
@endsection
