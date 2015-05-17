<div>
    {{-- harus ada --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
<div class='form-group'>
    <label for='jenisizin_id'>Jenis Izin</label>
    <select name='jenisizin_id' class='form-control' id='jenisizin_id'>
        <option selected disabled>Pilih jenis izin</option>
        @foreach($list_jenisizin as $jenisizin)
            <option value='{{$jenisizin->id}}'>{{$jenisizin->nama}}</option>
        @endforeach
    </select>
    @if ($errors!==null)
        <span style='color:red'>{{$errors->first('jenisizin_id')}}</span>
    @endif
</div>

<div class='form-group'>
    <label for='nama_perusahaan'>Nama Perusahaan</label>
    <input name='nama_perusahaan' class='form-control' required/>
</div>

<div class='form-group'>
    <label for='alamat_perusahaan'>Alamat Perusahaan</label>
    <input name='alamat_perusahaan' class='form-control' required/>
</div>

<div class='form-group'>
    <label for='alamat_garasi'>Alamat Garasi</label>
    <input name='alamat_garasi' class='form-control' required/>
</div>

<div class='form-group'>
    <label for='npwp'>No NPWP</label>
    <input name='npwp' class='form-control' required/>
</div>

<div class='form-group'>
    <input type='submit' value='{{$button}}' class='btn btn-primary'/>
</div>

{{-- Daftar tabel yang dibutuhkan--}}
@foreach($list_jenisizin as $jenis_izin)
    <div class='form-group daftar-dokumen' id='daftar-dokumen-{{$jenis_izin->id}}'>
        <label>Daftar dokumen yang dibutuhkan</label>
        @if (count($jenis_izin->templates) > 0)
            <ul>
            @foreach($jenis_izin->templates as $template)
                <li>{{$template->nama}}</li>
            @endforeach
            </ul>
        @else
            <ul>
                <li>Tidak ada dokumen yang dibutuhkan</li>
            </ul>
        @endif
    </div>
@endforeach


{{-- Daftar terminal yang ada di bandung --}}
<div class='form-group'>
    <label>Data terminal yang ada di Bandung</label>
    <ul>
        <li>Terminal Bus Leuwi Panjang : Jl.Soekarno Hatta 205 Bandung</li>
        <li>Terminal Bus Cicaheum : Jalan Jend A Yani, Cicaheum, Kiaracondong, Bandung 40282</li>
    </ul>
</div>


@section('scripts')
@parent
<script type="text/javascript">
$("#jenisizin_id").change(function(){
    var jenisizin_id = $(this).val();
    $(".daftar-dokumen").hide();
    $("#daftar-dokumen-"+jenisizin_id).show();
});
$(".daftar-dokumen").hide();
</script>
@stop