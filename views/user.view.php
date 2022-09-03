<?php 
namespace RalphServer\User;

use RalphServer\Entities\Group;

?>

<?php require 'template/head.php' ?>
<?php require 'template/header.php' ?>
<?php require 'template/side-bar.php' ?>

<!-- Formulaire d'ajout d'utilisateur  -->
<?php if($userAdd): ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Ajouter un utilisateur</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumgroupb-item"><a href="/">Acceuil </a></li>
                <li class="breadcrumb-item active">Utilisateurs</li>
                <li class="breadcrumb-item active">Ajouter un utilisateur</li>
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
                                    <?= $success ?> <a href="/user/admin"> Voir la liste des utilisateurs.</a>
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
                                    <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name']))echo $_POST['name'];?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="<?php if(isset($_POST['email']))echo $_POST['email']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Mot de passe</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Groupe</label>
                                <div class="col-sm-10">
                                    <select name="group" class="form-select">
                                        <?php foreach($listGroup as $g) : ?>
                                            <option value="<?= $g['id']?>" <?php if( (isset($_POST['group']) && $_POST['group'] == $g['id'])) echo 'selected'; ?>><?= $g['Name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex">
                                <label class="col-sm-2 col-form-label "></label>
                                <div class="col-sm-10 text-end">
                                    <button type="submit" class="btn btn-dark" name="add-user">Ajouter</button>
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

<!-- Liste des utilisateurs -->
<?php if($userList): ?>

<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Liste des utilisateurs</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                <li class="breadcrumb-item active">Utilisateurs</li>
                <li class="breadcrumb-item active">Liste des utilisateurs</li>
                </ol>
            </nav>
        </div>

        <a class="btn btn-dark" href="/user/add">
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
                                    <th scope="col">Email</th>
                                    <th scope="col">Groupe</th>
                                    <th scope="col">Création</th>
                                    <th scope="col" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($listUser as $u): ?>
                                <tr>
                                    <td><?= $u['Name'] ?></td>
                                    <td><?= $u['Email'] ?></td>
                                    <td><?= mb_strimwidth(Group::getById((int) $u['Group'])[0]['Name'], 0, 17, '...') ?></td>
                                    <td><?= $_date->dateToString($u['created'], 2)?></td>
                                    <td>
                                        <a href="/user/del/<?= $u['id'] ?>" title="Suprimer" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')" class="badge bg-danger link-light p-2"> <i class="bi bi-x-circle-fill"></i></a>
                                        <a href="/user/mod/<?= $u['id'] ?>" title="Modifier" class="badge bg-secondary link-light p-2"> <i class="bi bi-pencil-square"></i></a>
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

<!-- Modifier un utilisateur -->
<?php if($userMod): ?>

<main id="main" class="main">
        <div class="pagetitle">
            <h1>Modifier un utilisateur</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                <li class="breadcrumb-item active">Utilisateurs</li>
                <li class="breadcrumb-item active">Modifier un utilisateur</li>
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
                        <h3 class="card-title">Informations generales, <?= $user['Name'] ?></h3> 
                        <form method="POST" class="pt-3">
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
                                    
                            <input type="hidden" class="form-control" name="id" value="<?php if(isset($user['id'])) echo $user['id'];?>">
                                
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name']))echo $_POST['name']; else echo $user['Name'];?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="<?php if(isset($_POST['email']))echo $_POST['email']; else echo $user['Email'];?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Groupe</label>
                                <div class="col-sm-10">
                                    <select name="group" class="form-select">
                                        <?php foreach($listGroup as $g) : ?>
                                            <option value="<?= $g['id']?>" <?php if( (isset($_POST['group']) && $_POST['group'] == $g['id']) || $g['id'] == $user['Group']) echo 'selected'; ?>><?= $g['Name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex">
                                <label class="col-sm-2 col-form-label "></label>
                                <div class="col-sm-10 text-end">
                                    <button type="submit" class="btn btn-dark" name="mod-user">Mettre a jour</button>
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

        <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                
                    <div class="card">
                    <div class="card-body">
                                              
                        <!-- General Form Elements -->
                        <form method="POST" class="pt-3">
                        <h5 class="card-title">Changer le mot de passe, <?= $user['Name'] ?></h5> 
                                            
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Nouveau mot de passe</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="newpassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Confirmer le mot de passe</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="renewpassword">
                                </div>
                            </div>

                            <div class="row mb-3 d-flex">
                                <label class="col-sm-2 col-form-label "></label>
                                <div class="col-sm-10 text-end">
                                    <button type="submit" class="btn btn-dark" name="change-pwd">Mettre a jour</button>
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