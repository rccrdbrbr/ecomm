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

function deleteWish(id, i) {
  deleteRowTable(id);
  //countRows(i);
  console.log(id);
  j -= 1;
  console.log(j);
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

/*function countRows() {
  j = i;
  console.log(j);
}*/

function countRows() {
  $.ajax({
    url: "backend/no-wishlist.inc.php",
    type: "POST",
    cache: false,
    success: function(dataResult) {
      console.log(dataResult);
      console.log("ah");
      //var dataResult = JSON.parse(dataResult);
      //console.log(dataResult);
    }
  })
}