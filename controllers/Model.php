<?php
class Model extends Controller{
	protected function viewInventory(){
            $this->returnView(array(), true);
        }
        
        protected function getModel(){
            $viewmodel = new ModelModel();
                    $models = $viewmodel->getModels();
                    $rows = array();
                    foreach ($models as $row) {
                      $rows[] = array_values((array)$row);
                    }

                    echo json_encode(array('data' => $rows));
        }
        
        protected function getModelDetails() {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if($post['model_id']){
                $viewmodel = new ModelModel();
                $this->returnView($viewmodel->getModelDetails($post['model_id']), false);
            }
        }
        
        protected function markAsSold() {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if($post['model_id']){
                $viewmodel = new ModelModel();
                echo $viewmodel->markAsSold($post['model_id']);
            }
        }


        protected function add(){
		$viewmodel = new ModelModel();
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if($post['submit']){
                    try{
                        $response = [];
                        if($post['name'] == '' || $post['manufacturer'] == '' || $post['color'] == ''){
                                $response['error'] = 'Please Fill In All Fields';
                        }else{
                            if(!$viewmodel->getModelByManufacturer($post['name'], $post['manufacturer'])){
                                $target_dir = getcwd() ."/uploads/";
                                foreach ($_FILES as $key => $file){
                                    $post[$key] = $file["name"];
                                    $file_name = pathinfo(basename($file["name"]), PATHINFO_FILENAME);
                                    $target_file = $target_dir . basename($file["name"]);
                                    $uploadOk = 1;
                                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                    // Check if file already exists
                                    $count = 1;
                                    while (file_exists($target_file)) {
                                        $file["name"] = $file_name."_".$count.".".$imageFileType;
                                        $post[$key] = $file["name"];
                                        $target_file = $target_dir . basename($file["name"]);
                                        $count++;
                                    }

                                    if (move_uploaded_file($file["tmp_name"], $target_file)) {
                                    } else {
                                        $uploadOk = 0;
                                        $msg = "Sorry, there was an error uploading your file.";
                                    }
                                }
                                if($uploadOk){
                                    $result = $viewmodel->Add($post);
                                    if($result == 'success'){
                                        $response['success'] = 'Model has been added successfully';
                                    }else{
                                        $response['error'] = 'There was some error. Please try again.';
                                    }
                                }else{
                                    $response['error'] = $msg;
                                }
                            }else{
                                $response['error'] = 'Model already exists.';
                            }
                        }
                        echo json_encode($response);
                    } catch (Exception $e){
                        $response['error'] = $e->getMessage();
                        echo json_encode($response);
                    }
                }else{
                    $manufacturerModel = new ManufacturerModel();
                    $allManufacturers = $manufacturerModel->getAllManufacturers();
                    $this->returnView($allManufacturers, true);
                }
	}
}