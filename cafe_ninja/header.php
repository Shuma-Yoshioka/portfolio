<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>NINJA - CAFE</title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/assets/css/style.css'; ?>">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <?php wp_head(); ?>
</head>
<body>
  <header class="header">
    <div class="inner">
      <h1 class="logo"><a href="<?php echo home_url(); ?>">NINJA-CAFE</a></h1>
      <nav class="nav headNav">
        <?php get_template_part('links'); ?>
      </nav>
    </div>
  </header>