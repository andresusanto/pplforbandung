@extends('wp.layout_user')
@section('title') Pencabutan WP - Rumah Pajak @stop
@section('content')
    @if (isset($message))
        <h4>{{ $message }}</h4>
        <br />
    @endif
    <h2>Formulir Pembuatan SSPD</h2>
    <form class="form-horizontal" action="{{url('permintaan/pembuatanSSPD')}}" method='post' id='form_pembuatanSSPD'>
        <div class="control-group">
            <label class="control-label" for="inputType">Nama Wajib Pajak : </label>
            <label class="control-label" for="namaWP">{{ $namaWP }}</label>
            <input type="hidden" name="namaWP" id="namaWP" value="{{ $namaWP }}">
        </div>
        <div class="control-group">
            <label class="control-label" for="inputType">Alamat : </label>
            <label class="control-label" for="alamatWP"> {{ $alamatWP }}</label>
            <input type="hidden" name="alamatWP" id="alamatWP" value="{{ $alamatWP }}">
        </div>
        <div class="control-group">
            <label class="control-label" for="inputType">RT : </label>
            <label class="control-label" for="RT"> {{ $RT }}</label>
            <input type="hidden" name="RT" id="RT" value="{{ $RT }}">
        </div>
        <div class="control-group">
            <label class="control-label" for="inputType">RW : </label>
            <label class="control-label" for="RW"> {{ $RW }}</label>
            <input type="hidden" name="RW" id="RW" value="{{ $RW }}">
        </div>
        <div class="control-group">
            <label class="control-label" for="inputType">KodePos : </label>
            <label class="control-label" for="KodePos"> {{ $KodePos }}</label>
            <input type="hidden" name="KodePos" id="KodePos" value="{{ $KodePos }}">
        </div>
        <div class="control-group">
            <label class="control-label" for="inputType">NPWP : </label>
            <label class="control-label" for="NPWP"> {{ $NPWP }}</label>
            <input type="hidden" name="NPWP" id="NPWP" value="{{ $NPWP }}">
        </div>
        <div class="control-group">
            <label class="control-label" for="inputType">Jenis Pajak : </label>
            <input name="JenisPajak" id="JenisPajak" required>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputType">Nama Objek : </label>
            <input name="NamaObjek" id="NamaObjek" required>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputType">Masa Objek : </label>
            <input name="MasaObjek" id="MasaObjek" required>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputType">Tahun Pajak : </label>
            <input name="TahunPajak" id="TahunPajak" required>
        </div>
        <div class="control-group">
            <div class ="custom">
                <label class="control-label" for="inputType">Setoran : </label>
                <label class="control-label" for="inputType">SKPDKB</label>
            </div>
            <div class ="custom">
                <input name="SKPDKB" id="SKPDKB" required>
            </div>
        </div>
        <div class="control-group">
            <div class ="custom">
                <label class="control-label" for="inputType"></label>
                <label class="control-label" for="inputType">SKPDKBT</label>
            </div>
            <div class ="custom">
                <input name="SKPDKBT" id="SKPDKBT" required>
            </div>
        </div>
        <div class="control-group">
            <div class ="custom">
                <label class="control-label" for="inputType"></label>
                <label class="control-label" for="inputType">STPD</label>
            </div>
            <div class ="custom">
                <input name="STPD" id="STPD" required>
            </div>
        </div>
        <div class="control-group">
            <div class ="custom">
                <label class="control-label" for="inputType"></label>
                <label class="control-label" for="inputType">Lainnya</label>
            </div>
            <div class ="custom">
                <input name="Lainnya" id="STPD" required>
            </div>
        </div>
        <div class="control-group">
            <div class ="custom">
                <label class="control-label" for="inputType">Besar Setoran : </label>
            </div>
            <div class ="custom">
                <input name="BesarSetoran" id="BesarSetoran" required>
            </div>
        </div>
        <div class="control-group">
            <input class="btn primary" type="submit" value="Submit">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection