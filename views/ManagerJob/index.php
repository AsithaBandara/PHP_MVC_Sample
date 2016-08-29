
<div class="col-sm-10" >

    <h3>Job List</h3>
    <div class="row">

        <div class="col-sm-3" id="search_by_email">
            <p><input type="text" placeholder="search by title" class="form-control input-sm"></button></p>
        </div>

    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>Job Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>status</th>
                <th>Customer</th>
                <th>Date / Time</th>
                <th></th>

            </tr>
        </thead>
        <tbody>



            <?php
            $managerjob = new ManagerJobModel();
            $jobslist = $managerjob->showJobList();
            foreach ($jobslist as $key => $value) {
                ?>

                <tr>
                    <td>
                        <?php  echo $value[0];?>
                    </td>
                    <td>
                        <?php echo $value[1]; ?>
                    </td>
                    <td>
                        <?php echo $value[2]; ?>
                    </td>
                    <td>
                        <button class="btn 

                                <?php
                                if ($value[3] == 'pending') {

                                    echo 'btn-info';
                                } else
                                if ($value[3] == 'accepted') {
                                    echo 'btn-success';
                                } else
                                if ($value[3] == 'rejected') {
                                    echo 'btn-danger';
                                }
                                ?>"> <?php echo $value[3]; ?></button>



                    </td>
                    <td>
                        <?php echo $value[4]; ?>
                    </td>
                    <td>
                        <?php echo $value[5]; ?>
                    </td>
                    <td>
                        <a href="<?php echo URL . "ManagerJob/edit/" . $value[0]; ?>" >
                            <button class="btn btn-xs btn-block btn-toolbar">View</button>
                        </a>
                    </td>
                </tr>

                <?php
            }
            ?>
        </tbody>
    </table>

</div>