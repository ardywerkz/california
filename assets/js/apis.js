var apis = {
  addAdmin: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "add_admin",
      data: data,
    });
  },
  deleteAdmin: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "delete_admin",
      data: data,
    });
  },
  deleteCategory: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "delete_category",
      data: data,
    });
  },
  addCategory: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "add_category",
      data: data,
    });
  },
  store_addCategory: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "inventory/addCategory",
      data: data,
    });
  },
  storeDeleteCategory: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "admin/inventory/delete_category ",
      data: data,
    });
  },
  addProduct: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "add_product",
      data: data,
    });
  },
  deleteProduct: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "product/delete",
      data: data,
    });
  },
  deleteUser: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "deleteUser",
      data: data,
    });
  },
  deleteProduct_in: function (data) {
    return $.ajax({
      type: "POST",
      url: base_url + "deleteProduct",
      data: data,
    });
  },
};
