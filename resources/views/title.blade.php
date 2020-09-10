<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- link to bootstrap -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container-fluid">

                <a class="navbar-branch" href="/homead" data-toggle="tooltip" data-placement="bottom" title="Home page">
                    <img src="/images/icons/housing.png" height="45" alt="Home page">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon">
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/admin_user" style="font-size: 120%" data-toggle="tooltip" data-placement="bottom" title="Add user and list current users">USER MANAGEMENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin_thiet_bi" style="font-size: 120%" data-toggle="tooltip" data-placement="bottom" title="Add, edit, delete devices">DEVICE MANAGEMENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/connective" style="font-size: 120%" data-toggle="tooltip" data-placement="bottom" title="Add, list connective">CONNECTIVE MANAGEMENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logs" style="font-size: 120%" data-toggle="tooltip" data-placement="bottom" title="Add user and list current users">ACTIVITIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/chart" style="font-size: 120%" data-toggle="tooltip" data-placement="bottom" title="Add user and list current users">TEMPERATURE</a>
                        </li>
                        <li >
                            <div class="dropdown">
                                <button type="button" class="btn dropdown-toggle btn-outline-light btn-lg" data-toggle="dropdown">
                                    <img src="images/icons/setting.png" height="25" alt="setting">
                                </button>
                              <div class="dropdown-menu dropdown-menu-right" style="background-color: rgba(67, 74, 86)">
                                <a class="dropdown-item " href="/update_prf" style="font-size: 110%">
                                    UPDATE PROFILE</a>
                                <a class="dropdown-item " href="/update_pw" style="font-size: 110%">
                                    UPDATE PASSWORD</a>
                                <a class="dropdown-item" href="/creat_register" style="font-size: 110%">G2A</a>
                                <a class="dropdown-item" href="/logout" style="font-size: 110%;">LOGOUT</a>
                              </div>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>


</body>
</html>