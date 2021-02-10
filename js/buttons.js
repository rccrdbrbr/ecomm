//var j = 0;

function addWish(id) {
  console.log("idwish: " + id);
  //document.getElementById("nwish").innerHTML = "(" + j + ")";
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
  countWish();
}

function addCart(id) {
  console.log("idcart: " + id);
  $.ajax({
    url: "backend/add-cart.inc.php",
    type: "POST",
    data: {
      id: id
    },
    cache: false
  })
  countCart();
}

function deleteWish(id, i) {
  deleteRowTable(id);
  //countRows(i);
  console.log("id: " + id);
  j -= 1;
  document.getElementById("nwish").innerHTML = "(" + j + ")";
  console.log("j: " + j);
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


function countCart() {
  $.ajax({
    url: "backend/no-cart.inc.php",
    type: "POST",
    cache: false,
    //dataType: "json",
    success: function(risposta) {
      console.log("ncart: " + risposta);
      document.getElementById("ncart").innerHTML = "(" + risposta + ")";
      t = risposta;
      //var dataResult = JSON.parse(dataResult);
      //console.log(dataResult);
    }
  })
}

function countWish() {
  $.ajax({
    url: "backend/no-wishlist.inc.php",
    type: "POST",
    cache: false,
    //dataType: "json",
    success: function(risposta) {
      console.log("nwish: " + risposta);
      document.getElementById("nwish").innerHTML = "(" + risposta + ")";
      j = risposta;
      //var dataResult = JSON.parse(dataResult);
      //console.log(dataResult);
    }
  })
}


function countRowsCat() {
  $.ajax({
    url: "backend/no-wishlist-cat.inc.php",
    type: "POST",
    cache: false,
    //dataType: "json",
    success: function(risposta) {
      console.log("nwishCat: " + risposta);
      j = risposta;
      //var dataResult = JSON.parse(dataResult);
      //console.log(dataResult);
    }
  })
}