<?php
include '../app/views/components/header.php';
$job = $data['job'][0] ?? [];

?>

<div>
<div class="container">
        <h1>Show</h1>
        <br>
        <br>
        <div>
            <a href="/">Back</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 mt-5 border p-3">
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?=$job['id']?></th>
                            <td><?=$job['name']?></td>
                            <td><?=$job['salary']?></td>
                            <td class="row justify-content-center">
                            <div class="col-4 ">
                            <a class="btn btn-warning btn-sm" href="/jobs/edit/<?= $job['id'] ?>">EDIT</a>

                            </div>
                            <div class="col-4 ">
                                <form action="/jobs/delete/<?= $job['id'] ?>" method="POST" class="">
                                    <input type="hidden" name="job_id" value="<?= $job['id']?>">
                                    <input type="submit" onclick="return confirm('Are you sure you want to delete this item?');" name="deleted" value="DELETE" class="btn btn-danger btn-sm" / >
                                </form>
                            </div>
                            </td>
                        </tr>
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php

include '../app/views/components/footer.php';
?>