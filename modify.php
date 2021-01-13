<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["CF"])) {
    //if (isset($_GET["id"]) && isset($_GET["cf"])) {
    //if (isset($_POST["modifica"])) {
    include "common/header.php";
    include "backend/product-detail.inc.php"; ?>

    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Modifica Annuncio</li>
            </ul>
        </div>
    </div>

    <form action="backend/modify.inc.php?id=<?php echo $_GET["id"]; ?>" method="post">
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="register-form">
                        <div class="row">
                            <div class="col-md-12">
                              <h3>Modifica annuncio</h3>
                            </div>
                            <div class="col-md-4">
                              <img  name="img" src="img/<?php echo $annuncio["Foto"]; ?>"  width="300" height="300">
                            </div>
                            <div class="col-md-4">
                              <label>Nome Annuncio</label>
                              <input class="form-control" type="text" name="nameA" placeholder="Nome annuncio" value="<?php echo $annuncio["Nome_A"]; ?>">
                              <label>Prezzo</label>
                              <input class="form-control" type="number" name="price" placeholder="Prezzo" value="<?php echo $annuncio["Prezzo"]; ?>">
                              <label>Categoria</label>
                              <select name="category" class="form-control">
                                <option value="#" selected="selected">--- </option>
                                <option value="Elettrodomestici" >Elettrodomestici </option>
                                <option value="Foto e video">Foto e video </option>
                                <option value="Abbigliamento">Abbigliamento </option>
                                <option value="Hobby">Hobby </option>
                              </select>
                              <label>Visibilità</label>
                              <select name="visibility" class="form-control">
                                <option value="pubblico" selected="selected">Pubblico </option>
                                <option value="privato">Privato </option>
                                <option value="ristretto">Ristretto</option>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Nome Prodotto</label>
                              <input class="form-control" type="text" name="nameP" placeholder="Nome prodotto" value="<?php echo $annuncio["Nome_P"]; ?>">
                              <label>Tipo</label>
                              <input class="form-control" type="text" name="type" placeholder="Tipo" value="<?php echo $annuncio["TipoP"]; ?>" disabled>
                              <label>Sottocategoria</label>
                              <input class="form-control" type="text" name="subcategory" placeholder="Sottocategoria" value="<?php echo $annuncio["Sottocategoria"]; ?>" >
                              <label>Area Geografica</label>
                              <input class="form-control" type="text" name="area" placeholder="Area Geografica se la Visibilità è Ristretta" value="<?php echo $annuncio["AreaGeo"]; ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Comune</label>
                                <input class="form-control" type="text" name= "com" placeholder="Comune" value="<?php echo $annuncio["Comune"]; ?>" >
                            </div>
                            <div class="col-md-4">
                                <label>Provincia</label>
                                <input class="form-control" type="text" name="prov" placeholder="Provincia" value="<?php echo $annuncio["Provincia"]; ?>" >
                            </div>
                            <div class="col-md-4">
                                <label>Regione</label>
                                <input class="form-control" type="text" name="reg" placeholder="Regione" value="<?php echo $annuncio["Regione"]; ?>" >
                            </div>
                            <div class="col-md-12">
                                <label>Immagine</label>
                                <input class="form-control" type="file" name="imgN" accept="image/jpeg/image/png/image/gif" >
                            </div>
                            <div class="col-md-12">
                                <label>Descrizione Prodotto</label>
                                <textarea class="form-control" rows="5" name="description" placeholder="Descrizione" ></textarea>
                            </div>
                            <div class="col-md-12">
                              <button class="btn" type="submit" name="modify">Modifica</button>
                            </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
      </div>
   </form>


<?php
include "common/footer.php";
} else {
    header("location: index.php");
} ?>
