<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Single Sign On - Wiki</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="{{ asset('assets-wiki/css/normalize.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-wiki/css/skeleton.css') }}">

  <link rel="stylesheet" href="{{ asset('assets-wiki/css/custom.css') }}">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="{{ asset('assets-wiki/images/favicon.png') }}">

</head>
<body class="code-snippets-visible">

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <section class="header">
      <h2 class="title">Single Sign On - Kependudukan dan Catatan Sipil</h2>
    </section>

    <!-- Why use Skeleton -->
    <div class="docs-section" id="intro">
        <h6 class="docs-header">Langkah 1</h6>
        <p>Lakukan pendaftaran di halaman <u>http://dukcapil.pplbandung.biz.tm/public/oauth/register</u> terlebih dahulu</p>
        <p>Sistem akan mengembalikan client id dan secret id yang akan digunakan untuk melakukan <i>single-sign on</i>.</p> 
    </div>

    

    <!-- Code -->
    <div class="docs-section" id="code">
    <h6 class="docs-header">Langkah 2</h6>
    <p>Lakukan request ke sistem dengan melakukan</p>
    <div class="docs-example">
      <pre>
        <code>GET /public/oauth/authorize?client_id=<b>CLIENT_ID</b>&redirect_uri=<b>REDIRECT_URI</b>&response_type=code HTTP/1.1
Host: http://dukcapil.pplbandung.biz.tm</code>
      </pre>
    </div>
    <p>Sistem akan mengarahkan ke halaman masuk pengguna</p>
    </div>

    <div class="docs-section" id="code">
    <h6 class="docs-header">Langkah 3</h6>
    <p>Sistem akan mengarahkan kembali ke <i>REDIRECT_URI</i>?code=<i>AUTHENTICATION_CODE</i></p>
    <p>Klien wajib menukarkan <i>AUTHENTICATION_CODE</i> dengan <i>ACCESS_TOKEN</i> untuk dapat melakukan pengambilan data</p>
    <div class="docs-example">
      <pre>
        <code>POST /public/oauth/access_token HTTP/1.1
Host: http://dukcapil.pplbandung.biz.tm
Content-Type: application/x-www-form-urlencoded

grant_type=authorization_code&client_id=<b>CLIENT_ID</b>&client_secret=<b>CLIENT_SECRET</b>&redirect_uri=<b>REDIRECT_URI</b>&code=<b>AUTHENTICATION_CODE</b></code>
      </pre>
    </div>
    <p>Sistem akan memberikan <i>ACCESS_TOKEN</i> dalam format <i>JSON</i></p>
    </div>

    <div class="docs-section" id="code">
    <h6 class="docs-header">Langkah 4</h6>
    <p>Klien menggunakan <i>ACCESS_TOKEN</i> ke <i>REST API</i> Sistem Kependudukan dan Pencatatan Sipil</p>
    <div class="docs-example">
      <pre>
        <code>GET /public/api/penduduk/<b>ACCESS_TOKEN</b> HTTP/1.1
Host: http://dukcapil.pplbandung.biz.tm</code>
      </pre>
    </div>
    <p>Sistem akan mengembalikan data pengguna dalam format <i>JSON</i>.</p>
    </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
