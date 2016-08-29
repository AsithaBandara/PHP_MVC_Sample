
<div class="col-sm-10">

    <hr>
    <div class="project_manager">

        <div class="row">
            <div class="col-sm-4">
                <p><button type="button" class="btn btn-default btn-sm btn-block" data-toggle="modal" data-target="#add_job">New Request</button></p>
            </div>
            <div class="col-sm-8" id="search_by_email">

            </div>

        </div>

        <div class="panel-body" style="color: red;" >
            <?php
            if (isset($this->error)) {
                $came_error = $this->error;
                print_r($came_error['error']);
            }
            ?>

        </div>






        <hr>
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#pendinglist"><h4>Pending Job List</h4></a>
                    </h4>
                </div>
                <div id="pendinglist" class="panel-collapse collapse">
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover" id="projects">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody><?php
                                foreach ($this->PendingJobList as $key => $value) {
                                    ?>
                                    <tr>

                                        <td><?php echo $value['id']; ?></td>
                                        <td ><?php echo $value['title']; ?></td>
                                        <td><?php echo $value['description']; ?></td>
                                        <td>                          
                                            <button class="btn 

                                                    <?php
                                                    if ($value['status'] == 'pending') {

                                                        echo 'btn-info';
                                                    } else
                                                    if ($value['status'] == 'accepted') {
                                                        echo 'btn-success';
                                                    } else
                                                    if ($value['status'] == 'rejected') {
                                                        echo 'btn-danger';
                                                    }
                                                    ?>"><?php echo $value['status']; ?></button>
                                        </td>
                                        <td class="center">

                                            <a href="<?php echo URL . "CustomerRequestJob/edit/" . $value['id']; ?>" ><button class="btn ">Edit</button></a>

                                            <a href="<?php echo URL . "CustomerRequestJob/delete/" . $value['id']; ?>"><button class="btn ">Remove</button></a>

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
        
        <hr>
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#acceptedlist"><h4>Accepted Job List</h4></a>
                    </h4>
                </div>
                <div id="acceptedlist" class="panel-collapse collapse">
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover" id="projects">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody><?php
                                foreach ($this->AcceptedJobList as $key => $value) {
                                    ?>
                                    <tr>

                                        <td><?php echo $value['id']; ?></td>
                                        <td ><?php echo $value['title']; ?></td>
                                        <td><?php echo $value['description']; ?></td>
                                        <td>                          
                                            <button class="btn 

                                                    <?php
                                                    if ($value['status'] == 'pending') {

                                                        echo 'btn-info';
                                                    } else
                                                    if ($value['status'] == 'accepted') {
                                                        echo 'btn-success';
                                                    } else
                                                    if ($value['status'] == 'rejected') {
                                                        echo 'btn-danger';
                                                    }
                                                    ?>"><?php echo $value['status']; ?></button>
                                        </td>
                                        <td class="center">

                                            <a href="<?php echo URL . "CustomerRequestJob/edit/" . $value['id']; ?>" ><button class="btn ">Edit</button></a>

                                            <a href="<?php echo URL . "CustomerRequestJob/delete/" . $value['id']; ?>"><button class="btn ">Remove</button></a>

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
        
        
        <hr>
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#rejectedlist"><h4>Rejected Job List</h4></a>
                    </h4>
                </div>
                <div id="rejectedlist" class="panel-collapse collapse">
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover" id="projects">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody><?php
                                foreach ($this->RejectedJobList as $key => $value) {
                                    ?>
                                    <tr>

                                        <td><?php echo $value['id']; ?></td>
                                        <td ><?php echo $value['title']; ?></td>
                                        <td><?php echo $value['description']; ?></td>
                                        <td>                          
                                            <button class="btn 

                                                    <?php
                                                    if ($value['status'] == 'pending') {

                                                        echo 'btn-info';
                                                    } else
                                                    if ($value['status'] == 'accepted') {
                                                        echo 'btn-success';
                                                    } else
                                                    if ($value['status'] == 'rejected') {
                                                        echo 'btn-danger';
                                                    }
                                                    ?>"><?php echo $value['status']; ?></button>
                                        </td>
                                        <td class="center">

                                            <a href="<?php echo URL . "CustomerRequestJob/edit/" . $value['id']; ?>" ><button class="btn ">Edit</button></a>

                                            <a href="<?php echo URL . "CustomerRequestJob/delete/" . $value['id']; ?>"><button class="btn ">Remove</button></a>

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











    </div>



</div>


<!-- ===================================================================================================================   -->


<!-- Add manager model form start-->
<div class="modal fade" id="add_job">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Job</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="<?php echo URL; ?>customerRequestJob/create">
                    <div class="form-group">
                        <label>Email address / Username</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" required="">
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <textarea class="form-control" name="description" id="manager_description" placeholder="Description" required>
                            
                        </textarea>

                    </div>
                    <button  type="submit" class="btn btn-block btn-success">Request Now</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>


        </div>
    </div>
</div>
<!-- Add manager Form end -->