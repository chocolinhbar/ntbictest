
$(document).ready(function() {
    console.log(window.location.pathname);
    var pathname = window.location.pathname;
    $('#namepage').attr('href',pathname);
    var create_path = pathname+'/create';
    $('#create').attr('href',create_path);
});

$(document).ready(function() {
    $('.edit').click(function() {
        var pathname = window.location.pathname + '/';
        var id = $(this).data("id");
        $(this).attr('href',pathname+id+'/edit');
    });
});

$(document).ready(function() {
    $('.show').click(function() {
        var pathname = window.location.pathname + '/';
        var id = $(this).data("id");
        $(this).attr('href',pathname+id);
    });
});