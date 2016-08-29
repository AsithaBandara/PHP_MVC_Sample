
<div class="col-sm-10">


    <div class="project_manager">

        <div class="row">

            <div >
                <h3>Initiate Project</h3>
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
        <hr>

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


<!-- ===================================================================================================================   -->


