<?php

    /**
    * On initialise une session afin de pouvoir récupéré l'identifiant du CV concerné par les modifications.
    */
    session_start();

    include '../modele/connexion_bd.php';
    require '../modele/CV.php';
    use \nsCV\CV;

    /**
     * Phase de validation de la modification du CV avec l'ajout probable d'un nouveau CV PDF où on a accepté d'appliquer les principales modifications.
     * @author Thibaud CENENT
     * @version 1.2
     */

    if($_POST['Maj_CV'] == "Enregistrer Modifications")
    {

        $id_Cv = $_SESSION['id_cv'];
        $num_portable = $_POST['num_portable'];
        $num_fixe = $_POST['num_fixe'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        $cv_Modifie = new CV($id_Cv, null, $num_portable, $num_fixe, $adresse, $code_postal, $ville, $nom, $prenom);
        $cv_Modifie->mettre_a_jour();

        echo 'Modifications sur le CV N°' . $id_Cv . 'effectuées';


    }
?>