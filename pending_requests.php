<?php
require_once("./base/header.php");

if(isset($_SESSION['user_role']) && $_SESSION['user_role'] !== "administrator"){
    echo "<script>
       location.assign('index.php');
    </script>";
}
?>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Basic Tables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Pending Requests</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Application No.</th>
                                            <th>Date Generated</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="table-user">
                                                <img src="./images/avatar.jpg" alt="table-user"
                                                    class="me-2 rounded-circle" />
                                                Risa D. Pearson
                                            </td>
                                            <td>AC336 508 2157</td>
                                            <td>July 24, 1950</td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-primary btn-sm">Approve</a>
                                                <a href="" class="btn btn-danger btn-sm">Reject</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-user">
                                                <img src="./images/avatar.jpg" alt="table-user"
                                                    class="me-2 rounded-circle" />
                                                Risa D. Pearson
                                            </td>
                                            <td>AC336 508 2157</td>
                                            <td>July 24, 1950</td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-primary btn-sm">Approve</a>
                                                <a href="" class="btn btn-danger btn-sm">Reject</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-user">
                                                <img src="./images/avatar.jpg" alt="table-user"
                                                    class="me-2 rounded-circle" />
                                                Risa D. Pearson
                                            </td>
                                            <td>AC336 508 2157</td>
                                            <td>July 24, 1950</td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-primary btn-sm">Approve</a>
                                                <a href="" class="btn btn-danger btn-sm">Reject</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-user">
                                                <img src="./images/avatar.jpg" alt="table-user"
                                                    class="me-2 rounded-circle" />
                                                Risa D. Pearson
                                            </td>
                                            <td>AC336 508 2157</td>
                                            <td>July 24, 1950</td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-primary btn-sm">Approve</a>
                                                <a href="" class="btn btn-danger btn-sm">Reject</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->

    </div> <!-- content -->
</div>

<?php
    require_once("./base/footer.php");
    ?>