<?php namespace RalphServer\Group; ?>

<?php require 'template/head.php' ?>
<?php require 'template/header.php' ?>
<?php require 'template/side-bar.php' ?>

<!-- Formulaire d'ajout de groupe -->
<?php if($groupAdd): ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Ajouter un groupe</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                <li class="breadcrumb-item active">Groupes</li>
                <li class="breadcrumb-item active">Ajouter un groupe</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                
                    <div class="card">
                    <div class="card-body">

                        <!-- General Form Elements -->
                        <form method="POST" class="pt-5">

                            <div class="row mb-3">
                                <?php if(isset($success)) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $success ?> <a href="/group/admin"> Voir la liste des groupes.</a>
                                </div>
                                <?php endif ?>

                                <?php if(isset($error)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $error ?>
                                </div>
                                <?php endif ?>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Niveau</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" max="7" class="form-control" name="level" value="<?php if(isset($_POST['level'])) echo $_POST['level'];?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" name="about"><?php if(isset($_POST['about'])) echo $_POST['about'];?></textarea>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex">
                                <label class="col-sm-10 col-form-label "></label>
                                <div class="col-sm-2 text-end">
                                    <button type="submit" class="btn btn-dark" name="add-group">Ajouter</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

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
<?php endif ?>

<!-- Liste des groupes -->
<?php if($groupList): ?>

<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Liste des groupes</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                <li class="breadcrumb-item active">Groupes</li>
                <li class="breadcrumb-item active">Liste des groupes</li>
                </ol>
            </nav>
        </div>

        <a class="btn btn-dark" href="/group/add">
            <i class="bi bi-plus-lg"></i> Ajouter
        </a>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-10">
                <div class="row">
                
                    <div class="card pt-4">
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table datatable table-hover" style="cursor: pointer;">
                            <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Creation</th>
                                <th scope="col">Description</th>
                                <th scope="col" >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($listGroup as $g): ?>
                            <tr>
                                <td><?= $g['Name'] ?></td>
                                <td><?= $g['Level'] ?></td>
                                <td><?= $_date->dateToString($g['created'], 2)?></td>
                                <td><?= mb_strimwidth($g['About'], 0, 17, '...') ?></td>
                                <td>
                                    <a href="/group/del/<?= $g['id'] ?>" title="Suprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce groupe ?')" class="badge bg-danger link-light p-2"> <i class="bi bi-x-circle-fill"></i></a>
                                    <a href="/group/mod/<?= $g['id'] ?>" title="Modifier" class="badge bg-secondary link-light p-2"> <i class="bi bi-pencil-square"></i></a>
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

<?php endif ?>

<!-- Modifier un groupe -->
<?php if($groupMod): ?>

<main id="main" class="main">
        <div class="pagetitle">
            <h1>Modifier un groupe</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                <li class="breadcrumb-item active">Groupes</li>
                <li class="breadcrumb-item active">Modifier un groupe</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                
                    <div class="card">
                    <div class="card-body">

                        <!-- General Form Elements -->
                        <form method="POST" class="pt-5">

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
                                    
                            <input type="hidden" class="form-control" name="id" value="<?php if(isset($group['id'])) echo $group['id'];?>">
                                
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="<?php if(isset($group['Name'])) echo $group['Name'];?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Niveau</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" max="7" class="form-control" name="level" value="<?php if(isset($group['Level'])) echo $group['Level'];?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" name="about"><?php if(isset($group['About'])) echo $group['About'];?></textarea>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex">
                                <label class="col-sm-2 col-form-label "></label>
                                <div class="col-sm-10 text-end">
                                    <button type="submit" class="btn btn-dark" name="mod-group">Mettre a jour</button>
                                </div>
                                </div>

                        </form><!-- End General Form Elements -->

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

<?php endif ?>

<?php require 'template/footer.php' ?>