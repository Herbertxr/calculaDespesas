<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="<?= base_url("style/css/bootstrap.css"); ?>" />
        <link rel="stylesheet" href="<?=  base_url("style/styleponto.css") ;?>" />
         <script type="text/javascript" src="<?=  base_url("style/meuJs.js"); ?>" ></script>
        <script src="<?= base_url("style/js/jquery.min.js"); ?>" ></script>
        <script src="<?=  base_url("style/js/bootstrap.min.js"); ?>" ></script>
        <script src="<?= base_url("style/js/carouselCycle.js"); ?>" ></script>
        <script src="<?= base_url("style/js/carouselFlipcycle.js"); ?>" ></script>
        <title>Visualizador de Despesas - Opeções do Usuário</title>
    </head>
        <body>
            <div class="container">
                <?php if($this->session->flashdata("error")) : ?>
                <h5 class="alert alert-danger"><?=$this->session->flashdata("error");?></h5>
                <?php endif;?>
            <?php
            if($this->session->userdata("UsuarioX")):
            
                $user = array();
               $user =  $this->session->userdata("UsuarioX");
               
            
            echo '<h5 class="alert-success flashHeader">'; 
            echo ' ';
            echo $user["NOME"]. '!!!';
            
            echo '</h5>';
            echo anchor("logout","sair", array("class" => "btn btn-primary logout"));
            ?>
               
            <h1 class="h1">Bem Vindo ao seu painel de despesas</h1>
            <?php $this->load->view("headerUsuario");?>
            
             <div id="myCarousel" class="carousel slide container">
    <!-- Itens de carousel -->
    <div class="carousel-inner">
        <!-- ITEM 1-->
    <div class="item">
    <!-- Itens de carousel IMAGEM
    <img src="img/imgfundo.jpg" /> -->
     <div class="carousel-capition">
        <h3>Vai Corinthians</h3>
     </div>
    </div>
    <!-- ITEM 2-->
    <div class="item active">

     <div class="carousel-capition">
        <h3>Vai Corinthians</h3>
      </div>

        <div class="carouseIn">
         <h4>HRJ SYSTEM</h4>
         <p>Confira</p>
        </div>
    </div>
    <div class="item">
    <div class="carousel-capition">
        <h3>Vai Corinthians</h3>
     </div>
          <div class="carouseIn">
          <h4>Segurança da Informação</h4>
          <p>Caso de sucesso em segurança da informação</p>
          </div>
    </div>

    </div>
    <!-- Navegador do carousel -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

     #aqui div fixa
     <div class="carouselFixa">
         <h3 class="carouselFixo">HRJ SOFTWARE HOUSE</h3>
     </div>
    </div>
            
            
            
            
            
            </div>
            <!--
            <div class="container-fluid cycle-slideshow" data-cycle-timeout="2000" data-cycle-fx="flipHorz" id="corpo">
                    <img src="http://malsup.github.io/images/p1.jpg">
                    <img src="http://malsup.github.io/images/p2.jpg">
                    <img src="http://malsup.github.io/images/p3.jpg">
            </div>
            -->
            
   
            
            
            
            
            
            <?php else :
                $this->session->set_flashdata("sucesso", "Usuario ou senha invalida");
     redirect("/")  ;
                ?>
            
            <?php endif; ?>
           
        </body>
</html>
