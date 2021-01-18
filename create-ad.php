<?php
session_start();


if ($_SESSION["Tipo"] == "Venditore" || $_SESSION["Tipo"] == "Venditore e Acquirente") {
    include "common/header.php"; ?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Crea Annuncio</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<form action="backend/create-ad.inc.php" method="post">
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="register-form">
                    <div class="row">
                      <div class="col-md-12">
                        <?php

                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<p>Riempi tutti i campi necessari!</p>";
                            } elseif ($_GET["error"] == "missinginput") {
                                echo "<p>C'è qualche errore!</p>";
                            } elseif ($_GET["error"] == "wrongdate") {
                                echo "<p>La data è errata!</p>";
                            } elseif ($_GET["error"] == "wronginput") {
                                echo "<p>La data è errata!</p>";
                            } else {
                                echo "<p>Annuncio creato!</p>";
                            }
                        } ?>
                      </div>
                        <div class="col-md-12">
                            <label>Nome Annuncio</label>
                            <input class="form-control" type="text" name="name_an" placeholder="Nome Annuncio">
                        </div>
                        <div class="col-md-12">
                            <label>Nome Articolo</label>
                            <input class="form-control" type="text" name="name_ar" placeholder="Nome Articolo">
                        </div>
                        <div class="col-md-6">
                            <label>Prezzo</label>
                            <input class="form-control" type="number" name="price" placeholder="Prezzo">
                        </div>
                        <div class="col-md-6">
                          <label>Regione</label>
                          <select class="form-control" id="regione" name="regione">
                            <option value="nessuna" selected></option>
                          </select>
                        </div>
                        <div class="col-md-6">
                            <label>Provincia</label>
                            <select class="form-control" id="prov" name="prov">
		                            <option value="nessuna" selected></option>
		                            </select>
                        </div>
                        <div class="col-md-6">
                          <label>Comune</label>
                          <input class="form-control" type="text" name= "com">
                        </div>
                        <div class="col-md-12">
                            <label>Data Fine</label>
                            <input class="form-control" type="date" name="date" placeholder="Data Fine">
                        </div>
                        <div class="col-md-6">
                          <label>Visibilità</label>
                          <select name="visibility" class="form-control">
                            <option value="pubblico" selected="selected">Pubblico </option>
                            <option value="privato">Privato </option>
                            <option value="ristretto">Ristretto</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                            <label>Area Geografica</label>
                            <select class="form-control" id="area" name="area">
		                            <option value="nessuna" selected></option>
		                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Immagine</label>
                            <input class="form-control" type="file" name="img" accept="image/jpeg/image/png/image/gif" >
                        </div>
                        <div class="col-md-6">
                          <label>Tipo</label>
                          <select name="type" class="form-control">
                            <option value="#" selected="selected">--- </option>
                            <option value="nuovo" >Nuovo </option>
                            <option value="usato">Usato </option>
                          </select>
                        </div>
                        <div class="col-md-6">
                            <label>Assicurazione(mesi)</label>
                            <input class="form-control" type="number" name="ensurance" placeholder="Mesi di assicurazione rimanenti">
                        </div>
                        <div class="col-md-6">
                            <label>Stato Usura</label>
                            <input class="form-control" type="text" name="usura" placeholder="Stato">
                        </div>
                        <div class="col-md-6">
                            <label>PeriodoUtilizzo(mesi)</label>
                            <input class="form-control" type="number" name="periodo" placeholder="Numero di mesi in cui è stato usato il prodotto">
                        </div>
                        <div class="col-md-6">
                          <label>Categoria</label>
                          <select name="category" class="form-control">
                            <option value="#" selected="selected">--- </option>
                            <option value="Elettrodomestici" >Elettrodomestici </option>
                            <option value="Foto e video">Foto e video </option>
                            <option value="Abbigliamento">Abbigliamento </option>
                            <option value="Hobby">Hobby </option>
                          </select>
                        </div>
                        <div class="col-md-6">
                            <label>Sottocategoria</label>
                            <input class="form-control" type="text" name="subcategory" placeholder="Sottocategoria">
                        </div>

                        <div class="col-md-12">
                            <label>Descrizione Prodotto</label>
                            <textarea class="form-control" rows="5" name="description" placeholder="Descrizione"></textarea>
                        </div>
                        <div class="col-md-12">
                          <?php

                          if (isset($_GET["error"])) {
                              if ($_GET["error"] == "emptyinput") {
                                  echo "<p>Riempi tutti i campi necessari!</p>";
                              } elseif ($_GET["error"] == "missinginput") {
                                  echo "<p>C'è qualche errore!</p>";
                              } elseif ($_GET["error"] == "wrongdate") {
                                  echo "<p>La data è errata!</p>";
                              } elseif ($_GET["error"] == "wronginput") {
                                  echo "<p>La data è errata!</p>";
                              } else {
                                  echo "<p>Annuncio creato!</p>";
                              }
                          } ?>
                        </div>

                        <div class="col-md-12">
                            <button class="btn" type="submit" name="submit">Invia</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</form>

<?php
} else {
                              header("location: index.php");
                          }

include "common/footer.php"

?>
