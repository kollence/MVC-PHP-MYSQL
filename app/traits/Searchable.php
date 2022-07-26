<?php

trait Searchable 
{   
    public function search($value,  array $columns)
    {
        //chech trateble param $table in model
        if(!isset($this->table)) {
            throw new \Exception("Table property is not set for ".get_class($this));
        }
        //QUERY STATEMENT 
        $sql  = "SELECT * FROM {$this->table} WHERE";

        // ADD TO $sql QUERY STRING BASE ON NUMBER OF COLUMNS
        foreach ($columns as $column) {
            $sql .= " {$column} LIKE :{$column} OR";
        }
        //CLEAR LAST OR FROM QUERY STRING
        $sql = substr($sql, 0, -3);
        //QUERY PREPARE
        $stm = $this->dbconn->prepare($sql);
        //BIND VALUES FOR QUERY BASE ON $value PASSED IN
        foreach ($columns as $column) {
            $stm->bindValue(':'.$column, '%'.$value.'%');
        }
        $stm->execute();
        return $stm->fetchAll();
    }
}