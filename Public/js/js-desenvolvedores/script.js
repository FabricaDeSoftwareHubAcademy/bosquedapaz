$(document).ready(function(){
    $('.btn-default-mobile').on('click',function(){
        $('.mobile-menu').toggleClass('active');
        $('.btn-default-mobile').find('i').toggleClass('fa-x');
    });
})