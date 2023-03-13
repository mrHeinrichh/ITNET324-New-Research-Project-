<?php 
session_start(); 

if(isset($_POST['save_as_image'])) {
    // Include the library for converting HTML to image
    require_once('html_to_image_library.php');

    // Get the HTML content of the form
    ob_start();
    include('complaint-form.php');
    $html = ob_get_clean();

    // Set the path for saving the image
    $image_path = 'images/complaint-form.png';

    // Convert the HTML to an image and save it to the file path
    html_to_image($html, $image_path);

    // Display a message to the user
    echo "Form data saved as an image at $image_path";
    exit;
}
?>

<div class="container-fluid">
    <form action="" id="complaint-frm" enctype="multipart/form-data">
        <input type="hidden" name="id" value="">
        <div class="form-group">
            <label for="" class="control-label">Report Message</label>
            <textarea cols="30" rows="3" name="message" required="" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Incident Address (House #, Lot #, Purok #)</label>
            <textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
        </div>
		<div class="form-group">
    <label for="street" class="control-label">Street</label>
    <select name="street" id="street" class="form-control" required>
        <option value="">Select a street</option>
        <option value="Street A">Street A</option>
        <option value="Street B">Street B</option>
        <option value="Street C">Street C</option>
        <!-- Add more options as needed -->
    </select>
</div>
        <div class="form-group">
            <label for="" class="control-label">Image</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <!-- <button class="button btn btn-primary btn-sm">Create</button> -->
        <button class="button btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" name="save_as_image" class="button btn btn-success btn-sm">Save as Image</button>
    </form>
</div>

<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>

<script>
    $('#complaint-frm').submit(function(e){
        e.preventDefault();
        start_load();
        if($(this).find('.alert-danger').length > 0 )
            $(this).find('.alert-danger').remove();
        var formData = new FormData(this); // Create FormData object to send the form data, including the image
        $.ajax({
            url:'admin/ajax.php?action=complaint',
            method:'POST',
            data:formData,
            contentType: false,
            processData: false,
            error:err=>{
                console.log(err)
                $('#complaint-frm button[type="submit"]').removeAttr('disabled').html('Create');
            },
            success:function(resp){
                if(resp == 1){
                    location.reload();
                    alert_toast("Data successfully saved.",'success')
                    setTimeout(function(){
                        location.reload()
                    },1000)
                }else{
                    end_load()
                }
            }
        })
    })
</script>
