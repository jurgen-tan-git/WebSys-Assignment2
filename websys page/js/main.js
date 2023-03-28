//registerEventHandlers();

$(document).ready(function(){
    activateMenu();
    onClick();
});

function onClick()
{
    var thumbnails = document.getElementsByClassName("img-thumbnail");
    if (thumbnails !== null)
    {
        for (var i = 0; i < thumbnails.length; i++)
        {
            thumbnails[i].addEventListener("click", popup);
        }
    }
    else
    {
        console.log("No logo images found.");
    }
    
}

function closePopup(){
    var popup = document.getElementById("popup");
    console.log("hi");
    if (popup === null)
    {
    }
    else{
        var img_popup = document.getElementById("img-popup");
        img_popup.remove();
    }
}

function popup(e) {
    var display = document.getElementById("popup");
    if (display === null) {
        display = document.createElement("span");
        display.id = "popup";
        display.setAttribute("class", "img-popup");

        var thumbnail = e.target;
        var thumbnail_img = thumbnail.src;

        //var popup_img = thumbnail_img.replace("_small", "_large");
        display.innerHTML = "<img src=" + thumbnail_img + ">";

        thumbnail.insertAdjacentElement("afterend", display);

        $(".button").click(function (e) {
            $(".img-thumbnail").show();
            e.stopPropagation();
        });

        $(".img-thumbnail").click(function (e) {
            e.stopPropagation();
        });
        
        $(".img-popup").click(function (e) {
            e.stopPropagation();
        });
       
    } else {
        
        $(document).click(function () {
            $(".img-popup").remove();
        });
    }
}
function activateMenu(){
    var current_page_URL = location.href;
    $(".navbar-nav a").each(function()
    {
        var target_URL = $(this).prop("href");

        if (target_URL === current_page_URL)
        {
            $('nav a').parents('li, ul').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        }
    });
}
let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
}
/*
* This function toggles the nav menu active/inactive status as
* different pages are selected. It should be called from $(document).ready()
* or whenever the page loads.
*/
