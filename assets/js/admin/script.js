//  Image preview
function ImageView(Input) {
    if (Input.files && Input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(event) {
            $(".image-view").attr('src', event.target.result);
        }
        reader.readAsDataURL(Input.files[0]);
    }
}

jQuery(document).ready(function () {
    

    // create form
    $("#create-form").on('submit', function (event) {
        event.preventDefault();
        $(".ajax-loader").show();

        let formData = new FormData(this);
        formData.append('action', $(this).data('url'));

        $.ajax({
            url: './inc/action.php',
            method: 'POST',
            processData: false,
            contentType: false,
            dataType: 'JSON',
            data: formData,
            success: function (result) {
                $(".ajax-loader").hide();
                if(!result.error){
                    $("#create-form")[0].reset();
                    $(".image-view").attr('src', 'https://via.placeholder.com/400');
                    toastr.success(result.message, {timeOut: 1000});
                    toastr.options.progressBar = true;
                }else{
                    toastr.error(result.message, {timeOut: 1000});
                    toastr.options.progressBar = true;
                }
            }
        });

    });

    // update form
    $("#update-form").on('submit', function (event) {
        event.preventDefault();
        $(".ajax-loader").show();

        let formData = new FormData(this);
        formData.append('action', $(this).data('url'));

        $.ajax({
            url: './inc/action.php',
            method: 'POST',
            processData: false,
            contentType: false,
            dataType: 'JSON',
            data: formData,
            success: function (result) {
                $(".ajax-loader").hide();
                if(!result.error){
                    toastr.success(result.message, {timeOut: 1000});
                    toastr.options.progressBar = true;
                }else{
                    toastr.error(result.message, {timeOut: 1000});
                    toastr.options.progressBar = true;
                }
            }
        });

    });


    // update status
    $(".change-status").on('click', function(){
        $(".ajax-loader").show();
        let id = $(this).data('id');

        $.ajax({
            url: './inc/action.php',
            method: 'POST',
            data: { id: id, action: 'update-status' },
            success: function (response) {
                $(".ajax-loader").hide();
                if(!response.error){
                    toastr.success(response.message, {timeOut: 1000});
                    toastr.options.progressBar = true;

                    if(response.status){
                        $("#status-text-" + id ).text("Active").addClass("label-success").removeClass("label-danger");
                        $("#change-status-btn-" + id).addClass("btn-info").removeClass("btn-danger").html('<i class="fas fa-chevron-down"></i>');
                    }else{
                        $("#status-text-" + id ).text("Inactive").addClass("label-danger").removeClass("label-success");
                        $("#change-status-btn-" + id).addClass("btn-danger").removeClass("btn-info").html('<i class="fas fa-chevron-up"></i>');
                    }
                }else{
                    toastr.error(response.message, {timeOut: 1000});
                    toastr.options.progressBar = true;
                }
            }
        });
        
    });



    // remove slider js
    $(".remove-slider").on('click', function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                let id = $(this).data('id');
                $(".ajax-loader").show();
                $.ajax({
                    url: './inc/action.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {id: id, action: 'delete-slider'},

                    success: function (result) {
                        $(".ajax-loader").hide();
                        if(!result.error){
                            $(".remove-row-" + id).hide();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        } else{
                            toastr.error(result.message, {timeOut: 1000});
                            toastr.options.progressBar = true;
                        }
                    }
                });

              
            }
        })
    });


    // custom date picker design
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        startView: 2,
        todayBtn: true, 
        todayHighlight: true,
    });

    $('#slideDataTable').DataTable();

});