<?php
require_once 'dbh.inc.php';
require_once 'functions/functions-account-query.inc.php';

$venditori = fetchTopVenditori($conn);
if ($venditori!== false) {
    while ($row = mysqli_fetch_assoc($venditori)) {
        ?>

<div class="col-md-6">
    <div class="review-slider-item">
        <div class="">
          <a href="my-account.php?cf=<?php echo $row["CF2"]; ?>">
            <img src="img/<?php echo $row["Immagine"]; ?>" alt="Image" width="200" height="200">
          </a>
        </div>
        <div class="review-text">
            <a href="my-account.php?cf=<?php echo $row["CF2"]; ?>">
              <h2><?php echo $row["Nome"]. " " .$row["Cognome"]; ?></h2></a>
            <h3><?php echo $row["Tipo"]; ?></h3>
            <div class="ratting">
              <?php
                for ($i=0; $i < intval($row["av"]); $i++) {
                    echo '<i class="fa fa-star"></i>';
                } ?>
            </div>
        </div>
    </div>
</div>

<?php
    }
} else {
    ?>
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h3>Non ci sono utenti da mostrare!</h3>
          </div>
        </div>
    </div>
  <?php
}
