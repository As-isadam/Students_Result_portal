
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{

    echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <h2>Welcome to the Student Result Management System</h2>
    </nav>
    <div class="main">
        <h1>Student Result Management System</h1>

        <div class="container">
            <div class="student">
                <h2>For Students</h2>
                <p>To search your result, click the button below:</p>
                <button id="result"><a href="find-result.php">Click Here</a></button>
            </div>

            <div class="admin">
                <h2>Admin Login</h2>
                <form>
                    <label for="Username">username:</label>
                    <input type="username" name="username" id="username" required placeholder="Enter your username">
                    
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required placeholder="Enter your password">
                    
                    <button type="submit" id="login"><a href="dashboard.php">Login</a></button>
                </form>
            </div>
        </div>
    </div>

    </div>
        <!-- /.main-wrapper -->
 
        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){

            });
        </script>
</body>
</html>
