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

        <div class="u-mt-s u-center-text">
            <h1 class="heading-1 heading-primary">My Passionate Blog</h1>
        </div>

        <!-- [main]-->
        <main class="main">
            <!-- [Blog]-->
            <?php
                $sql = "SELECT * FROM blog_data ORDER BY blog_id DESC LIMIT 3";
                $result = mysqli_query($connection, $sql);
                
                // if data exist in database
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                        $blogId = $row["blog_id"];
                        $blogTitle = ucwords($row["blog_title"]);
                        $blogContent = substr($row["blog_description"], 0, 1000);                    
                        $blogAuthor = $row["blog_author"];                                        
                        $blogDate = $row["blog_date"];
                        $blogCategory = $row["blog_category"];
                        
                        $catSql = "SELECT * FROM categories WHERE cat_id = '$blogCategory'";                                                
                        $catResult = mysqli_query($connection, $catSql);
                        
                        // if data exist in database
                        if($catResult->num_rows > 0) {
                            while($catRow = $catResult->fetch_assoc()) {
                                $catData = ucwords($catRow["cat_data"]);
                            }
                        }                                    
                            
                                echo '
                                <section class="blog">                            
                                    <h2><a href="post.php?blog_id='.$blogId.'" class="heading-2 heading-2-primary blog__title">'.$blogTitle.'</a></h2>
                                    <div class="blog__info">                            
                                        <a href="#" title="'.$blogAuthor.'" class="blog__author">'.$blogAuthor.'</a>,
                                        <span class="blog__date">'.$blogDate.'</span>                                                 
                                    </div>                        
                                    <p class="blog__content">'.$blogContent.' ...........<a href="post.php?blog_id='.$blogId.'" class="blog__read-more">Read more</a> </p>
                                    <div class="blog__category">
                                        <span class="blog__category-text">Tag: </span>  
                                        <a href="#" class="blog__category-content">'.$catData.'</a>
                                    </div>               
                                </section>
                                <hr />
                                <br/>
                                ';       
                    }                
                }
                else { 
                    echo "No matching records are found."; 
                } 
            ?>
            <!-- end [Blog] -->            
        </main>
        <!-- end [main] -->  

        <!-- [sidebar]-->
        <?php include "includes/sidebar.php" ?>                          
        <!-- [end sidebar]-->
    </div>    
</body>
</html>