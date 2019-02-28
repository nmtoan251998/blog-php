<?php include "config.php"?>
<html lang="en">
<head>
    <title>Navbar Layout</title>
</head>
<body>
     <!-- [navbar]-->
     <nav class="nav">
        <ul class="nav--menu">                
            <li class="nav--list">
                <a href="#" class="nav--item">Home</a>
            </li>
            <li class="nav--list">
                <a href="#" class="nav--item">Item 2</a>
            </li>
            <li class="nav--list">
                <a href="#" class="nav--item">Item 3</a>
            </li>            
            <li class="nav--list dropdown">
                <a href="#" class="nav--item">Category</a>
                    <ul class="dropdown--menu">
                        <?php
                            $sql = "SELECT * FROM categories LIMIT 2";
                            $result = mysqli_query($connection, $sql);

                            // if data exist in database
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $catData = ucwords($row['cat_data']);

                                    echo '                                                                                           
                                        <li class="dropdown--list">
                                            <a href="#" class="dropdown--item">'.$catData.'</a>
                                        </li>                                                                                                                                                           
                                    ';
                                }
                            }                    
                        ?>
                        <li class="dropdown--list">
                            <a href="#" class="dropdown--item">More </a>
                        </li>
                    </ul>
                </li>
                            
        </ul>
    </nav>
    <!-- [end navbar]-->
</body>
</html>