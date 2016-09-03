<?php

$job = $this->ListJob;
$customer = $this->Customer;

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
        <div class="col-sm-8">
            <div class="project_manager">

                <h3>Project Details</h3>

                <hr>
                <form method="post" action="<?php echo URL; ?>Project/initiate/<?php echo $job['id']; ?>">
                    <div class="form-group">
                        <label>Job ID</label>
                        <input type="text" class="form-control" value="<?php echo $job['id']; ?>" name="job_id" id="id">
                    </div>
                    <div class="form-group">
                        <label>Customer ID</label>
                        <input type="text" class="form-control" value="<?php echo $job['customer_id']; ?>" name="customer_id" id="id">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" value="<?php echo $job['title']; ?>" name="title" id="username" placeholder="Title" required="">
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <textarea class="form-control" name="description" placeholder="Description" required>
                            <?php echo $job['description']; ?>
                        </textarea>
                    </div>
                    <div class="form-group form-group-sm">
                        
                        <select class="form-control" name="status">
                            <option  >ongoing</option>
                            <option  >completed</option>
                            <option >paused</option>
                            <option >ignored</option>
                            <option >cancelled</option>
                        </select>
                    </div>

                    <button  type="submit" class="btn btn-block btn-success">Initiate Project</button>
                </form>



            </div>
        </div>
    </div>





</div>







