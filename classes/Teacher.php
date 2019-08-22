<?php
    include "classes/Main.php";

    class Teacher extends Main {   
        protected $table = 'tbl_teacher';
        private $name;
        private $dep;
        private $age;
        
        // SET Parametres
        public function setName($name){
            $this->name = $name;
        }
        public function setDep($dep){
            $this->dep = $dep;
        }
        public function setAge($age){
            $this->age = $age;
        }

        // CREATE DATA
        public function insert(){
            $sql = "INSERT INTO $this->table(name, dep, age) VALUES(:name, :dep, :age)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':dep', $this->dep);
            $stmt->bindParam(':age', $this->age);
            return $stmt->execute();
        }
    }
?>