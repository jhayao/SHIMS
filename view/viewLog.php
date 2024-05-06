<?php
error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('error_log', 'error.log');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
include_once ('include/head.php');
require_once ('../controller/logController.php');
$log = new Log();
$logs = $log->getLogs();

?>


<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
            alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- --------------------------------------------------- -->
    <!-- Body Wrapper -->
    <!-- --------------------------------------------------- -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- --------------------------------------------------- -->
        <!-- Sidebar Start -->
        <?php include_once ('include/sidebar.php'); ?>
        <!--  Sidebar End -->
        <!-- Main Wrapper -->
        <!-- --------------------------------------------------- -->
        <div class="body-wrapper">
            <!-- --------------------------------------------------- -->
            <!-- Header Start -->
            <!-- --------------------------------------------------- -->
            <?php include_once ('include/header.php'); ?>
            <!-- --------------------------------------------------- -->
            <!-- Header End -->
            <!-- --------------------------------------------------- -->
            <div class="container-fluid">
                <!-- --------------------------------------------------- -->
                <!--  Form Basic Start -->
                <!-- --------------------------------------------------- -->
                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">List of logs</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted " href="dashboard.php">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Logs</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0 lh-sm">List of Logs</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive rounded-2 mb-4">
                            <table id="logTable" class="table w-100 table-striped table-bordered display text-nowrap">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">System Log</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Modified By:</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Modified on:</h6>
                                        </th>
                                        <!-- <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Budget</h6>
                                        </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($logs as $log): ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0 fw-normal fs-4"><?php echo $log['system_log']; ?></p>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <!-- <img src="../../dist/images/profile/user-1.jpg" class="rounded-circle"
                                                        width="40" height="40" /> -->
                                                    <div class="ms-3">
                                                        <h6 class="fs-4 fw-semibold mb-0">
                                                            <?php echo $log['firstname'] . ' ' . $log['middlename'] . ' ' . $log['lastname']; ?>
                                                        </h6>
                                                        <span class="fw-normal"><?php echo $log['role']; ?></span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 fw-normal fs-4"><?php echo $log['created_at']; ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="../../dist/images/profile/user-1.jpg" class="rounded-circle"
                                                    width="40" height="40" />
                                                <div class="ms-3">
                                                    <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                                                    <span class="fw-normal">Web Designer</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">Elite Admin</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#"
                                                    class="bg-secondary text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    S
                                                </a>
                                                <a href="#"
                                                    class="bg-danger text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    D
                                                </a>
                                            </div>
                                        </td>

                                    </tr> -->

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- --------------------------------------------------- -->
                <!--  Form Basic End -->
                <!-- --------------------------------------------------- -->
            </div>
        </div>
        <!-- <div class="dark-transparent sidebartoggler"></div>
        <div class="dark-transparent sidebartoggler"></div> -->
    </div>



    <?php include_once ("./include/extra.php"); ?>
    <?php include_once ("./include/scripts.php"); ?>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <!-- <script src="../../../../../../../cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#logTable').DataTable({
                "order": [[2, "desc"]]
            });

        });
    </script>

</body>

</html>