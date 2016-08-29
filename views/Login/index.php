<div class="row">
    
    <div class="col-sm-12">
        <h2 align="center">LOGIN HERE</h2>
    </div>
    
    

</div>

<!---   Body   -->
<hr>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="col-sm-6">
            <img src="<?php echo URL; ?>public/images/Login/background.jpg" class="img-responsive" style="width: 80%;">
        </div>
        <div class="col-sm-6">
            <div class="error">

            </div>
            <form action="<?php echo URL; ?>Login/run" method="post" name="login/run">
                <p style="color: red;">
                    <?php
                        
                    if(isset($_GET['msg'])){
                        if($_GET['msg'] == 000){
                            echo "Incorrect username or password !";
                        }
                    }
                    
                    ?>
                    
                </p>
                <div class="form-group">
                    <label><h4>Email</h4></label>
                    <input type="email" class="form-control input-lg" name="username" id="email"   placeholder="Email" autocomplete="off" required="">
                </div>
                <div class="form-group">
                    <label><h4>Password</h4></label>
                    <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password" required="">
                </div>


                <button type="submit" class="btn btn-default input-lg" >Login Now</button>
            </form>

            <hr>
            <h4>Still, Not a member  <a href="Register">Register with us</a> </h4>
        </div>
    </div>
    <div class="col-sm-1"></div>

</div>