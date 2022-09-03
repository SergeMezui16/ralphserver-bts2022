<?php use RalphServer\Helpers\Util; ?>


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
  

  <li class="nav-item">
    <a class="nav-link collapsed" href="/">
      <i class="bi bi-grid"></i>
      <span>Tableau de bord</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <li class="nav-item ">
    <a class="nav-link collapsed bg-dark" href="/file/add" >
      <i class="bi bi-plus-lg text-light"></i>
      <span class="text-light">Ajouter un fichier</span>
    </a>
  </li><!-- End Message Page Nav -->

  <li class="nav-item ">
    <a class="nav-link collapsed bg-success" href="/message/new" >
      <i class="bi bi-plus-lg text-light"></i>
      <span class="text-light">Nouveau Message</span>
    </a>
  </li><!-- End Message Page Nav -->

  <li class="nav-heading">Fichiers</li>  
  
  <li class="nav-item">
    <a class="nav-link <?php if(Util::def(!$fileMine)) echo 'collapsed' ?>" href="/file/mine">
      <i class="bi bi-file-earmark-word-fill"></i>
      <span>Mes Fichiers</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link <?php if(Util::def(!$fileShare)) echo 'collapsed' ?>" href="/file/share">
      <i class="bi bi-share"></i>
      <span>Fichiers Partagés</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link  <?php if(Util::def(!$allFile)) echo 'collapsed' ?>" href="/file/all">
      <i class="bi bi-table"></i>
      <span>Tous les Fichiers</span>
    </a>
  </li><!-- End Contact Page Nav -->

<?php if((int) $server->getValue('GroupLevel') == 1) : ?>

  <li class="nav-heading">Administration</li>  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-fill"></i><span>Utilisateurs</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse <?php if((isset($userAdd) && $userAdd == true) || (isset($userList) && $userList == true)) echo 'show'?>" data-bs-parent="#sidebar-nav">
      <li>
        <a href="/user/add" <?php if(isset($userAdd) && $userAdd == true) echo 'class="active"' ?>>
          <i class="bi bi-circle"></i><span>Ajouter</span>
        </a>
      </li>
      <li>
        <a href="/user/admin" <?php if(isset($userList) && $userList == true) echo 'class="active"' ?>>
          <i class="bi bi-circle"></i><span>Administrer</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Groupes</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse <?php if((isset($groupAdd) && $groupAdd == true) ||(isset($groupList) && $groupList == true)) echo 'show'?>" data-bs-parent="#sidebar-nav">
    <li>
        <a href="/group/add" <?php if(isset($groupAdd) && $groupAdd == true) echo 'class="active"' ?>>
          <i class="bi bi-circle"></i><span>Ajouter</span>
        </a>
      </li>
      <li>
        <a href="/group/admin" <?php if(isset($groupList) && $groupList == true) echo 'class="active"' ?>>
          <i class="bi bi-circle"></i><span>Administrer</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

<?php endif ?>

  <li class="nav-heading">Moi</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/profile">
      <i class="bi bi-person"></i>
      <span>Mon Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/message/list">
      <i class="bi bi-chat"></i>
      <span>Mes Messages</span>
    </a>
  </li><!-- End Message Page Nav -->

</ul>

</aside><!-- End Sidebar-->