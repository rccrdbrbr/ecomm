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

function deleteWish(id) {
  deleteRowTable(id);
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

function deleteRowTable(id) {

  idr = 'row' + id;
  console.log(idr);
  document.getElementById(idr).style.display = 'none';
}