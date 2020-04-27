var methods = {
  add_admin: function (e) {
    let data = {
      username: $.trim($("#username").val()),
      full_name: $.trim($("#fname").val()),
      password: $.trim($("#password").val()),
    };
    apis.addAdmin(data).then(
      function (data) {
        //reset field
        $("#username").val(" ");
        $("#fname").val("");
        $("#password").val(" ");
        Swal.fire({
          icon: "success",
          text: "Successfully added admin account ",
        });
        setTimeout(function () {
          window.location.reload();
        }, 1300);
      },
      function (data) {
        toastr.error(data.responseJSON.message);
      }
    );
  },
  addCategory: function (e) {
    let data = {
      name: $.trim($("#category").val()),
    };
    apis.addCategory(data).then(
      function (data) {
        //reset field
        $("#category").val(" ");
        Swal.fire({
          icon: "success",
          text: "Successfully added category ",
        });
        setTimeout(function () {
          window.location.reload();
        }, 1300);
      },
      function (data) {
        toastr.error(data.responseJSON.message);
      }
    );
  },
};
