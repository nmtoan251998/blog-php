<?php include "../includes/config.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="../public/script/jquery.js"></script>    
    <script src="../public/script/bootstrap/bootstrap.bundle.min.js"></script>    

    <link rel="stylesheet" type="text/css" href="../public/stylesheet/css/bootstrap/bootstrap.min.css">
    
    <title>Admin panel</title>
</head>
<body>
    <div class="container-fluid ">        
        <?php include "navbar.php" ?>

        
            <?php
                

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                       
                        echo '

                        ';
                    }
                }                
            ?>              

    </div>
</body>
</html>