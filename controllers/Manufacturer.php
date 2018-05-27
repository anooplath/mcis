<?php
class Manufacturer extends Controller{
	protected function Add(){
		$viewmodel = new ManufacturerModel();
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if($post['submit']){
                    $response = [];
                    if($post['name'] == ''){
                            $response['error'] = 'Please Fill In All Fields';
                    }else{
                        if(!$viewmodel->getManufacturer($post['name'])){
                            $result = $viewmodel->Add($post);
                            if($result == 'success'){
                                $response['success'] = 'Manufacturer has been added successfully';
                            }else{
                                $response['error'] = 'There was some error. Please try again.';
                            }
                        }else{
                            $response['error'] = 'Manufacturer already exists.';
                        }
                    }
                    echo json_encode($response);
                }else{
                    $this->returnView(array(), true);
                }
	}
}