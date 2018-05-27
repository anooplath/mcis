<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Add Manufacturer</h3>
  </div>
  <div class="panel-body">
      <div id="show_message"></div>
    <form method="post" action="<?php echo ROOT_URL."?controller=manufacturer&action=add"; ?>">
    	<div class="form-group">
    		<label>Manufacturer Name</label>
                <input type="text" name="name" id='name' class="form-control"placeholder="Enter manufaturer name" required/>
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
    </form>
  </div>
</div>
<script>
    $("form").validate({
        submitHandler: function(form) {
        $('#show_message').html("");
        
        $.ajax({
            url: form.action,
            type: form.method,
            dataType: 'json',
            data: $(form).serialize(),
            success: function(response) {
                if(response.error){
                    $('#show_message').html('<div class="alert alert-danger">'+ response.error +'</div>');
                }else{
                    $('#name').val('');
                    $('#show_message').html('<div class="alert alert-success">'+ response.success +'</div>');
                }
                window.scrollTo(0, 0);
            }            
        });
    }
    });
</script>