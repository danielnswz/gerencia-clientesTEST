clientGest.controller('ClienteController', function (
    $scope,
    $routeParams,
    $http,
    $compile,
    $location,
    $upload,
    DTOptionsBuilder,
    DTColumnBuilder,
    DTInstances,
    SharedViewObjectService,
    Cliente) {


    DTInstances.getLast().then(function (dtInstance) {
        $scope.dtInstance = dtInstance;
    });

    // |
    // | VARIABLES
    // |
    $scope.data = {};
    $scope.showForm = false;
    $scope.isLoaded = false;
    $scope.isCreated = false;
    $scope.isEdited = false;


    // |
    // | CONFIGURACION DE DATATABLES
    // |  
    DTInstances.getLast().then(function (dtInstance) {
        $scope.dtInstance = dtInstance;
    });

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withOption('ajax', {
            // Either you specify the AjaxDataProp here
            // dataSrc: 'data',
            url: 'api/cliente/',
            type: 'GET'

        })
        // or here
        .withDataProp('data')
        .withOption('processing', true)
        .withOption('serverSide', true)
        .withOption('createdRow', createdRow)
        .withBootstrap()
        .withPaginationType('full_numbers');

    $scope.dtColumns = [
        DTColumnBuilder.newColumn(0).withTitle('ID'),
        DTColumnBuilder.newColumn(1).withTitle('Nombre'),
        DTColumnBuilder.newColumn(2).withTitle('Apellido'),
        DTColumnBuilder.newColumn(3).withTitle('Correo'),
        DTColumnBuilder.newColumn(4).withTitle('Edad'),
        DTColumnBuilder.newColumn(null).withTitle('Acciones').notSortable().renderWith(function (data, type, full) {
            
            var result={
                id: data[0],
                nombre: data[1],
                apellido: data[2],
                correo: data[3],
                edad: data[4]
            };
            
            return '<button class="btn btn-danger" ng-click=\'delete(' + JSON.stringify(result) + ')\'>' + '<i class="fa fa-trash-o"></i> Eliminar' + '</button>' +
            '&nbsp;<button class="btn btn-warning" ng-click=\'edit(' + JSON.stringify(result) + ')\'>' + '   <i class="fa fa-edit"></i> Editar';

        })

    ];

    function createdRow(row, data, dataIndex) {
        // Recompiling so we can bind Angular directive to the DT
        $compile(angular.element(row).contents())($scope);
    }


    // |
    // | FUNCIONES
    // |
    /**
     *
     *
     */
    $scope.verForm = false;
    $scope.show = false;
    $scope.mostrarForm= function(i){
        if(i==1)
            $scope.verForm = true;
        else
            $scope.verForm = false;
    }


    /**
     *
     */
    $scope.edit = function (departamento) {
        $location.path("gestion-empresas/" + departamento.id_empresa + "/sucursales/" + departamento.id_sucursal +
        "/departamentos/" + departamento.id_departamento + "/editar");
    };

    /**
     *
     */
    $scope.delete = function (cliente) {
        swal({
            title: "¿Estas seguro?",
            text: "¿Realmente deseas eliminar el cliente " + cliente.nombre + cliente.apellido + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminar cliente",
            cancelButtonText: "Cancelar",
            closeOnConfirm: true
        }, function () {
            NProgress.start();
            Cliente.delete(cliente)
                .then(
                function (data) {
                    if (data.success == "true") {
                        swal("Atención", "El cliente fue eliminado exitosamente", "success");
                        $location.path("lista-clientes/");
                    }
                    else {
                        swal("Atención", "Ha ocurrido un error", "error");
                    }
                    NProgress.done();
                },
                function () {
                    swal("Atención", "El cliente no fue eliminado exitosamente", "error");
                    NProgress.done();
                });
        });
    };

});


clientGest.controller('ClienteFormController', function (
    $scope,
    $routeParams,
    $http,
    $compile,
    $location,
    DTOptionsBuilder,
    DTColumnBuilder,
    DTInstances,
    SharedViewObjectService,
    Cliente) {

    //$scope.departamento = SharedViewObjectService.getObject();
    $scope.departamento = {};
    $scope.isLoaded = false;
    $scope.isEdited = false;
    $scope.isCreated = false;

    console.log($scope.departamento);

    $scope.$parent.subtitulo = '';
    $scope.showAlerta = false;
    $scope.errores = null;

    $scope.departamento.id_sucursal = $routeParams.idSucursal;
    $scope.departamento.id_empresa = $routeParams.idEmpresa;

    if($routeParams.idEmpresa && $routeParams.idSucursal && $routeParams.idDepartamento){
        $scope.$parent.titulo = 'Editar departamento';
        $scope.departamento.id_empresa = $routeParams.idDepartamento;
        $scope.isEdited = true;
        NProgress.start();
        Departamento.get($routeParams.idDepartamento, $routeParams.idSucursal, $routeParams.idEmpresa)
            .then(
            function (data) {
                $scope.departamento = data;
                $scope.isLoaded = true;
                NProgress.done();
            },
            function (err) {
                console.log(err);
                swal("Atención", "Ha ocurrido un error", "error");
                NProgress.done();
            }
        );
    }
    else {
        $scope.$parent.titulo = 'Nuevo departamento';
        $scope.isCreated = true;
    }


    /**
     *
     */
    $scope.submit = function (form) {

        console.log(form);
        // validar formulario
        if (form.$valid) {
            console.log($scope.departamento);
            if($scope.isCreated) {
                NProgress.start();
                Departamento.create($scope.departamento)
                    .then(
                    function (data) {
                        if (data.success == "true") {
                            swal("Atención", "Departamento creado exitosamente", "success");
                            $location.path("gestion-empresas/" + $scope.departamento.id_empresa + "/sucursales/" + $scope.departamento.id_sucursal + "/departamentos/");
                        } else {
                            if (data.errors == "codigo") {
                                swal("Atención", "Este codigo se encuentra ya registrado", "error");
                            }
                            else
                                swal("Atención", "Ha ocurrido un error", "error");
                        }
                        NProgress.done();
                    },
                    function (err) {
                        console.log(err);
                        swal("Atención", "Ha ocurrido un error", "error");
                        NProgress.done();
                    }
                );
            }
            else if($scope.isEdited){
                NProgress.start();
                Departamento.edit($scope.departamento)
                    .then(
                    function (data) {
                        if (data.success == "true") {
                            swal("Atención", "Departamento modificado exitosamente", "success");
                            $location.path("gestion-empresas/" + $scope.departamento.id_empresa + "/sucursales/" + $scope.departamento.id_sucursal + "/departamentos/");
                        } else {
                            swal("Atención", "Ha ocurrido un error", "error");
                        }
                        NProgress.done();
                    },
                    function (err) {
                        console.log(err);
                        swal("Atención", "Ha ocurrido un error", "error");
                        NProgress.done();
                    }
                );
            }
        }
    };

});