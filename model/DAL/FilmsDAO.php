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

        $query = $this->_bdd->prepare("SELECT films.*,acteurs.*,role.* 
                                            FROM role 
                                            JOIN acteurs ON acteurs.idActeur = role.idActeur
                                            JOIN films ON films.idFilm = role.idFilm
                                            WHERE upper(films.titre) LIKE :search");
        $query->bindvalue(":search", "%".strtoupper($search)."%");
        $query->execute();
        $films = array();
        $titreEnCours = '';
        // On instancie chaque film
        while ($film = $query->fetch()) {
            if ($film['titre'] != $titreEnCours) {
                $titreEnCours = $film['titre'];
                $films[] = new Films($film);
            }
            // On ajoute le tableau de roles pour chaque film
            $films[count($films) - 1]->addRole(new Role(null, $film['personnage'], new Acteurs(null, $film['nom'], $film['prenom'])));
        }
        // echo '<pre>';
        // print_r($films);
        // echo '</pre>';
        return ($films);
    }

        //Ajouter un film
        public function add($film)
        {
    
    
            $values = ['titre' => $film->get_titre(), 'realisateur' => $film->get_realisateur(), 'affiche' => $film->get_affiche(), 'annee' => $film->get_année()];
            // On verifie que le film n'existe pas en bdd
            $query = $this->_bdd->prepare('SELECT * FROM films WHERE titre = :titre');
            $query->execute(array(':titre' => ucfirst($values['titre'])));
            $data = $query->fetch();
            
    
    
            if ($data == false) {
    
                $insert = 'INSERT INTO films (titre, realisateur, affiche, annee) VALUES (:titre , :realisateur,  :affiche, :annee)';
                $query = $this->_bdd->prepare($insert);
    
                if (!$query->execute($values)) {
                    return false;
                } else {
                    // recuperer id film pour inserer les roles
                    $query = $this->_bdd->prepare('SELECT idFilm FROM films WHERE films.titre = :titre');
                    
                    $query->execute(array(':titre' => $film->get_titre()));
                    $idFilm = $query->fetch();
                    $idFilm = (int) $idFilm['idFilm'];
    
    
    
                    // On verifie que l'acteur n'existe pas en bdd si il existe on recupere son id
                    $roles = $film->get_roles();
                    foreach ($roles as $role) {
                        
                        $nom = $role->get_acteur()->get_nom();
                        $prenom = $role->get_acteur()->get_prenom();
                        
                        
                        $query = $this->_bdd->prepare('SELECT idActeur FROM acteurs WHERE nom = :nom AND prenom = :prenom');
                        $query->bindParam(':nom', $nom);
                        $query->bindParam(':prenom', $prenom);
                        $query->execute();
                        $idActeur = $query->fetch();
                        if ($idActeur != false) {
                        $idActeur = (int) $idActeur['idActeur'];
                        } else {
                            $insert = 'INSERT INTO acteurs (nom, prenom) VALUES (:nom,:prenom)';
                            $query = $this->_bdd->prepare($insert);
                            $query->execute(array(':nom' => $nom, ':prenom' => $prenom));
                            $query = $this->_bdd->prepare('SELECT idActeur FROM acteurs WHERE nom = :nom AND prenom = :prenom');
                            $query->bindParam(':nom', $nom);
                            $query->bindParam(':prenom', $prenom);
                            $query->execute();
                            $idActeur = $query->fetch();
                            $idActeur = (int) $idActeur['idActeur'];
                        }
    
                        // on ajoute le role
                        $personnage = $role->get_personnage();
        
                        $insert = 'INSERT INTO role (personnage,idActeur,idFilm) VALUES (:personnage, :idActeur, :idFilm) ';
                        $query = $this->_bdd->prepare($insert);
                        $query->bindParam(':personnage', $personnage);
                        $query->bindParam(':idActeur', $idActeur);
                        $query->bindParam(':idFilm', $idFilm);
                        $query->execute();
        
                    }
                    return true;
                }
            } else {
                $erreur ='existe';
                return $erreur;
                
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
