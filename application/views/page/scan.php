   <div class="wrapper">

       <!-- Main Header -->
       <header class="main-header">

           <!-- Logo -->
           <a href="#" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini"><b>E</b>F</span>
               <!-- logo for regular state and mobile devices -->
               <span class="logo-lg"><b>Scan</b> eFaktur</span>
           </a>

           <!-- Header Navbar -->
           <nav class="navbar navbar-static-top" role="navigation">
               <!-- Sidebar toggle button-->
               <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                   <span class="sr-only">Toggle navigation</span>
               </a>
               <div class="navbar-custom-menu">
                   <ul class="nav navbar-nav">

                       <li class="dropdown user user-menu">
                           <!-- Menu Toggle Button -->
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <!-- The user image in the navbar-->
                               <img src="<?php echo base_url(); ?>assets/dist/img/amb.jpg" class="user-image" alt="User Image">
                               <!-- hidden-xs hides the username on small devices so only the image appears. -->
                               <span class="hidden-xs">Ambergis</span>
                           </a>
                           <ul class="dropdown-menu">
                               <!-- The user image in the menu -->
                               <li class="user-header">
                                   <img src="<?php echo base_url(); ?>assets/dist/img/amb.jpg" class="img-circle" alt="User Image">

                                   <p>
                                       Ambergis
                                       <small>Member since Nov. 2012</small>
                                   </p>
                               </li>
                               <!-- Menu Body -->

                               <!-- Menu Footer-->
                               <li class="user-footer">

                                   <a href="<?php echo base_url('auth/logout') ?>" class="btn btn-lg btn-default btn-flat">Sign out</a>
                               </li>
                           </ul>
                       </li>

                   </ul>
               </div>
           </nav>
       </header>
       <!-- Left side column. contains the logo and sidebar -->
       <aside class="main-sidebar">

           <!-- sidebar: style can be found in sidebar.less -->
           <section class="sidebar">

               <!-- Sidebar user panel (optional) -->
               <div class="user-panel">
                   <div class="pull-left image">
                       <img src="<?php echo base_url(); ?>assets/dist/img/amb.jpg" alt="User Image">
                   </div>
                   <div class="pull-left info">
                       <p>Ambergis</p>
                       <!-- Status -->
                       <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                   </div>
               </div>


               <!-- Sidebar Menu -->
               <ul class="sidebar-menu" data-widget="tree">
                   <li class="header">Menu</li>
                   <!-- Optionally, you can add icons to the links -->
                   <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
                   <li class="active"><a href="<?= base_url('home/qrScan') ?>"><i class="fa fa-qrcode"></i> <span>Scan Qr</span></a></li>
                   <li><a href="<?= base_url('home/ExportFaktur') ?>"><i class="fa fa-download"></i> <span>Export Faktur</span></a></li>
                   <li><a href="<?= base_url('home/ManagelistView') ?>"><i class="fa fa-folder-o"></i> <span>Faktur Manager</span></a></li>
               </ul>
               <!-- /.sidebar-menu -->
           </section>
           <!-- /.sidebar -->
       </aside>

       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
           <!-- Content Header (Page header) -->
           <section class="content-header">
               <h1>
                   Scan Faktur
               </h1>
               <ol class="breadcrumb">
                   <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
                   <li class="active">Scan Faktur</li>
               </ol>
           </section>

           <!-- Main content -->
           <section class="content container-fluid">
               <div>
                   <div class="pull-right" style="margin-left:5px">
                       <button type="button" class="btn btn-success" id="selesai" style="display:none;">Selesai</button>
                   </div>
                   <div class="input-group">
                       <span class="input-group-addon"><i class="fa fa-qrcode"></i></span>
                       <input type="text" class="form-control" id="oke" placeholder="Pindai Barcode Faktur">
                   </div>
               </div>





               <br>
               <div class="box" id="hasil">
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="row">
                           <div class="col-xs-12">
                               <h2 class="page-header">
                                   <i class="fa fa-globe"></i> Faktur Pajak
                                   <small class="pull-right" id="tglFaktur">Tanggal Faktur: 08/02/2019</small>
                               </h2>
                           </div>
                           <!-- /.col -->
                       </div>
                       <div class="row invoice-info">
                           <div class="col-sm-5 invoice-col">
                               <h3>Penjual</h3>
                               <address>
                                   <strong>Nama :</strong>
                                   <span id="nmPen"></span><br>
                                   <strong>Alamat:</strong>
                                   <span id="almPen"></span><br>
                                   <strong>Npwp :</strong>
                                   <span id="npwpPen"></span><br>
                               </address>
                           </div>
                           <!-- /.col -->
                           <div class="col-sm-5 invoice-col">
                               <h3>Pembeli</h3>
                               <address>
                                   <strong>Nama :</strong>
                                   <span id="nmPem"></span><br>
                                   <strong>Alamat:</strong>
                                   <span id="almPem"></span><br>
                                   <strong>Npwp :</strong>
                                   <span id="npwpPem"><span><br>
                               </address>
                           </div>
                           <!-- /.col -->
                           <div class="col-sm-2 invoice-col">
                               <h4><b>Nomor Faktur#</b></h4>

                               <h4 id="noFaktur"><b>0001918184347</b></h4><br>

                           </div>
                           <!-- /.col -->
                       </div>
                       <!-- /.row -->

                       <!-- Table row -->
                       <div class="row">
                           <div class="col-xs-12 table-responsive">
                               <style>
                                   #tbl {
                                       font-weight: normal !important;
                                   }

                                   #tbl thead tr th {
                                       font-weight: bold !important;
                                       padding-bottom: 10px !important;
                                   }

                                   #tbl tfoot tr th {
                                       font-weight: bold !important;
                                       padding-top: 10px !important;
                                   }
                               </style>
                               <table class="table" id="tbl">
                                   <thead>

                                       <tr>

                                           <th>
                                               <h4><b>Nama Barang Kena Pajak</b> </h4>
                                           </th>
                                           <th colspan="6">
                                               <h4><b>Harga Jual</b></h4>
                                           </th>

                                       </tr>
                                   </thead>

                                   <tbody>

                                   </tbody>

                                   <tfoot>
                                       <tr>
                                           <td colspan="3">
                                               <hr style="height:1px;border:none;color:#333;background-color:#333;">
                                           </td>
                                       </tr>
                                       <tr>
                                           <th>
                                               <h4>Harga Jual</h4>
                                           </th>

                                           <td>
                                               <h4>:Rp.</h4>
                                           </td>
                                           <td align="right">
                                               <h4 id="hjl"></h4>
                                           </td>
                                       </tr>
                                       <tr>
                                           <th>
                                               <h4>Potongan Harga</h4>
                                           </th>

                                           <td>
                                               <h4>:Rp.</h4>
                                           </td>
                                           <td align="right">
                                               <h4 id="potonganHarga"></h4>
                                           </td>
                                       </tr>
                                       <tr>
                                           <th>
                                               <h4>Dasar Pengenaan Pajak</h4>
                                           </th>


                                           <td>
                                               <h4>:Rp.</h4>
                                           </td>
                                           <td align="right">
                                               <h4 id="dsrPegenaanPajak"></h4>
                                           </td>
                                       </tr>

                                       <tr>
                                           <th>
                                               <h4>PPN = 10% x Dasar Pengenaan pajak</h4>
                                           </th>


                                           <td>
                                               <h4>:Rp.</h4>
                                           </td>
                                           <td align="right">
                                               <h4 id="ppn"></h4>
                                           </td>
                                       </tr>
                                       <tr>
                                           <th>
                                               <h4>Total PPnBM</h4>
                                           </th>


                                           <td>
                                               <h4>:Rp.</h4>
                                           </td>

                                           <td align="right">
                                               <h4 id="total"></h4>
                                           </td>
                                       </tr>
                                   </tfoot>
                               </table>
                               <br>
                               <!-- <hr style="height:1px;border:none;color:#333;background-color:#333;"> -->
                               <!-- <table class="table table-striped">

                               </table> -->
                           </div>
                           <!-- /.col -->
                       </div>
                       <!-- /.row -->

                       <div class="row">
                           <!-- accepted payments column -->

                           <!-- /.col -->
                           <!-- <div class="col-xs-12">


                               <div class="table-responsive">
                                   <table class="table">
                                       <tr>
                                           <th>
                                               <h2>Total</h2>
                                           </th>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>

                                           <td>
                                               <h2 id="total"></h2>
                                           </td>
                                       </tr>

                                   </table>
                               </div>
                           </div> -->
                           <!-- /.col -->
                       </div>
                       <!-- /.row -->

                       <!-- this row will not appear when printing -->

                   </div>
                   <!-- /.box-body -->

               </div>
           </section>
           <!--------------------------
        | Your Page Content Here |
        -------------------------->

           </section>
           <!-- /.content -->
       </div>
       <!-- /.content-wrapper -->

       <!-- Main Footer -->
       <footer class="main-footer">
           <!-- To the right -->
           <div class="pull-right hidden-xs">
               Anything you want
           </div>
           <!-- Default to the left -->
           <strong>Copyright &copy; 2019 <a href="#">Zharvi Achmadha</a>.</strong> All rights reserved.
       </footer>

       <!-- Control Sidebar -->
       <aside class="control-sidebar control-sidebar-dark">
           <!-- Create the tabs -->
           <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
               <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
               <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
           </ul>
           <!-- Tab panes -->
           <div class="tab-content">
               <!-- Home tab content -->
               <div class="tab-pane active" id="control-sidebar-home-tab">
                   <h3 class="control-sidebar-heading">Recent Activity</h3>
                   <ul class="control-sidebar-menu">
                       <li>
                           <a href="javascript:;">
                               <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                               <div class="menu-info">
                                   <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                   <p>Will be 23 on April 24th</p>
                               </div>
                           </a>
                       </li>
                   </ul>
                   <!-- /.control-sidebar-menu -->

                   <h3 class="control-sidebar-heading">Tasks Progress</h3>
                   <ul class="control-sidebar-menu">
                       <li>
                           <a href="javascript:;">
                               <h4 class="control-sidebar-subheading">
                                   Custom Template Design
                                   <span class="pull-right-container">
                                       <span class="label label-danger pull-right">70%</span>
                                   </span>
                               </h4>

                               <div class="progress progress-xxs">
                                   <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                               </div>
                           </a>
                       </li>
                   </ul>
                   <!-- /.control-sidebar-menu -->

               </div>
               <!-- /.tab-pane -->
               <!-- Stats tab content -->
               <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
               <!-- /.tab-pane -->
               <!-- Settings tab content -->
               <div class="tab-pane" id="control-sidebar-settings-tab">
                   <form method="post">
                       <h3 class="control-sidebar-heading">General Settings</h3>

                       <div class="form-group">
                           <label class="control-sidebar-subheading">
                               Report panel usage
                               <input type="checkbox" class="pull-right" checked>
                           </label>

                           <p>
                               Some information about this general settings option
                           </p>
                       </div>
                       <!-- /.form-group -->
                   </form>
               </div>
               <!-- /.tab-pane -->
           </div>
       </aside>
       <!-- /.control-sidebar -->
       <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
       <div class="control-sidebar-bg"></div>
   </div>
   <!-- ./wrapper -->