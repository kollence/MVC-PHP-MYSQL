<?php
require_once('../Config.php');

class JobsController extends Controller
{
    public function search()
    {
        $jobs  = $this->model('Job');
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $jobList = $jobs->search($search, ['name', 'salary']);
        }else{
            $jobList = $jobs->list();
        }
        return $this->view('jobs/index', ['jobList' => $jobList]);
    }

    public function index()
    {
        $jobs  = $this->model('Job');
        $jobList = $jobs->list();

        return $this->view('jobs/index', ['jobList' => $jobList]);
    }

    public function create()
    {
        return $this->view('jobs/create');
    }

    public function show($id)
    {
        $model  = $this->model('Job');
        $model->setId($id);
        $job = $model->findById();

        return $this->view('jobs/show', ['job' => $job]);
    }

    public function edit($id)
    {
        $model  = $this->model('Job');
        $model->setId($id);
        $job = $model->findById();
        return $this->view('jobs/edit', ['job' => $job]);
    }

    public function store()
    {
        $_POST = array_map("trim", $_POST);
        if (isset($_POST['submited'])) {
            // var_dump($_POST['salary']);
            // die();
            $job  = $this->model('Job');
            $job->setName($_POST['name']);
            $job->setSalary($_POST['salary']);

            $job->store();
        }
        return $this->redirect("jobs/index");
    }

    public function update($id)
    {
        $_POST = array_map("trim", $_POST);
        if (isset($_POST['edited']) && isset($id)) {
            $job  = $this->model('Job');
            $job->setId($id);

            $job->setName($_POST['name']);
            $job->setSalary($_POST['salary']);

            $job->update();
        }
        return $this->redirect("jobs/index");
    }

    public function delete($id)
    {
        if (isset($_POST['deleted']) && isset($id)) {

            $job  = $this->model('Job');

            $job->setId($id);

            $job->delete();
        }
        return $this->redirect("jobs/index");
    }
}
