<?php
require_once 'inc/header.php';

use App\classes\WorkMenu;
$worksmenu = new WorkMenu();

$result = $worksmenu->worksMenu();

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
                        <li class="breadcrumb-item active" aria-current="page">Work Menu</li>
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
                            <h3>Manage Work Menus</h3>
                        </div>
                        <div class="col text-end">
                            <a href="work-menu-create.php" class="btn slider-create-btn create-btn text-white no-block  align-items-center">
                                <i class="fa fa-plus-square"></i>
                                <span class="hide-menu m-l-5">Add New Menu</span>
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
                            <h4 class="card-title">Work Menus</h4>
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
                                <?php while ( $row = $result->fetch_assoc() ): ?>
                                    <tr class="remove-row-<?=$row['id'];?>">
                                        <td> <?=$row['id'];?> </td>
                                        <td> <?=$row['name'];?> </td>
                                        <td> <?=$row['slug'];?> </td>
                                        <td> <?=$row['status'];?> </td>
                                        <td>
                                            <button id="change-status-btn-<?=$row['id'];?>" data-id="<?=$row['id'];?>" type="button" class="change-status btn btn-<?=$row['status'] == 1 ? 'info' : 'danger';?> text-white">
                                                <i class="fas fa-chevron-<?=$row['status'] == 1 ? 'down' : 'up';?>"></i>
                                            </button>
                                            <a href="#" class="btn btn-warning text-black">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger text-white remove-slider" data-id="<?=$row['id'];?>"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                <?php endwhile;?>
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