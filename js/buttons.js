var j = 0;

function addWish(id) {
  console.log(id);
  $.ajax({
    url: "backend/add-wishlist.inc.php",
    type: "POST",
    data: {
      id: id
    },
    cache: false,
    success: function(dataResult) {
      var dataResult = JSON.parse(dataResult);
    }
  })
}

function addCart(id) {
  console.log(id);
  $.ajax({
    url: "backend/add-cart.inc.php",
    type: "POST",
    data: {
      id: id
    },
    cache: false
  })
}

function noCart() {
  $.ajax({
    url: "backend/no-cart.inc.php",
    type: "POST",
    cache: false,
    success: function(dataResult) {
      console.log(dataResult);
      //var dataResult = JSON.parse(dataResult);
    }
  })
}

function deleteWish(id, nrow) {
  deleteRowTable(nrow);
  console.log(id);
  $.ajax({
    url: "backend/delete-wishlist.inc.php",
    type: "POST",
    data: {
      id: id
    },
    cache: false,
    success: function(dataResult) {
      var dataResult = JSON.parse(dataResult);
    }
  })
}

function deleteRowTable(nrow) {
  //nrow = nrow - j;
  //document.getElementById("WishTable").deleteRow(nrow);
  document.getElementById("WishTable").deleteRow(nrow + 1);
  console.log(nrow);
  $.ajax({
    url: "backend/delete-row.inc.php",
    type: "POST",
    data: {
      nrow: nrow
    },
    cache: false
  })
  //j += 1;
}