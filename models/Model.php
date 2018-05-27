<?php
class ModelModel extends Database{
    
        public function getModelByManufacturer($name, $manufacturer){
            $this->query('SELECT * FROM model where name = :name AND manufacturer_id = :manufacturer');
            $this->bind(':name', $name);
            $this->bind(':manufacturer', $manufacturer);

            $row = $this->single();

            if($row){
                    return true;
            } else {
                    return false;
            }
        }
        
        public function getModelDetails($id){
            $this->query('SELECT * FROM model where model_id = :id');
            $this->bind(':id', $id);

            $row = $this->single();

            if($row){
                    return $row;
            } else {
                    return false;
            }
        }
        
        public function markAsSold($id){
            $this->query('UPDATE model SET inventory = :inventory where model_id = :id');
            $this->bind(':inventory', 0);
            $this->bind(':id', $id);

            $this->execute();
            return true;
        }
        
        public function getModels(){
            $this->query('SELECT model_id, manu.name as manufacturer_name, model.name as model_name, inventory FROM model model LEFT JOIN manufacturer manu ON model.manufacturer_id = manu.manufacturer_id WHERE inventory>0 ORDER BY model_id DESC');
            $rows = $this->resultSet();
            return $rows;
        }
        
        public function add($post){
            $this->query('INSERT INTO model  (name, manufacturer_id, color, manufacturing_year, registration_number, note, image_1, image_2, inventory, date_added) '
                    . 'VALUES(:name, :manufacturer_id, :color, :manufacturing_year, :registration_number, :note, :image_1, :image_2, :inventory, :date_added)');
            $this->bind(':name', $post['name']);
            $this->bind(':manufacturer_id', $post['manufacturer']);
            $this->bind(':color', $post['color']);
            $this->bind(':manufacturing_year', $post['manufacturing_year']);
            $this->bind(':registration_number', $post['registration_number']);
            $this->bind(':note', $post['note']);
            $this->bind(':image_1', $post['image_1']);
            $this->bind(':image_2', $post['image_2']);
            $this->bind(':inventory', $post['inventory']);
            $this->bind(':date_added', date('Y-m-d H:i:s'));
            $this->execute();
            // Verify
            if($this->lastInsertId()){
                    return "success";
            }else{
                return "error";
            }
	}
	
}