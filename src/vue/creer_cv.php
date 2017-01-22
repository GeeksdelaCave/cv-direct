<?php
    require_once 'vue/header.php';
    echo $reponse;
?>
    <section class="main-container">
        <div class="container">
            <div class="row">
                <!-- titre de la page -->
                <h1 class="page-title">Création d'un nouveau CV</h1>
                <div class="separator-2"></div>
                <div class="main col-md-8 space-bottom">
                    <div class="contact-form">
                        <form action="../creer_cv" method="post" enctype="multipart/form-data">
                            <div class="form-group has-feedback">
                                <label> Nom </label>
                                <input type="text" class="form-control" name="nom" pattern="^[a-zA-Z][a-zA-Z]+$" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Prenom</label>
                                <input type="text" class="form-control" name="prenom" pattern="^[a-zA-Z][a-z]+$" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Pseudonyme</label>
                                <input type="text" class="form-control" name="pseudo" pattern="^[a-zA-Z][a-z]+$" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Adresse</label>
                                <input type="text" class="form-control" name="adresse" pattern="^[a-zA-Z0-9]+ [A-Z]{1}[a-z]+ [a-z]{1}[a-z]{2} [A-Z]{1}[a-z]+$" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Code Postal</label>
                                <input type="text" class="form-control" name="code_postal" pattern="[0-9]{5}" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Ville</label>
                                <input type="text" class="form-control" name="ville" pattern="[A-Z]*" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Numéro de Sécurité Sociale</label>
                                <input type="number" class="form-control" name="num_secu_sociale" size="15" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Téléphone Portable</label>
                                <input type="text" class="form-control" name="num_portable" pattern="[0-9]{10}" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Téléphone Fixe</label>
                                <input type="text" class="form-control" name="num_fixe" pattern="[0-9]{10}"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Photographie (Taille Maximale : 400 Ko, Formats Autorisés : JPG, JPEG, PNG)</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="400000">
                                <input type="file" class="form-control" name="photo"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Contrat Assurance Professionnel (Taille Maximale : 400 Ko, Formats Autorisés : JPG, JPEG, PDF)</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="400000">
                                <input type="file" class="form-control" name="assurance" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >CV PDF (Taille Maximale : 400 Ko, Format Autorisé : PDF)</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="400000">
                                <input type="file" class="form-control" name="cvpdf"/>
                            </div>
                            <input type="submit" name="creer" value="Creer CV" class="submit-button btn btn-default"/>
                            <input type="submit" name="creer" value="Annuler" class="submit-button btn btn-default"/>
                        </form>
                    </div>
                </div>
                <!-- main end -->
            </div>
        </div>
    </section>

<?php
    require_once 'vue/footer.php';
?>