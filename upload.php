<? php
    session_name('srm');
    session_start();


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/../SRM/Images/favicon.PNG">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Attendance</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="http://herody.in/dash/tutor/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="http://herody.in/dash/tutor/assets/css/animate.min.css" rel="stylesheet" />
    <!--  Light Bootstrap Table core CSS    -->
    <link href="http://herody.in/dash/tutor/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />
    <link href="http://herody.in/dash/tutor/assets/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="http://herody.in/dash/tutor/assets/css/responsive.dataTables.min.css" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="http://herody.in/dash/tutor/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="http://herody.in/dash/tutor/assets/css/pe-icon-7-stroke.css" rel="stylesheet" >
</head>

<body>
    <?php
    
        if(isset( $_SESSION['var']) && isset($_SESSION['var1'])){
            
            $tut = $_SESSION['var']; 
            $val1 = $_SESSION['var1'];
            
        }
        
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "srm";

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    
           
$sql = "SELECT regno FROM student WHERE subject= '$val1' ";

        $result = $conn->query($sql);

        
    ?>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Student-Tutor
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a href="/../SRM/Tutor/index.html">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    
                    <li>
                        <a href="/../SRM/Tutor/upload.html">
                            <i class="pe-7s-user"></i>
                            <p>Attendance</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">SRMIST</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-dashboard"></i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                                    <p class="hidden-lg hidden-md">
                                        4 Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Student Registration Open</a></li>
                                    <li><a href="#">Arrear Class Registration</a></li>
                                    <li><a href="#">SEM 5 Subjects open</a></li>
                                    <li><a href="#">SEM 6 Semester Schedule Released</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-search"></i>
                                    <p class="hidden-lg hidden-md">Search</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="">
                                    <p>Account</p>
                                </a>
                            </li>

                            <li>
                                <form method="POST" action="logout.php">
                                    <a href="#">
                                        <p>Log out</p>
                                    </a>
                                </form>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Attendance</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="content">

                                    <div class="inner-item">
                                        <table class="display responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>REGISTER</th>
                                                    <th>NAME</th>
                                                    <th>SUBJECT</th>
                                                    <th>STATUS</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                        if($result->num_rows>0) {
                                                            while($row = $result->fetch_assoc()) {
                                                            
                                                                $value5 = $row["regno"];
                                                                echo "<td>".$value5."</td>";
                                                               echo "<td>".$row["name"]."</td>";
                                                                echo "<td>".$row["subject"]."</td>";
                                                                
                         echo "<td><select class='datatable-select' name='ater'><option>present</option><option>absent</option></select></td>";
                                                                
                                                                $atten = filter_input(INPUT_POST, 'ater');
                                                                if($atten == present ){
                                                                    $ssql = "UPDATE attendance SET pre=pre+1 WHERE regno='$value5'";
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="table-action-box">
                                            <a href="#" class="save"><i class="fa fa-check"></i><form method="POST" action="updater.php">MARK</form></a>
                                            <a href="#" class="cancel"><i class="fa fa-ban"></i>CANCEL</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">

                    <p class="copyright pull-right">
                        &copy; <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="#">SRM IST</a>, managed by Department of CSE.
                    </p>
                </div>
            </footer>


        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="http://herody.in/dash/tutor/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="http://herody.in/dash/tutor/assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="http://herody.in/dash/tutor/assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="http://herody.in/dash/tutor/assets/js/bootstrap-notify.js"></script>

<script src="http://herody.in/dash/tutor/assets/js/dataTables.responsive.min.js"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="http://herody.in/dash/tutor/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<script src="http://herody.in/dash/tutor/assets/js/jquery.dataTables.min.js"></script>
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="http://herody.in/dash/tutor/assets/js/demo.js"></script>


</html>