var clientGest = angular.module("clientgest", ['ngRoute', 'datatables', 'datatables.bootstrap', 'ng-breadcrumbs', 'ui.bootstrap.showErrors', 'oitozero.ngSweetAlert', 'angularFileUpload']);


// configure our routes
clientGest.config(function ($routeProvider) {
  $routeProvider
    .otherwise({
      redirectTo: '/'
    })

  // Dashboard
  .when('/', {
      templateUrl: 'views/index.html',
      controller: 'IndexController',
      label: ''
    
  })
  .when('/crear-clientes',{
    templateUrl: 'views/index.html',
      controller: 'ClienteController',
      label: 'Crear Clientes'
  })
  .when('/lista-clientes',{
      templateUrl: 'views/clientes/index.html',
      controller: 'ClienteController',
      label: 'Lista Clientes'
  });

});

clientGest.run(function (DTDefaultOptions) {
  DTDefaultOptions.setLanguageSource('js/datatables.spanish.txt');
});

clientGest.config(['showErrorsConfigProvider', function (showErrorsConfigProvider) {
  showErrorsConfigProvider.showSuccess(true);
}]);


clientGest.controller('LayoutController', function (
  $scope,
  breadcrumbs,
  $http,
  $location) {

  $scope.breadcrumbs = breadcrumbs;
  $scope.titulo = ' ';
  $scope.subtitulo = ' ';
  $scope.usuario = null;
  $scope.nivel = $('#nivel').val();

  var $uploadMenu = function () {
    

      // Menu del usuario ingresador
      $scope.menuItems = [{
        nombre: "Creación de Clientes",
        link: "#/crear-clientes",
        icon: "fa fa-th-large fa-server"
      }, 
      {
        nombre: "Lista de Clientes",
        link: "#/lista-clientes",
        icon: "fa fa-th-large fa-server"
      }];

    }

    $uploadMenu();


});

clientGest.controller('IndexController', function ($scope, breadcrumbs, $http) {


});

clientGest.service('SharedViewObjectService', function () {

  var object = {};

  var setObject = function (newObj) {
    object = newObj;
  }

  var getObject = function () {
    return object;
  }

  return {
    setObject: setObject,
    getObject: getObject
  };

});

NProgress.configure({
  parent: '.main-header'
});
