<?php include "../config.php" ?>
<?php 
    if(isset($_GET["del_id"])) {
        $del = $_GET["del_id"];        
        $sql = "DELETE FROM blog_data WHERE blog_id = $del";        
        if(mysqli_query($connection, $sql)) { ?>
        <script>window.location = "index.php"</script>
        <?php

        }
    }
?>

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

        <table class="table table-striped table-bordered table-hover w-75 mx-auto mt-5">
            <thead class="thead-light">
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Author</th>                
                <th scope="col">Categories</th>                
                <th scope="col">Actions</th>                
            </thead>    
            <tbody>
            <?php
                $sql = "SELECT * FROM blog_data ORDER BY blog_id";
                $result = mysqli_query($connection, $sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $blogId = $row["blog_id"];
                        $blogTitle = $row["blog_title"];
                        $blogContent = substr($row["blog_description"], 0, 500);
                        $blogAuthor = $row["blog_author"];
                        $blogCategory = $row["blog_category"];

                        $catSql = "SELECT * FROM categories WHERE cat_id = $blogId";
                        $catResult = mysqli_query($connection, $catSql);

                        if($catResult->num_rows > 0) {
                            while($catRow = $catResult->fetch_assoc()) {
                                $catData = ucwords($catRow["cat_data"]);
                                echo '
                                    <tr>
                                        <th scope="row">'.$blogId.'</th>
                                        <td>'.$blogTitle.'</td>
                                        <td>'.$blogContent.'............</td>
                                        <td>'.$blogAuthor.'</td>
                                        <td>'.$catData.'</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-secondary dropdown-toggle" href="#"data-toggle="dropdown">Action<span class="caret"></span></></a>

                                                <ul class="dropdown-menu">                                                    
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>                                                    
                                                    <li><a class="dropdown-item" href="index.php?del_id='.$blogId.'">Delete</a></li>
                                                    <li><a class="dropdown-item" href="#">View</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>  
                                ';               
                            }
                        }                        
                    }
                }                
            ?>              
            </tbody>
        </table>
    </div>
</body>
</html>