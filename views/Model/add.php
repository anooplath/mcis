<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Add Model</h3>
  </div>
  <div class="panel-body">
      <div id="show_message"></div>
      <form method="post" action="<?php echo ROOT_URL."?controller=model&action=add"; ?>" enctype="multipart/form-data">
        <div class="row"> 
            <div class="col-lg-6"> 
                <div class="form-group">
                    <label>Select Manufacturer</label>
                    <select name='manufacturer' id='manufacturer' class="form-control"  required>
                        <option value="">Select Manufacturer</option>
                        <?php foreach($viewmodel as $manufacturer) : ?>
                            <option value="<?php echo $manufacturer['manufacturer_id']; ?>"><?php echo $manufacturer['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div> 
            <div class="col-lg-6"> 
                <div class="form-group">
                    <label>Enter Model Name</label>
                    <input type="text" name="name" id='name' class="form-control" placeholder="Enter model name" required/>
                </div>
            </div> 
        </div>
        <h4>Other Details</h4>
        <div class="form-group">
            <label>Enter Color</label>
            <input type="text" name="color" id='color' class="form-control" placeholder="Enter color" required/>
        </div>
        <div class="form-group">
            <label>Manufacturing Year</label>
            <select name='manufacturing_year' id='manufacturing_year' class="form-control"  required>
                <option value="">Select Year</option>
                <?php for($year = 1990; $year<=2018; $year++){ ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php } ?>

            </select>
        </div>
        <div class="form-group">
            <label>Registration Number</label>
            <input type="text" name="registration_number" id='registration_number' class="form-control" placeholder="Enter Registration number" required/>
        </div>
    	<div class="form-group">
            <label>Note</label>
            <textarea name="note" id='note' class="form-control" placeholder="Enter note" required></textarea>
        </div>
        <div class="form-group">
            <label>Image 1</label>
            <input type="file" name="image_1" id='image_1' class="form-control" placeholder="Enter model name" required/>
        </div>
        <div class="form-group">
            <label>Image 2</label>
            <input type="file" name="image_2" id='image_2' class="form-control" placeholder="Enter model name" required/>
        </div>
        <div class="form-group">
            <label>Inventory</label>
            <input type="number" min="0" name="inventory" id='inventory' class="form-control" placeholder="Enter inventory" required/>
        </div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
    </form>
  </div>
</div>
<script>
    $("form").validate({
        rules: {
            image_1: {
              required: true,
              extension: "jpg|jpeg|png"
            },
            image_2: {
              required: true,
              extension: "jpg|jpeg|png"
            }
        },
        messages: {
            image_1: {
                    extension: "Only png, jpg and jpeg file extensions allowed"
            },

        },
        submitHandler: function(form) {
            $('#show_message').html("");
            var file_data = $('#image_1').prop('files')[0];   
            var myform = $("form");
            var formData = new FormData(myform[0]);
            formData.append('file', file_data);
            $.ajax({
                url: form.action,
                type: form.method,
                dataType: 'json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.error){
                        $('#show_message').html('<div class="alert alert-danger">'+ response.error +'</div>');
                    }else{
                        $('.form-group input').val('');
                        $('.form-group select').val('');
                        $('#show_message').html('<div class="alert alert-success">'+ response.success +'</div>');
                    }
                    window.scrollTo(0, 0);
                }            
            });
    }
    });
</script>