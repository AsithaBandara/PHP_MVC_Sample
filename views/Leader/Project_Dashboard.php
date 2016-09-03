<?php
$project = $this->Project;
$component = $this->component;
?>

<div class="col-sm-10">


    <div class="project_manager">

        <div class="row">

            <div class="col-sm-12">
                <h3>Title : <?php echo $project['title']; ?></h3>

                <p style="color: #269abc;"><?php echo $project['description']; ?></p>

                <table class="table table-hover">
                    <tr>
                        <td >Start Date</td><td style="color: red;"><?php echo $project['start_date']; ?></td> 
                        <td>End Date</td><td style="color: red;"><?php echo $project['end_date']; ?></td>
                    </tr>
                </table>

            </div>


        </div>

        <div class="row">   

            <div class="col-sm-4">
                <p><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#add_component">Add New Component</button></p>
            </div>
            <div class="col-sm-9">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <td>Component Id</td>
                        <td>Title</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Payment</td>
                        <td>Status</td>
                        <td></td>

                    </tr>

                    <?php
                    foreach ($component as $key => $value) {
                        ?>
                        <tr>

                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['title'] ?></td>
                            <td><?php echo $value['start_date'] ?></td>
                            <td><?php echo $value['end_date'] ?></td>
                            <td>xx</td>
                            <td>
                                <button class="btn btn-xs <?php
                                    if ($value['status'] == 'ongoing') {
                                        echo 'btn-info';
                                    } else if ($value['status'] == 'completed') {
                                        echo 'btn-success';
                                    } else if ($value['status'] == 'paused') {
                                        echo 'btn-toolbar';
                                    } else if ($value['status'] == 'ignored') {
                                        echo 'btn-warning';
                                    } else if ($value['status'] == 'cancelled') {
                                        echo 'btn-danger';
                                    }
                                        ?>">
                                        <?php echo $value['status'] ?>
                                </button>

                            </td>
                            <td class="center">
                                <a href="">edit</a> | 
                                <a href="">view</a>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>

                </table>
            </div>
            <div class="col-sm-3">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse2"><h4>Customer</h4></a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
                                echo $project['customer_id'] . "<br>";
                                echo $project['customer_first_name'] . "<br>";
                                echo $project['customer_email'] . "<br>";
                                echo $project['customer_telephone'] . "<br>";
                                echo $project['customer_city'];
                                ?>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1"><h4>Leader</h4></a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">

                                <?php
                                echo $project['leader_id'] . "<br>";
                                echo $project['leader_first_name'] . "<br>";
                                echo $project['leader_email'] . "<br>";
                                echo $project['leader_status'] . "<br>";
                                echo $project['leader_telephone'];
                                ?>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse3"><h4>Manager</h4></a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
                                echo $project['manager_id'] . "<br>";
                                echo $project['manager_first_name'] . "<br>";
                                echo $project['manager_email'] . "<br>";
                                echo $project['manager_status'] . "<br>";
                                echo $project['manager_telephone'];
                                ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>




        <hr>











    </div>



</div>


<!-- ===================================================================================================================   -->
<div class="modal fade" id="add_component">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Component</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="<?php echo URL; ?>LeaderProject/add_component/<?php echo $project['project_id'] ?>">

                    <div class="form-group">
                        <label>Project ID</label>
                        <input type="text" class="form-control" disabled="" name="project_id"  placeholder="Project_ID" value="<?php echo $project['project_id']; ?>" required="">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title"  placeholder="Title" required="">
                    </div>

                    <div class="form-group">
                        <label >Description</label>
                        <textarea class="form-control" name="description" placeholder="Description" required>
                            
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="text" class="form-control" name="start_date"  placeholder="YYYY-MM-DD" required="">
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="text" class="form-control" name="end_date"  placeholder="YYYY-MM-DD" required="">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option  >ongoing</option>
                            <option  >completed</option>
                            <option >paused</option>
                            <option >ignored</option>
                            <option >cancelled</option>
                        </select>
                    </div>
                    <button  type="submit" class="btn btn-block btn-success">Add</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>


        </div>
    </div>
</div>

