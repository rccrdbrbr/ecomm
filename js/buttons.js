  function addWish() {
    var id = $('#wish').val();
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
        if (dataResult.statusCode == 200) {
          alert("Funziona!");
        } else if (dataResult.statusCode == 201) {
          alert("Nooooo!");
        }
      }
    })
  }

  /*
  function addWish() {
    wishMenu = document.getElementById('wish');
    wish = wishMenu.options[wishMenu.selectedIndex].value;
    console.log();
  }
  */