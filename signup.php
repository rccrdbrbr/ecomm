<?php

include "common/header.php"

 ?>

 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
     <div class="container-fluid">
         <ul class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.php">Home</a></li>
             <li class="breadcrumb-item active">Registrazione</li>
         </ul>
     </div>
 </div>
 <!-- Breadcrumb End -->
<form action="backend/signup.inc.php" method="post">
 <div class="login">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <div class="register-form">
                     <div class="row">
                         <div class="col-md-6">
                             <label>Nome</label>
                             <input class="form-control" type="text" name="name" placeholder="Nome">
                         </div>
                         <div class="col-md-6">
                             <label>Cognome</label>
                             <input class="form-control" type="text" name="surname" placeholder="Cognome">
                         </div>
                         <div class="col-md-6">
                             <label>E-mail</label>
                             <input class="form-control" type="text" name= "email" placeholder="E-mail">
                         </div>
                         <div class="col-md-6">
                             <label>Codice Fiscale</label>
                             <input class="form-control" type="text" name="cf" placeholder="Codice Fiscale">
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
                             <label>Città</label>
                             <input class="form-control" type="text" name="city" placeholder="Città">
                         </div>
                         <div class="col-md-6">
                           <label>Via</label>
                           <input class="form-control" type="text" name="via" placeholder="Via">
                         </div>
                         <div class="col-md-12">
                             <label>Immagine</label>
                             <input class="form-control" type="file" name="img" accept="image/jpeg/image/png/image/gif" >
                         </div>
                         <div class="col-md-6">
                             <label>Password</label>
                             <input class="form-control" type="password" name="pwd1" placeholder="Password">
                         </div>
                         <div class="col-md-6">
                             <label>Ripeti Password</label>
                             <input class="form-control" type="password" name="pwd2" placeholder="Ripeti password">
                         </div>
                         <div class="col-md-4">
                             <label>Acquirente</label>
                             <input class="form-control" type="radio" name= "type" value="Acquirente" checked>
                         </div>
                         <div class="col-md-4">
                             <label>venditore</label>
                             <input class="form-control" type="radio" name="type" value="Venditore">
                         </div>
                         <div class="col-md-4">
                             <label>Acquirente/Venditore</label>
                             <input class="form-control" type="radio" name="type" value="Venditore e Acquirente">
                         </div>
                         <div class="col-md-12">
                           <?php

                           if (isset($_GET["error"])) {
                               if ($_GET["error"] == "emptyinput") {
                                   echo "<p>Riempi tutti i campi!</p>";
                               } elseif ($_GET["error"] == "invalidemail") {
                                   echo "<p>L'email non è valida!</p>";
                               } elseif ($_GET["error"] == "differentpwd") {
                                   echo "<p>Le due password non corrispondono!</p>";
                               } elseif ($_GET["error"] == "usernametaken") {
                                   echo "<p>Username o email già in uso!</p>";
                               } elseif ($_GET["error"] == "stmtfailed") {
                                   echo "<p>Qualcosa è andato storto!</p>";
                               } elseif ($_GET["error"] == "none") {
                                   echo "<p>Ti sei registrato!</p>";
                               }
                           }

                            ?>
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

  include "common/footer.php"

?>
