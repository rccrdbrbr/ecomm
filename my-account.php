<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["CF"]) || isset($_GET["cf"])) {
    include "common/header.php";
    include "backend/account-query.inc.php"; ?>


        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Account</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Bacheca</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Annunci</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>Indirizzo e Valutazioni</a>
                            <?php if (!isset($_GET["cf"])) { ?>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Modifica Account</a>
                            <a class="nav-link" href="backend/logout.inc.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                            <?php   } ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <div class="col-md-12">
                                  <img src="img/<?php echo $utente["Immagine"] ?>" width="150" height="150" style="float: right">
                                  <h3><b><?php echo $utente["Nome"].' ' .$utente["Cognome"] ?></b></h3>
                                </div>
                                <div class="col-md-12" >
                                  <h5><?php echo $utente["Email"] ?></h5>
                                </div>
                                <div class="col-md-12" >
                                  <h5><?php echo $utente["CF"] ?></h5>
                                  <h5>Tipo Account:</h5>
                                  <h5><?php echo $utente["Tipo"] ?></h5>
                                </div>
                                <?php if (!isset($_GET["cf"])) { ?>
                               <form action="backend/my-account.inc.php" method="post">
                                 <div class="col-md-12">
                                   <br>
                                     <button class="btn" type="submit" name="delete">Elimina Account</button>
                                 </div>
                               </form>
                               <?php   } ?>
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">

                            <?php

                            include "backend/table-accountP.inc.php"; ?>
                            <br>
                            <?php
                            include "backend/table-accountC.inc.php"; ?>
                            </div>

                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <div class="row">
                                    <div class="col-md-12">
                                      <h4>Indirizzo</h4>
                                      <?php
                                        echo '<p>Via ' .$utente["Via"]. ', ' .$utente["Città"]. ', ' .$utente["Prov"].', ' .$utente["Reg"].'</p>'; ?>
                                    </div>
                                    <div class="col-md-6">
                                      <h4>Numero valutazioni</h4>
                                      <?php echo $valutazioni["n"]; ?>
                                    </div>
                                    <div class="col-md-6">
                                      <h4>Media Valutazioni</h4>
                                      <div class="col-md-12">
                                        <?php echo "Puntualità ".$valutazioni["p"]; ?>
                                      </div>
                                      <div class="col-md-12">
                                        <?php echo "Serietà ".$valutazioni["s"]; ?>
                                      </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Modifica Account</h4>
                                <form action="backend/my-account.inc.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-6">
                                    <input class="form-control" type="text" name="name" placeholder="Nome" value=<?php echo $utente["Nome"] ?> disabled>
                                  </div>
                                  <div class="col-md-6">
                                    <input class="form-control" type="text" name="surname" placeholder="Cognome" value=<?php echo $utente["Cognome"] ?> disabled>
                                  </div>
                                  <div class="col-md-6">
                                    <input class="form-control" type="text" name= "email" placeholder="E-mail" value=<?php echo $utente["Email"] ?>>
                                  </div>
                                  <div class="col-md-6">
                                    <input class="form-control" type="text" name="cf" placeholder="Codice Fiscale" value=<?php echo $utente["CF"] ?> disabled>
                                  </div>
                                  <div class="col-md-3">
                                    <select class="form-control" id="regione" name="regione">
                                      <option value=<?php echo $utente["Reg"] ?> selected><?php echo $utente["Reg"] ?></option>
                                    </select>
                                  </div>
                                  <div class="col-md-3">
                                    <select class="form-control" id="prov" name="prov">
                                      <option value="<?php echo $utente["Prov"] ?>" selected><?php echo $utente["Prov"] ?></option>
                                    </select>                                  </div>
                                  <div class="col-md-3">
                                    <input class="form-control" type="text" name="city" placeholder="Città" value=<?php echo $utente["Città"] ?>>
                                  </div>
                                  <div class="col-md-3">
                                    <input class="form-control" type="text" name="via" placeholder="Via" value=<?php echo $utente["Via"] ?>>
                                  </div>
                                  <div class="col-md-12">
                                    <input class="form-control" type="file" name="img" accept="image/jpeg/image/png/image/gif" >
                                  </div>
                                  <div class="col-md-4">
                                    <label>Acquirente</label>
                                    <input class="form-control" type="radio" name= "type" value="Acquirente" required>
                                  </div>
                                  <div class="col-md-4">
                                    <label>venditore</label>
                                    <input class="form-control" type="radio" name="type" value="Venditore" required>
                                  </div>
                                  <div class="col-md-4">
                                    <label>Acquirente/Venditore</label>
                                    <input class="form-control" type="radio" name="type" value="Venditore e Acquirente" required>
                                  </div>
                                  <div class="col-md-12">
                                    <button class="btn" type="submit" name="modprof">Aggiorna Account</button>
                                    <br><br>
                                  </div>
                                </div>

                                <h4>Cambia Password</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" name="pwdv" placeholder="Password corrente">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="password" name="pwdn1" placeholder="Nuova Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="password" name="pwdn2" placeholder="Conferma Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" type="submit" name="modpwd">Salva</button>
                                    </div>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->
        <script src="js/regprov.js"></script>
        <script src="js/eventHandlers.js"></script>
<?php

  include "common/footer.php";
} else {
    header("location: index.php");
}
?>
