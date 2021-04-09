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
    $('#slideDataTable').DataTable();

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
                console.log(result);
            }
        });

    });

    // custom date picker design
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        startView: 2,
        todayBtn: true, 
        todayHighlight: true,
    });

    console.log("Test");

});