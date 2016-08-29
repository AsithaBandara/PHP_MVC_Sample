
<div class="col-sm-10">

    <hr>


    <div class="row">

        <div class="col-lg-4">
            <h3>Status Description</h3>
            <hr>
            <div class="panel panel-info">
                <div class="panel-heading">PENDING</div>
                <div class="panel-body">you can leave the status as pending if you don't have time to look into it</div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">ACCEPTED</div>
                <div class="panel-body">Accepted status will send the message to the client that you have accepted the job and proceed to he project initiation</div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">REJECTED</div>
                <div class="panel-body">Rejected status will tell the customer that you have rejected the job due to a mentioned status</div>
            </div>
        </div>
        <div class="col-lg-4">
            <h3>Customer Information</h3>
            <hr>
            <table class="table table-hover table-striped">   
                <tr>
                    <td>Email</td><td><?php echo $this->customer['email']; ?></td>
                </tr>
                <tr>
                    <td>First Name</td><td><?php echo $this->customer['first_name']; ?></td>
                </tr>
                <tr>
                    <td>Last Name</td><td><?php echo $this->customer['last_name']; ?></td>
                </tr>
                <tr>
                    <td>Telephone</td><td><?php echo $this->customer['telephone']; ?></td>
                </tr>
                <tr>
                    <td>House no</td><td><?php echo $this->customer['house_no']; ?></td>
                </tr>
                <tr>
                    <td>Street</td><td><?php echo $this->customer['street_name']; ?></td>
                </tr>
                <tr>
                    <td>City</td><td><?php echo $this->customer['city']; ?></td>
                </tr>
                <tr>
                    <td>Country</td><td><?php echo $this->customer['country']; ?></td>
                </tr>
            </table>

        </div>
        <div class="col-lg-4">
            <div class="project_manager">

                <h2>Edit Job</h2>

                <hr>
                <form method="post" action="<?php echo URL; ?>ManagerJob/editSave/<?php echo $this->job['id']; ?>">
                    <div class="form-group">
                        <label>Job ID</label>
                        <input type="text" class="form-control" value="<?php echo $this->job['id']; ?>" name="id" id="id" disabled="">
                    </div>
                    <div class="form-group">
                        <label>Customer ID</label>
                        <input type="text" class="form-control" value="<?php echo $this->job['customer_id']; ?>" name="customer_id" id="id">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" value="<?php echo $this->job['title']; ?>" name="title" id="username" placeholder="Title" required="">
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <textarea class="form-control" name="description" placeholder="Description" required>
                            <?php echo $this->job['description']; ?>
                        </textarea>
                    </div>
                    <div class="form-group form-group-lg">
                        <select class="form-control" name="status">
                            <option <?php if ($this->job['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                            <option <?php if ($this->job['status'] == 'accepted') echo 'selected'; ?>>Accepted</option>
                            <option <?php if ($this->job['status'] == 'rejected') echo 'selected'; ?>>Rejected</option>
                        </select>
                    </div>

                    <button  type="submit" class="btn btn-block btn-success">Update</button>
                </form>



            </div>
        </div>
    </div>





</div>




