<?php
    include './navbar/navbar.php';
    include('../controller/editProfileController.php')
?>
<style>
    label{
        font-weight: bold;
        font-size: small;
    }

    .form-control::placeholder { 
        color: rgb(11, 11, 117);
        opacity: 50%;
        font-size: x-small;
    }  

    .btn-primary {
        background-color:  rgb(11, 11, 117);
        border-style: none;
        border-radius: 20px;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-size: 15px;
    }

    .btn-danger {
        background-color:  rgb(255, 68, 68);
        border-style: none;
        border-radius: 20px;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-size: 15px;
    }

    .form-control {
        border-radius: 20px;
    }

    label {
        padding-left: 5px;
    }

    input {
        font-size: small;
    }

    .validation {
        color: red;
        font-size: 12px;
        font-weight: bold;
        padding-top: 5px;
        text-align: center;
    }

</style>

<div class="container mt-5 min-vh-100">
    <i class="fas fa-user-circle fa-5x" style="display:flex; flex-direction:column; color: rgb(23, 17, 75); align-items: center;"></i>
    <br>
    <hr>
    <form class="w-50 ms-auto me-auto" action="./editProfile.php" method="post">
            <div class="col-lg-6 mt-5 ms-auto me-auto">
                <label class="form-label">Firstname</label>
                <input class="form-control" id="first_name" name="first_name" value="<?php echo $first_name ?>" placeholder="New Firstname" required>
                <div class="validation">
                    <?php
                        if(in_array("First name must not less than 2 and more than 25 characters",$error_array)){
                            echo'<p>First name must not less than 2 and more than 25 characters</p>';
                        }else if(in_array("First name must only contain letter",$error_array)){
                            echo'<p>First name must only contain letter</p>';
                        }
                    ?>
                </div> 
            </div>
            <div class="col-lg-6 mt-3 ms-auto me-auto">
                <label class="form-label">Lastname</label>
                <input class="form-control" id="last_name" name="last_name" value="<?php echo $last_name ?>" placeholder="New Lastname" required>
                <div class="validation">
                    <?php
                        if(in_array("Last name must not less than 2 and more than 25 characters",$error_array)){
                            echo'<p>Last name must not less than 2 and more than 25 characters</p>';
                        }else if(in_array("Last name must only contain words",$error_array)){
                            echo'<p>Last name must only contain words</p>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-6 mt-3 ms-auto me-auto">
                <label class="form-label">Phone Number</label>
                <input class="form-control" id="phone" name="phone" value="<?php echo $phone ?>" placeholder="New Phone Number" required>
                <div class="validation">
                    <?php
                        if(in_array("Phone number must not less than 11 and more than 13 characters",$error_array)){
                            echo'<p>Phone number must not less than 11 and more than 13 characters</p>';
                        }else if(in_array("Phone number must only contain number",$error_array)){
                            echo'<p>Phone number must only contain number</p>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-6 mt-3 ms-auto me-auto">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>
                <div class="validation">
                    <?php
                        if(in_array("Password must not less than 8 and more than 25 characters",$error_array)){
                            echo'<p>Password must not less than 8 and more than 25 characters</p>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mb-5 ms-auto me-auto d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="./profile.php">
                    <button class="btn btn-danger" type="button" name="cancel" >Cancel Edit</button>
                </a>
                <button class="btn btn-primary ms-2" type="submit" name="edit">Save Changes</button>
            </div>
    </form>
</div>