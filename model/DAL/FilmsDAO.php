<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Offres
 *
 * @author 1703728
 */
class FilmsDAO extends Dao
{

    //Récupérer toutes les offres
    public function getAll($search)
    {
        //On définit la bdd pour la fonction
        $films = array();
        $query = $this->_bdd->prepare("SELECT films.*,acteurs.*,role.* 
                                            FROM role 
                                            JOIN acteurs ON acteurs.idActeur = role.idActeur
                                            JOIN films ON films.idFilm = role.idFilm
                                            WHERE upper(films.titre) LIKE :search");
        $query->bindvalue(":search", "%".strtoupper($search)."%");
        $query->execute();

        $titreEnCours = '';
        while ($data = $query->fetch()) 
        {
            if ($data['titre']!= $titreEnCours) 
            {
            $films[] = new Films ($data['idFilm'],$data['titre'],$data['realisateur'],$data['affiche'],$data['annee']);       
            $titreEnCours = $data['titre'];
            }
            $films[count($films)-1]->addRole(new Role($data['idRole'],$data['personnage'],new Acteurs($data['idActeur'],$data['nom'],$data['prenom'])));
        }
        // echo '<pre>';
        // print_r($films);
        // echo '</pre>';
        return ($films);
    }

    //Ajouter une offre
    public function add($data)
    {

        $valeurs = ['titre' => $data->get_titre(), 'nom' => $data->get_nom(), 'prenom' => $data->get_prenom(), 'personnage' => $data->get_personnage()];
        $requete = 'INSERT INTO films (title, description) VALUES (:title , :description)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            //print_r($insert->errorInfo());
            return false;
        } else {
            return true;
        }

    }

    //Récupérer plus d'info sur 1 offre
    public function getOne($id_offer)
    {

        $query = $this->_bdd->prepare('SELECT * FROM films WHERE films.id = :id_offer');
        $query->execute(array(':id_offer' => $id_offer));
        $data = $query->fetch();
        $offer = new Films ($data);
        return ($offer);
    }

    // Supprimer une offre
    public function deleteOne($idOffer): int
    {
        $query = $this->_bdd->prepare('DELETE FROM films WHERE films.id = :idOffer');
        $query->execute(array(':idOffer' => $idOffer));
        return ($query->rowCount());
    }
}
