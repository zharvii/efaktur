<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Scan eFaktur</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/pace/pace.min.css">

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
                    <li class="active"><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
                    <li><a href="<?= base_url('home/qrScan') ?>"><i class="fa fa-qrcode"></i> <span>Scan Qr</span></a></li>
                    <li><a href="<?= base_url('home/ExportFaktur') ?>"><i class="fa fa-download"></i> <span>Export Faktur</span></a></li>
                    <li><a href="<?= base_url('home/ManagelistView') ?>"><i class="fa  fa-folder-o"></i> <span>Faktur Manager</span></a></li>
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
                    Home
                    <small>Scan Faktur Rs.Rahman-Rahim</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard active"></i> Home</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <?php
                $fts = $this->db->get('header_faktur')->num_rows();
                $fbe = $this->db->get_where('header_faktur', array('exported' => 0))->num_rows();
                $fse = $this->db->get_where('header_faktur', array('exported' => 1))->num_rows();
                ?>

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">History</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>

                    <!-- Dashboard -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-4 col-xs-4">
                                <i class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3><?php echo $fts; ?></h3>

                                        <p>Faktur Telah Di Scan</p>
                                    </div>
                                    <i class="icon">
                                        <i class="fa fa-bookmark"></i>
                                    </i>
                                    <a href="#" class="small-box-footer">
                                    </a>
                                </i>
                                <!-- /.info-box -->
                            </div>

                            <div class="col-lg-4 col-xs-4">
                                <i class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3><?php echo $fbe; ?></h3>

                                        <p>Faktur Belum Di Export</p>
                                    </div>
                                    <i class="icon">
                                        <i class="fa  fa-list"></i>
                                    </i>
                                    <a href="#" class="small-box-footer">
                                    </a>
                                </i>
                                <!-- /.info-box -->
                            </div>

                            <div class="col-lg-4 col-xs-4">
                                <i class="small-box bg-green">
                                    <div class="inner">
                                        <h3><?php echo $fse; ?></h3>

                                        <p>Faktur Sudah Di Export</p>
                                    </div>
                                    <i class="icon">
                                        <i class="fa fa-download"></i>
                                    </i>
                                    <a href="#" class="small-box-footer">

                                    </a>
                                </i>
                                <!-- /.info-box -->
                            </div>


                            <!-- ./col -->

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->
                </div>

                <br><br><br>

                <center>
                    <style>
                        .btn-xlarge {
                            padding: 18px 28px;
                            font-size: 22px;
                            line-height: normal;
                            -webkit-border-radius: 8px;
                            -moz-border-radius: 8px;
                            border-radius: 8px;
                        }

                        /* .btn {
                            border: 2px solid black;
                            background-color: white;
                            color: black;
                            cursor: pointer;
                        } */

                        /* Green */
                        .success {
                            border-color: #4CAF50;
                            color: green;
                        }

                        .success:hover {
                            background-color: #4CAF50;
                            color: white;
                        }

                        /* Blue */
                        .info {
                            border-color: #2196F3;
                            color: dodgerblue
                        }

                        .info:hover {
                            background: #2196F3;
                            color: white;
                        }

                        /* Orange */
                        .warning {
                            border-color: #ff9800;
                            color: orange;
                        }

                        .warning:hover {
                            background: #ff9800;
                            color: white;
                        }

                        /* Red */
                        .danger {
                            border-color: #f44336;
                            color: red
                        }

                        .danger:hover {
                            background: #f44336;
                            color: white;
                        }

                        /* Gray */
                        .default {
                            border-color: #e7e7e7;
                            color: black;
                        }

                        .default:hover {
                            background: #e7e7e7;
                        }
                    </style>
                    <a href="<?php echo base_url('home/qrScan') ?>" class="btn info btn-xlarge">Scan Faktur</a>
                </center>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> edit
            </div>
            <strong>Copyright &copy; 2019 <a href="#">Zharvi Achmadha</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
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

                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>

    <!-- REQUIRED JS SCRIPTS -->


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
            // $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            //     return {
            //         "iStart": oSettings._iDisplayStart,
            //         "iEnd": oSettings.fnDisplayEnd(),
            //         "iLength": oSettings._iDisplayLength,
            //         "iTotal": oSettings.fnRecordsTotal(),
            //         "iFilteredTotal": oSettings.fnRecordsDisplay(),
            //         "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            //         "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            //     };
            // };

            // var table = $("#mytable").dataTable({
            //     initComplete: function() {
            //         var api = this.api();
            //         $('#mytable_filter input')
            //             .off('.DT')
            //             .on('input.DT', function() {
            //                 api.search(this.value).draw();
            //             });
            //     },
            //     oLanguage: {
            //         sProcessing: '<p style="color: green"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></p><span class="sr-only">Loading…</span>'
            //     },
            //     search: {
            //         "caseInsensitive": false
            //     },
            //     responsive: true,
            //     autoWidth: false,
            //     pageLength: 100,
            //     processing: true,
            //     serverSide: true,
            //     ajax: {
            //         "url": "<?php echo base_url() . 'users/get_guest_json' ?>",
            //         "type": "POST"
            //     },
            //     columns: [{
            //             "data": "namauser"
            //         },
            //         {
            //             "data": "namalengkap"
            //         },
            //         {
            //             "data": "bagian"
            //         },

            //         {
            //             "data": "view"
            //         }

            //     ],

            //     order: [
            //         [1, 'asc']
            //     ],
            //     fnDrawCallback: function() {
            //         $('.toggle-demo').bootstrapToggle();
            //     },
            //     rowCallback: function(row, data, iDisplayIndex) {
            //         var info = this.fnPagingInfo();
            //         var page = info.iPage;
            //         var length = info.iLength;
            //         $('td:eq(0)', row).html();
            //     }

            // });


            // $('#mytable').on('change', '.toggle-demo', function() {
            //     var id = $(this).data('id');
            //     var param = $(this).data('param');
            //     $.ajax({
            //         url: "<?php echo base_url(); ?>users/edit_password_expired",
            //         method: "POST",
            //         dataType: 'json',
            //         data: {
            //             id: id,
            //             param: param
            //         },
            //         success: function(data) {
            //             if (data == 1) {
            //                 $('#mytable').DataTable().ajax.reload();
            //             }
            //         }
            //     });
            // });


            // $('#mytable').on('click', '.detail', function() {
            //     var param = $(this).data('param');
            //     var date = $(this).data('date');
            //     var time = $(this).data('time');

            //     $("#detailTglPembuatan").text(date);
            //     $("#detailUserId").text(time);
            //     if (param == 't') {
            //         $("#detailExpired").text('Aktif');
            //         $("#detailstatus").text('Aktif');
            //     } else if (param == 'f') {
            //         $("#detailExpired").text('Nonaktif');
            //         $("#detailstatus").text('Nonaktif');
            //     }

            //     $('#modal-detail').modal('show');

            // });

            // $('#mytable').on('click', '.edit', function() {
            //     var id = $(this).data('id');
            //     window.location.assign("<?php echo base_url() . 'users/editUser?param=' ?>" + id);
            // });

        })
    </script>
</body>

</html>