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
                    <li class="dropdown--list">
                        <a href="#" class="dropdown--item">Category 1</a>
                    </li>
                    <li class="dropdown--list">
                        <a href="#" class="dropdown--item">Category 2</a>
                    </li>
                    <li class="dropdown--list">
                        <a href="#" class="dropdown--item">Category 3</a>
                    </li>
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