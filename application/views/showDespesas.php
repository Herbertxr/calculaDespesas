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
           
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Data da Despesa</th>
                    <th>Nome da Despesa</th>
                    <th>Tipo da Despesa</th>
                    <th>Valor</th>
                </tr>
                </thead>
                <?php   
                
                $Totali = array();
                foreach ($despesas as $desp): ?>
                <tr>
                    <td><?php dataBR($desp["DATA_DESPESA"]); ?></td>
                    <td><?= $desp["DESCRICAO"]; ?></td>
                    <td><?= $desp["NOME"]; ?></td>
                    <td><?php valor($desp["PRECO"]); ?></td>
                <?php array_push($Totali, $desp["PRECO"]) ; ?>
                </tr>
                 <?php endforeach; ?>
            </table>
            <?php $Total = array_sum($Totali); valor($Total); ?>
            </div>
            
        </body>
</html>



