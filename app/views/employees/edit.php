
    <?php
include '../app/views/components/header.php';
$jobList = $data['jobList'] ?? [];
$employee = $data['employee'][0] ?? [];

?>

<div class="container">
    <h1>EDIT <?= $employee['name'] ?></h1>
    <div>
        <a href="/employees/index">Back</a>
    </div>
    <div class="row justify-content-center">
            <div class="col-12 col-sm-6 mt-5 border p-3">
            <form action="/employees/update/<?= $employee['id'] ?>" method="POST">
               <div class="row">
                    <div id="nameHelpBlock" class="col-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" value="<?= $employee['name'] ?>" name="name" class="form-control" aria-describedby="nameHelpBlock">
                     </div>
                    <div id="surnameHelpBlock" class="col-6">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" id="surname" value="<?= $employee['surname'] ?>" name="surname" class="form-control" aria-describedby="surnameHelpBlock">        
                    </div>
                </div>
                <hr>
                <div class="row">
                <div id="emailHelpBlock" class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" value="<?= $employee['email'] ?>" name="email" class="form-control" aria-describedby="emailHelpBlock">
                </div>
                <div id="phoneHelpBlock" class="col-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" value="<?= $employee['phone'] ?>" name="phone" class="form-control" aria-describedby="phoneHelpBlock">
                </div>
                </div>
                <hr>
                <label for="degree" class="form-label">Degree</label>
                <input type="text" id="degree" value="<?= $employee['degree'] ?>" name="degree" class="form-control" aria-describedby="degreeHelpBlock">
                <div id="degreeHelpBlock" class="form-text">
                    Enter Degree.
                </div>
                <hr>
                <div class="form-floating">
                <select class="form-select" name="job_position" id="positionSelect" aria-label="Floating label select example">
                    <option selected data-salary="0">Job Positions</option>
                    <?php 
                    foreach($jobList as $job){
                    ?>
                        <option value="<?= $job['name'] ?>" data-salary="<?= $job['salary'] ?>"  <?php if( $job['name'] == $employee['job_position']) echo 'selected' ?>>
                            <?= $job['name'] ?>
                        </option>
                    <?php 
                    }
                    ?>
                </select>
                <label for="floatingSelect">Picking a job position will automaticly show generall salary</label>
                </div>
                <hr>
                <div id="generalSalary" style="display: <?= ($employee['salary'] > 0) ? 'block' : 'none' ?>;">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" id="salary" value="<?= $employee['salary'] ?>" name="salary" class="form-control" aria-describedby="salaryHelpBlock">
                <div id="salaryHelpBlock" class="form-text">
                    Enter salary.
                </div>
                </div>
                <div class="mt-4 px-3 row justify-content-between">
                <input type="submit" name="edited" value="Submit" class="btn btn-primary col-3"><a class="btn btn-primary col-2" href="/employees/index">Back</a>
                </div>
            </form>
            </div>
        </div>
</div>

<script>
const selection =  document.getElementById("positionSelect");
const generalSalary = document.getElementById("generalSalary");

    selection.onchange = function(event) {

        var salary = event.target.options[event.target.selectedIndex].dataset.salary;
        let val = (salary == 0) ? '' : salary
        
        generalSalary.style.display = (val > 0) ? 'block' : 'none';
        document.getElementById("salary").value = val;

    }
</script>
<?php

include '../app/views/components/footer.php';
?>