$(document).ready(function () {
    $('#listie').click(function (event) {
        event.preventDefault();
        $('#products .item').addClass('listie-group-item');
    });
    $('#gridie').click(function (event) {
        event.preventDefault();
        $('#products .item').removeClass('listie-group-item');
        $('#products .item').addClass('gridie-group-item');
    });
});