<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="public/stylesheet/css/bootstrap/css/bootstrap.min.css">
    <title>Admin panel</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a href="#" class="navbar-brand text-light">Admin Panel</a>                  
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="#" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link text-white">Post</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link text-white">Data</a>
                    </li>                    
               </ul>
               <form action="" class="form-inline">
                    <input type="search" class="form-control mr-sm-2" placeholder="Input something here" aria-label="Search" size="">
                    <button class="btn btn-light" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <table class="table">
            <thead class="thead-dark">
                <th scope="col">No.</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Author</th>                
                <th scope="col">Categories</th>                
                <th scope="col">Actions</th>                
            </thead>    
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Data from db</td>
                    <td>Data from db</td>
                    <td>Data from db</td>
                    <td>Data from db</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>