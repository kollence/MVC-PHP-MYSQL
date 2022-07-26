<?php
include '../app/views/components/header.php';
$employees = $data['employees'] ?? [];
// print_r($employees);
// die();
?>

<div>
    <div class="container p-3">
        <h1>Employees</h1>
        <br>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-7 pb-3">
                <div class="row">
                    <div class="col-8">
                        <form action="/employees/search" method="GET" class="flex">
                            <input type="text" name="search"><button class="btn sm-btn">&#128269;</button>
                        </form>
                    </div>
                    <div class="col-4">
                        <div>
                            <a class="btn btn-info" href="/employees/create">Add New Employe</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Degree</th>
                            <th scope="col">Job Position</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($employees as $employee) {
                            $salary = ( $employee['salary'] == ($employee['job_salary'] ?? false) ) ? ['name'=>'general','color'=> 'gray'] : ['name'=>'specified', 'color'=>'green'];
                        ?>
                            <tr>
                                <th scope="row"><?= $employee['id'] ?></th>
                                <td><a href="/employees/show/<?= $employee['id'] ?>"><?= $employee['name'] ?></a></td>
                                <td><?= $employee['email'] ?></td>
                                <td><?= $employee['degree'] ?></td>
                                <td><?= $employee['job_position'] ?></td>
                                <td>
                                    <b style="color: <?= $salary['color'] ?>"><?= number_format($employee['salary'], 2) ?></b>
                                    <div><small><?= $salary['name'] ?></small></div>
                                </td>
                                <td >
                                    <div class="row justify-content-center">
                                      <div class="col-5">
                                        <a class="btn btn-warning btn-sm" href="/employees/edit/<?= $employee['id'] ?>">EDIT</a>

                                    </div>
                                    <div class="col-7">
                                        <form action="/employees/delete/<?= $employee['id'] ?>" method="POST" class="">
                                            <input type="hidden" name="employee_id" value="<?= $employee['id'] ?>">
                                            <input type="submit" onclick="return confirm('Are you sure you want to delete this item?');" name="deleted" value="DELETE" class="btn btn-danger btn-sm" />
                                        </form>
                                    </div>  
                                    </div>
                                    
                                </td>
                            </tr>
                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include '../app/views/components/footer.php';
?>