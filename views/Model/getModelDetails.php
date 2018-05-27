<form class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-4 control-label">Color:</label>
    <div class="col-sm-8">
      <p class="form-control-static"><?php echo $viewmodel['color'] ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Manufacturing Year:</label>
    <div class="col-sm-8">
      <p class="form-control-static"><?php echo $viewmodel['manufacturing_year'] ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Registration Number:</label>
    <div class="col-sm-8">
      <p class="form-control-static"><?php echo $viewmodel['registration_number'] ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Note:</label>
    <div class="col-sm-8">
      <p class="form-control-static"><?php echo $viewmodel['note'] ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Images:</label>
    <div class="col-sm-8">
      <div class="row">
            <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
                <img src="<?php echo ROOT_URL."uploads/".$viewmodel['image_1'] ?>" alt="...">
              </a>
            </div>
          <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
                <img src="<?php echo ROOT_URL."uploads/".$viewmodel['image_2'] ?>" alt="...">
              </a>
            </div>
        </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Inventory:</label>
    <div class="col-sm-8">
      <p class="form-control-static"><?php echo $viewmodel['inventory'] ?></p>
    </div>
  </div>  
    <input type="hidden" id="model_id" value="<?php echo $viewmodel['model_id'] ?>" name="model_id"/>
</form>