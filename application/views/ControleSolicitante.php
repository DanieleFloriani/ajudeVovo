<?php
    // Importa o cabeçalho padrao a todas as telas
    $this->load->view('nucleo/header.php');
?>

</head>


<body>  

    <?php
        // Importa o cabeçalho padrao a todas as telas
        $this->load->view('MenuContratante.php');
    ?>
  <div ng-app="appAngular" ng-controller="controllerDetalheServico">	
    <input type="hidden" ng-model="is_contratante" name="is_contratante" ng-init="is_contratante=1" />
    <div class="container">
         <ul  class="collapsible" data-collapsible="accordion"  >
            <li ng-repeat="lista in arrListaServico">
                <div class="collapsible-header" >
                    <!--<i class="large material-icons">-->
                        <img src="{{lista.imagem_pessoa}}" class="circle " width="50" height="50">
                    <!--</i>-->
                     <div class="col s6 col m6 flow-text" >&nbsp; {{lista.servico}}</div>
                        <span ng-show="lista.ativo != 1" class="new badge red" data-badge-caption="" class="left-align">
                           Cancelado! 
                        </span>
                     
                </div>
                <div class="collapsible-body" > 
                     <span ng-show="lista.ativo != 1">
                        <strong>Este serviço foi cancelado pelo ajudante!</strong>
                     </span><br/>
                    Serviço:{{lista.servico}}<br/>
                    Ajudante:{{lista.ajudante}} <br/>
                    Data/Horário:{{lista.dia}} - {{lista.horario_inicio}}&nbsp;até&nbsp;{{lista.horario_fim}} <br/>
                    Situação: {{lista.situacao}} <br/>
                </div>
            </li>
            
        </ul>
    </div>
       

		<!--<div class="row">
                   
                        <div class="col-md-12 col-sm-6">
                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th width="10%">
                                                Serviço
                                            </th>
                                            <th width="10%">
                                                Ajudante
                                            </th>
                                            <th width="6%">
                                                Data - Horário
                                            </th>
                                            <th width="10%">
                                                Situação
                                            </th>
                                            <th width="10%">
                                                &nbsp;
                                            </th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="lista in arrListaServico">
                                            <td title="{{lista.servico}}" >
                                                {{lista.servico}}
                                            </td>
                                            <td width="10%">
                                                {{lista.ajudante}}
                                            </td>
                                            <td width="6%">
                                                {{lista.dia}} - {{lista.horario_inicio}}&nbsp;até&nbsp;{{lista.horario_fim}}
                                            </td>
                                            <td width="10%">
                                                {{lista.situacao}}
                                            </td>
                                            <td width="10%">
                                                <div ng-show="{{lista.id_estado_operacao}} == 5">
                                                    <button 
                                                        title="Finalizar Serviço" 
                                                        ng-click="abrirTelaAvaliacao(lista.id_servico)"
                                                        class="btn btn-info"
                                                        style="font-size: 16px;">
                                                        <span class="glyphicon glyphicon-ok">
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            


        <!-- Modal -->
        <div class="modal fade" id="modalAvaliacao" tabindex="-1" role="dialog" aria-labelledby="modalAvaliacaoLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalAvaliacaoLabel">Realizar Avaliação </h4>
              </div>
              <div class="modal-body" >

                <?php
                    $this->load->view('Avaliacao.php');
                ?>  
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->


    </div>

   <script type="text/javascript" src="../includes/jQuery/jquery.js"></script>    
    <?php
        // Importa o cabeçalho rodape padrao a todas as telas
        $this->load->view('nucleo/footer.php');
    ?> 

    <script type="text/javascript" src="../includes/js/RealizarAvaliacao.service.js"></script>
    <script type="text/javascript" src="../includes/js/ConsultaControleSolicitante.js"></script>
    <script type="text/javascript" src="../includes/js/Avaliacao.controller.js"></script>
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
</body>
</html>
