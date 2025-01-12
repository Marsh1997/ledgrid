<!DOCTYPE html>
<html lang="en-US">
    <!-- Include the head -->
    <?php include('HTML/header.php'); ?>
    <body>
        <script>
            $(document).ready(function(){
                $('#username').keypress(function(e){
                    if(e.keyCode==13)
                        $('#submit').click();
                });
            });
            $(document).ready(function(){
                $('#password').keypress(function(e){
                    if(e.keyCode==13)
                        $('#submit').click();
                });
            });
        </script>
        <!-- Entire page -->
        <div class='main'>
            
            <!-- Anything that has to do with the login. -->
            <div id="loginContainer">
            <header class="center" style="margin-bottom: -65px">WSU CS Project - LedGrid</header>
            <br>
            <img id="userImg" src="img/thumbnail_Icon.png" alt="Profile Img" style="width:480px;height:250px; padding-right: 2.5em">
                <!-- Everything will process so fast in the form, you wont
                even notice the switch. Basically redirects. -->
                <form action="php/action.php" method="POST">
                    <p id="p1" style="margin-top: -80px "></p>
                    <input type="text" placeholder="Username" name="username" id="username" value="" required>
                    <br>
                    <input type="password" placeholder="Password" name="password" id="password" required>
                    <br>
                    <!-- Bootstrapped the css of the button. All I have to do is 
                    Call the class of the style I want to use. Makes for simplier
                    and faster programming. -->
                    <button id="submit" type="button" class="btn btn-outline-light" style="padding: 0px " onclick="en();">Login</button>  
                </form>
                <br>
                <p style="color: white;" id="signup">Don't have an account? <a href="php/signup.php">Sign up Now!</a></p>
                <a href="php/ResetPassword.php">Reset Password</a>
            </div>
        </div>
        <!-- Variables will be by the url for failed login or timeout.  -->
        <?php 
            if(isset($_GET['failed'])) {
                if($_GET['failed'] == 1) {
                    echo '<script>document.getElementById("p1").innerHTML = "Username or password is incorrect. Please try again.";</script>';
                }
                else if ($_GET['failed'] == 2) {
                    echo '<script>document.getElementById("p1").innerHTML = "Please verify your credentials and login.";</script>';
                }
                else if ($_GET['failed'] == 3){
                    echo '<script>document.getElementById("p1").innerHTML = "Password change failed. ";</script>';
                }
            }
        ?>
    </body>
</html>