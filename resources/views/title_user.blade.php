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
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-branch"  data-toggle="tooltip" data-placement="bottom" title="Home page">
                    <img src="/images/icons/housing.png" height="45" alt="Home page">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon">
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li >
                            <div class="dropdown">
                                <button type="button" class="btn dropdown-toggle btn-outline-light btn-lg" data-toggle="dropdown">
                                    <img src="/images/icons/setting.png" height="25" alt="setting">
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