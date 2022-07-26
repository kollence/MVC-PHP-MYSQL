<?php
require_once('../Config.php');
class EmployeesController extends Controller
{
    public function search()
    {
        $model  = $this->model('Employee');
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $employees = $model->search($search, ['name','email', 'degree', 'job_position']);
        }else{
            $employees = $model->list();
        }
        return $this->view('employees/index', ['employees' => $employees]);
    }

    public function index()
    {
        $model  = $this->model('Employee');
        $employees = $model->list();

        return $this->view('employees/index', ['employees' => $employees]);
    }

    public function show($id)
    {
        $model  = $this->model('Employee');
        $model->setId($id);

        $employee = $model->findById();
        // print_r($employee);
        return $this->view('employees/show', ['employee' => $employee]);
    }

    public function create()
    {
        $jobs  = $this->model('Job');
        $jobList = $jobs->list();

        $this->view('employees/create', ['jobList' => $jobList]);
    }

    public function store()
    {
        $_POST = array_map("trim", $_POST);
        if (isset($_POST['submited'])) {
            
            $model  = $this->model('Employee');
            // $modelList = $model->list();
            $model->setName($_POST['name']);
            $model->setSurname($_POST['surname']);
            $model->setDegree($_POST['degree']);
            $model->setEmail($_POST['email']);
            $model->setPhone($_POST['phone']);
            $model->setJobPosition($_POST['job_position']);
            $model->setSalary($_POST['salary']);

            $model->store();
        }
        return $this->redirect("employees/index");

    }

    public function edit($id)
    {
        $model  = $this->model('Employee');
        $jobmodel  = $this->model('Job');
        $jobList = $jobmodel->list();
        $model->setId($id);
        $employee = $model->findById();
        return $this->view('employees/edit', ['employee' => $employee, 'jobList'=>$jobList]);
    }

    public function update($id)
    {
        $_POST = array_map("trim", $_POST);
        if (isset($_POST['edited']) && isset($id)) {
            $model = $this->model('Employee');
            $model->setId($id);
            $model->setName($_POST['name']);
            $model->setSurname($_POST['surname']);
            $model->setDegree($_POST['degree']);
            $model->setEmail($_POST['email']);
            $model->setPhone($_POST['phone']);
            $model->setJobPosition($_POST['job_position']);
            $model->setSalary($_POST['salary']);

            $model->update();
        }
        
        return $this->redirect("employees/index");
    }

    public function delete($id)
    {
        if (isset($_POST['deleted']) && isset($id)) {

            $job  = $this->model('Employee');

            $job->setId($id);

            $job->delete();
        }
        return $this->redirect("employees/index");
    }
    
}
