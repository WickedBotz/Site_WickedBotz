<?php
   @header( 'Content-Type: text/html; charset=UTF-8' );
   require_once 'database/mysql.php';
   $db = new Mysql;
   ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Luiz Almeida">
      <title>WickedBotz</title>
      <!-- Bootstrap Core CSS -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="../css/clean-blog.css" rel="stylesheet">
      <link href="../css/feju.css" rel="stylesheet">
      <link href="../css/botoesfeju.css" rel="stylesheet">
      <link href="../css/responsivevideo.css" rel="stylesheet">
      <!-- Custom Fonts -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

      <style media="screen">
      .pagination>li>a, .pagination>li>span{
        color:#811826!important;
      }
      .navbar-default {
      background-color:rgba(103, 12, 29, 0.25);
      border-color: transparent;
      }
      header{
        background: #675F81 none repeat scroll 0% 0%;
      }

      </style>
   </head>
   <body>
      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
         <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Menu de navegação</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="index.php"><img src="../img/logo/wickedbotz.png" alt="" width="" style="margin-top: -10px"/></a><a href="#"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
               <ul class="nav navbar-nav navbar-right" >
                  <li>
                     <a href="index.php">Inicio</a>
                  </li>
                  <li>
                     <a href="../about.html">Sobre</a>
                  </li>
                  <li>
                     <a href="../post.html">Projetos</a>
                  </li>
                  <li>
                     <a href="../album.html">Album</a>
                  </li>
                  <li>
                     <a href="../contact.html">Contato</a>
                  </li>

               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
      </nav>
      <!-- Page Header -->
      <!-- Set your background image for this header on the line below. -->
      <header class="intro-header">
         <section class="content-section video-section">
           <div class="homepage-hero-module">
               <div class="video-container">
                   <div class="title-container">
                       <div class="headline">
                             <h1></h1>

                       </div>
                       <div class="description">
                           <div class="inner"></div>
                       </div>
                   </div>
                   <div class="filter"></div>
                   <video autoplay loop class="fillWidth" muted style="margin-top:-8px">
                       <source src="../img/bg/manfred.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.</video>
                   <div class="poster hidden">
                       <img src="http://www.videojs.com/img/poster.jpg" alt="">
                   </div>
               </div>
           </div>
         </section>
      </header>
      <!-- Main Content -->
    <section style="margin-top: -120px">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
               <?php
                  //$db->url = 'noticias.php';
                  $db->paginate(4);
                  $db->query("select * from  noticia order by noticia_id desc")->fetchAll();
                  if ($db->rows >= 1):
                    $news = $db->data;
                    foreach ($news as $new):
                      $n = (object) $new;
                      $n->noticia_content_cut = $db->cut($n->noticia_content, 300, '...');
                      if ($n->noticia_foto == "" || strlen($n->noticia_foto) <= 1):
                        $n->noticia_foto = "images/nopic.png";
                      else :
                        $n->noticia_foto = "thumb.php?img=fotos/$n->noticia_foto";
                      endif;
                      ?>
               <div class="media">
                  <a  class="pull-left" href="noticia.php?id=<?= $n->noticia_id ?>">
                  <img src="<?= $n->noticia_foto ?>" class="media-object img-polaroid" />
                  </a>
                  <div>
                     <h4 class="text-left"><?=$n->noticia_title ?></h4>
                  </div>
                     <p class="">
                        <small><?=$n->noticia_content_cut ?></small><a href="noticia.php?id=<?= $n->noticia_id ?>" class="btn btn-link">leia mais</a>
                     </p>
               </div>
               <hr class="soften"/>
               <div class="text-center">
                  <?
                     endforeach;
                     echo $db->link;
                     endif;
                     ?>
               </div>
            </div>
         </div>
      </div>
      <div>
    </div>
    </div>
    </section>

      <!-- Footer -->
      <footer>
        <hr>
          <div class="container">
              <div class="row">
                  <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                      <ul class="list-inline text-center">
                          <li>
                              <a class="twt" href="https://twitter.com/WickedbotzSc" target="_blank">
                                  <span class="fa-stack fa-lg">
                                      <i class="fa fa-circle fa-stack-2x"></i>
                                      <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                  </span>
                              </a>
                          </li>
                          <li>
                              <a target="_blank" class="face" href="https://www.facebook.com/WickedBotz/">
                                  <span class="fa-stack fa-lg">
                                      <i class="fa fa-circle fa-stack-2x"></i>
                                      <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                  </span>
                              </a>
                          </li>
                          <li>
                              <a class="git" href="https://github.com/catolicasc" target="_blank">
                                  <span class="fa-stack fa-lg">
                                      <i class="fa fa-circle fa-stack-2x"></i>
                                      <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                  </span>
                              </a>
                          </li>
                      </ul>
                      <p class="copyright text-muted" id="ano"></p>
                  </div>
              </div>
          </div>
      </footer>


      <!-- jQuery -->
      <script src="../js/jquery.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="../js/bootstrap.min.js"></script>
      <!-- Custom Theme JavaScript -->
      <script src="../js/clean-blog.min.js"></script>
      <script src="../js/feju.js"></script>
      <script src="../js/freelancer.js"></script>
      <script src="../js/responsivovideo.js"></script>

      <script type="text/javascript">

      $(document).ready(function() {
      $('#subir').click(function(){
      $('html, body').animate({scrollTop:0}, 'slow');
    return false;
       });
       });
      </script>
   </body>
</html>
