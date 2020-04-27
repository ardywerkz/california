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
  //plugin bootstrap minus and plus
  //http://jsfiddle.net/laelitenetwork/puJ6G/
  $(".btn-number").click(function (e) {
    e.preventDefault();

    fieldName = $(this).attr("data-field");
    type = $(this).attr("data-type");
    var input = $("input[name='" + fieldName + "']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
      if (type == "minus") {
        if (currentVal > input.attr("min")) {
          input.val(currentVal - 1).change();
        }
        if (parseInt(input.val()) == input.attr("min")) {
          $(this).attr("disabled", true);
        }
      } else if (type == "plus") {
        if (currentVal < input.attr("max")) {
          input.val(currentVal + 1).change();
        }
        if (parseInt(input.val()) == input.attr("max")) {
          $(this).attr("disabled", true);
        }
      }
    } else {
      input.val(0);
    }
  });
  $(".input-number").focusin(function () {
    $(this).data("oldValue", $(this).val());
  });
  $(".input-number").change(function () {
    minValue = parseInt($(this).attr("min"));
    maxValue = parseInt($(this).attr("max"));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr("name");
    if (valueCurrent >= minValue) {
      $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr(
        "disabled"
      );
    } else {
      alert("Sorry, the minimum value was reached");
      $(this).val($(this).data("oldValue"));
    }
    if (valueCurrent <= maxValue) {
      $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr(
        "disabled"
      );
    } else {
      alert("Sorry, the maximum value was reached");
      $(this).val($(this).data("oldValue"));
    }
  });
  $(".input-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if (
      $.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
      // Allow: Ctrl+A
      (e.keyCode == 65 && e.ctrlKey === true) ||
      // Allow: home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 39)
    ) {
      // let it happen, don't do anything
      return;
    }
    // Ensure that it is a number and stop the keypress
    if (
      (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
      (e.keyCode < 96 || e.keyCode > 105)
    ) {
      e.preventDefault();
    }
  });
});
