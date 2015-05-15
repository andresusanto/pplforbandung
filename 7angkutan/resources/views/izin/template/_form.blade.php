<input type='hidden' name='_token' value='{{ csrf_token() }}'>

<div class='form-group'>
    <label>Nama</label>
    <input name='nama' class='form-control' value='{{$template->nama}}' />
</div>
<div class='form-group'>
    <label>Butuh Upload</label>
    <input name='butuh_upload' value='1' type='checkbox' @if($template->butuh_upload) checked @endif />
</div>
<div class='form-group'>
    <label>Butuh Perpanjangan</label>
    <input name='butuh_perpanjangan' value='1' type='checkbox' @if($template->butuh_perpanjangan) checked @endif />
</div>
<div class='form-group'>
    <label>Keterangan</label>
    <textarea name='keterangan' class='form-control'>{{$template->keterangan}}</textarea>
</div>
<div class='form-group'>
    <input type='submit' value='{{$button}}' class='btn btn-primary'/>
</div>