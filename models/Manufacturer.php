<?php
class ManufacturerModel extends Database{
	public function add($post){
            $this->query('INSERT INTO manufacturer (name, date_added) VALUES(:name, :date_added)');
            $this->bind(':name', $post['name']);
            $this->bind(':date_added', date('Y-m-d H:i:s'));
            $this->execute();
            if($this->lastInsertId()){
                    return "success";
            }else{
                return "error";
            }
	}
        
        public function getManufacturer($name){
            $this->query('SELECT * FROM manufacturer where name = :name');
            $this->bind(':name', $name);

            $row = $this->single();

            if($row){
                    return true;
            } else {
                    return false;
            }
	}
        
        public function getAllManufacturers(){
            $this->query('SELECT * FROM manufacturer ORDER BY name DESC');
            $rows = $this->resultSet();
            return $rows;
	}
}