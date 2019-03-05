<?php include "../config.php" ?>
<?php 
    if(isset($_GET["del_id"])) {
        $delId = $_GET["del_id"];        
        $delSql = "DELETE FROM blog_data WHERE blog_id = $delId";        
        if(mysqli_query($connection, $delSql)) { ?>
            <script> window.location = "data.php"</script>
        <?php

        }
    }

    if( isset($_POST["edit_submit"]) ) {
        $editId = $_POST["blog_id"];
        $editTitle = $_POST["blog_title"];
        $editContent = $_POST["blog_description"];
        $editAuthor = $_POST["blog_author"];    
        
        $editCategory = $_POST["blog_category"];

        $editSql = "UPDATE blog_data SET blog_title = '$editTitle', blog_description = '$editContent', blog_author = '$editAuthor', blog_category = '$editCategory' WHERE blog_id = '$editId'";

        if(mysqli_query($connection, $editSql)) { ?>
            <script> window.location = "data.php"</script>
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
                            }
                        }
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
                                                    <li><a class="dropdown-item" href="#edit_modal'.$blogId.'" data-toggle="modal">Edit</a></li>                                                    
                                                    <li><a class="dropdown-item" href="data.php?del_id='.$blogId.'">Delete</a></li>
                                                    <li><a class="dropdown-item" href="../post.php?blog_id='.$blogId.'">View</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>  
                                ';               
            ?>
                                <div id="edit_modal<?php echo $blogId;?>" class="modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">      
                                                <h4>Blog id: <?php echo $blogId;?></h4>
                                                <button class="close" data-dismiss="modal">&times;</button>                                                
                                            </div>
                                            <div class="modal-body">
                                                <form method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control mb-3" name="blog_id" value="<?php echo $blogId;?>" placeholder="<?php echo $blogId;?>">

                                                        <label for="title">Title</label>                                                
                                                        <input type="text" id="title" class="form-control mb-3" name="blog_title" value="<?php echo $blogTitle?>" placeholder="<?php echo $blogTitle;?>">

                                                        <label for="content">Content</label>                                                
                                                        <textarea type="text" id="content" class="form-control mb-3" name="blog_description" value="<?php echo $blogContent?>" placeholder="<?php echo $blogContent;?>"></textarea>

                                                        <label for="author">Author</label>                                                
                                                        <input type="text" id="author" class="form-control mb-3" name="blog_author" value="<?php echo $blogAuthor?>" placeholder="<?php echo $blogAuthor;?>">
                                                        
                                                        <label for="category">Category</label>
                                                        <select class="form-control" name="blog_category">
                                                            <?php 
                                                                $editCatSql = "SELECT * FROM categories";
                                                                $editCatResult = mysqli_query($connection, $editCatSql);                        

                                                                if($editCatResult->num_rows > 0) {
                                                                    while($editCatRow = $editCatResult->fetch_assoc()) {
                                                                        $editCatData = ucwords($editCatRow["cat_data"]);

                                                                        if($editCatRow["cat_id"] === $catRow["cat_id"])
                                                                            echo '
                                                                                <option selected value="'.$editCatRow["cat_id"].'">'.$editCatData.'</option>
                                                                            ';
                                                                        else
                                                                            echo '
                                                                                <option value="'.$editCatRow["cat_id"].'">'.$editCatData.'</option>
                                                                            ';
                                                                    }
                                                                }
                                                            ?>
                                                            
                                                        </select>                                                        
                                                    </div>                                                
                                                    <input type="submit" name="edit_submit" class="btn btn-primary btn-block">
                                                </form> 
                                            </div>
                                            <div class="modal-footer"></div>
                                        </div>
                                    </div>
                                </div>

                            <?php                                                                            
                    }
                }

            ?>              
            </tbody>
        </table>
    </div>
</body>
</html>