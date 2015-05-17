@extends('wp.layout_user')
@section('title')Tambah Jenis Pajak @stop
@section('content')
<div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-money"></i>
              <h3> Tambah Jenis Pajak</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <form method="post" name="tambah" action="{{Request::url()}}/submit">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="form-group">
                    <label for="npwpd">NPWPD</label> <input type="text" placeholder="NPWPD" name="npwpd" value={{$npwpd}} readonly><br>
                   </div>
                   <div class="form-group">
                    <label for="aset">Aset Kepemilikan</label><input type="text" placeholder="Aset" name="aset"><br>
                   </div>
                   <div class="form-group">
                   <label for="kategori">Kategori</label> <select name="kategori" size="1">
                           <option value="Pajak Penghasilan">Pajak Penghasilan</option>
                           <option value="Pajak Restoran">Pajak Restoran</option>
                           <option value="Pajak Hiburan">Pajak Hiburan</option>
                           <option value="Pajak Hotel">Pajak Hotel</option>
                           <option value="Pajak Bumi Bangunan">Pajak Bumi Bangunan</option>
                       </select>
                   </div>

                   <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-default">
                   </div>
               </form>
            </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 -->
      </div>
      <!-- /row -->

@endsection