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
      <title>Visita</title>
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
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">LOG IN</a>
                     </li>
                  <form class="form-inline my-2 my-lg-0">
                  </form>
               </div>
            </nav>
         </div>
      </div>
      <!-- header section end -->
      <!-- banner section start --> 
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="banner_img"><img src="images/visitaround2.png"></div>
                        </div>
                        <div class="col-md-6">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">Cari museum yang ingin anda kunjungi</h1>
                              <form>
                                 <input type="text" class="search_text" placeholder="Search text here" name="Search text here">
                                 <div class="search_bt"><a href="#">Cari</a></div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="banner_img"><img src="images/upcoming.png"></div>
                        </div>
                        <div class="col-md-6">
                           <div class="banner_taital_main">
                              <h3 class="banner_taital">Museum yang akan datang</h3>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="banner_img"><img src="images/banner-img.png"></div>
                        </div>
                        <div class="col-md-6">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">Museum yang ramai dikunjungi</h1>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      <!-- categroy section start -->
      <div class="categroy_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="categroy_taital">Rekomendasi untuk kamu</h1>
               </div>
            </div>
            <div class="categroy_section_2">
               <div id="main_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="hover01 column">
                                 <figure><img src="images/greyart2.jpeg"></figure>
                              </div>
                              <h3 class="materials_text">Grey Art Gallery</h3>
                              <div class="readmore_btn"><a href="{{ route('greyart') }}">Lihat Detail</a></div>
                           </div>
                           <div class="col-md-4">
                              <div class="hover01 column">
                                 <figure><img src="images/sribaduga.jpg"></figure>
                              </div>
                              <h3 class="materials_text">Museum Sri Baduga</h3>
                              <div class="readmore_btn active"><a href="#">Lihat Detail</a></div>
                           </div>
                           <div class="col-md-4">
                              <div class="hover01 column">
                                 <figure><img src="images/asiaafrika2.jpeg"></figure>
                              </div>
                              <h3 class="materials_text">Museum Asia Afrika</h3>
                              <div class="readmore_btn"><a href="#">Lihat Detail</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="hover01 column">
                                 <figure><img src="images/geologi.jpeg"></figure>
                              </div>
                              <h3 class="materials_text">Museum Geologi</h3>
                              <div class="readmore_btn"><a href="#">Lihat Detail</a></div>
                           </div>
                           <div class="col-md-4">
                              <div class="hover01 column">
                                 <figure><img src="images/sate.jpeg"></figure>
                              </div>
                              <h3 class="materials_text">Museum Gedung Sate</h3>
                              <div class="readmore_btn active"><a href="#">Lihat Detail</a></div>
                           </div>
                           <div class="col-md-4">
                              <div class="hover01 column">
                                 <figure><img src="images/srihadi.jpeg"></figure>
                              </div>
                              <h3 class="materials_text">Museum Srihadi Soedarsono</h3>
                              <div class="readmore_btn"><a href="#">Lihat Detail</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="hover01 column">
                                 <figure><img src="images/selasar2.jpeg"></figure>
                              </div>
                              <h3 class="materials_text">Selasar Sunaryo Art Space</h3>
                              <div class="readmore_btn"><a href="#">Lihat Detail</a></div>
                           </div>
                           <div class="col-md-4">
                              <div class="hover01 column">
                                 <figure><img src="images/posindo.jpeg"></figure>
                              </div>
                              <h3 class="materials_text">Museum Pos Indonesia</h3>
                              <div class="readmore_btn active"><a href="#">Lihat Detail</a></div>
                           </div>
                           <div class="col-md-4">
                              <div class="hover01 column">
                                 <figure><img src="images/kotabdg.jpeg"></figure>
                              </div>
                              <h3 class="materials_text">Museum Kota Bandung</h3>
                              <div class="readmore_btn"><a href="#">Lihat Detail</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <!-- categroy section end -->
      
      <!-- blog section start -->
      <div class="blog_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="blog_taital">Berita Terkini</h1>
               </div>
            </div>
            <div class="blog_section_2">
               <div class="row">
                  <div class="col-md-4">
                     <div class="blog_img"><img src="images/fosil gading2.jpg"></div>
                     <div class="btn_main">
                        <div class="date_text active"><a href="#">11<br>Juni</a></div>
                     </div>
                     <div class="blog_box">
                        <h3 class="blog_text">Museum Geologi Pamerkan Replika Fosil Kura-kura dan Gading Berumur 1 Juta Tahun</h3>
                        <p class="lorem_text"> Museum Geologi Bandung menggelar perdana pameran replika fosil kura-kura dan gading gajah hasil temuan warga di Sumedang, mulai Sabtu, 10 Juni 2023. Replika itu merupakan hasil rekonstruksi dari fosil aslinya yang ditemukan tidak utuh.</p>
                     </div>
                     <div class="read_bt"><a href="#">Baca Selengkapnya</a></div>
                  </div>
                  <div class="col-md-4">
                     <div class="blog_img"><img src="images/beritakaa.jpeg"></div>
                     <div class="btn_main">
                        <div class="date_text active"><a href="#">08<br>Maret</a></div>
                     </div>
                     <div class="blog_box">
                        <h3 class="blog_text">Sepekan Mengenal Gedung Merdeka Aset Diplomasi Perdamaian Dunia<h3>
                        <p class="lorem_text">Gedung Merdeka merupakan saksi bisu sebuah perhelatan akbar bangsa kulit berwarna. Namun, belum banyak masyarakat Indonesia yang mengenal sejarah panjang dari Gedung ini. Gedung Merdeka bukan hanya gedung peninggalan kolonialisme</p>
                     </div>
                     <div class="read_bt"><a href="#">Baca Selengkapnya</a></div>
                  </div>
                  <div class="col-md-4">
                     <div class="blog_img"><img src="images/beritasribaduga.jpg"></div>
                     <div class="btn_main">
                        <div class="date_text active"><a href="#">19<br>Nov</a></div>
                     </div>
                     <div class="blog_box">
                        <h3 class="blog_text">Museum Sri Baduga Bandung Akan Menggelar Lomba Fotografi Dan Animasi</h3>
                        <p class="lorem_text">MUSEUM Sri Baduga Bandung menghelat tiga lomba yaitu desain logo, fotografi, dan animasi, pada November hingga Desember 2025. Lomba ini bisa diikuti pelajar, mahasiswa, dan umum. Kepala Museum Sri Baduga Ary Heriyanto mengatakan, lomba itu bertujuan memrpomosikan wisata.</p>
                     </div>
                     <div class="read_bt"><a href="#">Baca Selengkapnya</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- blog section end -->
