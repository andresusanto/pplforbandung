
<div class='sidebar panel panel-info'>
    <div class='panel-heading'>
        <h3 class='panel-title'>Profil</h3>
    </div>
    <div class='panel-body' style='text-align:center'>
        <p>{{Auth::user()->nama}}</p>
        <p><a href='{{route('izin.pengguna.create')}}' style='color:white' class='btn btn-primary'>Ajukan Izin</a></p>
    </div>
</div>
<div class='sidebar panel panel-info'>
    <div class='panel-heading'>
        <h3 class='panel-title'>Menu Izin</h3>
    </div>
    <ul class='list-group'>
        <a href='{{route('izin.pengguna.index')}}'><li class='list-group-item @if(Route::is('izin.pengguna.index')) active @endif'>Daftar Permohonan Izin</li></a>
    </ul>
</div>

<div class='sidebar panel panel-info'>
    <div class='panel-heading'>
        <h3 class='panel-title'>Menu Trayek</h3>
    </div>
    <ul class='list-group'>
        <a href='#'><li class='list-group-item'> Rekomendasi Trayek</li></a>
    </ul>
</div>