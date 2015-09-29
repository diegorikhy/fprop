<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
<!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>Full Propaganda</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Full Propaganda" name="description">
    <meta content="Full Propaganda" name="keywords">
    <meta content="Full Propaganda" name="author">

    <link rel="shortcut icon" href="<?php echo $images_url ?>favicon.ico">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,700' rel='stylesheet' type='text/css'>

    <link href="<?php echo $css_url ?>style.css" rel="stylesheet">
    <link href="<?php echo $css_url ?>bootstrap.css" rel="stylesheet">
    <link href="<?php echo $css_url ?>slick.css" rel="stylesheet">
    <link href="<?php echo $css_url ?>prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo $css_url ?>fullstyle.css" rel="stylesheet">

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
          <ul class="italic">
            <li ng-repeat="menu in site.menu"><a href="{{menu.link}}" scroll-to ng-class="{'active':menu.active}" ng-click="activeMenu()">{{menu.nome}}</a></li>
          </ul>
        </nav>
      </section> <!-- #slider-content -->

      <header id="header" class="hidden-xs hidden-sm">
        <div id="logo">
          <div class="full-logo">
            <div class="full01"></div>
            <div class="full02"></div>
            <span class="full03"></span>
            <span class="full04"></span>
            <span class="full05"></span>
            <span class="full06"></span>
            <span class="full07"></span>
            <span class="full08"></span>
            <span class="full09"></span>
          </div>
        </div>
        <div id="menu-bar" class="floating">
          <div class="container">
            <div id="hd-phone">
              <span class="hd-phone xb-italic">f. <?php echo $telefone; ?> </span>
              <a href="<?php echo $facebook; ?>" class="hd-face" target="_blank"><i class="fullicon ficon-facebook"></i></a>
              <a href="<?php echo $instagram; ?>" class="hd-insta" target="_blank"><i class="fullicon ficon-instagram"></i></a>
            </div>
            <nav>
              <ul class="italic ng-cloak" ng-cloak>
                <li ng-repeat="menu in site.menu"><a href="{{menu.link}}" scroll-to ng-class="{'active':menu.active}" title="{{menu.nome}}">{{menu.nome}}</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </header>

      <section id="main-content" class="slider {{slideClass}}" ng-swipe-right="slideRight()">
        <section id="cases" ng-swipe-right="$event.stopPropagation()">
          <ul id="cases-slider">
            <?php $count = 0; ?>
            <?php foreach ($cases as $key => $item) : ?>
              <?php if($count == 6 || count($cases) == $key) : ?>
                  </ul>
                </li>
                <?php $count = 0; ?>
              <?php endif; ?>
              <?php if($count == 0) : ?>
                <li>
                  <ul>
              <?php endif; ?>

                <li style="background-image: url(<?php if ($item->cas_foto) echo base_url() . 'uploads/cases/' . $item->cas_foto; else echo base_url() . 'uploads/cases/' . $item->cas_thumb; ?>)">
                  <?php if($item->cas_video != "") : ?>
                  <a href="<?php echo $item->cas_video; ?>" rel="full[cases]" title="<?php echo $item->cas_titulo; ?>">
                    <h2><?php echo $item->cas_titulo; ?></h2>
                  </a>
                  <?php else : ?>
                  <a href="<?php echo base_url() . 'uploads/cases/' . $item->cas_thumb; ?>" rel="full[cases]" title="<?php echo $item->cas_titulo; ?>">
                    <h2><?php echo $item->cas_titulo; ?></h2>
                  </a>
                  <?php endif; ?>
                </li>

              <?php $count++; ?>
            <?php endforeach; ?>
          </ul>
        </section>

        <section id="somos-full">
          <div class="container">
            <div class="row padding-h">
              <div class="col-xs-12 col-sm-12 col-lg-6">
                <h2 class="title">FULL PROPAGANDA.<span>Full agency. Full time.</span></h2>
                <p>A Full Propaganda nasceu com a premissa de ser uma agência completa e, este ano, completa 10 anos de soluções ON, OFF e PROMO. Aqui, nosso desafio é pensar integrado.</p>
                <p>Não é à toa que, todos os dias, nos reabastecemos de novas ideias e criamos o que for preciso para ser o combustível de nossos clientes com estratégias e resultados.</p>
                <p>Vamos começar?</p>
              </div>
              <div class="col-xs-12 col-sm-12 col-lg-6">
                <div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/hR3raC4RaV8?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe></div>
              </div>
            </div>
          </div>
        </section>

        <section id="clientes">
          <div class="container">
            <div class="row padding-h">
              <div class="col-xs-12">
                <h2 class="title title-greem">Clientes</h2>
                <ul>
                  <?php foreach ($clientes as $key => $item) : ?>
                    <?php if($key >= 12) : break; endif; ?>
                    <li class="col-xs-6 col-sm-4"><a href="<?php echo $item->cli_url; ?>" target="_blank"><img src="<?php echo base_url() . 'uploads/clientes/' . $item->cli_thumb; ?>"></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </section>

        <section id="fullanos" ng-swipe-right="$event.stopPropagation()">
          <div class="container">
            <div class="row padding-h">
              <h2 class="title title-gray">Fullanos</h2>
              <ul class="fullanos-slide">
                <?php foreach ($fullanos as $key => $item) : ?>
                  <li><div><img src="<?php echo base_url() . 'uploads/fullanos/' . $item->ful_thumb; ?>" style="width:220px"></div><span class="fl-nome"><?php echo $item->ful_nome; ?></span><span class="fl-cargo"><?php echo $item->ful_cargo; ?></span></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </section>

        <section id="contato">
          <div class="container">
            <div class="row padding-h">
              <div class="col-xs-12 col-sm-4 fale-conosco">
                <h2 class="title title-greem">Fale com a gente</h2>
                <form action="<?php echo base_url(); ?>site/processa_contato" method="post" class="">
                  <input type="text" class="hidden" placeholder="NOME" name="nomecompleto" />
                  <div class="col-xs-12 col-sm-6"><input type="text" name="nome" placeholder="Nome" required /></div>
                  <div class="col-xs-12 col-sm-6"><input type="email" name="email" placeholder="E-mail" required /></div>
                  <div class="col-xs-12"><textarea name="mensagem" placeholder="Mensagem" required ></textarea></div>
                  <div class="col-xs-12"><input type="submit" enviar="Enviar" /></div>
                </form>
                <?php if ($this->session->flashdata('contato-sucesso') != ""): ?>
                  <div class="aviso sucesso"><?php echo $this->session->flashdata('contato-sucesso') ?></div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('contato-erro') != ""): ?>
                  <div class="aviso erro"><?php echo $this->session->flashdata('contato-erro') ?></div>
                <?php endif; ?>
              </div>
              <div class="col-xs-12 col-sm-4 local-full">
                <img src="<?php echo $images_url ?>icon-local.png">
                <address>Rua C-178 nº366, Setor Nova Suíça<br>
                CEP 74270-080, Goiânia-GO<br>
                <?php echo $email; ?></address>
              </div>
              <div class="col-xs-12 col-sm-4 seja-um-fullano">
                <h2 class="title title-greem">Seja um Fullano</h2>
                <div class="table">
                  <div class="icon table-cell"><img src="<?php echo $images_url ?>icon-usuario.png"></div>
                  <div class="form table-cell">
                    <form action="<?php echo base_url(); ?>site/processa_trabalheconosco/" enctype="multipart/form-data" method="post">
                      <input type="text" class="hidden" placeholder="NOME" name="nomecompleto" />
                      <div class="col-xs-12"><input type="email" name="email" placeholder="E-mail" required /></div>
                      <div class="col-xs-12"><input type="file" name="userfile" required ></div>
                      <div class="col-xs-12"><input type="submit" enviar="Enviar" /></div>
                    </form>
                  </div>
                </div>
                <?php if ($this->session->flashdata('trabalhe-sucesso') != ""): ?>
                  <div class="aviso sucesso"><?php echo $this->session->flashdata('trabalhe-sucesso') ?></div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('trabalhe-erro') != ""): ?>
                  <div class="aviso erro"><?php echo $this->session->flashdata('trabalhe-erro') ?></div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </section>

        <section id="localizacao">
          <div class="container"></div>
          <div id="loc-full"></div>
        </section>

        <div id="block-slider" class="{{slideClass}} hidden-md hidden-lg" ng-click="slideRight()" ng-swipe-left="slideRight()"></div>
      </section> <!-- #main-content -->
    </section> <!-- #main -->
    <script src="<?php echo $js_url ?>jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>angular.min.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>angular-touch.min.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>fullangular.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>slick.min.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>jquery.prettyPhoto.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>fullscripts.js" type="text/javascript"></script>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
      function initialize() {
        var mapOptions = {
          zoom: 15,
          scrollwheel: false,
          center: new google.maps.LatLng(-16.719498,-49.273145)
        }
        var map = new google.maps.Map(document.getElementById('loc-full'),
        mapOptions);

        var image = '<?php echo $images_url ?>local.png';
        var myLatLng = new google.maps.LatLng(-16.719498,-49.273145);
        var beachMarker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: image
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </body>
</html>
