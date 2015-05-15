<div>
    {{-- harus ada --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
<div class='form-group'>
    <label for='nama'>Nama</label>
    <input name='nama' type='text' value='{{$jenis_izin->nama}}' class='form-control'/>
    <span>{{$errors->first('nama')}}</span>
</div>
<div class='form-group'>
    <label for='nama'>Masa Berlaku (dalam tahun)</label>
    <input name='tahun_berlaku' type='number' value='{{$jenis_izin->tahun_berlaku}}' class='form-control'/>
    <span>{{$errors->first('tahun_berlaku')}}</span>
</div>
<div class='form-group'>
    <input type='submit' value='{{$button}}' class='btn btn-primary'/>
</div>