<?php
# @Author: Wahid Ari <wahidari>
# @Date:   8 January, 5:05
# @Copyright: (c) wahidari 2017
?>
<?php
    require_once("private/database.php");
?>
<?php
// fungsi untuk merandom avatar profil
function RandomAvatar(){
    $photoAreas = array("avatar1.png", "avatar2.png", "avatar3.png", "avatar4.png", "avatar5.png", "avatar6.png", "avatar7.png", "avatar8.png", "avatar9.png", "avatar10.png", "avatar11.png");
    $randomNumber = array_rand($photoAreas);
    $randomImage = $photoAreas[$randomNumber];
    echo $randomImage;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Dispendukcapil Nusukan</title>
    <link rel="shortcut icon" href="images/nusukan.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Main Styles CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.js"></script>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
</head>

<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!--Success Modal Saved-->
    <div class="modal fade" id="successmodalclear" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content bg-2">
                <div class="modal-header ">
                    <h4 class="modal-title text-center text-green">Sukses</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Pengaduan Berhasil Di Kirim</p>
                    <p class="text-center">Untuk Mengetahui Status Pengaduan</p>
                    <p class="text-center">Silahkan Buka Menu <a href="lihat">Lihat Pengaduan</a> </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-green" onclick="location.href='index';" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['status'])) {
    ?>
    <script type="text/javascript">
        $("#successmodalclear").modal();
    </script>
    <?php
        }
    ?>
    <!-- body -->
    <div class="shadow">
        <!-- navbar -->
        <nav class="navbar navbar-inverse navbar-fixed form-shadow">
            <!-- container-fluid -->
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">
                    <img alt="Brand" sizes="20px" src="images/nusukan.png" style="width: 35px; height: auto;">
                    </a>

        
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav nav-link">
                        <li class="active"><a href="">HOME</a></li>
                        <li><a href="lapor">LAPOR</a></li>
                        <li><a href="lihat">LIHAT PENGADUAN</a></li>
                        <li><a href="kontak">KONTAK</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- end navbar -->

    <!-- start slider -->
    <div id="mainCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#mainCarousel" data-slide-to="1"></li>
            <li data-target="#mainCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/1.jpg" alt="...">
                <div class="carousel-caption welcome">
                    <h2 class="animated bounceInRight">Selamat Datang</h2>
                    <h3 class="animated bounceInLeft">Website Pengaduan Masyarakat Dispendukcapil Nusukan</h3>
                </div>
            </div>
            <div class="item">
                <img src="images/2.jpg" alt="...">
                <div class="carousel-caption">
                    <h2 class="animated bounceInDown">Pelaminan</h2>
                    <h2 class="animated bounceInDown">Pelayanan Administrasi Malam Hari</h2>
                </div>
            </div>
            <div class="item">
                <img src="images/3.jpeg" alt="...">
                <div class="carousel-caption">
                    <h2 class="animated bounceInUp">Kegiatan</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#mainCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#mainCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end Slider -->

    <!-- content -->
    <div class="main-content">
        <!-- section -->
        <div class="section">
            <div class="row">
                <!-- laporan Terbaru -->
                <div class="col-md-12">
                    <br>
                    <h3 class="text-center h3-custom">Pengaduan Terbaru</h3>
                    <hr class="custom-line"/>
                    <hr>
                    <!-- scroll-laporan -->
                    <div class="scroll-laporan">
                        <?php
                        // Ambil semua record dari tabel laporan
                        $statement = $db->query("SELECT * FROM `laporan` ORDER BY id DESC");
                        foreach ($statement as $key ) {
                            $mysqldate = $key['tanggal'];
                            $phpdate = strtotime($mysqldate);
                            $tanggal = date( 'd F Y, H:i:s', $phpdate);
                            ?>
                            <div class="panel-body card-shadow-2">
                                <a class="media-left" href="#"><img class="img-circle img-sm form-shadow" src="images/avatar/<?php RandomAvatar(); ?>"></a>
                                <div class="media-body">
                                    <div>
                                        <h4 class="text-green profil-name" style="font-family: monospace;"><?php echo $key['nama']; ?></h4>
                                        <p class="text-muted text-sm"><i class="fa fa-th fa-fw"></i>  -  <?php echo $tanggal; ?></p>
                                    </div>
                                    <hr class="hr-nama">
                                    <p>
                                        <?php echo $key['isi']; ?>
                                    </p>
                                </div>
                                <!-- media body -->
                            </div>
                            <!-- panel body -->

                            <?php
                        }
                        ?>

                    </div>
                    <!-- end scroll-laporan -->
                </div>
                <!-- End Laporan Terbaru -->
            </div>
            <!-- end row -->
        </div>
        <!-- /.section -->

        <!-- link to top -->
        <a id="top" href="#" onclick="topFunction()">
            <i class="fa fa-arrow-circle-up"></i>
        </a>
        <script>
        // When the user scrolls down 100px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.getElementById("top").style.display = "block";
            } else {
                document.getElementById("top").style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        </script>
        <!-- link to top -->

    </div>
    <!-- end main-content -->

<!-- Footer -->
<footer class="footer text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Bagian Kantor (Kiri) -->
            <div class="col-md-6 text-md-start text-center mb-3">
                <h4 class="text-uppercase mb-3">
                    <i class="fa fa-map-marker me-2"></i> Kantor
                </h4>
                <p class="mb-0">
                    Jl. Sriwijaya Utara II No.6, Kel. Nusukan, Kec. Banjarsari, Kota Surakarta (57135)
                </p>
            </div>

            <!-- Bagian Kontak (Kanan) -->
            <div class="col-md-6 text-md-end text-center">
                <h4 class="text-uppercase mb-3">
                    <i class="fa fa-envelope-o me-2"></i> Kontak
                </h4>
                <p class="mb-0">
                    ☎️ (0271) 718879 <br>
                    nusukan@surakarta.go.id
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright -->
<div class="text-center text-white py-3">
    <small>v-6.0 | Copyright &copy; Dispendukcapil Nusukan</small>
</div>

    <!-- shadow -->
</div>

</body>
</html>
