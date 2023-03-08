<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary"> <a class="navbar-brand" href="index.php" > <img src="images/petshop-removebg-preview.png" alt="Pet Shop" style="width:48px;height:48px;" ></a>
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
                <a class="nav-link" href="register.php" > <img src="images/png-transparent-profile-user-icon-computer-icons-user-profile-head-ico-miscellaneous-black-desktop-wallpaper-removebg-preview.png" alt="User" style = "width:80px; height:48px;"/></a> </li>
            
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
