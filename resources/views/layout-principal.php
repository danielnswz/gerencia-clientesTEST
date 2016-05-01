<!DOCTYPE html>
<html ng-app="clientgest">

<head>
  <meta charset="UTF-8">
  <title>Sistema de gestión de Clientes</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />

  <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  <link href="css/nprogress.min.css" rel="stylesheet" type="text/css" />

  <link href="css/skins/skin-red.min.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="css/datatables.bootstrap.min.css">
  <link href="css/sweet-alert.css" rel="stylesheet" type="text/css" />

  <link href="css/style.css" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-red" ng-controller="LayoutController as layout">

  <div class="wrapper fixed">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <!--<a class="logo"><b>Box</b></a>-->

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a class="dropdown-toggle" data-toggle="dropdown">

                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ usuario.nombre }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">

                  <p>
                    {{ usuario.nombre }}
                    <br/>
                    <small>{{usuario.nivel.descripcion}}</small>

                    <small>Ultimo acceso {{ultimaFecha}} a las {{ultimaHora}}</small>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a ng-href="#/perfil/{{usuario.id_usuario}}" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="auth/logout" class="btn btn-default btn-flat">Desconectarse</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar fill-height">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar fill-height">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu fill-height">
          <li class="header">MENU</li>
          <li class="treeview" ng-repeat="menuItem in menuItems">

            <a href="{{menuItem.link}}">
              <i class="{{menuItem.icon}}"></i>{{menuItem.nombre}}

              <span ng-if="menuItem.subniveles !=null && menuItem.subniveles.length > 0" class="fa fa-angle-left pull-right"></span>
              <span ng-if="menuItem.subniveles ==null || menuItem.subniveles.length == 0" class="fa fa-angle-right pull-right"></span>
            </a>

            <ul ng-if="menuItem.subniveles !=null && menuItem.subniveles.length > 0" class="treeview-menu">
              <li ng-repeat="subnivel in menuItem.subniveles">

                <a href="{{subnivel.link}}">
                  <i class="{{subnivel.icon}}"></i>{{subnivel.nombre}}

                </a>

              </li>

            </ul>
          </li>

      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 ng-cloak="">{{ titulo }}
          <small>{{ subtitulo }}</small>
        </h1>
        <ol class="breadcrumb ">

          <li ng-repeat="breadcrumb in breadcrumbs.get() track by breadcrumb.path" ng-class="{ active: $last }">

            <a ng-if="!$last" ng-href="#{{ breadcrumb.path }}" ng-bind="breadcrumb.label" class="margin-right-xs"> </a>
            <span ng-if="$last" ng-bind="breadcrumb.label"></span>

          </li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <ng-view></ng-view>

      </section>
    </div>
  </div>



  <!-- Librerias -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/sweet-alert.min.js"></script>

  <script src="js/nprogress.min.js"></script>
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="plugins/fastclick/fastclick.min.js"></script>
  <script src="js/funciones.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>

  <!-- Librerias de angular -->
  <script src="js/angular-base/angular.min.js"></script>
  <script src="js/angular-base/angular.min.js.map"></script>
  <script src="js/angular-base/angular-route.min.js"></script>
  <script src="js/angular-base/angular-route.min.js.map"></script>
  <script src="js/angular-base/angular-datatables.min.js"></script>
  <script src="js/angular-base/angular-datatables.bootstrap.min.js"></script>
  <script src="js/angular-base/angular-breadcrumb.min.js"></script>
  <script src="js/angular-base/showErrors.min.js"></script>
  <script src="js/angular-base/SweetAlert.min.js"></script>
  <script src="js/angular-base/angular-file-upload.min.js"></script>

  <script src="js/angular-file-upload/angular-file-upload-shim.js"></script>
  <script src="js/angular-file-upload/angular-file-upload.js"></script>

  <!-- Scripts de angular -->
  <script src="angular/clientgest.js"></script>
  

  <!-- Componentes -->
  <!--<script src="angular/components/directives/string-to-integer.js"></script>
  <script src="angular/components/directives/string-to-float.js"></script>
  <script src="angular/components/services/http.service.js"></script>
  <script src="angular/components/services/ingresador.service.js"></script>
  <script src="angular/components/directives/agregar-productos-pedido/agregar-productos-pedido.directive.js"></script>
  <script src="angular/components/directives/editar-productos-pedido/editar-productos-pedido.directive.js"></script>
-->
  <!-- Controladores -->
  <script src="angular/clientes/controller.js"></script>
  <script src="angular/clientes/service.js"></script>
  <!--<script src="angular/usuarios.js"></script>
  <script src="angular/empresa/controller.js"></script>
  <script src="angular/empresa/service.js"></script>

  <script src="angular/sucursal/controller.js"></script>
  <script src="angular/sucursal/service.js"></script>

  <script src="angular/departamento/controller.js"></script>
  <script src="angular/departamento/service.js"></script>
  <script src="angular/departamento/productos/departamento-productos.service.js"></script>
  <script src="angular/departamento/productos/departamento-productos.controller.js"></script>
  <script src="angular/departamento/productos/departamento-productos.add.controller.js"></script>

  <script src="angular/categorias-empresa/categorias-empresa.service.js"></script>
  <script src="angular/categorias-empresa/categorias-empresa.controller.js"></script>

  <script src="angular/categorias-empresa/categoria-productos/categoria-productos.service.js"></script>
  <script src="angular/categorias-empresa/categoria-productos/categoria-productos.controller.js"></script>
  <script src="angular/categorias-empresa/categoria-productos/categoria-productos.add.controller.js"></script>

  <script src="angular/detalle-pedido/detalle-pedido.service.js"></script>
  <script src="angular/detalle-pedido/detalle-pedido.controller.js"></script>

  <script src="angular/carrito-productos/carrito-productos.controller.js"></script>

  <script src="angular/pedido/pedido.service.js"></script>
  <script src="angular/pedido/lista-productos/lista-productos.service.js"></script>
  <script src="angular/pedido/lista-productos/lista-productos.controller.js"></script>
  <script src="angular/pedido/edit/pedido-edit.controller.js"></script>
  <script src="angular/pedido/edit/pedido-edit-add-productos.controller.js"></script>
  <script src="angular/pedido/timeline.controller.js"></script>

  <script src="angular/unidad-medida/unidad-medida.service.js"></script>
  <script src="angular/unidad-medida/unidad-medida.controller.js"></script>
  <script src="angular/categoria-box.js"></script>
  <script src="angular/productos.js"></script>
  <script src="angular/pedidos-lista-por-usr.js"></script>
  <script src="angular/impuesto/controller.js"></script>
  <script src="angular/impuesto/service.js"></script>

  <script src="angular/controles-empresas/controles.constant.js"></script>
  <script src="angular/controles-empresas/controller.js"></script>
  <script src="angular/controles-empresas/service.js"></script>

  <script src="angular/controles-departamentos/controles-departamentos.controller.js"></script>
  <script src="angular/controles-departamentos/controles-departamentos.service.js"></script>

  <script src="angular/controles-departamentos/presupuesto-categorias/presupuesto-categorias.controller.js"></script>
  <script src="angular/controles-departamentos/presupuesto-categorias/presupuesto-categorias.service.js"></script>

  <script src="angular/productos-empresa/productos-empresa.controller.js"></script>
  <script src="angular/productos-empresa/productos-empresa.service.js"></script>

  <script src="angular/reportes/reporte-productos.controller.js"></script>
-->


  <!-- Esta al final para que el threeview del menu se configure correctamente -->
  <!--<script src="js/adminlte.min.js"></script>-->
</body>

</html>
