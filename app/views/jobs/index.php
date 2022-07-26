<?php
include '../app/views/components/header.php';
$jobList = $data['jobList'] ?? [];
?>

<div>
    <div class="container p-3">
        <h1>Jobs Positions</h1>
        <br>

        <div class="row justify-content-center">
            <div class="col-12 col-sm-7 pb-3">
                <div class="row">
                    <div class="col-8">
                        <form action="/jobs/search" method="GET" class="flex">
                            <input type="text" name="search"><button class="btn sm-btn">&#128269;</button>
                        </form>
                    </div>
                    <div class="col-4">
                        <div>
                            <a class="btn btn-info" href="/jobs/create">Add New Job</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Job Name</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($jobList as $job) {
                        ?>
                            <tr>
                                <th scope="row"><?= $job['id'] ?></th>
                                <td><a href="/jobs/show/<?= $job['id'] ?>"><?= $job['name'] ?></a></td>
                                <td><?= number_format($job['salary'], 2) ?></td>
                                <td class="row justify-content-start">
                                    <div class="col-3 ">
                                        <a class="btn btn-warning btn-sm" href="/jobs/edit/<?= $job['id'] ?>">EDIT</a>

                                    </div>
                                    <div class="col-3 ">
                                        <form action="/jobs/delete/<?= $job['id'] ?>" method="POST" class="">
                                            <input type="hidden" name="job_id" value="<?= $job['id'] ?>">
                                            <input type="submit" onclick="return confirm('Are you sure you want to delete this item?');" name="deleted" value="DELETE" class="btn btn-danger btn-sm" />
                                        </form>
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