<!-- market section start -->
      <div class="market_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="market_taital">Tambahkan Informasi</h1>
               </div>
            </div>
            <div class="market_section_2">
               <h4 class="market_text active"> <span class="padding10">Nama Museum </span></h4>
                <form>
                    <input type="text" class="search_text" placeholder="Isi data" name="Isi data">
                </form>
                <h4 class="market_text active"> <span class="padding10">Lokasi</span></h4>
                <form>
                    <input type="text" class="search_text" placeholder="Isi data" name="Isi data">
                </form>
                <h4 class="market_text active"> <span class="padding10">Deskripsi</span></h4>
                <form>
                    <input type="text" class="search_text" placeholder="Isi data" name="Isi data">
                </form>
                <div class="seemore_bt"><a href="#">Tambahkan</a></div>
            </div>
         </div>
      </div>
      <!-- market section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="contact_taital">Berikan Masukkan</h1>
                  <p class="contact_text"> Berikan saran dan masukkan anda agar kami dapat meningkatkan layanan kami kedepannya. </p>
               </div>
            </div>
            <div class="contact_section_2">
               <div class="row">
                  <div class="col-md-12 padding15">
                     <form action="">
                        <div class="mail_section_1 ">
                           <input type="text" class="mail_text" placeholder="Name" name="Name">
                           <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number"> 
                           <input type="text" class="mail_text" placeholder="Email" name="Email">
                           <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                           <div class="send_bt"><a href="#">Kirim</a></div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="location_text">
                     <ul>
                        <li>
                           <a href="#"><span class="padding_left_10"><i class="fa fa-map-marker" aria-hidden="true"></i></span>Jalan kemana aja asal sama kamu</a>
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