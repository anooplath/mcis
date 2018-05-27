<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">View Inventory</h3>
  </div>
  <div class="panel-body">
      <div id="show_message"></div>
          <table id="show_table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Serial Number</th>
                <th>Manufacturer Name</th>
                <th>Model Name</th>
                <th>Inventory</th>
            </tr>
        </thead>
    </table>
  </div>
</div>

<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sold">Sold</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
    $('#show_table').DataTable( {
        "ajax": '<?php echo ROOT_URL."?controller=model&action=getModel"; ?>'
    } );
    
    var table = $('#show_table').DataTable();
     
    $('#show_table tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        $.ajax({
            url: '<?php echo ROOT_URL."?controller=model&action=getModelDetails"; ?>',
            type: 'POST',
            data: 'model_id='+data[0],
            success: function(response) {
                $('#myModal').find('.modal-title').html(data[1] + " - " + data[2])
                $('#myModal').find('.modal-body').html(response)
                $('#myModal').modal('show');
            }            
        });
    } );
    
} );
$('#sold').on('click', function (){
    $.ajax({
        url: '<?php echo ROOT_URL."?controller=model&action=markAsSold"; ?>',
        type: 'POST',
        data: 'model_id='+$('#model_id').val(),
        success: function(response) {
            var table = $('#show_table').DataTable();
            table.ajax.reload();
            $('#myModal').modal('hide');
            $('#show_message').html('<div class="alert alert-success">Model has been successfully marked as sold.</div>');
        }            
    });
})
</script>