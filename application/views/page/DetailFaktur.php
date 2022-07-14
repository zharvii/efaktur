<?php
defined('BASEPATH') or exit('No direct script access allowed');

$header = $this->db->get_where('header_faktur', array('no_faktur' => $nofaktur))->row();
$detail = $this->db->get_where('detail_faktur', array('no_faktur' => $nofaktur))->result();
function rupiah($angka)
{

    $hasil_rupiah = number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon -->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/switch/css/bootstrap-toggle.css">
    <title>Scan eFaktur</title>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini fixed">

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
                    <li><a href="<?= base_url('home/qrScan') ?>"><i class="fa fa-qrcode"></i> <span>Scan Qr</span></a></li>
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
                    Faktur Manager
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
                    <li class="active">Faktur Manager</li>
                </ol>
            </section>

            <section class="content container-fluid">
                <div class="box" id="hasil">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> Faktur Pajak
                                    <small class="pull-right" id="tglFaktur">Tanggal Faktur: <?php echo $header->tgl ?></small>
                                </h2>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-5 invoice-col">
                                <h3>Penjual</h3>
                                <address>
                                    <strong>Nama :</strong>
                                    <span id="nmPen"><?php echo $header->nama_pbf ?></span><br>
                                    <strong>Alamat:</strong>
                                    <span id="almPen"><?php echo $header->alamat_lengkap ?></span><br>
                                    <strong>Npwp :</strong>
                                    <span id="npwpPen"><?php echo $header->npwp ?></span><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-5 invoice-col">
                                <h3>Pembeli</h3>
                                <address>
                                    <strong>Nama :</strong>
                                    <span id="nmPem"><?php echo $header->nama ?></span><br>
                                    <strong>Alamat:</strong>
                                    <span id="almPem"><?php echo $header->alamat ?></span><br>
                                    <strong>Npwp :</strong>
                                    <span id="npwpPem"><?php echo $header->npwp_rs ?><span><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-2 invoice-col">
                                <h4><b>Nomor Faktur#</b></h4>

                                <h4 id="noFaktur"><b><?php echo $header->no_faktur ?></b></h4><br>

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
                                        <?php
                                        foreach ($detail as $item) {
                                            ?>

                                            <tr>
                                                <td>
                                                    <h4><?php echo $item->nama ?><br>(<?php echo 'Rp.' . rupiah($item->hargaSatuan) . 'X' . $item->jumlahBarang ?>)</h4>
                                                </td>
                                                <td>
                                                    <h4>:Rp.</h4>
                                                </td>
                                                <td align="right">
                                                    <h4><?php echo rupiah($item->hargaTotal) ?></h4>
                                                </td>
                                            </tr>
                                        <?php } ?>
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
                                                <h4 id="hjl"><?php echo rupiah($header->harga_jual) ?></h4>
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
                                                <h4 id="potonganHarga"><?php echo rupiah($header->diskon) ?></h4>
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
                                                <h4 id="dsrPegenaanPajak"><?php echo rupiah($header->dpp) ?></h4>
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
                                                <h4 id="ppn"><?php echo rupiah($header->ppn) ?></h4>
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
                                                <h4 id="total"><?php echo rupiah($header->ppnbm) ?></h4>
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
                    <div class="box-footer">
                        <button id="kembali" class="btn btn-primary">Kembali</button>

                    </div>
                    <!-- /.box-body -->

                </div>

            </section>
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


        <script src="<?php echo base_url(); ?>assets/bower_components/PACE/pace.min.js"></script>
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap datepicker -->
        <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- bootstrap color picker -->
        <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/switch/js/bootstrap-toggle.js"></script>
        <!-- Page script -->
        <script src="<?php echo base_url(); ?>assets/dist/bs-stepper/dist/js/bs-stepper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.sidebar-menu').tree();
            })
            $(function() {
                //Initialize Select2 Elements
                $('#example2').DataTable();

                $('.select2').select2()

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()

                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })
                //Date range as a button
                $('#daterange-btn').daterangepicker({
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                                'month').endOf(
                                'month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
                    function(start, end) {
                        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                            'MMMM D, YYYY'))
                    }
                )

                //Date picker
                $('#datepicker').datepicker({
                    autoclose: true
                })

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                })
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                })
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                })

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: false
                })

                $('#kembali').click(function() {
                    window.history.back()
                })

            })
        </script>


</body>

</html>