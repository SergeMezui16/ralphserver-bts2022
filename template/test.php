<?php require 'template/head.php'; ?>

<div class="container-fluid vh-100">
    <!-- Navigation et Contenu -->
    <div class="row d-flex">

        <!-- Navigation et Utilisateur -->
        <div class="col-md-2 d-flex flex-column justify-content-between border-end vh-100">

            <!-- Navigation -->
            <div class="row d-contentflex flex-column">
                <!-- Logo -->
                <div class="col w-100">
                    <img src="../src/img/ralph-server-icon-logo-h.png" alt="Logo Ralph Server w-50" class="img-fluid">
                </div>

                <!-- Navigation -->
                <div class="col">
                    <ul class="list-group w-100">
                        <a class="list-group-item" href="">
                            <span><i class="fa-solid fa-butter">ico</i> </span>
                            <span class="vr"></span>
                            <span class="ml-5">First item</span>
                        </a>
                        <a class="list-group-item" href="">
                            <span>ico </span>
                            <span class="vr"></span>
                            <span class="ml-5">A second item</span>
                        </a>
                        <a class="list-group-item" href="">
                            <span>ico </span>
                            <span class="vr"></span>
                            <span class="ml-5">A third item</span>
                        </a>
                        <a class="list-group-item" href="">
                            <span>ico </span>
                            <span class="vr"></span>
                            <span class="ml-5">A fourth item</span>
                        </a>
                        <a class="list-group-item" href="">
                            <span>ico </span>
                            <span class="vr"></span>
                            <span class="ml-5">A fifth one</span>
                        </a>
                    </ul>
                </div>
            </div>


            <!-- Utilisateur -->
            <div class="row">
                <ul class="list-group list-group-flush">
                    <a class="list-group-item d-flex justify-content-between" href="">
                        <span class="ml-5">Mon compte</span>
                        <span>ico </span>
                    </a>
                    <a class="list-group-item d-flex justify-content-between" href="">
                        <span class="ml-5">Parametres</span>
                        <span>ico </span>
                    </a>
                </ul>
            </div>
        </div>


        <!-- Contenu -->
        <div class="col-md-10 my-content">
            <!-- header -->
            <header class="row border-bottom p-4 d-flex justify-content-between align-items-center">

                <!-- Nom de la session -->
                <div class="col d-flex justify-content-start">
                    <div class="h1">
                        <span class="h1">Serge Mezui</span>
                        <span class="h6">Administrateur</span>
                    </div>
                </div>

                <!-- Date et heure -->
                <div class="col align-top d-flex justify-content-center">
                    Lun. 16 Nov. 2022 12:33
                </div>

                <!-- Bouton ajouter -->
                <div class="col d-flex justify-content-end h-2 d-block">
                    <div class="btn btn-success">
                        Ajouter un fichier
                    </div>
                </div>


            </header>

            <!-- Navigation 2 -->
            <div class="row mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Mes fichiers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Partagés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Par Groupe</a>
                    </li>
                </ul>
            </div>

            <!-- Contenu -->
            <div class="row">
                <div class="col table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-hover table-light">
                        <thead class="position-sticky top-0">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Auteur</th>
                                <th scope="col">Creation</th>
                                <th scope="col">Modification</th>
                                <th scope="col">Vues</th>overflow-hidden 
                            </tr>
                        </thead>
                        <tfoot class="position-sticky bottom-0 ">
                            <th colspan="6" class="text-center">19 elements</th>
                        </tfoot>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">12</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">14</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">15</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">16</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <th scope="row">17</th>
                                <td>Rapport de stage de Serge</td>
                                <td>Serge Mezui</td>
                                <td>17/02/2022 16:11</td>
                                <td>17/02/2022 16:11</td>
                                <td>11</td>
                            </tr>
    
                        </tbody>
                        
                    </table>
                </div>
            </div>

            <div class="row">
                <!-- Start Footer -->
                <footer class="bg-dark position-fixed bottom-0 end-0 w-auto">
                    <div class="d-inline float-end">
                        <span class="text-muted text-end font-monospace">Powered By </span>
                        <img src="src/img/logo1.png" width="100" class="img-fluid" alt="Pasker Logo">
                    </div>
                </footer>
                <!-- End Footer -->
            </div>
        </div>

    </div>
</div>