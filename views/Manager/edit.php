
<div class="col-sm-10">
    <!-- Project Manager Registration start -->
    <hr>
    <div class="project_manager">

        <h2>Edit Manager</h2>

        <hr>
        <form method="post" action="<?php echo URL; ?>Manager/editSave/<?php echo $this->user['id']; ?>">
            <div class="form-group">
                <label>ID</label>
                <input type="email" class="form-control" value="<?php echo $this->user['id']; ?>" name="id" id="id" disabled="">
            </div>
            <div class="form-group">
                <label>Email address / Username</label>
                <input type="email" class="form-control" value="<?php echo $this->user['email']; ?>" name="username" id="username" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label >Re-Enter Password</label>
                <input type="password" class="form-control" name="password_again" id="password_again" placeholder="Re-Enter Password" required>
            </div>
            <div class="form-group">
                <label >Description</label>
                <input type="text" class="form-control" value="<?php echo $this->user['description']; ?>" name="description" id="description" placeholder="Description" required>
            </div>
            <button  type="submit" class="btn btn-block btn-success">Update</button>
        </form>



    </div>
    <!-- Project Manager Registration end -->


</div>


