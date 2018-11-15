function scrollToElement(pageElement) {
    var positionX = 0,
        positionY = 0;

    while (pageElement != null) {
        positionX += pageElement.offsetLeft;
        positionY += pageElement.offsetTop;
        pageElement = pageElement.offsetParent;
        window.scrollTo(positionX, positionY);
    }
}

function selectvideo(id) {
    var main_image = document.getElementById("videoframe");
    main_image.src = 'http://www.youtube-nocookie.com/embed/' + id + '?wmode=opaque&rel=0&autohide=1&showinfo=0&autoplay=1';
    var video_frame_cont = document.getElementById("main_div_video_frame");
    scrollToElement(main_div_video_frame);
}