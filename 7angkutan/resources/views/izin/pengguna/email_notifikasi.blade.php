<p>Dear {{$izin->pengguna->nama}}</p>

<p>Melalui surat ini kami ingin menyampaikan informasi bahwa izin yang anda ajukan sudah diperiksa oleh admin dan mengalami perubahan status</p>

<p>Anda bisa mengakses link tersebut pada <a href='{{route('izin.pengguna.read',['id'=>$izin->id])}}'>{{route('izin.pengguna.read',['id'=>$izin->id])}}</a> dengan login terlebih dahulu</p>