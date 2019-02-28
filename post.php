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
            <!-- [Blog]-->
            <?php                
                if(isset($_GET["blog_id"])) { // [if block 1]
                    $curBlog = $_GET["blog_id"];

                    $sql = "SELECT * FROM blog_data WHERE blog_id ='$curBlog'";
                    $result = mysqli_query($connection, $sql);

                    // if data exist in database
                    if ($result->num_rows > 0) { // [if block 2]
                        while($row = $result->fetch_assoc()) {
                            
                            $blogId = $row["blog_id"];
                            $blogTitle = ucwords($row["blog_title"]);
                            $blogContent = $row["blog_description"];                    
                            $blogAuthor = $row["blog_author"];                                        
                            $blogDate = $row["blog_date"];
                            $blogCategory = $row["blog_category"];
                            
                            echo '
                                <section class="blog">                                
                                    <h2 class="heading-2 heading-2-primary blog__title">'.$blogTitle.'</h2>
                                    <div class="blog__info">                            
                                        <a href="#" title="'.$blogAuthor.'" class="blog__author">'.$blogAuthor.'</a>,
                                        <span class="blog__date">'.$blogDate.'</span>                                        
                                    </div>                        
                                    <p class="blog__content">'.$blogContent.'</p>    
                                    <div class="blog__category">
                                        <span class="blog__category-text">Tag: </span>  
                                        <a href="#" class="blog__category-content">'.$blogCategory.'</a>
                                    </div>                                                                                    
                                </section>                                
                                ';                    
                        }                
                    } // [end if block 2]

                } // [end if block 1]
                else {             
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