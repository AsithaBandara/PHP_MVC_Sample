<?php
$project = $this->Project;
?>

<div class="col-sm-10">


    <div class="project_manager">

        <div class="row">

            <div class="col-sm-12">
                <h3 align="center"><?php echo $project['title']; ?></h3>

                <p align="center" style="color: #269abc;"><?php echo $project['description']; ?></p>

                <table class="table table-hover">
                    <tr>
                        <td >Start Date</td><td style="color: red;"><?php echo $project['start_date']; ?></td> 
                        <td>End Date</td><td style="color: red;"><?php echo $project['end_date']; ?></td>
                    </tr>
                </table>

            </div>


        </div>

        <div class="row">   


            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#components"><h4>Components</h4></a>
                        </h4>
                    </div>
                    <div id="components" class="panel-collapse collapse">
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


