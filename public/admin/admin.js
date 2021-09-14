$(document).ready(function () {
    $(".nav-treeview .nav-link, .nav-link").each(function () {
        var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var link = this.href;
        if(link == location2){
            $(this).addClass('active');
            $(this).parent().parent().parent().addClass('menu-is-opening menu-open');

        }
    });

    $('.delete-btn').click(function () {
        var res = confirm('Подтвердите действия');
        if(!res){
            return false;
        }
    });

    $('#inputFile').change(function(){
        var pathname = $('#inputFile').val();
        $('#aboutPhoto').attr("src", pathname);
    });

    $('#add_photo_input').change(function(){
        var pathname ='/'+$('#add_photo_input').val();
        $('#add_photo').attr("src", pathname);
        $('#add_photo').css("display", 'block');
        
        
    });

    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
    $(".clickable-row").hover(function() {
        $(this).css("cursor","pointer");
    });







});
