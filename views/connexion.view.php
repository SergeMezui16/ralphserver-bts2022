<?php use RalphServer\Constants; ?>
<?php require 'template/head.php'; ?>



<main class="container pt-5">

    <div class="row flex-column pt-5">

        <div class="col col-md-6 col-lg-4 mb-5 m-auto d-flex justify-content-center pt-5">
            <img src="<?= Constants::host ?>src/img/ralph-server-icon-logo-v.png" class="img-fluid w-25" alt="Pasker">
        </div>
        <form class="col col-md-6 col-lg-4 m-auto" method="POST">
            <?php if(isset($error)): ?>
                <div class="mb-3 alert alert-danger">
                    <p><?= $error ?></p>
                </div>
            <?php endif; ?>
            <?php if(isset($success)): ?>
                <div class="mb-3 alert alert-success">
                    <p><?= $success ?></p>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember-me">
                <label class="form-check-label" for="exampleCheck1" >Se souvenir de moi</label>
            </div>
            <button type="submit" class="btn btn-dark w-100" name="connexion">Envoyer</button>
        </form>

    </div>

</main>





<?php require 'template/footer.php'; ?>