<?php require_once 'inc/header.php';?>
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
                        <li class="breadcrumb-item active" aria-current="page">Slider</li>
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
                            <h3>Add New Sliders</h3>
                        </div>
                        <div class="col text-end">
                            <a href="sliders.php"
                                class="btn slider-create-btn create-btn text-white no-block  align-items-center">
                                <i class="fa fa-plus-square"></i>
                                <span class="hide-menu m-l-5">Manage Slider</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add and manage slider end -->

    <!-- slider list start -->

    <div class="card">
        <!-- column -->
        <div class="card-body">
            <div class="row">

                <div class="col-12">

                    <form method="POST" action="" id="create-form">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="sub_title" class="form-label">Sub Title</label>
                            <input type="text" name="sub_title" class="form-control" id="sub_title">
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="text" name="start_date" class="form-control datepicker" id="start_date">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="text" name="end_date" class="form-control datepicker" id="end_date">
                        </div>
                        <div class="mb-3">
                            <label for="url_1" class="form-label">Url One</label>
                            <input type="url" name="url_1" class="form-control" id="url_1">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <div class="row">
                                <div class="col-lg-8">
                                    <input class="form-control form-control-lg" name="image" id="image" type="file" onchange="ImageView(this)">
                                </div>
                                <div class="col-lg-4">
                                    <div class="preview-img">
                                        <img src="https://via.placeholder.com/400" class="image-view" alt="Image Not Found!">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="d-block form-label">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="active" value="1">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                                <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary float-end">Publish Slider</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- slider list end -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->

<?php require_once 'inc/footer.php';?>