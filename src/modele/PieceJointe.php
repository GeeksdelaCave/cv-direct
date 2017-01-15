<?php

/**
 * Création de la classe Piece Jointe désignant une pièce jointe qui sera relative aux CV créés
 * @author Thibaud CENENT
 * @version 1.2
 */

class PieceJointe
{
    /** Désigne l'identifiant d'une pièce jointe
     * @see PieceJointe::get_id_piece_jointe()
     * @var $id_piece_jointe
     */
    private $id_piece_jointe;

    /** Désigne l'identifiant d'un CV associé aux pièces jointes uploads sur le serveur
     * @see PieceJointe::get_id_cv()
     * @var $id_cv
     */
    private $id_cv;

    /** Désigne le type de pièce jointe upload à savoir : un CV PDF, une photo du CV ou à un contrat d assurance
     * @see PieceJointe::get_type()
     * @var $type
     */
    private $type;

    /** Désigne l'extension d'une pièce jointe
     * @see PieceJointe::get_extension()
     * @var $extension
     */
    private $extension;

    /** Désigne une string généré aléatoirement et qui remplacera le nom original de la pièce jointe lors de l'upload sur le serveur ( peut servir d'identifiant unique)
     * @see PieceJointe::get_token()
     * @see PieceJointe::get_generer_token_aleatoire()
     * @var $token
     */
    private $token;

    /** Constructeur de la classe Piece Jointe
     * @param $id_piece_jointe
     * @param $id_cv
     * @param $type
     * @param $extension
     * @param $token
     */
    public function __construct($id_piece_jointe, $id_cv, $type, $extension, $token)
    {
        $this->id_piece_jointe = $id_piece_jointe;
        $this->id_cv = $id_cv;
        $this->type = $type;
        $this->extension = $extension;
        $this->token = $token;
    }

    /** Retourne l'identifiant d'un pièce jointe
     * @return $this->id_piece_jointe
     */
    public function get_id_piece_jointe()
    {
        return $this->id_piece_jointe;
    }

    /** Retourne le type de la pièce jointe
     * @return $this->type
     */
    public function get_type()
    {
        return $this->type;
    }

    /** Retourne l'extension de la piece jointe
     * @return $this->extension
     */
    public function get_extension()
    {
        return $this->extension;
    }

    /** Retourne l'identifiant d'un CV associé aux pièces jointes
     * @return $this->id_cv
     */
    public function get_id_cv()
    {
        return $this->id_cv;
    }

    /** Retourne le token sous la forme d'un string généré aléatoirement
     * @return $this->token
     */
    public function get_token()
    {
        return $this->token;
    }

    /** Crée la pièce jointe et l'ajoute à la BD grâce à INSERT
     * @param $id_cv
     * @param $type
     * @param $extension
     * @param $token
     */
    public static function inserer($id_cv, $type, $extension, $token)
    {
        $req = BD::getInstance()->prepare('INSERT INTO PIECE_JOINTE (ID_CV, TYPE_PIECE_JOINTE, EXTENSION, TOKEN) VALUES(:id_cv, :type_Piece_Jointe, 
        :extension, :token)');
        $req->execute(array('id_cv' => $id_cv, 'type_Piece_Jointe' => $type, 'extension' => $extension, 'token' => $token));

    }

    /** Retourne la pièce jointe associé à l'identifiant nécessaire dans le cas de la suppression d'une pièce jointe
     * @param $id_piece_jointe
     * @return \PieceJointe
     */
    public static function afficher($id_piece_jointe)
    {
        $req = BD::getInstance()->prepare('SELECT * FROM PIECE_JOINTE WHERE ID_PIECE_JOINTE = :id_piece_jointe');
        $req->execute(array('id_piece_jointe' => $id_piece_jointe));
        $donnees = $req->fetch();
        return new PieceJointe($id_piece_jointe, $donnees['ID_CV'], $donnees['TYPE_PIECE_JOINTE'], $donnees['EXTENSION'], $donnees['TOKEN']);
    }

    public static function supprimer($id_piece_jointe)
    {
        $req = BD::getInstance()->prepare('DELETE FROM PIECE_JOINTE WHERE ID_PIECE_JOINTE = :id_piece_jointe');
        $req->execute(array('id_piece_jointe' => $id_piece_jointe));
    }
    function __toString()
    {
        return $this->get_generer_token_aleatoire();
    }

    /** Retourne le token généré aléatoirement
     * @return string
     */
    public static function get_generer_token_aleatoire()
    {
        $chaine = "abcdefghijklmnpqrstuvwxy";
        $token_genere = "";
        srand((double)microtime()*1000000);
        for($i=0; $i< 20 ; $i++)
            $token_genere .= $chaine[rand()%strlen($chaine)];
        $req = BD::getInstance()->prepare('SELECT COUNT(*) AS token_existe FROM PIECE_JOINTE WHERE TOKEN = :token');
        $req->execute(array('token' => $token_genere));
        $donnees = $req->fetch();
        if($donnees['token_existe'] == 0)
            $token_return = $token_genere;
        else
            do
            {
                for($i=0; $i< 20 ; $i++)
                    $token_genere .= $chaine[rand()%strlen($chaine)];
                $req->execute(array('token' => $token_genere));
                $donnees = $req->fetch();
                $token_return = $token_genere;

            } while($donnees['token_existe'] != 0);
        return $token_return;
    }

}