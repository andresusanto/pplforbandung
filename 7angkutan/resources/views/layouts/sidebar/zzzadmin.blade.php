<div class='sidebar panel panel-info'>
    <div class='panel-heading'>
        <h3 class='panel-title'>Menu Izin</h3>
    </div>
    <ul class='list-group'>
        <a href='{{route('izin.admin.index')}}'><li class='list-group-item @if(Route::is('izin.admin.index')) active @endif'>Daftar Permohonan Izin</li></a>
    </ul>
</div>

<div class='sidebar panel panel-info'>
    <div class='panel-heading'>
        <h3 class='panel-title'>Menu Trayek</h3>
    </div>
    <ul class='list-group'>
        <a href='#'><li class='list-group-item'>Daftar Trayek</li></a>
    </ul>
</div>

<div class='sidebar panel panel-info'>
    <div class='panel-heading'>
        <h3 class='panel-title'>Manajemen</h3>
    </div>
    <ul class='list-group'>
        <a href='{{route('izin.status.index')}}'><li class='list-group-item @if(Route::is('izin.status.index')) active @endif'>Status Izin</li></a>
        <a href='{{route('izin.jenis.index')}}'><li class='list-group-item @if(Route::is('izin.jenis.index')) active @endif'>Jenis Izin</li></a>
        <a href='{{route('izin.template.index')}}'><li class='list-group-item @if(Route::is('izin.template.index')) active @endif'>Template Izin</li></a>
    </ul>
</div>