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
    <label for="reports" class="control-label">Reports</label>
    <select name="reports" id="reports" class="form-control" required>

        <option value="Improper waste disposal">Improper waste disposal</option>
        <option value="Clogged drainage systems">Clogged drainage systems</option>
        <option value="Stagnant water">Stagnant water</option>

        <option value="Poor sanitation practices">Poor sanitation practices</option>
        <option value="Overgrown grass and bushes">Overgrown grass and bushes</option>
        <option value="Lack of proper waste segregation">Lack of proper waste segregation</option>

        <option value="Inadequate cleaning of public facilities">Inadequate cleaning of public facilities</option>
        <option value="Air pollution">Air pollution</option>
        <option value="Unregulated food vending">Unregulated food vending</option>

        <option value="Insufficient clean water and sewage management">Insufficient clean water and sewage management</option>
        <option value="Improper disposal of hazardous materials">Improper disposal of hazardous materials</option>
        <option value="Accumulation of plastic waste">Accumulation of plastic waste</option>
        <option value="Others">Others(TYPE THE INCIDENT IN THE REMARKS BOX)</option>

        <!-- Add more options as needed -->
    </select>
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
        <option value="A. Bonifacio">A. Bonifacio</option>
        <option value="Air Force Road">Air Force Road</option>
        <option value="Army Road">Army Road</option>
        <option value="Atis Street">Atis Street</option>
        <option value="Avocado Road">Avocado Road</option>
        <option value="Ballecer Extension">Ballecer Extension</option>
        <option value="Ballecer Street">Ballecer Street</option>
        <option value="Banaba Street">Banaba Street</option>
        <option value="Camia Street">Camia Street</option>
        <option value="Colonel Ballecer Street">Colonel Ballecer Street</option>
        <option value="Colonel Caliao Street">Colonel Caliao Street</option>
        <option value="Colonel Gervacio Street">Colonel Gervacio Street</option>
        <option value="Cucumber Road">Cucumber Road</option>
        <option value="Daisy Street">Daisy Street</option>
        <option value="Del Pilar">Del Pilar</option>
        <option value="Friendship Street">Friendship Street</option>
        <option value="General Espino Street">General Espino Street</option>
        <option value="General Licuanan Street">General Licuanan Street</option>
        <option value="Governor I. Rodriguez">Governor I. Rodriguez</option>
        <option value="Langka Road">Langka Road</option>
        <option value="Luzon">Luzon</option>
        <option value="Macapagal Extension">Macapagal Extension</option>
        <option value="Magsaysay Extension">Magsaysay Extension</option>
        <option value="Magsaysay Road">Magsaysay Road</option>
        <option value="Manggahan Street">Manggahan Street</option>
        <option value="Mango Road">Mango Road</option>
        <option value="Mayor Tanyag">Mayor Tanyag</option>
        <option value="Mindanao">Mindanao</option>
        <option value="Navy Road">Navy Road</option>
        <option value="PC Road">PC Road</option>
        <option value="PNP Road">PNP Road</option>
        <option value="President Garcia">President Garcia</option>
        <option value="President Laurel">President Laurel</option>
        <option value="President Macapagal">President Macapagal</option>
        <option value="President Osmeña">President Osmeña</option>
        <option value="President Quezon">President Quezon</option>
        <option value="President Quirino">President Quirino</option>
        <option value="Santo Niño Street">Santo Niño Street</option>
        <option value="Visayas">Visayas</option>


        <!-- Add more options as needed -->
    </select>
</div>
        <div class="form-group">
            <label for="" class="control-label">Image</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <!-- <button class="button btn btn-primary btn-sm">Create</button> -->
        <button class="button btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" name="save_as_image" class="button btn btn-success btn-sm">Save Report</button>
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