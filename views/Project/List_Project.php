<?php
$projects = $this->Projects;
?>


<div class="col-sm-10">

    <hr>


    <div class="row">


        <div class="col-sm-12">



            <table class="table table-striped table-bordered table-hover" id="projects">
                <thead>
                    <tr>
                        <th>Project id</th>
                        <th>Job Id</th>
                        <th>Title</th>

                        <th>Customer Name</th>
                        <th>Manager Name</th>
                        <th>Leader Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody><?php
                    foreach ($projects as $key => $value) {
                        ?>
                        <tr>

                            <td><?php echo $value['project_id']; ?></td>
                            <td><?php echo $value['job_id']; ?></td>
                            <td ><?php echo $value['title']; ?></td>

                            <td><?php echo $value['customer_first_name']; ?></td>
                            <td><?php echo $value['manager_first_name']; ?></td>
                            <td><?php echo $value['leader_first_name']; ?></td>
                            <td><?php echo $value['start_date']; ?></td>
                            <td><?php echo $value['end_date']; ?></td>
                            <td>                          
                                <button class="btn btn-xs

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
                                        ?>"
                                        >
                                            <?php echo $value['status']; ?>
                                </button>
                            </td>
                            <td class="center">

                                <a href="<?php echo URL . "Project/project_dashboard/" . $value['project_id']; ?>" ><button class="btn btn-xs btn-toolbar">View Details</button></a>



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







