<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Complaint Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="main_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="main_assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="main_assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="main_assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="main_assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="main_assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="main_assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="main_assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="main_assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="index.html">CMS</a></h1>
                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li class="active"><a href="#intro">Home</a></li>
                            <li><a href="{{ route('user.login.view') }}">User</a></li>
                            <li><a href="{{ route('admin.login.view') }}">Admin</a></li>
                            <!--li><a href="#">Departmental</a></li-->
                            <li><a href="#contact">Contact Us</a></li>

                        </ul>
                    </nav><!-- .nav-menu -->
                </div>
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= Intro Section ======= -->
    <section id="intro">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active" style="background-image: url(main_assets/img/intro-carousel/1.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Welcome To CMS</h2>
                                <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <a href="UserLogin" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="background-image: url(main_assets/img/intro-carousel/2.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">You Can Register A Complaint</h2>
                                <p class="animate__animated animate__fadeInUp">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus,</p>
                                <a href="UserRegister" class="btn-get-started scrollto animate__animated animate__fadeInUp">Register</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="background-image: url(main_assets/img/intro-carousel/3.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">You Can Track A Complaint</h2>
                                <p class="animate__animated animate__fadeInUp">Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                                <a href="UserLogin" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="background-image: url(main_assets/img/intro-carousel/4.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">You Can Re-Complaint</h2>
                                <p class="animate__animated animate__fadeInUp">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. </p>
                                <a href="UserLogin" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="background-image: url(main_assets/img/intro-carousel/5.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">You Can Give Feedback </h2>
                                <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <a href="UserLogin" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section><!-- End Intro Section -->

    <main id="main">





        <!-- ======= Contact Section ======= -->
        <section id="contact" class="section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h3>Contact Us</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>


                <div class="form">
                    <form action="" method="post" role="form" class="php-email-form">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">


        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Complaint Management System</strong>. All Rights Reserved
            </div>

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Uncomment below i you want to use a preloader -->
    <!-- <div id="preloader"></div> -->

    <!-- Vendor JS Files -->
    <script src="main_assets/vendor/jquery/jquery.min.js"></script>
    <script src="main_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="main_assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="main_assets/vendor/php-email-form/validate.js"></script>
    <script src="main_assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="main_assets/vendor/counterup/counterup.min.js"></script>
    <script src="main_assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="main_assets/vendor/venobox/venobox.min.js"></script>
    <script src="main_assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="main_assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="main_assets/js/main.js"></script>

</body>

</html>
