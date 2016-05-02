<!DOCTYPE html>
<html ng-app="clientgest">

<head>
  <meta charset="UTF-8">
  <title>Sistema de Gestión de Clientes</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="css/skins/skin-blue.min.css">

  <link href="css/nprogress.min.css" rel="stylesheet" type="text/css" />

  <link href="css/skins/skin-red.min.css" rel="stylesheet" type="text/css" />

  <link href="css/sweet-alert.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="plugins/datepicker/datepicker3.css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue" ng-controller="LayoutController as layout">

  <div class="wrapper fixed">

    <!-- Main Header -->
    <header class="main-header">
      <a class="logo" href="/#/">Test</a>
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">

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
        </h1>
        <ol class="breadcrumb ">

          <li ng-repeat="breadcrumb in breadcrumbs.get() track by breadcrumb.path" ng-class="{ active: $last }">
            <a ng-if="!$last" ng-href="#{{ breadcrumb.path }}" ng-bind="breadcrumb.label" class="margin-right-xs"> </a>

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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="plugins/datepicker/bootstrap-datepicker.js"></script>

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

  <script src="js/angular-file-upload/angular-file-upload-shim.js"></script>
  <script src="js/angular-file-upload/angular-file-upload.js"></script>

  <!-- Scripts de angular -->
  <script src="angular/clientgest.js"></script>
  
  <!-- Controladores -->
  <script src="angular/clientes/controller.js"></script>
  <script src="angular/clientes/service.js"></script>

  <!-- Esta al final para que el threeview del menu se configure correctamente -->
  <script src="js/adminlte.min.js"></script>
</body>

</html>
