<html lang="en">
<head>
    <title>Sidebar Layout</title>
</head>
<body>
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
                        $blogId = $row["blog_id"];

                        echo '                
                            <section class="latest-posts">
                                <div class="latest-post">
                                    <a class="latest-post-item" href="post.php?blog_id='.$blogId.'">'.$blogTitle.'</a>                        
                                </div>                               
                            </section>
                            ';
                    }
                }
            
            ?>
        </aside>
        <!-- end [right-sidebar] -->     
</body>
</html>