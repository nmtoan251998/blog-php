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
        
            <form method="post" class="mt-5 w-75 p-3 mx-auto shadow-sm bg-white rounded">
                <div class="form-group">

                    <div class="row">
                        <div class="col">
                            <label for="title">Id</label>
                            <input type="text" class="form-control mb-3" name="blog_id">    
                        </div>
                        <div class="col">
                            <label for="title">Title</label>                                                
                            <input type="text" id="title" class="form-control mb-3" name="blog_title" >    
                        </div>
                        <div class="col">
                            <label for="author">Author</label>                                                
                            <input type="text" id="author" class="form-control mb-3" name="blog_author">
                        </div>
                    </div>                                        

                    <label for="content">Content</label>                                                
                    <textarea type="text" id="content" class="form-control mb-3" name="blog_description" rows="5"></textarea>

                    <div class="row">
                        <div class="col">
                            <label for="date">Date</label>                                                
                            <input type="date" id="date" class="form-control mb-3" name="blog_date">
                        </div>
                        <div class="col">
                            <label for="category">Category</label>
                            <select class="form-control" name="blog_category">
                                
                                <?php 
                                    $catSql = "SELECT * FROM categories";
                                    $catResult = mysqli_query($connection, $catSql);                        

                                    if($catResult->num_rows > 0) {
                                        while($catRow = $catResult->fetch_assoc()) {
                                            $catData = ucwords($catRow["cat_data"]);

                                            if($catRow["cat_id"] === $catRow["cat_id"])
                                                echo '
                                                    <option selected value="'.$catRow["cat_id"].'">'.$catData.'</option>
                                                ';
                                            else
                                                echo '
                                                    <option value="'.$catRow["cat_id"].'">'.$catData.'</option>
                                                ';
                                        }
                                    }
                                ?>
                                
                            </select>
                        </div>
                    </div>                    
                                                            
                                            
                </div>                                                
                <input type="submit" name="submit" class="btn btn-primary">
            </form>      

    </div>
</body>
</html>