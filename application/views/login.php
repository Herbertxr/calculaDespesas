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
        <script src="<?=  base_url("style/js/bootstrap.min.js"); ?> " ></script>
        <title>Visualizador de Despesas</title>
	</head>
	<body>
            <div class="container">
                <?php if($this->session->flashdata("sucesso")) : ?>
                <h5 class="alert alert-danger"><?=$this->session->flashdata("sucesso");?></h5>
                <?php endif; $this->load->view("formularios.php"); ?>
                <?php if($this->session->flashdata("error")) : ?>
                <h5 class="alert alert-danger"><?=$this->session->flashdata("error");?></h5>
                <?php endif; ?>
            </div>
	</body>
</html>

