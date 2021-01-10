<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["CF"])) {
    if (isset($_GET["id"]) && isset($_GET["cf"])) {
        if (isset($_POST["valutaV"]) || isset($_POST["valutaA"])) {
            include "common/header.php"; ?>

 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
     <div class="container-fluid">
         <ul class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.php">Home</a></li>
             <li class="breadcrumb-item active">Valutazione Utente</li>
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
                           <h3>Valutazione Utente</h3>
                         </div>
                         <div class="col-md-6">
                             <label>Prezzo</label>
                             <input class="form-control" type="number" name="price" placeholder="Prezzo">
                         </div>
                         <div class="col-md-6">
                             <label>Comune</label>
                             <input class="form-control" type="text" name= "com" placeholder="Comune">
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
</form>

<?php

include "common/footer.php";
        } else {
            header("location: index.php");
        }
    } else {
        header("location: index.php");
    }
} else {
    header("location: index.php");
}
 ?>
