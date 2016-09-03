
<div class="col-sm-10">


    <div class="project_manager">

        <div class="row">

            <div >
                <h3>Project Dashboard</h3>
                <p>Use this dashboard to initiate a new project and edit its details.. etc</p>

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
        <a href="<?php echo URL . "Project/listprojects/" ?>">
            <button class="btn btn-lg btn-info">View All Projects in Process</button>
        </a>


        <hr>



        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1"><h4>Accepted Job List</h4></a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
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
                                foreach ($this->JobList as $key => $value) {
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

                                            <a href="<?php echo URL . "Project/send/" . $value['id']; ?>" ><button class="btn ">Send to Project</button></a>



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
                        <a data-toggle="collapse" href="#collapse2"><h4>On Going Projects</h4></a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
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
                                foreach ($this->Projects as $key => $value) {
                                    ?>
                                    <tr>

                                        <td><?php echo $value['id']; ?></td>
                                        <td ><?php echo $value['title']; ?></td>
                                        <td><?php echo $value['description']; ?></td>
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

                                            <a href="<?php echo URL . "Project/sendtoassign/" . $value['id']; ?>" ><button class="btn ">Assign Now</button></a>



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


