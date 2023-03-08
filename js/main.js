const images = document.getElementsByClassName("img-thumbnail");

$(function () {
    console.log("ready");
    for (let i = 0; i < images.length; i++) {
        let image = images[i];
        let image_name = image.alt.toLowerCase();
        $(image).on("click", function (event) {
            event.stopPropagation();
            if ($(".img-popup").length) {
                $(".img-popup").remove();
            }
            let span = document.createElement("span");
            span.setAttribute("class", "img-popup");
            span.innerHTML = `<img src="images/${image_name}.jpg"/>`;
            $(image).after(span);
        });
    }
    $(document).on("click", function (element) {
        if (!$(element.target).closest(".img-popup").length) {
            $(".img-popup").remove();
        }
    });
});
