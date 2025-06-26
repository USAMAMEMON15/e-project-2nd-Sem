<?php
include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Movie Ticket Booking Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        .dashboard-stat {
            background: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .dashboard-stat .icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: #3498db;
        }
        
        .dashboard-stat .title {
            font-size: 16px;
            color: #777;
            margin-bottom: 5px;
        }
        
        .dashboard-stat .value {
            font-size: 28px;
            font-weight: 600;
            color: #333;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .btn-add {
            background: #3498db;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-add i {
            margin-right: 5px;
        }
        
        .action-buttons .btn {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .btn-edit {
            background: #27ae60;
            color: white;
        }
        
        .btn-delete {
            background: #e74c3c;
            color: white;
        }
        
        .form-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #495057;
        }
        
        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .btn-submit {
            background: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="indexx.php" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>System</strong> 5 new bookings today</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p>Total revenue: <strong>$2,450</strong></p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Users</span></a>
                        <ul aria-expanded="false">
                            <li><a href="?page=users_add">Add User</a></li>
                            <li><a href="?page=users_show">Show Users</a></li>
                        </ul>
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-film"></i><span class="nav-text">Movies</span></a>
                        <ul aria-expanded="false">
                            <li><a href="?page=movies_add">Add Movie</a></li>
                            <li><a href="?page=movies_show">Show Movies</a></li>
                        </ul>
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-masks-theater"></i><span class="nav-text">Theaters</span></a>
                        <ul aria-expanded="false">
                            <li><a href="?page=theaters_add">Add Theater</a></li>
                            <li><a href="?page=theaters_show">Show Theaters</a></li>
                        </ul>
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-tv"></i><span class="nav-text">Screens</span></a>
                        <ul aria-expanded="false">
                            <li><a href="?page=screens_add">Add Screen</a></li>
                            <li><a href="?page=screens_show">Show Screens</a></li>
                        </ul>
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-photo-film"></i><span class="nav-text">Shows</span></a>
                        <ul aria-expanded="false">
                            <li><a href="?page=shows_add">Add Show</a></li>
                            <li><a href="?page=shows_show">Show Shows</a></li>
                        </ul>
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-book"></i><span class="nav-text">Bookings</span></a>
                        <ul aria-expanded="false">
                            <li><a href="?page=bookings_show">Show Bookings</a></li>
                        </ul>
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-credit-card"></i><span class="nav-text">Payments</span></a>
                        <ul aria-expanded="false">
                            <li><a href="?page=payments_show">Show Payments</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        
        <div class="content-body">
            <div class="container-fluid">
                <?php
                // Handle page routing
                $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
                
                // Dashboard
                if ($page == 'dashboard') {
                    include("indexx.php");
                }
                
                // Users
                elseif ($page == 'users_add') {
                    include("users_add.php");
                }
                elseif ($page == 'users_show') {
                    include("users_show.php");
                }
                
                // Movies
                elseif ($page == 'movies_add') {
                    include("movies_add.php");
                }
                elseif ($page == 'movies_show') {
                    include("movies_show.php");
                }
                
                // Theaters
                elseif ($page == 'theaters_add') {
                    include("theaters_add.php");
                }
                elseif ($page == 'theaters_show') {
                    include("theaters_show.php");
                }
                
                // Screens
                elseif ($page == 'screens_add') {
                    include("screens_add.php");
                }
                elseif ($page == 'screens_show') {
                    include("screens_show.php");
                }
                
                // Shows
                elseif ($page == 'shows_add') {
                    include("shows_add.php");
                }
                elseif ($page == 'shows_show') {
                    include("shows_show.php");
                }
                
                // Bookings
                elseif ($page == 'bookings_show') {
                    include("bookings_show.php");
                }
                
                // Payments
                elseif ($page == 'payments_show') {
                    include("payments_show.php");
                }
                
                // Default to dashboard
                else {
                    include("indexx.php");
                }
                ?>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Movie Ticket Booking Admin Panel</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    <script>
        // Handle form submissions and deletions
        function confirmDelete(entity, id) {
            if(confirm(`Are you sure you want to delete this ${entity}?`)) {
                window.location.href = `?action=delete&entity=${entity}&id=${id}`;
            }
        }
        
        // Handle delete actions
        <?php
        if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['entity']) && isset($_GET['id'])) {
            $entity = $_GET['entity'];
            $id = $_GET['id'];
            
            switch($entity) {
                case 'user':
                    $sql = "delete from users where user_id = $id";
                    break;
                case 'movie':
                    $sql = "delete from movies where movie_id = $id";
                    break;
                case 'theater':
                    $sql = "delete from theaters where theater_id = $id";
                    break;
                case 'screen':
                    $sql = "delete from screens where screen_id = $id";
                    break;
                case 'show':
                    $sql = "delete from shows where show_id = $id";
                    break;
            }
            
            if(mysqli_query($conn, $sql)) {
                echo "alert('Record deleted successfully');";
                echo "window.location.href = window.location.href.split('?')[0];";
            } else {
                echo "alert('Error deleting record');";
            }
        }
        ?>
    </script>
</body>
</html>