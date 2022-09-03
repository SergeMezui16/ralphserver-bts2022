<?php 
namespace RalphServer\Profile;

use RalphServer\Constants;
use RalphServer\Entities\Group;

 ?>

<?php require 'template/head.php' ?>
<?php require 'template/header.php' ?>
<?php require 'template/side-bar.php' ?>




<main id="main" class="main">

    <div class="pagetitle">
      <h1>Mon Profil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Accueil</a></li>
          <li class="breadcrumb-item">Utilisateur</li>
          <li class="breadcrumb-item active">Mon Profil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php if(!empty($server->getValue('Avatar'))){echo Constants::host.'/src/img/avatar/'.$server->getValue('Avatar');}else{echo  Constants::host.'/src/img/avatar/default.jpeg';} ?>" alt="Profil" class="rounded-circle">
              <h2><?= $user['Name'] ?></h2>
              <h3><?= Group::getNameById($user['Group']) ?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Apparence</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer de mot de passe</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">A propos</h5>
                  <p class="small fst-italic"><?= $user['About'] ?></p>

                  <h5 class="card-title">Détails</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Noms</div>
                    <div class="col-lg-9 col-md-8"><?= $user['Name'] ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $user['Email'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Groupe</div>
                    <div class="col-lg-9 col-md-8"><?= Group::getNameById($user['Group']) ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Poste</div>
                    <div class="col-lg-9 col-md-8"><?= $user['Job'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Anniversaire</div>
                    <div class="col-lg-9 col-md-8"><?php if(isset($user['Birth'])){ echo $_date->stringDate($user['Birth'].' 00:00:00'); }?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Numero de téléphone</div>
                    <div class="col-lg-9 col-md-8"><?= $user['Phone'] ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form enctype="multipart/form-data" method="POST">

                    <div class="row mb-3">

                      <?php if(isset($success)) : ?>
                          <div class="alert alert-success" role="alert">
                              <?= $success ?> <a href="/group/admin"></a>
                          </div>
                          <?php endif ?>

                          <?php if(isset($error)) : ?>
                          <div class="alert alert-danger" role="alert">
                              <?= $error ?>
                          </div>
                      <?php endif ?>

                    </div>

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Photo de profil</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="preview">
                          <img src="<?php if(!empty($server->getValue('Avatar'))){echo Constants::host.'/src/img/avatar/'.$server->getValue('Avatar');}else{echo  Constants::host.'/src/img/avatar/default.jpeg';} ?>" alt="Profile">
                        </div>
                        <div class="pt-2">
                          <label for="avatar" class="btn btn-dark btn-sm text-light" title="Ajouter une photo de profil"><i class="bi bi-upload"></i></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8 d-none">
                        <input type="file" class="form-control" id="avatar" name="avatar">
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?= $user['Name'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">A propos</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"><?= $user['About'] ?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?= $user['Email'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Poste</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="<?= $user['Job'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Sexe</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="sex" id="" class="form-select">
                            <option value="M" <?php if($user['Sex'] == 'M') echo 'selected' ?>>Masculin</option>
                            <option value="F" <?php if($user['Sex'] == 'F') echo 'selected' ?>>Feminin</option>
                            <option value="O" <?php if($user['Sex'] == 'O') echo 'selected' ?>>Autres...</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Date de Naissance</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="birth" type="date" class="form-control" id="Address" value="<?= $user['Birth'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Numéro de Téléphone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?= $user['Phone'] ?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-dark" name="edit-profile">Enregistrer les Modifications</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Ancien</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmez le nouveau</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-dark" name="change-pwd">Changer le mot de passe</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script>
    // Changement de la photo de profil
      var input = document.querySelector('#avatar');
      var preview = document.querySelector('.preview');

      input.addEventListener('change', updateImageDisplay);

      function updateImageDisplay() {
          while(preview.firstChild) {
              preview.removeChild(preview.firstChild);
          }

          var curFiles = input.files;
          
          if(curFiles.length === 0) {
              var para = document.createElement('p');
              para.textContent = 'Aucun fichier sélectioné';
              preview.appendChild(para);
          } else {
              var list = document.createElement('ul');
              list.style.listStyleType = 'none';
              preview.appendChild(list);
              for(var i = 0; i < curFiles.length; i++) {
              var listItem = document.createElement('li');
              var para = document.createElement('p');
              if(validFileType(curFiles[i])) {
                  var image = document.createElement('img');
                  image.src = window.URL.createObjectURL(curFiles[i]);

                  listItem.appendChild(image);
                  listItem.appendChild(para);

              } else {
                  listItem.appendChild(para);
              }

              list.appendChild(listItem);
              }
          }
      }
      var fileTypes = [
          'image/jpeg',
          'image/pjpeg',
          'image/png'
      ];

      function validFileType(file) {
          for(var i = 0; i < fileTypes.length; i++) {
              if(file.type === fileTypes[i]) {
              return true;
              }
          }

          return false;
      }

      function returnFileSize(number) {
          if(number < 1024) {
              return number + ' octets';
          } else if(number >= 1024 && number < 1048576) {
              return (number/1024).toFixed(1) + ' Ko';
          } else if(number >= 1048576) {
              return (number/1048576).toFixed(1) + ' Mo';
          }
      }
  </script>

<?php require 'template/footer.php' ?>