    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: green !important;" id="barre">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="color:white;">ShopNet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php" style="color:white;">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produit.php" style="color:white;">Produits</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color:white;">Nous contacter</a>
            </li>
            <?php if (!$_SESSION['name']) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                  Compte
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="login.php">Se connecter</a></li>
                  <li><a class="dropdown-item" href="register.php">S'enregistrer</a></li>
                </ul>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="logout.php" style="color:white;">Déconnexion</a>
              </li>
            <?php } ?>

          </ul>
          <div class="container w-100" id="search">
            <form class="d-flex" role="search" style="flex-grow: 1;flex-shrink: 1;">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-danger" type="submit">Search</button>
            </form>
            <div id="boutton">
              <a class="navbar-brand" id="mode">
                <img src="img/drapeau-france-rond.jpg" alt="Bootstrap" width="40" height="40" style="border-radius: 20px;">
              </a>
              <a class="navbar-brand" onclick=darkmode()>
                <img src="img/pngtree-dark-mode-icon-light-png-clipart-png-image_3811921.jpg" alt="Bootstrap" width="40" height="40" style="border-radius: 20px;">
              </a>
            </div>
          </div>
        </div>

      </div>
    </nav>