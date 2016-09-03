
<?php Session::init(); ?>

<?php
if (Session::get('loggedIn') == true) {
    ?>
    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-2" >

                <div>
                    <img src="<?php echo URL; ?>public/images/empty_user.png" class="img-responsive img-circle">

                </div>

                <h4 align="center" style="color: #4cae4c;"> <?php echo Session::get('username'); ?></h4>

                <div>

                    <?php
                    if (Session::get('role') == 'admin') {
                        ?>

                        <p>
                            <a href="<?php echo URL; ?>Manager" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Project Manager</button>
                            </a>
                        </p>
                        <p>
                            <a href="<?php echo URL; ?>Leader" style="text-decoration: none;">
                                <button type="button" class="select_tl btn btn-default btn-sm btn-block">Team Leader</button>
                            </a>
                        </p>
                        <p>
                            <a href="<?php echo URL; ?>DataEntry" style="text-decoration: none;">
                                <button type="button" class="select_tl btn btn-default btn-sm btn-block">Data Entry</button>
                            </a>
                        </p>
                        <p>
                            <a href="<?php echo URL; ?>Dashboard" style="text-decoration: none;">
                                <button type="button" class="select_ap btn btn-success btn-sm btn-block">Admin Dashboard</button>
                            </a>
                        </p>

                        <p> 

                            <?php
                        } else if (Session::get('role') == 'manager') {
                            ?>

                        <p>
                            <a href="<?php echo URL; ?>Project" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Project</button>
                            </a>
                        </p>

                        <p>
                            <a href="<?php echo URL; ?>ManagerJob" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Jobs</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Resources</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Payments</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Rating & Reviews</button>
                            </a>
                        </p>
                        <p>
                            <a href="<?php echo URL; ?>NewsFeed" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">News Feed</button>
                            </a>
                        </p>
                        <p>
                            <a href="<?php echo URL; ?>Dashboard" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Manager Dashboard</button>
                            </a>
                        </p>

                        <?php
                    } else if (Session::get('role') == 'teamleader') {
                        ?>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Leader Profile</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Communication</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Progress</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Team Management</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Review</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Resources</button>
                            </a>
                        </p>
                        <p>
                            <a href="<?php echo URL; ?>LeaderProject" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Project</button>
                            </a>
                        </p>
                        <?php
                    } else if (Session::get('role') == 'dataentry') {
                        ?>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Profile</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Add Workers</button>
                            </a>
                        </p>

                        <?php
                    } else if (Session::get('role') == 'customer') {
                        ?>
                        <p>
                            <a href="<?php echo URL; ?>Customer" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Profile</button>
                            </a>
                        </p>
                        <p>
                            <a href="<?php echo URL; ?>CustomerRequestJob" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Request a Job</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Project</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Communication</button>
                            </a>
                        </p>
                        <p>
                            <a href="manager_dashboard.php" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Rate and Review</button>
                            </a>
                        </p>
                        <p>
                            <a href="<?php echo URL; ?>Dashboard" style="text-decoration: none;">
                                <button type="button" class="select_pm btn btn-default btn-sm btn-block">Dashboard</button>
                            </a>
                        </p>
                        <?php
                    }
                    ?>


                    <a href="<?php echo URL; ?>Dashboard/logout">
                        <button type="submit" class="btn btn-danger btn-block">
                            Logout
                        </button>
                    </a>
                    </p>
                </div>
            </div>

            <?php
        }
        ?>