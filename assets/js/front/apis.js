var apis = {
  addMessage: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "contact/contactUs",
      data: data,
    });
  },
};
