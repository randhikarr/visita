<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Grey Art Gallery</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
   <body>
      <div class="header_section">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand"href="{{ route('beranda') }}"><img src="images/visita2.png"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('museum') }}">Museum</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('lokasi') }}">Lokasi</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('tiket.saya') }}">Tiket Saya</a>
                     </li>
                  </ul>
                   <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    class="btn btn-brand ms-lg-3">LOG IN</a>
                  <form class="form-inline my-2 my-lg-0">
                  </form>
               </div>
            </nav>
         </div>
      </div>
      <!-- header section end -->
      <!-- reservasi section start -->
      <div class="market_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="market_taital">Grey Art Gallery</h1>
               </div>
            </div>

            <div class="market_section_2">

               <div class="reservasi-flex">
                  <div class="reservasi-image">
                     <img src="{{ asset('images/greyart.jpeg') }}" alt="Grey Art Gallery">
                  </div>

                  <div class="reservasi-text">
                     <p>
                        Grey Art Gallery adalah galeri seni kontemporer di pusat kota Bandung tepatnya 
                        di Jalan Braga No. 47 yang dibuka sejak Februari 2023. 
                        Galeri ini berfungsi sebagai ruang terbuka bagi seniman lokal
                        maupun luar untuk memamerkan karya seni rupa dan instalasi, serta menyelenggarakan pameran, 
                        workshop, dan proyek kreatif lain yang memungkinkan publik menikmati dan mengapresiasi seni 
                        secara langsung.
                     </p>
                  </div>
               </div>

               <!-- Tombol sekarang ikut masuk container dan rata kanan -->
               <div class="seemore_bt_reservasi">
                  <a href="{{ route('reservasi') }}">Pesan Tiket</a>
               </div>

            </div>
         </div>
      </div>
      <!-- market section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding margin_top90">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="location_text">
                     <ul>
                        <li>
                           <a href="#"><span class="padding_left_10"><i class="fa fa-map-marker" aria-hidden="true"></i></span> Jalan kemana aja asal sama kamu </a>
                        </li>
                        <li>
                           <a href="#"><span class="padding_left_10"><i class="fa fa-phone" aria-hidden="true"></i></span>(+62) 1234567890</a>
                        </li>
                        <li>
                           <a href="#"><span class="padding_left_10"><i class="fa fa-envelope" aria-hidden="true"></i></span>visita@gmail.com</a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="newslatter_main">
                     <h1 class="useful_text">Follow Us</h1>
                     <div class="footer_social_icon">
                        <ul>
                           <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>