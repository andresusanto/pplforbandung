@extends('layouts.admin')

@section('content')
<div>
    {{-- bikin template baru --}}
    <a href='{{route('izin.template.create')}}' class='btn btn-primary'>Tambah Template Dokumen</a>
</div>
<br/>
@if (count($list_template) > 0)
    <div class='panel panel-primary'>
        <table class='table table-hover'>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
                <th>Butuh Perpanjang</th>
                <th>Butuh Upload</th>
                <th>Upload</th>
            </tr>

            @foreach($list_template as $template)
            <tr>
                @if ($template->url == '')
                    <td>{{$template->nama}}</td>
                @else
                    <td><a href='{{asset($template->url)}}'>{{$template->nama}}</a></td>
                @endif
                <td>
                    <a href='{{URL::route("izin.template.update",["id"=>$template->id])}}'><i class='glyphicon glyphicon-pencil'></i></a> 
                </td>
                <td>
                    @if ($template->butuh_perpanjangan)
                        Ya
                    @else
                        Tidak
                    @endif
                </td>
                <td>
                    @if ($template->butuh_upload)
                        Ya
                    @else
                        Tidak
                    @endif
                </td>
                <td>
                    <form action='{{route('izin.template.upload.submit',['id'=>$template->id])}}' class='form-inline' method='post' enctype='multipart/form-data'>
                        <div class='form-group'>
                            <input type='hidden' name='_token' value='{{csrf_token()}}'/>
                        </div>
                        <div class='form-group'>
                            <input type='file' name='file'/>
                        </div>
                        <div class='form-group'>
                            <input type='submit' class='btn btn-primary' value='Upload'/>
                        </div>    
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
@else
    Data kosong
@endif
@stop
