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
<<<<<<< HEAD
    url: "backend/no-cart.inc.php",
=======
    url: "backend/add-cart.inc.php",
>>>>>>> 94393bc9c8311c12843f351694fb91fe52607b22
    type: "POST",
    data: {
      id: id
    },
    cache: false,
    success: function(dataResult) {
      console.log(dataResult);
      //var dataResult = JSON.parse(dataResult);
    }
  })

}