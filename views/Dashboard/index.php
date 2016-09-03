
<div class="col-sm-10" >


    <?php
    if (Session::get('role') == 'admin') {
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th># Managers</th>
                    <th># Leaders</th>
                    <th># Customers</th>
                    <th># Data Entry</th>
                    <th># Projects</th>

                </tr>
            </thead>
            <tbody>


                <?php
                $dashboard = new DashboardModel();
                $customers = $dashboard->countCustomers();
                $managers = $dashboard->countManagers();
                $dataentries = $dashboard->countDataEntries();
                $leaders = $dashboard->countLeaders();
                $projects = $dashboard->countProjects();
                ?>

            <td><h1 style="font-size: 50px; color: #449d44;">
                    <?php
                    foreach ($managers as $key => $value) {
                        echo $value[0];
                    }
                    ?>
                </h1>
            </td>
            <td>
                <h1 style="font-size: 50px; color: #449d44;">
                    <?php
                    foreach ($leaders as $key => $value) {
                        echo $value[0];
                    }
                    ?>
                </h1>
            </td>
            <td>
                <h1 style="font-size: 50px; color: #449d44;">
                    <?php
                    foreach ($customers as $key => $value) {
                        echo $value[0];
                    }
                    ?>
                </h1>


            </td>
            <td>
                <h1 style="font-size: 50px; color: #449d44;">
                    <?php
                    foreach ($dataentries as $key => $value) {
                        echo $value[0];
                    }
                    ?>
                </h1>


            </td>
            <td>
                <h1 style="font-size: 50px; color: #449d44;">
                    <?php
                    foreach ($projects as $key => $value) {
                        echo $value[0];
                    }
                    ?>
                </h1>


            </td>
            </tbody>
        </table>

        <?php
    } else if (Session::get('role') == 'customer') {


        $dashboard = new DashboardModel();
        $news = $dashboard->showNews();
        ?>

        <h2>News Feed</h2>
        <?php
        foreach ($news as $key => $value) {
            ?>

            <hr>

            <table class="table table-hover table-striped">

                <thead>
                    <tr>
                        <td><?php echo $value[4]; ?></td>
                        <td><marquee scrollamount="2"><?php echo $value[1]; ?></marquee></td>

                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <?php echo $value[2] ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php
        }
    } else if (Session::get('role') == 'manager') {
        ?>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th># Leaders</th>
                    <th># Customers</th>
                    <th># Projects</th>
                    <th># Jobs</th>

                </tr>
            </thead>
            <tbody>


                <?php
                $dashboard = new DashboardModel();
                $customers = $dashboard->countCustomers();
                $leaders = $dashboard->countLeaders();
                $projects = $dashboard->countProjects();
                $jobs = $dashboard->countJobs();
                ?>


            <td>
                <h1 style="font-size: 50px; color: #449d44;">
                    <?php
                    foreach ($leaders as $key => $value) {
                        echo $value[0];
                    }
                    ?>
                </h1>
            </td>
            <td>
                <h1 style="font-size: 50px; color: #449d44;">
                    <?php
                    foreach ($customers as $key => $value) {
                        echo $value[0];
                    }
                    ?>
                </h1>


            </td>

            <td>
                <h1 style="font-size: 50px; color: #449d44;">
                    <?php
                    foreach ($projects as $key => $value) {
                        echo $value[0];
                    }
                    ?>
                </h1>


            </td>
            <td>
                <h1 style="font-size: 50px; color: #449d44;">
                    <?php
                    foreach ($jobs as $key => $value) {
                        echo $value[0];
                    }
                    ?>
                </h1>


            </td>
            </tbody>
        </table>
        <hr>
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse2"><h4>Job list</h4></a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>status</th>
                                    <th>Customer</th>
                                    <th>Date / Time</th>

                                </tr>
                            </thead>
                            <tbody>



                                <?php
                                $dashboard = new DashboardModel();
                                $joblist = $dashboard->showJobList();
                                foreach ($joblist as $key => $value) {
                                    ?>

                                    <tr>
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
                                    </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        
        
        
        <hr>
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1"><h4>Quit Customers list</h4></a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>Date / Time</th>

                                </tr>
                            </thead>
                            <tbody>



                                <?php
                                $dashboard = new DashboardModel();
                                $quit_customers = $dashboard->showCustomersQuit();
                                foreach ($quit_customers as $key => $value) {
                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $value[1]; ?>
                                        </td>
                                        <td>
                                            <?php echo $value[2]; ?>
                                        </td>
                                        <td>
                                            <?php echo $value[3]; ?>
                                        </td>
                                    </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>






        <?php
    } else if(Session::get('role') == 'teamleader'){
        
        echo "sad";
        
    }
    ?>








</div>

