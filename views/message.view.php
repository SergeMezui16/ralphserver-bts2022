<?php namespace RalphServer\Message; 
use RalphServer\Helpers\Util; 
use RalphServer\Entities\User; 

?>
<?php require 'template/head.php' ?>
<?php require 'template/header.php' ?>
<?php require 'template/side-bar.php' ?>

<!-- Nouveau message -->

<?php if($new) : ?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Nouveau Message</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Accueil</a></li>
      <li class="breadcrumb-item">Message</li>
      <li class="breadcrumb-item active">Nouveau Message</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">

            <div class="card">
                <div class="card-body">
                    
                    <form action="" method="POST">
                        <div class="d-flex m-2 justify-content-between align-items-center">
                            <h5 class="card-title">Nouveau Message</h5>
                            <button type="submit" name="send-message" class="btn btn-dark">Envoyer</button>
                        </div>
                        <div class="row mb-3">
                            <?php if(isset($success)) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= $success ?>
                            </div>
                            <?php endif ?>

                            <?php if(isset($error)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                            <?php endif ?>
                        </div>
                                    
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" id="inputName5" name="object" placeholder="Objet de votre message">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="inputAddress5" class="form-label">Destinataires</label>
                            <select name="user[]" class="form-select" id="inputPassword5" multiple>
                            <?php foreach($listUser as $u): ?>
                                <?php if($id != (int) $u['id']) :?>
                                    <option value="<?= $u['id'] ?>"><?= $u['Name'] ?></option>
                                <?php endif?>
                            <?php endforeach ?>
                            </select>
                            <small class="small"><code>Ctrl + clic</code> pour selectionner.</small>
                        </div>
                        <!-- TinyMCE Editor -->
                        <h5 class="h5">Votre Message</h5>
                        <textarea class="tinymce-editor" name="content">
                        </textarea><!-- End TinyMCE Editor -->
                        
                    </form>

                </div>
            </div>

        </div>

        <div class="col-lg-4">
            <p></p>
        </div>  
    </div>
</section>

</main><!-- End #main -->
<?php endif; ?>

<!-- Liste des messages -->
<?php if($list) : ?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Mes Messages</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Accueil</a></li>
      <li class="breadcrumb-item">Message</li>
      <li class="breadcrumb-item active">Mes Messages</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">

            <div class="card">
                <div class="card-body">
                <h2 class="card-title">Messages reçus</h2>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <?php foreach($listMessage as $lm) : ?>
                    <?php if(in_array($id, json_decode($lm['Recipient']))) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading1<?= $lm['id'] ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1<?= $lm['id'] ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <div class="d-flex justify-content-between w-100">
                                <div class="d-block"><?= User::getById((int) $lm['Sender'])[0]['Name'] ?></div>
                                <div class="d-block"><?= $lm['Object'] ?></div>
                                <div class="d-block">il y'a <?= $_date->countedDate($lm['created']) ?></div>
                            </div>
                            </button>
                            </h2>
                            <div id="flush-collapse1<?= $lm['id'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading1<?= $lm['id'] ?>" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body bg-light border-secondary border-start ps-2">
                                <?= $lm['Body'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endif?>
                    <?php endforeach?>
                </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                <h2 class="card-title">Messages envoyés</h2>
                <div class="accordion accordion-flush" id="accordionFlushExample2">
                    <?php foreach($listMessage as $lm) : ?>
                    <?php if($id == (int) $lm['Sender']) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading<?= $lm['id'] ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $lm['id'] ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <div class="d-flex justify-content-between w-100">
                                <div class="d-block"><?= Util::jsonToSringUserId($lm['Recipient'])?></div>
                                <div class="d-block"><?= $lm['Object'] ?></div>
                                <div class="d-block">il y'a <?= $_date->countedDate($lm['created']) ?></div>
                            </div>
                            </button>
                            </h2>
                            <div id="flush-collapse<?= $lm['id'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?= $lm['id'] ?>" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body bg-light border-secondary border-start ps-2">
                                <?= $lm['Body'] ?>
                                </div>
                                <div class="text-end mb-4">
                                    <a class="btn btn-danger" href="/message/del/<?= $lm['id'] ?>" title="Suprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce message ?')">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    <?php endif?>
                    <?php endforeach?>
                </div>

                </div>
            </div>

        </div>

        <div class="col-lg-4">
            <p></p>
        </div>  
    </div>
</section>

</main><!-- End #main -->
<?php endif; ?>

<?php require 'template/footer.php' ?>
