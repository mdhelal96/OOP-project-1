<?php

require_once 'inc/header.php';

?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col">
            <h4 class="page-title">Starter Page</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Work Items</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

    <!-- add and manage slider start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row row-cols-2 align-items-center">
                        <div class="col">
                            <h3>Manage Work Items</h3>
                        </div>
                        <div class="col text-end">
                            <a href="work-menu-create.php" class="btn slider-create-btn create-btn text-white no-block  align-items-center">
                                <i class="fa fa-plus-square"></i>
                                <span class="hide-menu m-l-5">Add New Work</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add and manage slider end -->

    <!-- slider list start -->

    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Work Items</h4>
                        </div>
                        <!--  -->
                    </div>
                    <!-- title -->

                    <div class="table-responsive">
                        <table id="slideDataTable" class="table v-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">SL No</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Slug</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- slider list end -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->

<?php require_once 'inc/footer.php';?>