<?php

class Action {

    private $dbHost     = "localhost"; 
    private $dbUsername = "root"; 
    private $dbPassword = ""; 
    private $dbName = "mybd"; 
     
    public function __construct(){ 
        if(!isset($this->db)){ 
            // Connect to the database 
            try{ 
                $conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword); 
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $this->db = $conn; 
            }catch(PDOException $e){ 
                die("Failed to connect with MySQL: " . $e->getMessage()); 
            } 
        } 
    }
    
    public function read($start, $limit) {
        $sql = "SELECT id_user, first_name, last_name, email, company_name, position, area_code, phone_code, phone_number 
        FROM users JOIN job ON job.user = users.id_user JOIN phone ON phone.user=users.id_user LIMIT :start, :end";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':start', $start , PDO::PARAM_INT);
        $stmt->bindValue(':end', $limit , PDO::PARAM_INT);
 
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }

    public function readAll () {
        $records = $this->db->query("SELECT * FROM users");
        $nr_of_rows = $records->rowCount();
        return $nr_of_rows;
    }

    public function readById($id) {
        if(!empty($id)){ 
            $sql = "SELECT id_user, first_name, last_name, email, company_name, position, area_code, phone_code, phone_number 
            FROM users JOIN job ON job.user = users.id_user JOIN phone ON phone.user=users.id_user WHERE id_user=?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $users = $stmt->fetchAll();
            foreach ($users as $user)
            {
                return $user;
            }
            
        }
    }

    public function setUser($data){ 
        if(!empty($data) && is_array($data)){ 
            $columns = ''; 
            $values  = ''; 
 
            $columnString = implode(',', array_keys($data)); 
            $valueString = ":".implode(',:', array_keys($data)); 
            $sql = "INSERT INTO users ($columnString) VALUES ($valueString)"; 
            $query = $this->db->prepare($sql); 
            foreach($data as $key=>$val){ 
                 $query->bindValue(':'.$key, $val); 
            } 
            $insert = $query->execute(); 
            return $insert?$this->db->lastInsertId():false; 
        }else{ 
            return false; 
        } 
    } 


    public function add($jobData, $phoneData, $id) {    

        $columns_job = implode(",", array_keys($jobData));
        $values_job = ":".implode(',:', array_keys($jobData)); 
        $columns_phone = implode(",", array_keys($phoneData));
        $values_phone = ":".implode(',:', array_keys($phoneData)); 

        $sql = "INSERT INTO job ($columns_job, user) VALUES ($values_job, $id);
        INSERT INTO phone ($columns_phone, user) VALUES ($values_phone, $id);";

        $query = $this->db->prepare($sql); 
        $data = $jobData + $phoneData;
        foreach($data as $key=>$val){ 
            $query->bindValue(':'.$key, $val); 
        } 
        $insert = $query->execute(); 
    }

    public function update($data,$id){ 
        if(!empty($data) && is_array($data)){ 
            $set = "";

            foreach ($data as $key => $value) {
                $set .= $key."=:".$key;
                !empty(next($data))?$set.=", " : " ";
            }

            $sql = "UPDATE users INNER JOIN job ON users.id_user = job.user INNER JOIN phone ON users.id_user = phone.user SET ".$set." WHERE id_user=:id_user";
            $query = $this->db->prepare($sql);
            foreach($data as $key=>$val){ 
                $query->bindValue(':'.$key, $val); 
            } 
            $query->bindValue(':id_user', $id, PDO::PARAM_INT); 

            $update = $query->execute(); 
            return $update?$query->rowCount():false; 
            
        }else{ 
            return false; 
        } 
    } 
     
    public function delete($id){ 
        $sql = "DELETE users, job, phone FROM users JOIN job ON job.user = users.id_user JOIN phone ON phone.user=users.id_user WHERE id_user = ? "; 
        $delete = $this->db->prepare($sql)->execute([$id]); 

        return $delete?$delete:false; 
    } 



}