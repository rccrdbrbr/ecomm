<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["CF"])) {
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
                            <?php   } ?>
                            <?php if (!isset($_GET["cf"])) { ?>

                            <a class="nav-link" href="backend/logout.inc.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                            <?php   } ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                              <?php
                                echo '<div class="col-md-12">';
    echo '<img src="img/'.$utente["Immagine"].'" width="150" height="150" style="float: right">';
    echo '<h3><b>' .$utente["Nome"].' ' .$utente["Cognome"].'</b></h3>';

    echo '</div>';
    echo '<div class="col-md-12" >';
    echo '<h5>' .$utente["Email"].'</h5>';
    echo '</div>';

    echo '<div class="col-md-12" >';


    echo '<h5>' .$_SESSION["CF"].'</h5>';
    echo 'Tipo Account:';
    echo '<br>';
    echo '<h5>' .$utente["Tipo"].'</h5>';

    echo '</div>'; ?>

                               <form action="backend/my-account.inc.php" method="post">
                                 <div class="col-md-12">
                                   <br>
                                     <button class="btn" type="submit" name="delete">Elimina Account</button>
                                 </div>
                               </form>
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">

                                          <?php

                                          include "backend/table-accountP.inc.php";
    echo "<br>";
    include "backend/table-accountC.inc.php"; ?>
                            </div>

                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <div class="row">
                                    <div class="col-md-12">
                                      <h4>Indirizzo</h4>
                                      <?php
                                        echo '<p>Via ' .$utente["Via"]. ', ' .$utente["Città"]. ', ' .$utente["Prov"].', ' .$utente["Reg"].'</p>'; ?>


                                      <!--  <button class="btn" href="#account-tab">Modifica Indirizzo</button> -->
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
                                <form action="backend/my-account.inc.php" method="post">
                                <div class="row">
                                  <?php
                                  echo '<div class="col-md-6">';
    echo '<input class="form-control" type="text" name="name" placeholder="Nome" value='.$utente["Nome"].' disabled>';
    echo '</div>';
    echo  '<div class="col-md-6">';
    echo    '<input class="form-control" type="text" name="surname" placeholder="Cognome" value='.$utente["Cognome"].' disabled>';
    echo  '</div>';
    echo  '<div class="col-md-6">';
    echo    '<input class="form-control" type="text" name= "email" placeholder="E-mail" value='.$utente["Email"].'>';
    echo  '</div>';
    echo  '<div class="col-md-6">';
    echo    '<input class="form-control" type="text" name="cf" placeholder="Codice Fiscale" value='.$utente["CF"].' disabled>';
    echo  '</div>';
    echo  '<div class="col-md-3">';
    echo    '<input class="form-control" type="text" name="via" placeholder="Via" value='.$utente["Via"].'>';
    echo  '</div>';
    echo  '<div class="col-md-3">';
    echo    '<input class="form-control" type="text" name="city" placeholder="Città" value='.$utente["Città"].'>';
    echo  '</div>';
    echo  '<div class="col-md-3">';
    echo    '<input class="form-control" type="text" name= "prov" placeholder="Provincia" value='.$utente["Prov"].'>';
    echo  '</div>';
    echo  '<div class="col-md-3">';
    echo    '<input class="form-control" type="text" name="reg" placeholder="regione" value='.$utente["Reg"].'>';
    echo  '</div>';
    echo  '<div class="col-md-12">';
    echo      '<input class="form-control" type="file" name="img" accept="image/jpeg/image/png/image/gif" >';
    echo  '</div>';
    echo  '<div class="col-md-4">';
    echo      '<label>Acquirente</label>';
    echo      '<input class="form-control" type="radio" name= "type" value="Acquirente" required>';
    echo  '</div>';
    echo  '<div class="col-md-4">';
    echo      '<label>venditore</label>';
    echo      '<input class="form-control" type="radio" name="type" value="Venditore" required>';
    echo  '</div>';
    echo  '<div class="col-md-4">';
    echo      '<label>Acquirente/Venditore</label>';
    echo      '<input class="form-control" type="radio" name="type" value="Venditore e Acquirente" required>';
    echo  '</div>';
    echo  '<div class="col-md-12">';
    echo      '<button class="btn" type="submit" name="modprof">Aggiorna Account</button>';
    echo      '<br><br>'; ?>
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

<?php

  include "common/footer.php";
} else {
    header("location: index.php");
}
?>
