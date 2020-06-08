<?php
namespace Classes;

class Model extends Database {

    protected $table;
    protected $primaryField = "id";
    protected $limit = 15;

    /**
     * fetch everything
     * @return array
     */
    public function all(){
        $query = "SELECT * FROM {$this->table} LIMIT  {$this->limit}";
        return Database::query($query);
    }

    public function find($id){
        $query = "SELECT * FROM {$this->table} WHERE {$this->primaryField} = :id";
        return Database::query($query , [':id' => $id])[0];
    }

    public function where($stmt , $params){
        $query = "SELECT * FROM {$this->table} WHERE {$stmt} LIMIT {$this->limit}";
        return Database::query($query , $params);
    }

    public function destroy($id){
        $query = "DELETE FROM {$this->table} WHERE {$this->primaryField} = :id";
        return Database::query($query , [':id' => $id]);
    }

    public function create($array){
        try {
            $query = "INSERT INTO " . $this->table ." (";

            foreach ($array as $key => $value) {
                $query .= "${key} ,";
            }
            $query = substr($query, 0, -1);
            $query .= ") VALUES (";

            foreach ($array as $key => $value) {
                $query .= ":${key} ,";
            }
            $query = substr($query, 0, -1);
            $query .= ");";

            foreach ($array as $key => $value) {
                $params[":${key}"] = $value;
            }

            Database::query($query , $params);
        } catch (\PDOExecption $e) {
            // fail handeling
            dd($e->getMessage());
            return false;
        }
        // success handeling
        return true;
    }

    public function update($id , $array){
        try {
            $query = "UPDATE {$this->table} SET ";
            $params= [];
            foreach ($array as $key => $value) {
                $query .= "${key} = :${key} ,";
                $params[":{$key}"] = $value;
            }
            $query = substr($query, 0, -1);

            $query .= "WHERE {$this->primaryField} = ${id}";

            Database::query($query , $params);

        } catch (\PDOExecption $e) {
            // fail handeling
            echo $e->getMessage();
            return false;
            die();
        }
        // success handeling
        return true;
    }
}