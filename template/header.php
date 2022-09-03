<?php use RalphServer\Constants;
use RalphServer\Entities\Group;

 ?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="/" class="logo d-flex align-items-center">
    <img src="<?= Constants::host ?>/src/img/ralph-server-icon.png" alt="icon RalphServer">
    <img src="<?= Constants::host ?>/src/img/ralph-server-logo.png" class="d-none d-lg-block" alt="Logo RalphServer">
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="<?php if(!empty($server->getValue('Avatar'))){echo Constants::host.'/src/img/avatar/'.$server->getValue('Avatar');}else{echo  Constants::host.'/src/img/avatar/default.jpeg';} ?>" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2 fs-4"><?= $server->getValue('Name') ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?= $server->getValue('Name') ?></h6>
          <span><?=Group::getNameById((int) $server->getValue('Group'))  ?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="/profile">
            <i class="bi bi-person"></i>
            <span>Mon Profil</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="/">
            <i class="bi bi-question-circle"></i>
            <span>Aide</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center bg-danger text-light" href="/logout">
            <i class="bi bi-box-arrow-right"></i>
            <span>Deconnexion</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->