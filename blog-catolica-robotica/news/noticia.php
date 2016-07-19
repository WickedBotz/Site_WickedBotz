<?php
   @header( 'Content-Type: text/html; charset=UTF-8' );
   require_once 'database/mysql.php';
   $db = new Mysql;
?>

<?php
$db = new Mysql;
$nid_noticia = $_GET['id'];
$db->query("select * from noticia where noticia_id = $nid_noticia")->fetchAll();
if ($db->rows >= 1):
  $n = (object) $db->data[0];
  $n->noticia_content_cut = $db->cut($n->noticia_content, 300, '...');
  if ($n->noticia_foto == "" || strlen($n->noticia_foto) <= 1):
    $n->noticia_foto = "images/nopic.png";
  else :
    $n->noticia_foto = "fotos/$n->noticia_foto";
  endif;
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Luiz Almeida">
      <title><?=$n->noticia_title ?></title>
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
               <a class="navbar-brand" href="index.php"><img src="../img/logo/wickedbotz.png" alt="" style="margin-top: -10px"/></a><a href="#"></a>
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
      <header class="intro-header" style="background-image: url('../img/logo/noticia.png')">
          <div class="container">
              <div class="row">
                  <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                      <div class="page-heading">
                          <h2>Noticias</h2>
                          <hr class="small">
                          <span class="subheading"></span>
                      </div>
                  </div>
              </div>
          </div>
      </header>

      <!-- Main Content -->
    <section style="margin-top: -20px">
      <div class="container">
        <div id="news" class="span12" style="margin-top: 10px">

         <div class="media">
           <a  class="pull-left">
             <img height="93" width="122" src="<?= $n->noticia_foto ?>" class="media-object img-polaroid" />
           </a>
           <div class="media-body">
             <h4 align="center"><?=$n->noticia_title ?></h4>
             <p><?=$n->noticia_content ?></p>
             <!-- Botoes de compartilhamento para redes sociais -->
             <!-- AddToAny BEGIN -->
         <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
        <a class="a2a_button_twitter"></a>
         <a class="a2a_button_facebook"></a>
         <a class="a2a_button_google_plus"></a>
         <a class="a2a_button_linkedin"></a>
         </div>
         <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
         <!-- AddToAny END -->
           </div>
         </div>
         <ul class="pager">
           <li class="previous"><a class="frente" href="javascript:history.back()">&larr; Voltar</a></li>
           <?
            $next_id = $n->noticia_id;
            $db->query("select * from noticia where noticia_id > $next_id order by noticia_id asc")->fetchAll();
            if($db->rows >= 1):
            $next_id = $db->data[0]['noticia_id'];
           ?>

           <li class="next"><a class="frente" href="noticia.php?id=<?=$next_id?>">Próxima &rarr;</a></li>
           <?endif;?>
         </ul>
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
