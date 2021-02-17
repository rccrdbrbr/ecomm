<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["CF"])) {
    if (isset($_GET["id"]) && isset($_GET["cf"])) {
        if (isset($_POST["valutaA"]) || isset($_POST["valutaV"])) {
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
 <form action="backend/evaluation.inc.php?cf=<?php echo $_GET["cf"]; ?>&id=<?php echo $_GET["id"]; ?>" method="post">
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
                           <label>Serietà</label>
                           <select name="serieta" class="form-control">
                             <option value="#" selected="selected">---</option>
                             <option value=1>1</option>
                             <option value=2>2</option>
                             <option value=3>3</option>
                             <option value=4>4</option>
                             <option value=5>5</option>
                           </select>
                         </div>
                         <div class="col-md-6">
                           <label>Puntualità</label>
                           <select name="puntualita" class="form-control">
                             <option value="#" selected="selected">---</option>
                             <option value=1>1</option>
                             <option value=2>2</option>
                             <option value=3>3</option>
                             <option value=4>4</option>
                             <option value=5>5</option>
                           </select>
                         </div>
                         <div class="col-md-12">

                              <?php if (isset($_POST["valutaA"])) { ?>
                                <button class="btn" type="submit" name="submit" value="Venditore">Invia</button>
                                <?php
                              } else {
                                  ?>
                                <button class="btn" type="submit" name="submit" value="Acquirente">Invia</button>
                                <?php
                              } ?>
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
