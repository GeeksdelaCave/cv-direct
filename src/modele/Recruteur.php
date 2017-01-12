<?php

/**
 * Classe d'utilisateurs et fonctions relatives à ces derniers.
 *
 * @author Tristan DIETZ
 *
 * @version 1.0
 */

require_once ('BD.php');
class Recruteur
{
    private $pseudo;
    private $prenom;
    private $nom;
    private $mail;



    public function __construct($pseudo_or_mail, $mdp) //TODO
    {
        //TODO vérifier que le mdp correspond au pseudo ou à l'adresse mail (une requête est suffisance avec WHERE ... OR ...). Si oui, initialiser les données-membres. Sinon, tout vaut null.
        $req = BD::getInstance()->prepare('SELECT pseudo, mdp, nom, prenom FROM UTILISATEUR WHERE email = :mail AND mdp =:mdp');
        $res = $req->execute(array(':mail' => $pseudo_or_mail, ':mdp' => $mdp));
        while ($data = $res->fetch())
            {
                if ($data['mdp'] == $mdp && $data['pseudo'] == $pseudo_or_mail)
                {
                    $this->nom=$data['nom'];
                    $this->prenom=$data['prenom'];
                    $this->pseudo=$data['pseudo'];
                    $this->mail=$data['email'];
                }
            }
    }


    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return ($this->getPseudo() && $this->getPrenom() && $this->getNom() && $this->getMail());
    }



    /**
     * Fonction d'encryptage du mot de passe d'un utilisateur
     * @param string $mdp Mot de passe à encrypter
     * @return string Le mot de passe encrypté
     */
    public static function encryptage_mdp($mdp)
    {
        return md5("on y met notre grain de sel" . $mdp);
    }


    /**
     * //TODO PHPDoc
     */
    public static function inscrire_utilisateur($pseudo, $nom, $prenom, $mail, $mdp) //TODO remplir tous les paramètres du formulaire demandé lors de l'inscription (voir énoncé & BD)
    {
        //TODO tests d'unicité dans la BD (mail, pseudo...) car utilisé uniquement ici (donc fonction non nécessaire)
        //TODO requête d'insertion dans la BD
        // verification a faire
        $req = BD::getInstance()->prepare('INSERT INTO UTILISATEUR(pseudo, prenom, nom, mail,mdp) VALUES (:pseudo, :prenom, :nom, :mail, :mdp)');// a modifier selon la bd hein :)
        $req->execute(array(':pseudo' => $pseudo, ':prenom' => $prenom, ':nom' => $nom, ':mail' => $mail, ':mdp' => $mdp));

    }



    /**
     * Cette fonction va permettre de vérifier que l'adresse mail entré par
     * l'utilisateur est présente dans la base de données.
     *
     * @param String $mail Email a vérifier
     *
     * @return bool Renvoie true si présente et false sinon.
     */
    static function est_presente($mail)
    {
        $requete = BD::getInstance()->prepare('SELECT COUNT(*) FROM UTILISATEUR WHERE EMAIL = :mail');
        $requete->execute(array('mail' => $mail));

        return $requete->fetch() > 0;
    }



    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }


}