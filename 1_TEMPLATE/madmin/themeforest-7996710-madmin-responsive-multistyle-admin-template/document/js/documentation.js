$(function () {
    $(window).scroll(function(){
        if ($(this).scrollTop() < 200) {
            $('#totop') .fadeOut();
        } else {
            $('#totop') .fadeIn();
        }
    });
    $('#totop').on('click', function(){
        $('html, body').animate({scrollTop:0}, 'fast');
        return false;
    });

});
function PluginShow(){
    var id = $('#plugins-list').val();
    $('.plugin-content').removeClass('plugin-content-active');
    $('#' + id).addClass('plugin-content-active');
    return;
}