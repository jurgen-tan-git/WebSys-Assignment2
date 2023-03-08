<head>
    <title>World of Pets</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity=
          "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <!--jQuery-->
    <script async src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--Bootstrap JS--> 
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous">
    </script>
    <!-- Custom JS -->
    <script defer src="js/main.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
        h4 {
            margin-top: 20px;
        }

        p {
            font-size: 16px;
            text-align: center;
            margin-top: 10px;
            text-decoration: blue;

        }

    </style>

</head>

<body> <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary"> <a class="navbar-brand" href="index.php" > <img src="images/petshop-removebg-preview.png" alt="Pet Shop" style="width:48px;height:48px;" ></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php#dogs">Dogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php#cats">Cats</a> </li>

            <li class="nav-item">
                <a class="nav-link" href="login.php" > <img src="images/png-transparent-profile-user-icon-computer-icons-user-profile-head-ico-miscellaneous-black-desktop-wallpaper-removebg-preview.png" alt="User" style = "width:80px; height:48px;"/></a> </li>
            
        </ul> 
    </div>
</nav>
<script>
function activateMenu()
    {
        var current_page_URL = location.href;
        $(".navbar-nav a").each(function ()
        {
            var target_URL = $(this).prop("href");
            if (target_URL === current_page_URL)
            {
                $('nav a').parents('li, ul').removeClass('active');
                $(this).parent('li').addClass('active');
                console.log("The nav bar has been updated");
                return false;
            }
        });
    }
    
activateMenu();
</script>
    <main class="container">
        <h1>Member Login</h1>
        <p>
            Existing members log in here. For new members, please go to the
            <a href="register.php">Sign Up page</a>
        </p>
        
        <form action="process_login.php" method="post" >
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" id="email"
                       required name="email" placeholder="Enter email">
            </div>
            
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input class="form-control" type="password" id="pwd"
                       required name="pwd" placeholder="Enter password">
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>