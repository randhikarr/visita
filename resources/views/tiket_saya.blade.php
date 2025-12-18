<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Reservasi</title>

      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>

<body>

<!-- Navbar -->
<div class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="{{ route('beranda') }}">
            <img src="images/visita2.png">
         </a>

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item"><a class="nav-link" href="{{ route('beranda') }}">Beranda</a></li>
               <li class="nav-item"><a class="nav-link" href="{{ route('museum') }}">Museum</a></li>
               <li class="nav-item"><a class="nav-link" href="{{ route('lokasi') }}">Lokasi</a></li>
               <li class="nav-item"><a class="nav-link" href="{{ route('tiket.saya') }}">Tiket Saya</a></li>
            </ul>
         </div>
      </nav>
   </div>
</div>

<!-- QR CONTENT -->
<div class="qr-container">

    <img src="{{ asset('images/qrgrey.png') }}" class="qrgrey-image">

    <div class="ticket-buttons">
        <button class="btn-download">
            <i class="fa fa-download"></i> Unduh
        </button>

        <button class="btn-qr">
            <i class="fa fa-share"></i> Bagikan
        </button>
    </div>

</div>

</body>
</html>
