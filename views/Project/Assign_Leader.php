<?php
$customer = $this->Customer;
$project = $this->Project;
$leaders = $this->Leader;
?>


<div class="col-sm-10">

    <hr>


    <div class="row">

        <div class="col-sm-4">

            <h3>Customer Information</h3>
            <hr>
            <table class="table table-hover table-striped">   
                <tr>
                    <td>Email</td><td><?php echo $customer['email']; ?></td>
                </tr>
                <tr>
                    <td>First Name</td><td><?php echo $customer['first_name']; ?></td>
                </tr>
                <tr>
                    <td>Last Name</td><td><?php echo $customer['last_name']; ?></td>
                </tr>
                <tr>
                    <td>Telephone</td><td><?php echo $customer['telephone']; ?></td>
                </tr>
                <tr>
                    <td>House no</td><td><?php echo $customer['house_no']; ?></td>
                </tr>
                <tr>
                    <td>Street</td><td><?php echo $customer['street_name']; ?></td>
                </tr>
                <tr>
                    <td>City</td><td><?php echo $customer['city']; ?></td>
                </tr>
                <tr>
                    <td>Country</td><td><?php echo $customer['country']; ?></td>
                </tr>
            </table>

        </div>
        <div class="col-sm-4">

            <h3>Project Information</h3>
            <hr>
            <table class="table table-hover table-striped">   
                <tr>
                    <td>Project ID</td><td><?php echo $project['id']; ?></td>
                </tr>
                <tr>
                    <td>Manager ID</td><td><?php echo $project['manager_id']; ?></td>
                </tr>
                <tr>
                    <td>Created at</td><td><?php echo $project['created_at']; ?></td>
                </tr>
                <tr>
                    <td>Updated at</td><td><?php echo $customer['updated_at']; ?></td>
                </tr>

            </table>

        </div>
        <div class="col-sm-4">
            <div class="project_manager">

                <h3>Assign Details</h3>

                <hr>
                <form method="post" action="<?php echo URL; ?>Project/assign/<?php echo $project['id']; ?>">
                    <div class="form-group">
                        <label>Project ID</label>
                        <input type="text" class="form-control" value="<?php echo $project['id']; ?>" name="project_id"  id="project_id">
                    </div>
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="text" class="form-control" value="<?php echo $project['start_date']; ?>" name="start_date" placeholder="YYYY-MM-DD" id="start_date">
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="text" class="form-control" value="<?php echo $project['end_date']; ?>" name="end_date" placeholder="YYYY-MM-DD" id="end_date">
                    </div>
                    <div class="form-group">
                        <label>Leader</label>

                        <select class="form-control" name="leader_id" required="">
                            <?php
                            foreach ($leaders as $key => $value) {
                                ?>

                                <option><?php echo $value['id']; ?></option>

                                <?php
                            }
                            ?>

                        </select>
                    </div>
                    
                    

                    <button  type="submit" class="btn btn-block btn-success">Assign Leader</button>
                </form>



            </div>
        </div>
    </div>





</div>







