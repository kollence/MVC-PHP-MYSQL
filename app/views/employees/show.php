<?php
include '../app/views/components/header.php';
$employee = $data['employee'][0] ?? [];

?>

<div>
    <div class="container">
        <h1>Show</h1>
        <div>
            <a href="/employees/index">Back</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 mt-5 border p-3">
                <h1><?= $employee['name'] ?> <?= $employee['surname'] ?></h1>
                
                <div >
                <b>Email:</b> <?= $employee['email'] ?>
                </div>
                <div>
                <b>Phone:</b> <?= $employee['phone'] ?>
                </div>
                <div>
                <b>Degree:</b> <?= $employee['degree'] ?>
                </div>
                <div>
                <b>Job Position:</b> <?= $employee['job_position'] ?>
                </div>
                <div class="flex">
                    <div style="float: right;">
                        <h4>Salary: <b><?= $employee['salary'] ?></b></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    include '../app/views/components/footer.php';
    ?>