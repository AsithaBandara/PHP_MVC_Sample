<?php
if (Session::get('role') == 'manager') {
    ?>
    <div class="col-sm-10">
        <!-- Project Manager Registration start -->
        <hr>
        <div class="project_manager">

            <div class="row">
                <h2>Customer List</h2>

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
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                        <th>Telephone</th>
                        <th>Status</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody><?php
                    foreach ($this->customerList as $key => $value) {
                        ?>
                        <tr>

                            <td><?php echo $value['id']; ?></td>
                            <td ><?php echo $value['email']; ?></td>
                            <td><?php echo $value['first_name']; ?></td>
                            <td><?php echo $value['last_name']; ?></td>
                            <td><?php echo $value['city']; ?></td>
                            <td><?php echo $value['telephone']; ?></td>

                        </tr>

                        <?php
                    }
                    ?>

                </tbody>
            </table>


        </div>
        <!-- Project Manager Registration end -->


    </div>


    <!-- ===================================================================================================================   -->




    <?php
}
?>


