<?php
require_once 'vue/header.php';

if      ($alerte == 1)
    echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>L\'email a bien été envoyé !</div>';
else if ($alerte == 2)
    echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Email non valide !</div>';
else if ($alerte == 3)
    echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>L\'email n\'est associé a aucun compte !</div>';
?>

    <div class="p-30"> <!--light-gray-bg pour mettre le fond en gris-->
        <form action="mot_de_passe_oublie" class="form-horizontal" method="post">
            <div class="form-group has-feedback">
                <label for="inputMail" class="col-sm-4 control-label">Saisissez votre adresse mail</label>
                <div class="col-sm-4">
                    <input name="mail" type="text" class="form-control" id="inputMail" placeholder="mail@example.org" required>
                    <i class="fa fa-envelope form-control-feedback"></i>
                    <p></p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-group btn-default btn-alert">Envoyer</button>
                </div>
            </div>
        </form>
    </div>

<?php require_once 'footer.php'; ?>