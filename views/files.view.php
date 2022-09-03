<?php namespace RalphServer\File;

use RalphServer\Constants;
use RalphServer\Entities\User;
?>

<?php require \RalphServer\Constants::local. 'template/head.php' ?>
<?php require \RalphServer\Constants::local. 'template/header.php' ?>
<?php require \RalphServer\Constants::local. 'template/side-bar.php' ?>


<!-- Ajout de fichier -->
<?php if($fileAdd) : ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Ajouter un fichier</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                <li class="breadcrumb-item active">Mes Fichiers</li>
                <li class="breadcrumb-item active">Ajouter un fichier</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                
                    <div class="card pt-5">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <?php if(isset($success)) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $success ?> <a href="/file/mine"> Voir la liste de mes fichiers.</a>
                                </div>
                                <?php endif ?>

                                <?php if(isset($error)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $error ?>
                                </div>
                                <?php endif ?>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="inputName5" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="inputName5" name="name" placeholder="Rapport de fin de stage">
                            </div>
                            <div class="col-md-8">
                                <label for="inputEmail5" class="form-label">Fichier</label>
                                <input type="file" class="form-control" id="inputEmail5" name="file">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="inputPassword5" class="form-label">Statut</label>
                                <select name="status" class="form-select" id="inputPassword5">
                                    <option value="0" selected>Public</option>
                                    <option value="1">Privé</option>
                                </select>
                            </div>
                            <div class="col-6 mb-4">
                                <label for="inputAddress5" class="form-label">Groupes ayant acces</label>
                                <select name="group[]" class="form-select" id="inputPassword5" multiple>
                                    <?php foreach($listGroup as $g): ?>
                                    <option value="<?= $g['id'] ?>"><?= $g['Name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="small"><code>Ctrl + clic</code> pour selectionner.</small>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">Notes</label>
                                <textarea name="note" id="inputAddress2" class="form-control" cols="30" rows="4"></textarea>
                            </div>
                            <div class="text-end">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-dark" name="addFile">Submit</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <p></p>
            </div><!-- End Right side columns -->
        </div>
        </section>
    </main>
<?php endif; ?>


<!-- Modification de fichier -->
<?php if($fileMod) : ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Modifier un fichier</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                <li class="breadcrumb-item active">Mes Fichiers</li>
                <li class="breadcrumb-item active">Modifier un fichier</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                
                    <div class="card pt-4">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <?php if(isset($success)) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $success ?> <a href="/file/mine"> Voir la liste de mes fichiers.</a>
                                </div>
                                <?php endif ?>

                                <?php if(isset($error)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $error ?>
                                </div>
                                <?php endif ?>
                            </div>

                            <div class="col-md-12 mb-1">
                                <label for="inputName5" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="inputName5" value="<?= $file['Name'] ?>" readonly disabled>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="inputPassword5" class="form-label">Statut</label>
                                <select name="status" class="form-select" id="inputPassword5">
                                    <option value="0" <?php if($file['Status'] == 0) echo 'selected' ?>>Public</option>
                                    <option value="1" <?php if($file['Status'] == 1) echo 'selected' ?>>Privé</option>
                                </select>
                            </div>
                            <div class="col-6 mb-4">
                                <label for="inputAddress5" class="form-label">Groupes ayant acces</label>
                                <select name="group[]" class="form-select" id="inputPassword5" multiple>
                                    <?php foreach($listGroup as $g): ?>
                                    <option value="<?= $g['id'] ?>" <?php foreach($right as $r){if($r == $g['id']) echo 'selected';} ?>><?= $g['Name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="small"><code>Ctrl + clic</code> pour selectionner.</small>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">Notes</label>
                                <textarea name="note" id="inputAddress2" class="form-control" cols="30" rows="4"><?= $file['Note'] ?></textarea>
                            </div>
                            <div class="text-end">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-dark" name="mod-file">Submit</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <p></p>
            </div><!-- End Right side columns -->
        </div>
        </section>
    </main>
<?php endif; ?>

<!-- Mes fichiers -->
<?php if($fileMine) : ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Mes fichiers</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                <li class="breadcrumb-item active">Fichiers</li>
                <li class="breadcrumb-item active">Liste des fichiers</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-10">
                <div class="row">

                <div class="card pt-4">
                    <div class="card-body">
                   
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Creation</th>
                            <th scope="col">Dernier Modification</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php  $i = 1; foreach($myFiles as $m):?>
                        <tr>
                            <th scope="row"><?= $i++;?></th>
                            <td><?= $m['Name'] ?></td>
                            <td><?= $_date->dateToString($m['created'], 2) ?></td>
                            <td><?= $_date->dateToString($m['modified'], 2) ?></td>
                            <td class="text-center h5">
                                <?php if($m['Status']) : ?>
                                <i class="bi bi-shield-fill-check link-secondary"></i>
                                <?php else : ?>
                                <i class="bi bi-shield-slash link-secondary"></i>
                                <?php endif ?>
                            </td>
                            <td class="h5 text-justify">
                                <a class="badge bg-secondary link-light p-2" href="/file/download/<?= $m['Key'] ?>" title="Téléchargement"><i class="bi bi-download"></i></a>
                                <a href="/file/del/<?= $m['Key'] ?>" title="Suprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce fichier ?')" class="badge bg-danger link-light p-2"> <i class="bi bi-x-circle-fill"></i></a>
                                <a href="/file/mod/<?= $m['Key'] ?>" title="Modifier" class="badge bg-secondary link-light p-2"> <i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                    <!-- End Table with stripped rows -->

                    </div>
                </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-2 small">
                <p></p>
            </div><!-- End Right side columns -->
        </div>
        </section>
    </main>
<?php endif; ?>


<!-- Fichiers Partagés -->
<?php if($fileShare) : ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Fichiers Partagés</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
            <li class="breadcrumb-item active">Fichiers</li>
            <li class="breadcrumb-item active">Fichiers Partagés</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
            <div class="row">

            <div class="card pt-4">
                <div class="card-body">
               
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Propietaire</th>
                        <th scope="col">Creation</th>
                        <th scope="col">Dernier Modification</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php  $i = 1; foreach($sharedFiles as $s):?>
                        <?php if(FileModel::hasRight($_group,$s['Right'])) : ?>
                        <tr>
                            <th scope="row"><?= $i++;?></th>
                            <td><?= $s['Name'] ?></td>
                            <td><?= User::getById((int) $s['Owner'])[0]['Name'] ?></td>
                            <td><?= $_date->dateToString($s['created'], 2) ?></td>
                            <td><?= $_date->dateToString($s['modified'], 2) ?></td>
                            <td class="h5 text-justify">
                                <a class="badge bg-secondary link-light p-2" href="/archive/<?= $s['Path'] ?>" title="Téléchargement"><i class="bi bi-download"></i></a>
                            </td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

                </div>
            </div>

            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-2 small">
            <p></p>
        </div><!-- End Right side columns -->
    </div>
    </section>
</main>
<?php endif; ?>


<!-- Tous les fichiers -->
<?php if($allFile) : ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tous les fichiers</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
            <li class="breadcrumb-item active">Fichiers</li>
            <li class="breadcrumb-item active">Tous les fichiers</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
            <div class="row">

            <div class="card pt-4">
                <div class="card-body">
               
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Propietaire</th>
                        <th scope="col">Creation</th>
                        <th scope="col">Dernier Modification</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php  $i = 1; foreach($listFile as $l):?>
                            <?php if(FileModel::hasRight($_group,$l['Right'])) : ?>
                            <tr>
                                <th scope="row"><?= $i++;?></th>
                                <td><?= $l['Name'] ?></td>
                                <td><?= User::getById((int) $l['Owner'])[0]['Name'] ?></td>
                                <td><?= $_date->dateToString($l['created'], 2) ?></td>
                                <td><?= $_date->dateToString($l['modified'], 2) ?></td>
                                <td class="h5 text-justify">
                                    <a class="badge bg-secondary link-light p-2" href="/archive/<?= $l['Path'] ?>" title="Téléchargement"><i class="bi bi-download"></i></a>
                                </td>
                            </tr>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

                </div>
            </div>

            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-2 small">
            <p></p>
        </div><!-- End Right side columns -->
    </div>
    </section>
</main>
<?php endif; ?>
<?php require \RalphServer\Constants::local. 'template/footer.php' ?>