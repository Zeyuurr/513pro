<?php

$allowtype = array("gif","png","jpg","pdf","doc","docx"); 
$size = 1000000; 
$path = "./uploads"; 


for( $i = 0;$i < count($_FILES['myfile']['error']);$i++ ){

    $upfile[$i] = $_FILES['myfile']['name'][$i];

    if($_FILES['myfile']['error'][$i]>0){

        echo "Upload error";
        switch($_FILES['myfile']['error'][$i]){
        
            case 1: die('The'.($i+1).'th file exceeds the size limit：upload_max_filesize');
            case 2: die('Upload the'.($i+1).'th file size beyond the agreed value in the form：MAX_FILE_SIZE');
            case 3: die('The'.($i+1).'th file only part of it is uploaded');
            case 4: die('The'.($i+1).'th file was not uploaded');
            default: die('Unknown error');
        }
    }

    $arr = explode(".",$_FILES['myfile']['name'][$i]);
    $hz[$i] = array_pop( $arr );
    if(!in_array($hz[$i],$allowtype)){

        die("The".($i+1)."th file not an allowed file type");
    }


    if($_FILES['myfile']['size'][$i]>$size){

        die("The".($i+1)."th file more than allowed<b>{$size}</b>");
    }


    $filename[$i] = date("YmdHis").rand(100,999).".".$hz[$i];

    if(is_uploaded_file($_FILES['myfile']['tmp_name'][$i])){

        if(!move_uploaded_file($_FILES['myfile']['tmp_name'][$i],"upload/".$filename[$i])){
        
            die("Cannot move the file to the specified directory");
        }
    }else{

        die("Upload file {$_FILES['myfile']['name'][$i]}Not a valid file");
    }


    $filesize[$i] = $_FILES['myfile']['size'][$i]/1024;
    
    echo "{$upfile[$i]}&nbsp; Uploading successfully,Save in the{$path}，file size:{$filesize[$i]}KB<br>";
}
$fname= $_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$w3review=$_POST["w3review"];
echo "Firstname: $fname"; 
echo "<br>";
echo "Lastname: $lname";
echo "<br>";
echo "Email: $email";
echo "<br>";
echo "Write about yourself: $w3review";

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's Little Fashion - Sign In Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        <style>
        *{ margin: 0; padding: 0; }
        html,body{ height: 100%; }
        #container{  position:relative; width:100%; min-height:100%;  padding-bottom: 100px; box-sizing: border-box; }
        header{ width: auto; height: auto; background: #999; }
        .main{ width: 100%; height: auto; background: orange; }
        footer{ width: 100%; height:auto;  position:absolute; bottom:0px; left:0px; background: #333; }
        </style>
        
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    
    <body>
<a href="index.html" class="btn custom-btn form-control mt-4 mb-3">Homepage</a>
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

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
