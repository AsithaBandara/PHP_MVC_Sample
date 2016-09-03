<?php
$project = $this->AllProjects;
?>

<div class="col-sm-10">


    <h3>Projects</h3>
    <p>Following projects are assigned to you by the manager</p>

    <hr>

    <table class="table table-striped table-bordered table-hover" id="projects">
        <thead>
            <tr>
                <th>Project id</th>
                <th>Title</th>
                <th>start date</th>
                <th>End date</th>
                <th>Manager ID</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody><?php
            foreach ($project as $key => $value) {
                ?>
                <tr>

                    <td><?php echo $value['project_id']; ?></td>
                    <td ><?php echo $value['title']; ?></td>
                    <td><?php echo $value['start_date']; ?></td>
                    <td><?php echo $value['end_date']; ?></td>
                    <td><?php echo $value['manager_id']; ?></td>
                    <td>                          
                        <button class="btn 

                                <?php
                                if ($value['status'] == 'ongoing') {

                                    echo 'btn-info';
                                } else
                                if ($value['status'] == 'completed') {
                                    echo 'btn-success';
                                } else
                                if ($value['status'] == 'cancelled') {
                                    echo 'btn-danger';
                                } else
                                if ($value['status'] == 'ignored') {
                                    echo 'btn-warning';
                                }
                                ?>"><?php echo $value['status']; ?></button>
                    </td>
                    <td class="center">

                        <a href="<?php echo URL . "LeaderProject/Project_Dashboard/" . $value['project_id']; ?>" ><button class="btn ">View</button></a>



                    </td>
                </tr>

                <?php
            }
            ?>

        </tbody>
    </table>

</div>
