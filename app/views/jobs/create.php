
    <?php
include '../app/views/components/header.php';
$job = $data['job'][0] ?? [];
?>

<div class="container">
    <h1>CREATE</h1>
    <div>
        <a href="/">Back</a>
    </div>
    <div class="row justify-content-center">
            <div class="col-12 col-sm-6 mt-5 border p-3">
            <form action="/JobController/store" method="POST">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" aria-describedby="nameHelpBlock">
                <div id="nameHelpBlock" class="form-text">
                    Enter name of a job.
                </div>
                <hr>
                <label for="salary" class="form-label">Salary</label>
                <input type="number" id="salary" name="salary" class="form-control" aria-describedby="salaryHelpBlock">
                <div id="salaryHelpBlock" class="form-text">
                    Enter salary.
                </div>
                <div class="mt-4 px-3 row justify-content-between">
                <input type="submit" name="submited" value="Submit" class="btn btn-primary col-3"><a class="btn btn-primary col-2" href="/jobs/index">Back</a>
                </div>
            </form>
            </div>
        </div>
</div>
<?php

include '../app/views/components/footer.php';
?>