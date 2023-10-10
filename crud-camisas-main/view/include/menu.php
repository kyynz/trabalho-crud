<?php
require_once(__DIR__ . "/../../util/config.php");
?>
<nav class="navbar navbar-expand-md navbar-light bg-danger">
    <a class="navbar-brand" href="#">CRUD CAMISAS</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/index.php">Home</a>
            </li>
            <li class="dropdown">
  <div class="nav-item nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Cadastros
</div>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="<?= BASE_URL ?>/view/camisas/listar.php">Camisas</a></li>
    <li><a class="dropdown-item" href="#">Times</a></li>
  </ul>
</li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sobre</a>
            </li>
        </ul>
    </div>
</nav>