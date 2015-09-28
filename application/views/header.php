<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
<!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>Full Propaganda</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Full Propaganda" name="description">
    <meta content="Full Propaganda" name="keywords">
    <meta content="Full Propaganda" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-">
    <meta property="og:url" content="-CUSTOMER VALUE-">

    <link rel="shortcut icon" href="favicon.ico">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo $css_url ?>style.css" rel="stylesheet">
    <link href="<?php echo $css_url ?>bootstrap.css" rel="stylesheet">
    <link href="<?php echo $css_url ?>fullstyle.css" rel="stylesheet">
    <link href="<?php echo $css_url ?>slick.css" rel="stylesheet">

    <?php if($page_name == 'resultados') : ?>
    <?php endif; ?>
  </head>
  <body class="fullstyle {{slideClass}}" ng-app="fullApp" ng-controller="Full">
    <section id="main">
      <header id="header-mobile" class="{{slideClass}} hidden-md hidden-lg">
        <div class="hm-logo"><img src="<?php echo $images_url ?>logo.png" alt="" /></div>
        <div class="hm-menu" ng-click="slideRight()"><i class="fullicon ficon-menu"></i></div>
      </header> <!-- #header -->

      <section id="slider-content" class="slider {{slideClass}} hidden-md hidden-lg">
        <nav id="sc-menu" ng-swipe-left="slideRight()">
          <ul>
            <li><a href="">Cases</a></li>
            <li><a href="">Somos a Full</a></li>
            <li><a href="">Clientes</a></li>
            <li><a href="">Fulanos</a></li>
            <li><a href="">Contatos</a></li>
          </ul>
        </nav>
      </section> <!-- #slider-content -->

      <section id="main-content" class="slider {{slideClass}}" ng-swipe-right="slideRight()" ng-swipe-left="slideLeft()">
        <header id="header" class="hidden-xs hidden-sm">
          <nav>
            <ul>
              <li><a href="">Cases</a></li>
              <li><a href="">Somos a Full</a></li>
              <li><a href="">Clientes</a></li>
              <li><a href="">Fulanos</a></li>
              <li><a href="">Contatos</a></li>
            </ul>
          </nav>
          <div id="hd-phone">
            <span class="hd-phone">f. 62 3281 1072</span>
            <a href="">facebook</a>
            <a href="">instagram</a>
          </div>
        </header>

