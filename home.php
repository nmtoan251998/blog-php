<?php include "includes/config.php" ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <title>Home page</title>    
</head>
<body>
    <div class="container">
        <!-- [main]-->
        <main class="main">
            <!-- [Blog]-->
            <?php
                $sql = "SELECT * FROM blog_data ORDER BY blog_id DESC LIMIT 3";
                $result = mysqli_query($connection, $sql);
                
                // if data exist in database
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                        $blogTitle = ucwords($row["blog_title"]);
                        $blogContent = substr($row["blog_description"], 0, 1000);                    
                        $blogAuthor = $row["blog_author"];                                        
                        $blogDate = $row["blog_date"];
                        $blogCategory = $row["blog_category"];
                        
                        echo '
                            <section class="blog">
                                <h2><a href="#" class="heading-2 heading-2-primary blog__title">'.$blogTitle.'</a></h2>
                                <p class="blog__content">'.$blogContent.' ...........<a href="#" class="blog__read-more">Read more</a> </p>                        
                                <div class="blog__info">                            
                                    <a href="#" title="'.$blogAuthor.'" class="blog__author">'.$blogAuthor.'</a>,
                                    <span class="blog__date">'.$blogDate.'</span>
                                    <div class="blog__category">
                                        <span class="blog__category-text">Tag: </span>  
                                        <a href="#" class="blog__category-content">'.$blogCategory.'</a>
                                    </div>                            
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
        <!-- [right-sidebar] -->
        <aside class="right-sidebar">        
            <h2 class="heading-2">The Latest Posts</h2>
            <hr/>
            <?php
                $sql = "SELECT * FROM blog_data ORDER BY blog_id DESC LIMIT 5";
                $result = mysqli_query($connection, $sql);                

                // if data exist in database
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                        $blogTitle = ucwords($row["blog_title"]);

                        echo '                
                            <section class="latest-posts">
                                <div class="latest-post">
                                    <a class="latest-post-item" href="#">'.$blogTitle.'</a>                        
                                </div>                               
                            </section>
                            ';
                    }
                }
            
            ?>
        </aside>
        <!-- end [right-sidebar] -->                       
    </div>    
</body>
</html>