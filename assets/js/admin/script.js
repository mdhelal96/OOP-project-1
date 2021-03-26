jQuery(document).ready(function(){
    $('#slideDataTable').DataTable();

    $("#create-form").on('submit', function(event){
        event.preventDefault();
        $(".ajax-loader").show();

        $.ajax({
            url: './inc/action.php',
            method: 'POST',
            processData: false,
            contentType: false,
            dataType: 'JSON',
            data: new FormData(this),
            success: function(result){
                $(".ajax-loader").hide();
                console.log(result);
            }
        });

    });

});