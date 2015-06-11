<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
# fazer um fieldset aqui para as opções do usuario
echo '<div class="container-fluid" id="links">'
     .'<nav>'
        .'<ul class="ulAdm">'
        .'<li class="liAdm">';
          echo anchor("despesas/listaDespesas", "Visualizar Despesas", array("class" => "btn btn-link"));
          echo
         '</li>'
         .'<li class="liAdm">';
          echo anchor("despesas/formDespesa", "Incluir Despesa", array("class" => "btn btn-link"));
          echo
         '</li>'
        .'</ul>'
     .'</nav>'        
    . '</div>';
   