<style>
.hidetext 
        { 
            -webkit-text-security: disc;
        }
</style>
<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM user WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name714"];
                $address = $row["address"];
                $salary = $row["salary"];
                $username = $row["username"];
                $password = $row["password"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Luca’s Loaves</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>View Record</title>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $row["name714"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p><b><?php echo $row["address"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <p><b><?php echo $row["salary"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>username</label>
                        <p><b><?php echo $row["username"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <p class='hidetext'><b><?php echo $row["password"]; ?></b></p>
                    </div>
                    <p><a href="index1.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
    <footer class="site-footer">
                        <div class="container">
                            <div class="row">
            
                                <div class="col-lg-3 col-10 me-auto mb-4">
                                    <h4 class="text-white mb-3"><a href="index.html">Luca's</a> Loaves</h4>
                                    <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Luca's Loaves</strong></p>
                                    <br>
                                    <p class="copyright-text">Designed by <a href="#" target="_blank">Zain(Chen Zeyu) 20IT2</a></p>
                                </div>
            
                                <div class="col-lg-5 col-8">
                                    <h5 class="text-white mb-3">Sitemap</h5>
            
                                    <ul class="footer-menu d-flex flex-wrap">
                                        <li class="footer-menu-item"><a href="about.html" class="footer-menu-link">About us</a></li>
            
                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Products</a></li>
            
                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>
            
                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Login＆Register</a></li>
            
                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                                    </ul>
                                </div>
            
                                <div class="col-lg-3 col-4">
                                    <h5 class="text-white mb-3">Social</h5>
            
                                    <ul class="social-icon">
            
                                        <li><a href="#" class="social-icon-link bi-youtube"></a></li>
            
                                        <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
            
                                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>
            
                                        <li><a href="#" class="social-icon-link bi-skype"></a></li>
                                    </ul>
                                </div>
            
                            </div>
                        </div>
                    </footer>
</body>
</html>