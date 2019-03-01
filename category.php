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
                    $curCatData = ucwords($_GET["cat_data"]);

                    echo '
                        <div class="u-mb-m u-center-text">
                            <h1 class="heading-1 heading-primary blog__title">Topic: '.$curCatData.'</h1>
                        </div>
                        ';

                    $sql = "SELECT * FROM blog_data WHERE blog_category = $curCat";        
                    $result = mysqli_query($connection, $sql);
                    
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {  
                            $blogId = $row['blog_id'];
                            $blogTitle = ucwords($row["blog_title"]);
                            $blogAuthor = $row['blog_author'];
                            $blogDate = $row['blog_date'];
                            $blogContent = substr($row["blog_description"], 0, 1000);
                            
                            echo '
                                <section class="blog">                                
                                    <h2 class="heading-2 heading-2-primary blog__title">'.$blogTitle.'</h2>
                                    <div class="blog__info">                            
                                        <a href="#" title="'.$blogAuthor.'" class="blog__author">'.$blogAuthor.'</a>,
                                        <span class="blog__date">'.$blogDate.'</span>                                        
                                    </div>                        
                                    <p class="blog__content">'.$blogContent.' ...........<a href="post.php?blog_id='.$blogId.'" class="blog__read-more">Read more</a> </p>
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