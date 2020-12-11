$(document).ready(function() {
    $('.slide').slick({
        autoplay: true,
        infinite: true,
        speed: 500,
        dots: false,
        arrows: true,
        zIndex: 1,
        prevArrow: '.slider-wrapper .prev',
        nextArrow: '.slider-wrapper .next'
    });
    $('.slider-half').slick({
        autoplay: true,
        dots: true,
        arrows: true,
        dots: false,
        zIndex: 1,
        prevArrow: '.content-half .prev',
        nextArrow: '.content-half .next'
    });
    $('.slider-hub').slick({
        autoplay: true,
        dots: false,
        arrows: true,
        zIndex: 1
    });
    $('.slider-post').slick({
        autoplay: true,
        dots: false,
        arrows: true,
        zIndex: 1
    });

    $('#convocatorias-tab a').click(function(){
        var self = $(this);
        var dconvocatoria = "#"+$(self).attr('data-convocatoria');
        $('#convocatorias-tab a').removeClass('active');
        $('#convocatorias-content .container').removeClass('active');
        $(dconvocatoria).addClass('active');
        $(self).addClass('active');
        return false;
    });


    $('.wrapper-dropdown.same').on('click', function() {
        $('.wrapper-dropdown.same .fa').toggleClass('fa-rotate-90').stop();
        $('.wrapper-dropdown.same').toggleClass('active');
        $('.wrapper-dropdown.same + .dropdown').stop().slideToggle("slow").css('display', 'block');
        return false;
    });

    $('.wrapper-dropdown.fecha').on('click', function() {
        $(this).find('.fa').toggleClass('fa-rotate-90').stop();
        $(this).toggleClass('active');
        $(this).find(' + .dropdown').stop().first().slideToggle("slow").css('display', 'block');

    });

    $(".post-slider .ver-mas").click(function(){
        var post = $(this).parents('.post-slider');
        $(post).find('.ver-mas').addClass('hide');
        $(post).find('.ver-menos').removeClass('hide');
        $(post).find('.post-hide').slideDown();
        return false;
    });

    $(".post-slider .ver-menos").click(function(){
        var post = $(this).parents('.post-slider');
        $(post).find('.ver-menos').addClass('hide');
        $(post).find('.ver-mas').removeClass('hide');
        $(post).find('.post-hide').slideUp();
        return false;
    });

    $(".dropdown li a").click(function(ev) {
        $("dropdown li a").dropdown("toggle");
        return false;
    });

    var rotation = 0,
    scrollLoc = $(document).scrollTop();
    $(window).scroll(function() {
        var newLoc = $(document).scrollTop();
        var diff = scrollLoc - newLoc;
        rotation += diff, scrollLoc = newLoc;
        var rotationStr = "rotate(" + rotation + "deg)";
        $(".nuestra-red-home-bg").css({
            "-webkit-transform": rotationStr,
            "-moz-transform": rotationStr,
            "transform": rotationStr
        });
    });

    /*menu active*/
    $('.btn-closet').click(function() {
        $('#collapse-menu').removeClass('show');
    });

    $('.show-menu').click(function(event) {
        event.preventDefault();
        $('#collapse-menu').addClass('show');
        if ($('#collapse-menu').addClass('show') === true) {
            $('.slide.first').addClass('margin-0');
            $('header').hide();
        } else {
            $('header').show();
        }
    });

    /*scroll*/
    if (window.location.hash) scroll(0, 0);
    $(function() {
        $('.scroll').on('click', function(e) {
            e.preventDefault();
            $('html, body').scrollTop($($(this).attr('href')).offset().top);
        });
        if (window.location.hash) {
            $('html, body').scrollTop($(window.location.hash).offset().top);
        }
    });

    $('#conocenos .submenu li a').click(function(e){
      var href = $(this).attr('href');

      var part = href.split('#')[1];
      var pathname = window.location.pathname.replace(/\//g, "");
      var hrefparts = href.split("/");
      if(part){
        if(hrefparts[hrefparts.length-1].split('#')[0]==pathname){
          e.preventDefault();
              $('html, body').scrollTop(($('#'+part).offset().top));
        }
      }

    })

    /*ELEMENT TO ANIMATE*/
    new WOW().init();

    $("#buscador_archivos").select2({
        placeholder: "Escribe el nombre del documento a buscar.",
    });
    $(".img-search").click(function(event) {
        var effect = 'slide';
        var options = {
            direction: 'left'
        };
        var duration = 500;
        //$('.input-search').stop().toggle(effect, options, duration).css('display', 'inline-block');
        $('.input-search input').toggleClass('active');
        event.preventDefault();
    });

    $(".pinned").pin({
        containerSelector: ".busqueda-content",
        padding: {top: 30, bottom: 30},
        left: 0,
    });



});
