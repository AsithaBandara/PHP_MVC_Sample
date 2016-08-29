
    
<div class="row">

    <div class="col-sm-12">
        <h2 align="center">CUSTOMER REGISTRATION</h2>
    </div>



</div>

<hr>


<!-- body  -->
<div class="row">
    <div class="col-sm-1">

    </div>

    <div class="col-sm-2">
        <img class="img-responsive img-circle" src="<?php echo URL; ?>public/images/register_now.png">
    </div>

    <div class="col-sm-5">
        <form action="<?php echo URL; ?>Register/create" method="post" name="customer_reg_form">
            <div class="form-group">
                <label>First Name<span style="color: red;"> *</span></label>
                <input type="text" class="form-control " name="first_name" id="first_name" value="" placeholder="First Name" required="">
            </div>
            <div class="form-group">
                <label>Last Name<span style="color: red;"> *</span></label>
                <input type="text" class="form-control " name="last_name" id="last_name" value="" placeholder="Last Name">
            </div>
            <div class="form-group">
                <label>Username (Email is the Username)<span style="color: red;"> *</span></label>
                <input type="email" class="form-control " name="username" id="user_name"   placeholder="Email" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Password<span style="color: red;"> *</span></label>
                <input type="password" class="form-control " name="password" id="user_password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label>Retype Password<span style="color: red;"> *</span></label>
                <input type="password" class="form-control " name="password_again" id="password_again" placeholder="Retype Password" required>
            </div>

            <button type="submit" class="btn btn-default ">Register</button>   <span style="color: red;"> *</span> login if you are already a member <a href="<?php echo URL; ?>Login" >Login</a>

        </form>
    </div>
    <div class="col-sm-3">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">Attention to following Description</div>
                <div class="panel-body" style="color: red;" >
                    <?php
                    if (isset($this->error)) {
                        $came_error = $this->error;
                        print_r($came_error['error']);
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-1">

    </div>

</div>