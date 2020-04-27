const methods = {
  contactUs: function (e) {
    let data = {
      name: $.trim($("#name").val()),
      email: $.trim($("#email").val()),
      phone: $.trim($("#phone").val()),
      message: $.trim($("#message").val()),
    };
    apis.addMessage(data).then(
      function (data) {
        //reset field
        $("#name").val(" ");
        $("#email").val(" ");
        $("#phone").val(" ");
        $("#message").val(" ");
        Swal.fire({
          icon: "success",
          text: "Successfully submit form ",
        });
        setTimeout(function () {
          window.location.reload();
        }, 1300);
      },
      function (data) {
        // toastr.error(data.responseJSON.message);
        Swal.fire({
          icon: "error",
          title: "Failed...",
          text: data.responseJSON.message,
        });
        setTimeout(function () {
          window.location.reload();
        }, 1300);
      }
    );
  },
};
