<?php session_start();
include("dbconn.php");

?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- bootstrap Lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <!-- Signopsys Logo here -->
            <div class="logo_name">Tea Creations</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="navigation">
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-shopping-bag'></i>
                    <span class="links_name">Product 1</span>
                </a>
                <span class="tooltip">Product 1</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Product 2</span>
                </a>
                <span class="tooltip">Product 2</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Product 3</span>
                </a>
                <span class="tooltip">Product 3</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Product 4</span>
                </a>
                <span class="tooltip">Product 4</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Product 5</span>
                </a>
                <span class="tooltip">Product 5</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-bar-chart-alt'></i>
                    <span class="links_name">Report</span>
                </a>
                <span class="tooltip">Report</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <!--<img src="profile.jpg" alt="profileImg">-->
                    <div class="name_job">
                        <div class="name">Person A</div>
                        <div class="job">Manager</div>
                    </div>
                </div>
                <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>

            </li>
        </ul>
    </div>

    <div class="wrapper" id="content">
        <h1>Sample</h1>
        <table id="course_table" class="table table-striped">
            <thead>
                <tr class="table-primary">
                    <th width="30%">ID</th>
                    <th width="50%">Product Name</th>
                    <th width="30%">Category</th>
                    <th scope="col" width="6%">Edit</th>
                    <th scope="col" width="6%">Delete</th>
                </tr>
            </thead>
        </table>
        <br>
        <div align="right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                Add Product
            </button>
        </div>
    </div>

    <div class="modal fade" id="addModal">
        <div class="modal-dialog">
            <form action="" method="POST" id="course_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label>Enter Product Name</label>
                        <input type="text" name="prodname" class="form-control">
                        <label>Unit </label>
                        <input type="text" name="category" class="form-control"><br>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="prodid" id="prodid">
                        <input type="hidden" name="operation" id="operation">
                        <input class="btn btn-primary" type="submit" name="insert" id="insert" value="Add">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['insert'])) {
        include("insert.php");
    }

    ?>

    <!-- <div class="wrapper" id="ceontent">
        <div class="homepage">
            <div class="container">
                <h2>Sample Data</h2>
                <table class="table table-fluid" id="myTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Daniel Danny</td>
                            <td>danny.daniel@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Samuel</td>
                            <td>samuel@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Jack</td>
                            <td>jack@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Eureka</td>
                            <td>eureka@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Pinky</td>
                            <td>pinky@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Mishti</td>
                            <td>mishti@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Puneet</td>
                            <td>puneet@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Nick</td>
                            <td>nick@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Danika</td>
                            <td>danika@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Vishakha</td>
                            <td>vishakha@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Nitin</td>
                            <td>ni3@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Latika</td>
                            <td>latika@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Kaavya</td>
                            <td>kaavya@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Ishika</td>
                            <td>ishika@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                        <tr>
                            <td>Veronika</td>
                            <td>veronika@gmail.com</td>
                            <td>Pass1234</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
    <script src="../js/app.js"></script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</body>

</html>