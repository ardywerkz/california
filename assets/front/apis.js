var apis = {
  addUser: function(data) {
    return $.ajax({
      url: base_url + "home/register",
      type: "POST",
      data: data
    });
  }
};
