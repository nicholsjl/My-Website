<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/img/favicon/apple-touch-icon.png?v=<?php echo CACHE_VERSION; ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/img/favicon/favicon-32x32.png?v=<?php echo CACHE_VERSION; ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/img/favicon/favicon-16x16.png?v=<?php echo CACHE_VERSION; ?>">
    <link rel="manifest" href="<?php echo base_url(); ?>assets/img/favicon/site.webmanifest?v=<?php echo CACHE_VERSION; ?>">
    <link rel="mask-icon" href="<?php echo base_url(); ?>assets/img/favicon/safari-pinned-tab.svg?v=<?php echo CACHE_VERSION; ?>" color="#4823dd">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta name="robots" content="index,follow" />
    <meta name="description" content="I'm Jodi Nichols, a full-stack web developer and designer with more than <?php echo date('Y') - 2010; ?> years of experience. Send me a message if you want to hire me or get in touch." />
    <link rel="canonical" href="<?php echo base_url(); ?>" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css?v=<?php echo CACHE_VERSION; ?>">

    <title><?php echo $title; ?></title>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123407355-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-123407355-1');
    </script>
  </head>

  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="/assets/img/my-logo.svg" width="50" height="50" alt="Jodi Nichols' portfolio site logo" />
        </a>
        <ul class="navbar-nav ml-auto flex-row">
          <li class="nav-item">
            <a class="go-to d-sm-none" href="#contact"><i class="fas fa-envelope-square fa-2x"></i></a>
            <a class="btn btn-outline-purple btn-rounded pl-4 pr-4 go-to d-none d-sm-block" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="ml-4" href="https://linkedin.com/in/jodi-nichols/" target="_blank" title="Add me to your network"><i class="fab fa-linkedin fa-2x"></i></a>
          </li>
          <li class="nav-item">
            <a class="ml-4" href="https://github.com/nicholsjl/" target="_blank" title="Check out my repos"><i class="fab fa-github fa-2x"></i></a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main">
      <?php echo !empty($view_content) ? $view_content : ''; ?>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.min.js?v=<?php echo CACHE_VERSION; ?>"></script>
  </body>
</html>
