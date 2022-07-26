<?php

require_once('../app/core/AbstractModel.php');
require_once('../app/traits/Searchable.php');

class Job extends AbstractModel
{
    use Searchable;
    //for trait Searchable
    protected $table = 'jobs';
    
    private $id;
    private $name;
    private $salary;

    public function list()
    {
        try {
            $stm = $this->dbconn->prepare("SELECT * FROM jobs");
            $stm->execute();
            return $stm->fetchAll();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function findById()
    {
        try {
            $stm = $this->dbconn->prepare("SELECT * FROM jobs WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store()
    {
        // var_dump([$this->name, $this->salary]);
        // die();
        try {
            $stm = $this->dbconn->prepare("INSERT INTO jobs(name, salary)  VALUES (?, ?)");
            $stm->execute([$this->name, $this->salary]);
            return $stm->fetchAll();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update()
    {
        try {
            $stm = $this->dbconn->prepare("UPDATE jobs SET name=?, salary=? WHERE id=?");
            $stm->execute([$this->name, $this->salary, $this->id]);
            return $stm->fetchAll();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $stm = $this->dbconn->prepare("DELETE FROM jobs WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
            // header("Location: http://phpmysql.test/");
            // exit();
            // echo "<script>confirm('you want to delete ?');document.location='/'</script>";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    //SETERS
    public function setId($id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }
    public function setName($name)
    {
        $this->name = htmlspecialchars(strip_tags($name), ENT_QUOTES); 
    }

    public function setSalary($salary)
    {
        $this->salary = filter_var($salary, FILTER_SANITIZE_NUMBER_INT);
    }
    
    //GETTERS
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSalary()
    {
        return $this->salary;
    }
}
