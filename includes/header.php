<?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- SEO -->
  <meta property="og:url" content="<?php echo $url_previa; ?>" />
  <meta property="og:title" content="<?php echo $titulo; ?>" />
  <meta property="og:image" content="<?php echo PATH_DEFAULT . 'assets/img/' . $path; ?>" />
  <meta property="og:description" content="<?php echo $descricao; ?>" />
  <meta name="theme-color" content="#fe2813">
  <!-- SEO -->

  <meta name="description" content="blog, noticicas, saber mais" />
	<meta name="keywords" content="blog" />
	<meta name="author" content="Calvitech" />

  <title><?php echo TITLE; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="<?php echo PATH_DEFAULT; ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo PATH_DEFAULT; ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo PATH_DEFAULT; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo PATH_DEFAULT; ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo PATH_DEFAULT; ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo PATH_DEFAULT; ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo PATH_DEFAULT; ?>assets/vendor/aos/aos.css" rel="stylesheet">

  <link href="<?php echo PATH_DEFAULT; ?>assets/css/variables.css" rel="stylesheet">
  <link href="<?php echo PATH_DEFAULT; ?>assets/css/main.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?php echo PATH_DEFAULT; ?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!--<img src="assets/img/logo.png" alt="">-->
        <h1>CalviTech</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo PATH_DEFAULT; ?>">Blog</a></li>
          <li><a href="<?php echo PATH_DEFAULT; ?>about">Sobre nós</a></li>
          <li><a href="<?php echo PATH_DEFAULT; ?>contact">Contato</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="<?php echo FACEBOOK; ?>" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="<?php echo TWITTER; ?>" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="<?php echo INSTAGRAM; ?>" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result" method="GET" class="search-form">
            <input type="text" name="pesquisa" placeholder="Parte do titulo ..." class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
            <button type="submit" class="btn btn-submit-pesq">
              <span class="icon bi-search button-pesquisa"></span>
            </button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->