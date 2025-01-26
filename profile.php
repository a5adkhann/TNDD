<?php
require_once("./base/header.php");

if(!isset($_SESSION['student_user_email'])){
    echo "<script>
       location.assign('login.php');
    </script>";
}
?>

<div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="profile-bg-picture"
                                style="background-image:url('./images/aptech-logo.png')">
                                <span class="picture-bg-overlay"></span>
                                <!-- overlay -->
                            </div>
                            <!-- meta -->
                            <div class="profile-user-box">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="profile-user-img"><img src="./<?php echo $_SESSION['student_user_image']?>" alt=""
                                                class="avatar-lg rounded-circle"></div>
                                        <div class="">
                                            <h4 class="mt-4 fs-17 ellipsis"><?php echo $_SESSION['student_user_name']?></h4>
                                            <p class="font-13"> <?php echo $_SESSION['student_user_batchcode']?></p>
                                            <p class="text-muted mb-0"><small><?php echo $_SESSION['student_user_email']?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <!-- end row -->

                    <!-- end page title -->

                </div>
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->
        <?php
require_once("./base/footer.php");
?>