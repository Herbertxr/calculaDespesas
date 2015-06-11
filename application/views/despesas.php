<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="<?= base_url("style/css/bootstrap.css"); ?>" />
        <link rel="stylesheet" href="<?=  base_url("style/styleponto.css") ;?>" />
         <script type="text/javascript" src="<?=  base_url("style/meuJs.js"); ?>" ></script>
        <script src="<?= base_url("style/js/jquery.min.js"); ?>" ></script>
        <script src="<?=  base_url("style/js/bootstrap.min.js"); ?>" ></script>
        
        <!--carrega para campo data -->
  <link rel="stylesheet" href="<?= base_url("style/css/jquery-ui.css"); ?>" />
  <script src="<?= base_url("style/js/jquery-1.10.2.js"); ?>" ></script>
  <script src="<?= base_url("style/js/jquery-ui.js"); ?>" > </script>
        <title>Visualizador de Despesas - Opeções do Usuário</title>
        
        <script>
  $(function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
  });
  $(function(){ 
      $("#corpo").hide();
    });
  $(function(){
     $("#btnCancel").on("click", function(){
        var loc = '/calculadespesas/index.php/formularios/retornaUserInicial';  
        $(window.document.location).attr('href', loc);
          
     }) ;
  });
  
  </script>
    </head>
        <body>
            <div class="container">
                
            <?php  
            #exibe o formulario se existe a flash data criada no despesas/formDespesa
            if($this->session->flashdata("formDespesa")):
            
                $user = array();
               $user =  $this->session->userdata("UsuarioX");
               
            
            echo '<h5 class="alert-success flashHeader">'; 
                if($this->session->flashdata("DespesaOK")){ echo 'Parabens!!';}
            echo ' ';
            echo $user["NOME"];
            
            echo '</h5>';
            echo anchor("logout","sair", array("class" => "btn btn-primary logout"));
            ?>
               
            <h1 class="h1">Bem Vindo ao seu painel de despesas</h1>
     
            
            <?php $this->load->view("headerUsuario");?>
            <?php $drop = array('dropDo' => $dropD);?>
            <?php $this->load->view("formDespesa", $drop);?>
            <?php else :
               
                echo 'error';
     #redirect("/")  ;
                ?>
            
            <?php endif;
            ?>
            
            <?php if($this->session->flashdata("DespesaOK") ==0){ 
                #mostra o faixa que a despesa foi incluida com sucesso
           echo '<script>$(function(){$("#corpo").hide();})</script>';    
                }else {
                    echo '<div class="container-fluid" id="corpo">
                        <h3 class="alert alert-success">Despesa Cadastrada</h3>
                        </div>';
                     echo '<script>$(function(){$("#corpo").show();})</script>';
                }
             ?>
            
                  
            </div>
            
        </body>
</html>



