$(document).ready(function() {
    console.log(window.location.pathname);
    var pathname = window.location.pathname;
    $('#namepage').attr('href', pathname.substr(0,pathname.length-7));
    var create_path = pathname.substr(0,pathname.length-5);
    $('#editForm').attr('action',create_path);

    $('.cancel').click(function() {
        $(this).attr('href',pathname.substr(0,pathname.length-7));
    });
});