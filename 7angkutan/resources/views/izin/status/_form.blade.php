<div>
    {{-- harus ada --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
<div class='form-group'>
    <label for='nama'>Nama</label>
    <input name='nama' type='text' value='{{$status->nama}}' class='form-control'/>
    <span>{{$errors->first('nama')}}</span>
</div>
<div class='form-group'>
    <input type='submit' value='{{$button}}' class='btn btn-primary'/>
</div>