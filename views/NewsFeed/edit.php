
<div class="col-sm-10">
    <!-- Project Manager Registration start -->
    <hr>
    <div class="project_manager">

        <h2>Edit News Feed</h2>

        <hr>
        <form method="post" action="<?php echo URL; ?>NewsFeed/editSave/<?php echo $this->news['id']; ?>">
            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" value="<?php echo $this->news['id']; ?>" name="id" id="id" disabled="">
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" value="<?php echo $this->news['title']; ?>" name="title" id="username" placeholder="Title" required="">
            </div>
            <div class="form-group">
                <label >Description</label>
                <textarea class="form-control" name="description" placeholder="Description" required>
                            <?php echo $this->news['description']; ?>
                </textarea>
                </div>
            <div class="form-group">
                <select class="form-control" name="status">
                    <option <?php if ($this->news['status'] == 'active') echo 'selected'; ?>>Active</option>
                    <option <?php if ($this->news['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                </select>
            </div>
            <button  type="submit" class="btn btn-block btn-success">Update</button>
        </form>



    </div>
    <!-- Project Manager Registration end -->


</div>




