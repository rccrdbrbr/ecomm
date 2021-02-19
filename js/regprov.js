function ajaxRequest() {
  var request = false;
  try {
    request = new XMLHttpRequest()
  } catch (e1) {
    try {
      request = new ActiveXObject("Msxml2.XMLHTTP")
    } catch (e2) {
      try {
        request = new ActiveXObject("Microsoft.XMLHTTP")
      } catch (e3) {
        request = false
      }
    }
  }
  return request
}



function popolaRegioni() {
  var xttp = new ajaxRequest();

  xttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      risposta = JSON.parse(this.response);
      regioni = risposta.contenuto;
      menu = document.getElementById('regione');
      console.log(menu);
      for (var i = 0; i < regioni.length; i++) {
        var item = document.createElement('option');
        item.setAttribute("value", regioni[i]);
        item.innerText = regioni[i];
        menu.appendChild(item);
      }
    }
  };
  xttp.open("GET", "backend/getRegioni.php", true);
  xttp.send();
}

function popolaProvince() {
  regioneMenu = document.getElementById('regione');
  regione = regioneMenu.options[regioneMenu.selectedIndex].value;

  if (regione != 'pubblico') {
    var xttp = new ajaxRequest();
    xttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        risposta = JSON.parse(this.response);

        province = risposta.contenuto;
        menu = document.getElementById('prov');
        menu.innerHTML = "";
        console.log("valore di menu" + menu);
        for (var i = 0; i < province.length; i++) {
          var item = document.createElement('option');
          item.setAttribute("value", province[i].prov);
          item.innerText = province[i].prov;
          menu.appendChild(item);
          console.log(province[i].prov);
        }
      }
    };
    xttp.open("GET", "backend/getProvincia.php?regione=" + regione, true);
    xttp.send();
  }
}

function popolaAreaGeo() {
  visibilitym = document.getElementById('visibility');
  visibility = visibilitym.options[visibilitym.selectedIndex].value;
  console.log(visibility);

  if (visibility == 'ristretto') {
    var xttp = new ajaxRequest();
    xttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        risposta = JSON.parse(this.response);
        regioni = risposta.contenuto;
        menu = document.getElementById('area');
        console.log(menu);
        for (var i = 0; i < regioni.length; i++) {
          var item = document.createElement('option');
          item.setAttribute("value", regioni[i]);
          item.innerText = regioni[i];
          menu.appendChild(item);
        }
      }
    };
    xttp.open("GET", "backend/getRegioni.php", true);
    xttp.send();
  }
}