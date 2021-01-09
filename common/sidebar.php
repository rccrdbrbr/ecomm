<div class="col-lg-4 sidebar">
    <div class="sidebar-widget category">
        <h2 class="title">Categorie</h2>
        <nav class="navbar bg-light">
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="product-list.php?category=Elettrodomestici"><i class="fa fa-microchip"></i>Elettrodomestici</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="product-list.php?category=Foto e video"><i class="fa fa-mobile-alt"></i>Foto e video</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="product-list.php?category=Abbigliamento"><i class="fa fa-tshirt"></i>Abbigliamento</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="product-list.php?category=Hobby"><i class="fa fa-child"></i>Hobby</a>
              </li>
            </ul>
        </nav>
    </div>
    <div class="sidebar-widget widget-slider">
        <div class="sidebar-slider normal-slider">
    <?php

    include "backend/product-list-slider.inc.php";

     ?>
   </div>
</div>



    <div class="sidebar-widget tag">
        <h2 class="title">Tags Cloud</h2>
        <?php  include "backend/product-list-sottocategorie.inc.php"; ?>
        <!--
        <a href="#">Lorem ipsum</a>
        <a href="#">Vivamus</a>
        <a href="#">Phasellus</a>
        <a href="#">pulvinar</a>
        <a href="#">Curabitur</a>
        <a href="#">Fusce</a>
        <a href="#">Sem quis</a>
        <a href="#">Mollis metus</a>
        <a href="#">Sit amet</a>
        <a href="#">Vel posuere</a>
        <a href="#">orci luctus</a>
        <a href="#">Nam lorem</a>
      -->
    </div>

</div>
