//var j = 0;

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
  if (j > 1) {
    document.getElementById(idr).style.display = 'none';
  } else {
    document.getElementById("WishTable").style.display = 'none';
    document.getElementById("p").innerHTML = "Non hai nessun prodotto osservato!";
  }
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
    //dataType: "json",
    success: function(risposta) {
      console.log(risposta);
      j = risposta;
      console.log("ah");
      //var dataResult = JSON.parse(dataResult);
      //console.log(dataResult);
    }
  })
}