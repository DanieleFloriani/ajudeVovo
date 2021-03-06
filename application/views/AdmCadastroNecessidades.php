<?php
    // Importa o cabeçalho padrao a todas as telas
    $this->load->view('nucleo/header.php');
?>
</head>
<body>
   <?php
    // Importa o cabeçalho padrao a todas as telas
    $this->load->view('MenuAdministracao.php');?>
  <div class="user-view">
    <div ng-app="appAngular" ng-controller="ctrlrAdmCadastroNecessidades">
      
      <div class="container">
        <div class="row">
          <form class="col s12" name="form_necessidade">
            <div class="row">
              <div class="input-field col s6">
                <label for="descricao">Descrição</label>
                <input id="descricao" type="text" ng-model="descricao" class="validate">
              </div>
            </div>
            <div class="row">
              <button class="btn waves-effect waves-light" type="submit" ng-click="salvarNecessidade()" name="action" ng-show="!is_alterar">
                Salvar
              </button>
              <button class="btn waves-effect waves-light" type="submit" name="action" ng-click="alterarNecessidade()" ng-show="is_alterar">
                Editar
              </button>
            </div>
          </form>
        </div>

       <table class="responsive-table">
              <tr>
                  <th> Id </th>
                  <th> Descrição <th>
              </tr>
              <tr ng-repeat="lista in arrNecessidadesEspeciais">
                  <td>{{lista.id_necessidade_especial}}</td>
                  <td>{{lista.descricao}}</td>
                  <td>
                      <span style="cursor:pointer;" class="material-icons" ng-click="carregarAlterar(lista)">create</span>
                      
                        <span   style="cursor:pointer;"
                                class="material-icons"
                                data-toggle="modal"
                                data-target="#modal_excluir"
                                ng-click="carregarExcluir(lista)"> delete              
                        </span>
                      
                      
                  </td>
              </tr>
          </table>
          
          <div class="modal" id="modal_excluir_necessidade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="gridSystemModalLabel">Ajude o vovo!!</h4>
                        </div>
                        
                        <div class="modal-content">
                                Deseja excluir este registro?                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="fecharModalExcluir()">Não</button>
                            <button type="button" class="btn btn-success" ng-click="excluirNecessidade()">Sim</button>
                        </div>
                    </div>
                </div>
            </div>       
      </div>
    </div>
  </div>  
  <?php
        // Importa o cabeçalho rodape padrao a todas as telas
        $this->load->view('nucleo/footer.php');
    ?> 
    <script type="text/javascript" src="../includes/js/AdmCadastroNecessidades.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.modal').modal();
      });
    </script>
  </body>
</html>