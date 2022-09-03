<?php use RalphServer\Constants; ?>
<?php require \RalphServer\Constants::local. 'template/head.php' ?>
<?php require \RalphServer\Constants::local. 'template/header.php' ?>
<?php require \RalphServer\Constants::local. 'template/side-bar.php' ?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tableau de Bord</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
            <li class="breadcrumb-item active">Tableau de Bord</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
            
                <div class="p-5 mb-4 bg-light rounded-3 bg-light">
                    <div>
                        
                    </div>
                    <div class="container-fluid py-1">
                        <img src="<?= Constants::host ?>src/img/ralph-server-logo.png" class="img-fluid w-md-25 w-25 d-block mb-4" alt="Ralph Server">
                        <h1 class="display-1 fw-bold text-dark">Bienvenu, <?= $server->getValue('Name')  ?></h1>
                        <p class="col-md-8 fs-2">Partagez et stockez des fichiers et envoyez des messages privé a vos colleges en quelques cliques.</p>
                        <a class="btn btn-success btn-lg" href="/file/add">Partagez un fichiers</a>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->

      </div>
    </section>
</main>




<?php require \RalphServer\Constants::local. 'template/footer.php' ?>
