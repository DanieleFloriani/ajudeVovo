var app =  angular.module(
	"appAngular",
 	[
 		'angular-loading-bar'
 	]
);

app.controller("controllerCategoria", function($scope, $http) {

    $scope.__construct = function() {

        $scope.id_categoria = null;
        $scope.is_alterar = false;
        $scope.arrListaCategoria = [];

        $scope.categorias();
    };

    $scope.categorias = function() {
        $http.post(
            '../Categoria/categorias'
        ).success(function (data) {
            $scope.arrCategorias = data;
            $scope.cancelar;
        });
    };

    $scope.salvarCategoria = function() {
        if ($scope.form_categoria.$invalid) {
            return;
        }

        var arrCategoriaSalvar = {
            'descricao' : $scope.descricao,
            'taxa' : $scope.taxa
        }        

        $http.post(
            '../Categoria/salvar',
            arrCategoriaSalvar
        ).success(function (data) {
            $scope.arrCategorias = data;
            $scope.cancelar();
        });
    };

    $scope.alterarCategoria = function() {
        var arrCategoriaAlterar = {
            'id_categoria' : $scope.id_categoria,
            'descricao' : $scope.descricao,
            'taxa' : $scope.taxa
        }

        $http.post(
            '../Categoria/alterar',
            arrCategoriaAlterar
        ).success(function (data) {
            $scope.arrCategorias = data;
            $scope.cancelar();
        });
    };

    $scope.excluirCategoria = function() {
        var arrCategoriaExcluir = {
            "id_categoria" : $scope.id_categoria
        }

        $http.post(
            '../Categoria/excluir',
            arrCategoriaExcluir
        ).success(function (data) {
            $('#modal_excluir').modal('toggle');
            $scope.arrCategorias = data;
        });
    }

    $scope.cancelar = function () {
        $scope.is_alterar = false;
        $scope.id_categoria = null;
        $scope.descricao = null;
        $scope.taxa = null;
    }

    $scope.carregarAlterar = function(categoria) {
        $scope.is_alterar = true;
        $scope.id_categoria = categoria.id_categoria;
        $scope.descricao = categoria.descricao;
        $scope.taxa = categoria.taxa;
    };

    $scope.carregarExcluir = function(categoria) {
        $scope.id_categoria = categoria.id_categoria;
    };

    angular.element(document).ready(function () {
		$scope.__construct();	
	});
});