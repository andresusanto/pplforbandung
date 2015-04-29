<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <h5 class="centered">
                {{ Session::get('admin_name', 'Nama Instansi') }}
            </h5>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>Kartu Keluarga</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ url('kartukeluarga/buat') }}">Buat</a></li>
                    <li><a href="{{ url('kartukeluarga') }}">Cari</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Kartu Tanda Penduduk</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ url('kartutandapenduduk/buat') }}">Buat</a></li>
                    <li><a href="{{ url('kartutandapenduduk') }}">Cari</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span>Akta Nikah</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ url('aktanikah/buat') }}">Buat</a></li>
                    <li><a href="{{ url('aktanikah') }}">Cari</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-th"></i>
                    <span>Akta Cerai</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ url('aktacerai/buat') }}">Buat</a></li>
                    <li><a href="{{ url('aktacerai') }}">Cari</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Akta Kelahiran</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ url('aktakelahiran/buat') }}">Buat</a></li>
                    <li><a href="{{ url('aktakelahiran') }}">Cari</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Akta Kematian</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ url('aktakematian/buat') }}">Buat</a></li>
                    <li><a href="{{ url('aktakematian') }}">Cari</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>