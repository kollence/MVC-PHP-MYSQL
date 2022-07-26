<?php
require_once('../app/core/AbstractModel.php');
require_once('../app/traits/Searchable.php');


class Employee extends AbstractModel
{
    use Searchable;
    //for trait Searchable
    protected $table = 'employees';
    
    private $id;
    private $name;
    private $surname;
    private $degree;
    private $email;
    private $phone;
    private $jobposition;
    private $salary;

    public function list()
    {
        try {
            $stm = $this->dbconn->prepare(
                "SELECT e.id, e.name, e.email, e.degree, e.job_position, e.salary, j.salary as job_salary FROM employees as e
                LEFT JOIN jobs as j ON e.job_position = j.name"
            );
            $stm->execute();

            return $stm->fetchAll();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function findById()
    {
        try {
            $stm = $this->dbconn->prepare("SELECT * FROM employees WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store()
    {
        try {
            $stm = $this->dbconn->prepare("INSERT INTO employees( name, surname, degree, email, phone, job_position, salary )  VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stm->execute([$this->name, $this->surname, $this->degree, $this->email, $this->phone, $this->jobposition, $this->salary]);
            return $stm->fetchAll();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update()
    {
        try {
            $stm = $this->dbconn->prepare("UPDATE employees SET name=?, surname=?, degree=?, email=?, phone=?, job_position=?, salary=? WHERE id=?");
            $stm->execute([$this->name, $this->surname, $this->degree, $this->email, $this->phone, $this->jobposition, $this->salary, $this->id]);
            return $stm->fetchAll();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $stm = $this->dbconn->prepare("DELETE FROM employees WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
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
    public function setSurname($surname)
    {
        $this->surname = htmlspecialchars(strip_tags($surname), ENT_QUOTES); 
    }
    public function setDegree($degree)
    {
        $this->degree = htmlspecialchars(strip_tags($degree), ENT_QUOTES); 
    }
    public function setEmail($email)
    {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    public function setPhone($phone)
    {
        $this->phone = htmlspecialchars(strip_tags($phone), ENT_QUOTES); 
    }
    public function setJobPosition($jobposition)
    {
        $this->jobposition = htmlspecialchars(strip_tags($jobposition), ENT_QUOTES); 
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
