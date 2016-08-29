<?php
if (Session::get('role') == 'customer') {
    ?>
    <div class="col-sm-10">
        <!-- Customer update page start -->
        <hr>
        <div class="project_manager">

            <div class="row">
                <div class="col-sm-4">
                    <p>
                    <h3>Edit Your
                        Profile</h3></p>
                </div>


            </div>

            <div class="panel-body" style="color: red;" >
                <a href=""><button class="btn btn-xs btn-warning">Edit login details</button></a>
                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete_customer">Delete My Account</button>
                <?php
                if (isset($this->error)) {
                    $came_error = $this->error;
                    print_r($came_error['error']);
                }
                ?>

            </div>
            <hr>

            <?php
            $customer = $this->listCustomer;
            ?>

            <div class="row">
                <form method="post" action="<?php echo URL; ?>Customer/editSave/<?php echo $customer['id']; ?>">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" value="<?php echo $customer['id']; ?>" name="id" id="id" disabled="">
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" value="<?php echo $customer['first_name']; ?>" name="first_name" id="first_name"  >
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $customer['last_name']; ?>" name="last_name" id="last_name" >
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="<?php echo $customer['email']; ?>" name="email" id="email" disabled="" >
                        </div>



                    </div>
                    <div class="col-lg-3">

                        <div class="form-group">
                            <label>House No</label>
                            <input type="text" class="form-control" value="<?php echo $customer['house_no']; ?>" name="house_no" id="house_no" >
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" value="<?php echo $customer['city']; ?>" name="city" id="city" >
                        </div>
                        <div class="form-group">
                            <label>Postal code</label>
                            <input type="text" class="form-control" value="<?php echo $customer['postal_code']; ?>" name="postal_code" id="postal_code" >
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="text" class="form-control" value="<?php echo $customer['dob']; ?>" name="dob" id="dob" placeholder="YYYY-MM-DD">
                        </div>



                    </div>
                    <div class="col-lg-3">

                        <div class="form-group">
                            <label>Street Name</label>
                            <input type="text" class="form-control" value="<?php echo $customer['street_name']; ?>" name="street_name" id="street_name" >
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" value="<?php echo $customer['country']; ?>" name="country" id="country" >
                        </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="text" class="form-control" value="<?php echo $customer['telephone']; ?>" name="telephone" id="telephone" >
                        </div>
                        <div class="form-group">
                            <label >Picture</label>
                            <input type="text" class="form-control" value="<?php echo $customer['picture']; ?>" name="picture" id="description" placeholder="Picture URL">
                        </div>

                        <button  type="submit" class="btn btn-block btn-success">Update</button>

                    </div>
                </form> 

            </div>










        </div>
        <!-- customer update page end -->


    </div>


    <!-- ===================================================================================================================   -->
    <!-- delete customer model start -->
    <div class="modal fade" id="delete_customer">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete My Account !!</h4>
                    <p style="color: red;">We will miss you !!! </p>
                    
                </div>
                <div class="modal-body">

                    <form method="post" action="<?php echo URL; ?>Customer/delete/<?php echo $customer['id']; ?>">
                        <div class="form-group">
                            <label>Email address / Username</label>
                            <input type="email" class="form-control" name="email" id="manager_uname" placeholder="email" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="manager_pass" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label >Tell us why you wanna quit  </label>
                            <textarea class="form-control" name="description" id="manager_description" placeholder="Description" required>
                                
                            </textarea>
                            
                        </div>
                        <button  type="submit" class="btn btn-block btn-danger">Delete</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>


            </div>
        </div>
    </div>

    <!-- delete customer model end -->



    <?php
}
?>


