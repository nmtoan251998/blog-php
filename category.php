<?php include "includes/config.php" ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

    <link rel="stylesheet" type="text/css" href="public/stylesheet/css/home.css">

    <title>Home page</title>    
</head>
<body>
    <div class="container">
        <!-- [navbar]-->
        <?php include "includes/navbar.php" ?>                          
        <!-- [end navbar]-->  

        <!-- [main]-->
        <main class="main">
             
            <?php           
                if(isset($_GET["cat_id"])) {
                    $curCat = $_GET["cat_id"];
                    
                    $sql = "SELECT * FROM blog_data WHERE blog_category = $curCat";        
                    $result = mysqli_query($connection, $sql);
                    
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {  
                            $blogTitle = $row['blog_title'];
                            $blogAuthor = $row['blog_author'];
                            $blogDate = $row['blog_date'];
                            $blogContent = $row['blog_description'];
                            
                            echo '
                                <section class="blog">                                
                                    <h2 class="heading-2 heading-2-primary blog__title">'.$blogTitle.'</h2>
                                    <div class="blog__info">                            
                                        <a href="#" title="'.$blogAuthor.'" class="blog__author">'.$blogAuthor.'</a>,
                                        <span class="blog__date">'.$blogDate.'</span>                                        
                                    </div>                        
                                    <p class="blog__content">'.$blogContent.'</p>                                                                                         
                                </section>                                
                            ';     
                           
                        }
                    }
                    // echo $curCat;
                }
                
            ?>
                        
        </main>
        <!-- end [main] -->  
        
        <!-- [sidebar]-->
        <?php include "includes/sidebar.php" ?>                          
        <!-- [end sidebar]-->
    </div>    
</body>
</html>