<?php
session_start();
error_reporting(0);
include('includes/config.php');?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Result Portal</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/flat/blue.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
       <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full viewport height */
        }

        nav {
            background-color: #2c3e50;
            padding: 15px;
            text-align: center;
            position: absolute; /* Position it at the top */
            width: 100%;
            top: 0;
        }

        nav a {
            color: #ecf0f1;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        .result {
            max-width: 600px;
            width: 100%; /* Make it responsive */
            padding: 20px;
            background-color: rgb(237, 253, 245);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .result h2 {
            color: #2c3e50;
            font-size: 24px;
            font-weight: bold;
        }

        .result h3 {
            font-size: 18px;
            color: #34495e;
        }

        #text {
            width: 80%;
            padding: 10px;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
            margin: 20px auto;
            display: block;
        }

        #check {
            width: 50%;
            padding: 10px;
            background-color: #27ae60;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
            font-size: 16px;
        }

        #check:hover {
            background-color: #219653;
        }

        .back a {
            text-decoration: none;
            color: #2980b9;
            font-weight: bold;
            display: block;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="result">
        <h2>STUDENT RESULT PORTAL</h2>
        <form action="result.php" method="post">
                                	<div class="form-group">
                                		<label for="rollid">Enter your Roll Id</label> 
                                        <input type="text" class="form-control" id="rollid" placeholder="Enter Your Roll Id" autocomplete="off" name="rollid">
                                	</div>
        
                               
                                    <div class="form-group">
                                                <label for="default" class=" control-label">Class</label>
        <select name="class" class="form-control" id="default" required="required">
        <option value="">Select Class</option>                            
        <button type="button" id="check">CHECK YOUR RESULT</button>
        <div class="back">
            <a href="index.php">Back To Home</a>
        </div>
    </div>
<?php $sql = "SELECT * from tblclasses";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
 </select>
</div>

    
                                    <div class="form-group mt-20">
                                        <div class="">
                                      
                                            <button type="submit" class="btn btn-success btn-labeled pull-right">Search<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                       <div class="col-sm-6">
                                                               <a href="index.php">Back to Home</a>
                                                            </div>
                                </form>

                                <hr>

                            </div>
                        </div>
                        <!-- /.panel -->
                    
                    </div>
                    <!-- /.col-md-6 col-md-offset-3 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->

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
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });
        </script>

        
    </body>
</html>
