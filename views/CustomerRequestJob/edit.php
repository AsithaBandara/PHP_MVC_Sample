
<div class="col-sm-10">
    <!-- Project Manager Registration start -->
    <hr>
    <div class="project_manager">

        <h2>Edit Requested Job</h2>

        <hr>
        <form method="post" action="<?php echo URL; ?>CustomerRequestJob/editSave/<?php echo $this->job['id']; ?>">
            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" value="<?php echo $this->job['id']; ?>" name="id" id="id" disabled="">
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
            
            <button  type="submit" class="btn btn-block btn-success">Update</button>
        </form>



    </div>
    <!-- Project Manager Registration end -->


</div>




