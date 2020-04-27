$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    item: 4,
    autoWidth: true,
    autoplay: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      600: {
        items: 3,
        nav: false,
      },
      1000: {
        items: 5,
        nav: true,
        loop: false,
        margin: 20,
      },
    },
  });
  $("#modal_form_register").on("hide", function () {
    location.reload();
  });
  $("body").on("click", "#accountLogout", function () {
    $("#modalLogout").modal("show");
  });
  $("#cart").click(function () {
    $("#carRes").toggle("slow");
  });
  $(window).bind("load", function () {
    window.setTimeout(function () {
      $(".ci-error")
        .fadeTo(500, 0)
        .slideUp(500, function () {
          $(this).remove();
        });
    }, 2100);
  });

  $(".bg-pink .navbar-nav a").on("click", function () {
    $(".bg-pink  .navbar-nav").find("li.active").removeClass("active");
    $(this).parent("li").addClass("active");
  });
  $('[data-toggle="tooltip"]').tooltip();
  /* Scroll to Top button */
  var scrollButton = $("#scroll-top");
  $(window).scroll(function () {
    $(this).scrollTop() >= 500
      ? scrollButton.css({
          "-webkit-transform": "translate3d(0, 0, 0)",
          "-moz-transform": "translate3d(0, 0, 0)",
          "-o-transform": "translate3d(0, 0, 0)",
          transform: "translate3d(0, 0, 0)",
        })
      : scrollButton.css({
          "-webkit-transform": "translate3d(0, 140%, 0)",
          "-moz-transform": "translate3d(0, 140%, 0)",
          "-o-transform": "translate3d(0, 140%, 0)",
          transform: "translate3d(0, 140%, 0)",
        });
  });

  scrollButton.click(function () {
    $("html,body").animate({ scrollTop: 0 }, 650);
  });

  //Nice scroll initialization
  $("html").niceScroll({
    scrollspeed: 60,
    autohidemode: false,
    cursorwidth: 8,
    cursorborderradius: 8,
    cursorborder: "0",
    background: "rgba(253,84,172,0.3)",
    cursorcolor: "rgb(253, 84, 172)",
    zindex: 999,
  });
});
