function addWish(id) {
  console.log("idwish: " + id);
  $.ajax({
    url: "backend/add-wishlist.inc.php",
    type: "POST",
    data: {
      id: id
    },
    cache: false
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

function deleteWish(id) {
  deleteRowTableWish(id);
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

function deleteRowTableWish(id) {
  idr = 'row' + id;
  console.log(idr);
  if (j > 1) {
    document.getElementById(idr).style.display = 'none';
  } else {
    document.getElementById("WishTable").style.display = 'none';
    document.getElementById("p").innerHTML = "Non hai nessun prodotto osservato!";
  }
}

function deleteCart(id) {
  deleteRowTableCart(id);
  console.log("id: " + id);
  t -= 1;
  document.getElementById("ncart").innerHTML = "(" + t + ")";
  console.log("t: " + t);
  $.ajax({
    url: "backend/remove-element-cart.inc.php",
    type: "POST",
    data: {
      id: id
    },
    cache: false
  })
  priceCart()
}

function deleteRowTableCart(id) {
  idr = 'row' + id;
  console.log(idr);
  if (t > 1) {
    document.getElementById(idr).style.display = 'none';
  } else {
    document.getElementById("cartTable").style.display = 'none';
    document.getElementById("p").innerHTML = "Non hai nessun prodotto nel carrello!";
  }
}

function emptyCart() {
  $.ajax({
    url: "backend/empty-cart.inc.php",
    type: "POST",
    cache: false
  })
  document.getElementById("cartTable").style.display = 'none';
  document.getElementById("p").innerHTML = "Non hai nessun prodotto nel carrello!";
  document.getElementById("ncart").innerHTML = "(0)";
  document.getElementById("subtot").innerHTML = "€0";
  document.getElementById("tot").innerHTML = "€0";
}

function priceCart() {
  $.ajax({
    url: "backend/price-cart.inc.php",
    type: "POST",
    cache: false,
    success: function(price) {
      console.log("price: " + price);
      document.getElementById("subtot").innerHTML = "€" + price;
      document.getElementById("tot").innerHTML = "€" + price;
    }
  })
}

function buyCart() {
  $.ajax({
    url: "backend/buy-cart.inc.php",
    type: "POST",
    cache: false,
    success: function(f) {
      if (f = 0) {
        document.getElementById("pcart").innerHTML = "L'acquisto è andato a buon fine!";
        document.getElementById("cartTable").style.display = 'none';
        document.getElementById("p").innerHTML = "Non hai nessun prodotto nel carrello!";
        document.getElementById("ncart").innerHTML = "(0)";
        document.getElementById("subtot").innerHTML = "€0";
        document.getElementById("tot").innerHTML = "€0";
      } else {
        document.getElementById("pcart").innerHTML = "Non tutti i prodotti sono stati acquistati!";
        document.getElementById("cartTable").style.display = 'none';
        document.getElementById("p").innerHTML = "Qualcosa è andato storto!";
        document.getElementById("ncart").innerHTML = "(" + t + ")";
        document.getElementById("subtot").innerHTML = "€0";
        document.getElementById("tot").innerHTML = "€0";
      }
    }
  })
}

function countCart() {
  $.ajax({
    url: "backend/no-cart.inc.php",
    type: "POST",
    cache: false,
    success: function(ncart) {
      console.log("ncart: " + ncart);
      document.getElementById("ncart").innerHTML = "(" + ncart + ")";
      t = ncart;
    }
  })
}

function countWish() {
  $.ajax({
    url: "backend/no-wishlist.inc.php",
    type: "POST",
    cache: false,
    success: function(nwish) {
      console.log("nwish: " + nwish);
      document.getElementById("nwish").innerHTML = "(" + nwish + ")";
      j = nwish;
    }
  })
}


function countRowsCat() {
  $.ajax({
    url: "backend/no-wishlist-cat.inc.php",
    type: "POST",
    cache: false,
    success: function(nwishCat) {
      console.log("nwishCat: " + nwishCat);
      j = nwishCat;
    }
  })
}