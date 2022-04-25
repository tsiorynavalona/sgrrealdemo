<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Annonce_Model
 *
 * @author mrandria
 */
class Annonce_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('Client_Model');
        $this->load->model('Agent_Model');
        $this->load->model('Tag_Model');
        $this->load->model('Devise_Model');
        $this->load->model('Sousregion_Model');
        $this->load->model('Icone_Model');
        $this->load->model('Image_Model');
        $this->load->model('Caracteristiques_Model');
        $this->load->model('Mesure_Model');
        $this->load->library('Annonce');
        $this->load->library('Icone');
        $this->load->library('Image');
        $this->load->library('Caracteristiques');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT * FROM `annonce` LEFT JOIN annonce_trad on annonce_trad.id_ann=annonce.id_ann LEFT JOIN langue on annonce_trad.id_langue=langue.id_langue where langue='" . $langue . "' and etat=1");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);
                if ($rec->id_agent != '') {
                    $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                }
                if ($rec->id_tag != '') {
                    $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                }
                $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                $temp->setTitre_annonce($rec->titre_annonce);
                $temp->setDescription_annonce($rec->description_annonce);
                $temp->setReference($rec->reference);
                $temp->setPrix($rec->prix);
                $temp->setAdresse_propriete($rec->adresse_propriete);
                $temp->setImages($this->getImages($temp));
                $temp->setIcones($this->getIcones($temp));
                $temp->setClients($this->getClients($temp));
                $temp->setImagePrincipal($rec->image);
                $temp->setVideo_url($rec->video_url);
                $temp->setExclusivite($rec->exclusivite);
                $temp->setDate_contrat($rec->date_contrat);
                $temp->setDate_mandat($rec->date_mandat);
                $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                $temp->setIs_featuredproperty($rec->is_featuredproperty);
                $temp->setGoogle_map($rec->google_map);
                $temp->setPar_mois($rec->par_mois);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getAllPerPage($langue, $nb = '', $page = '') {
        if (!empty($page)) {
            $skip = ($page * $nb) - $nb;
            //$this->db->limit($nb, $skip);
            $query = $this->db->query("SELECT
                                        * FROM `annonce`
                                        LEFT JOIN annonce_trad
                                        on annonce_trad.id_ann=annonce.id_ann
                                        LEFT JOIN langue
                                        on annonce_trad.id_langue=langue.id_langue
                                        where langue='" . $langue . "' and etat=1 limit " . $skip . "," . $nb);
        } else {
            $query = $this->db->query("SELECT
                                        * FROM `annonce`
                                        LEFT JOIN annonce_trad
                                        on annonce_trad.id_ann=annonce.id_ann
                                        LEFT JOIN langue
                                        on annonce_trad.id_langue=langue.id_langue
                                        where langue='" . $langue . "' and etat=1");
        }
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);
                if ($rec->id_agent != '') {
                    $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                }
                if ($rec->id_tag != '') {
                    $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                }
                $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                $temp->setTitre_annonce($rec->titre_annonce);
                $temp->setDescription_annonce($rec->description_annonce);
                $temp->setReference($rec->reference);
                $temp->setPrix($rec->prix);
                $temp->setAdresse_propriete($rec->adresse_propriete);
                $temp->setImages($this->getImages($temp));
                $temp->setIcones($this->getIcones($temp));
                $temp->setClients($this->getClients($temp));
                $temp->setImagePrincipal($rec->image);
                $temp->setVideo_url($rec->video_url);
                $temp->setExclusivite($rec->exclusivite);
                $temp->setDate_contrat($rec->date_contrat);
                $temp->setDate_mandat($rec->date_mandat);
                $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                $temp->setIs_featuredproperty($rec->is_featuredproperty);
                $temp->setGoogle_map($rec->google_map);
                $temp->setPar_mois($rec->par_mois);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getTrash($langue) {
        $query = $this->db->query("SELECT * FROM `annonce` LEFT JOIN annonce_trad on annonce_trad.id_ann=annonce.id_ann LEFT JOIN langue on annonce_trad.id_langue=langue.id_langue where langue='" . $langue . "' and etat=0");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);
                if ($rec->id_agent != '') {
                    $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                }
                if ($rec->id_tag != '') {
                    $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                }
                $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                $temp->setTitre_annonce($rec->titre_annonce);
                $temp->setDescription_annonce($rec->description_annonce);
                $temp->setReference($rec->reference);
                $temp->setPrix($rec->prix);
                $temp->setAdresse_propriete($rec->adresse_propriete);
                $temp->setImages($this->getImages($temp));
                $temp->setIcones($this->getIcones($temp));
                $temp->setClients($this->getClients($temp));
                $temp->setImagePrincipal($rec->image);
                $temp->setVideo_url($rec->video_url);
                $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                $temp->setGoogle_map($rec->google_map);
                $temp->setPar_mois($rec->par_mois);
                ;
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getTrashPerPage($langue, $nb = '', $page = '') {
        if (!empty($page)) {
            $skip = ($page * $nb) - $nb;
            //$this->db->limit($nb, $skip);
            $query = $this->db->query("SELECT
                                        * FROM `annonce`
                                        LEFT JOIN annonce_trad
                                        on annonce_trad.id_ann=annonce.id_ann
                                        LEFT JOIN langue
                                        on annonce_trad.id_langue=langue.id_langue
                                        where langue='" . $langue . "' and etat=0 limit " . $skip . "," . $nb);
        } else {
            $query = $this->db->query("SELECT
                                        * FROM `annonce`
                                        LEFT JOIN annonce_trad
                                        on annonce_trad.id_ann=annonce.id_ann
                                        LEFT JOIN langue
                                        on annonce_trad.id_langue=langue.id_langue
                                        where langue='" . $langue . "' and etat=0");
        }
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);
                if ($rec->id_agent != '') {
                    $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                }
                if ($rec->id_tag != '') {
                    $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                }
                $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                $temp->setTitre_annonce($rec->titre_annonce);
                $temp->setDescription_annonce($rec->description_annonce);
                $temp->setReference($rec->reference);
                $temp->setPrix($rec->prix);
                $temp->setAdresse_propriete($rec->adresse_propriete);
                $temp->setImages($this->getImages($temp));
                $temp->setIcones($this->getIcones($temp));
                $temp->setClients($this->getClients($temp));
                $temp->setImagePrincipal($rec->image);
                $temp->setVideo_url($rec->video_url);
                $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                $temp->setGoogle_map($rec->google_map);
                $temp->setPar_mois($rec->par_mois);
                ;
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `annonce` LEFT JOIN annonce_trad on annonce_trad.id_ann=annonce.id_ann LEFT JOIN langue on annonce_trad.id_langue=langue.id_langue where langue='" . $langue . "' and etat=1 and annonce.id_ann=" . $id);
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            $rec = $rset[0];
            $temp = new Annonce();
            $temp->setId_ann($rec->id_ann);
            if ($rec->id_agent != '') {
                $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
            }

            if ($rec->id_tag != '') {
                $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
            }
            $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
            $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
            $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
            $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
            $temp->setTitre_annonce($rec->titre_annonce);
            $temp->setDescription_annonce($rec->description_annonce);
            $temp->setReference($rec->reference);
            $temp->setPrix($rec->prix);
            $temp->setAdresse_propriete($rec->adresse_propriete);
            $temp->setImages($this->getImages($temp));
            $temp->setIcones($this->getIcones($temp));
            $temp->setClients($this->getClients($temp));
            $temp->setImagePrincipal($rec->image);
            $temp->setVideo_url($rec->video_url);
            $temp->setExclusivite($rec->exclusivite);
            $temp->setDate_contrat($rec->date_contrat);
            $temp->setDate_mandat($rec->date_mandat);
            $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
            $temp->setGoogle_map($rec->google_map);
            $temp->setIs_featuredproperty($rec->is_featuredproperty);
            $temp->setPar_mois($rec->par_mois);
            $rep = $temp;
        }
        return $rep;
    }

    function getByRef($ref, $langue, $etat) {
        $query = $this->db->query("SELECT * FROM `annonce` LEFT JOIN annonce_trad on annonce_trad.id_ann=annonce.id_ann LEFT JOIN langue on annonce_trad.id_langue=langue.id_langue where langue='" . $langue . "' and etat=" . $etat . " and annonce.reference like '" . $ref . "'");

        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            $rec = $rset[0];
            $temp = new Annonce();
            $temp->setId_ann($rec->id_ann);
            if ($rec->id_agent != '') {
                $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
            }
            if ($rec->id_tag != '') {
                $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
            }
            $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
            $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
            $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
            $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
            $temp->setTitre_annonce($rec->titre_annonce);
            $temp->setDescription_annonce($rec->description_annonce);
            $temp->setReference($rec->reference);
            $temp->setPrix($rec->prix);
            $temp->setAdresse_propriete($rec->adresse_propriete);
            $temp->setImages($this->getImages($temp));
            $temp->setIcones($this->getIcones($temp));
            $temp->setClients($this->getClients($temp));
            $temp->setImagePrincipal($rec->image);
            $temp->setVideo_url($rec->video_url);
            $temp->setExclusivite($rec->exclusivite);
            $temp->setDate_contrat($rec->date_contrat);
            $temp->setDate_mandat($rec->date_mandat);
            $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
            $temp->setGoogle_map($rec->google_map);
            $temp->setIs_featuredproperty($rec->is_featuredproperty);
            $temp->setPar_mois($rec->par_mois);
            $rep[] = $temp;
        }

        return $rep;
    }

    function getByAgent($id_agent) {
        $query = $this->db->query("SELECT * FROM `annonce` where id_agent=" . $id_agent);
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);

                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getBySousregion($id_sousregion) {
        $query = $this->db->query("SELECT * FROM `annonce` where id_sousregion=" . $id_sousregion);
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);

                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getByTag($id_tag) {
        $query = $this->db->query("SELECT * FROM `annonce` where id_tag=" . $id_tag);
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);

                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getByStatut($id_statut) {
        $query = $this->db->query("SELECT * FROM `annonce` where id_statut=" . $id_statut);
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);

                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getNews($langue) {
        $query = $this->db->query("SELECT * FROM `annonce` LEFT JOIN annonce_trad on annonce_trad.id_ann=annonce.id_ann LEFT JOIN langue on annonce_trad.id_langue=langue.id_langue where langue='" . $langue . "' and etat=1 order by date_annonce desc");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);
                if ($rec->id_agent != '') {
                    $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                }
                if ($rec->id_tag != '') {
                    $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                }
                $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                $temp->setTitre_annonce($rec->titre_annonce);
                $temp->setDescription_annonce($rec->description_annonce);
                $temp->setReference($rec->reference);
                $temp->setPrix($rec->prix);
                $temp->setAdresse_propriete($rec->adresse_propriete);
                $temp->setImages($this->getImages($temp));
                $temp->setIcones($this->getIcones($temp));
                $temp->setClients($this->getClients($temp));
                $temp->setImagePrincipal($rec->image);
                $temp->setVideo_url($rec->video_url);
                $temp->setExclusivite($rec->exclusivite);
                $temp->setDate_contrat($rec->date_contrat);
                $temp->setDate_mandat($rec->date_mandat);
                $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                $temp->setGoogle_map($rec->google_map);
                $temp->setIs_featuredproperty($rec->is_featuredproperty);
                $temp->setPar_mois($rec->par_mois);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getFeaturedProp($langue, $nb = '', $page = '') {
        if (!empty($page)) {
            $skip = ($page * $nb) - $nb;
            $query = $this->db->query("SELECT * FROM `annonce` LEFT JOIN annonce_trad on annonce_trad.id_ann=annonce.id_ann LEFT JOIN langue on annonce_trad.id_langue=langue.id_langue where langue='" . $langue . "' and etat=1 and is_featuredproperty=1 LIMIT " . $skip . "," . $nb);
        } else {
            $query = $this->db->query("SELECT * FROM `annonce` LEFT JOIN annonce_trad on annonce_trad.id_ann=annonce.id_ann LEFT JOIN langue on annonce_trad.id_langue=langue.id_langue where langue='" . $langue . "' and etat=1 and is_featuredproperty=1");
        }
        $rset = $query->result();

        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);
                if ($rec->id_agent != '') {
                    $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                }
                if ($rec->id_tag != '') {
                    $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                }
                $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                $temp->setTitre_annonce($rec->titre_annonce);
                $temp->setDescription_annonce($rec->description_annonce);
                $temp->setReference($rec->reference);
                $temp->setPrix($rec->prix);
                $temp->setAdresse_propriete($rec->adresse_propriete);
                $temp->setImagePrincipal($rec->image);
                $temp->setImages($this->getImages($temp));
                $temp->setIcones($this->getIcones($temp));
                $temp->setClients($this->getClients($temp));
                $temp->setVideo_url($rec->video_url);
                $temp->setExclusivite($rec->exclusivite);
                $temp->setDate_contrat($rec->date_contrat);
                $temp->setDate_mandat($rec->date_mandat);
                $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                $temp->setGoogle_map($rec->google_map);
                $temp->setPar_mois($rec->par_mois);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function save($annonce) {
        $object = array('id_ann' => $annonce->getId_ann(), 'id_agent' => NULL, 'id_tag' => NULL, 'id_devise' => $annonce->getDevise()->getId_devise(), 'id_type' => $annonce->getType()->getId_type(), 'id_statut' => $annonce->getStatut()->getId_statut(), 'reference' => $annonce->getReference(), 'prix' => $annonce->getPrix(), 'adresse_propriete' => $annonce->getAdresse_propriete(), 'video_url' => $annonce->getVideo_url(), 'google_map' => $annonce->getGoogle_map(), 'id_sousregion' => $annonce->getSousregion()->getId_sousregion(), 'etat' => true, 'image' => $annonce->getImagePrincipal(), 'is_featuredproperty' => $annonce->getIs_featuredproperty(), 'par_mois' => $annonce->getPar_mois(), 'exclusivite' => $annonce->getExclusivite(), 'date_contrat' => $annonce->getDate_contrat(), 'date_mandat' => $annonce->getDate_mandat());
        if ($annonce->getTag() != null) {
            $object['id_tag'] = $annonce->getTag()->getId_tag();
        }
        if ($annonce->getAgent() != null) {
            $object['id_agent'] = $annonce->getAgent()->getId_agent();
        }

        $id = $this->create('annonce', $object, TRUE);
//        echo $this->db->last_query();
//        exit;
        if ($id != false) {
            $annonce->setId_ann($id);
            $annonce->setEtat(true);
            $object_trad = array('id_ann' => $id, 'id_langue' => 1, 'titre_annonce' => $annonce->getTitre_annonce(), 'description_annonce' => $annonce->getDescription_annonce());
            $this->create('annonce_trad', $object_trad, false);
            $object_trad_en = array('id_ann' => $id, 'id_langue' => 2, 'titre_annonce' => $annonce->getTitre_annonce_en(), 'description_annonce' => $annonce->getDescription_annonce_en());
            $this->create('annonce_trad', $object_trad_en, false);
            if ($annonce->getId_ann() != '') {
                $this->saveCaracteristiques($annonce);
                $this->saveIcones($annonce);
                $this->saveImages($annonce);
                $this->saveClients($annonce);
            }
        }
    }

    function modify($annonce) {
        $id = $annonce->getId_ann();
        $where = array('id_ann' => $id);
        $object = array('id_agent' => NULL, 'id_tag' => NULL, 'id_devise' => $annonce->getDevise()->getId_devise(), 'id_type' => $annonce->getType()->getId_type(), 'id_statut' => $annonce->getStatut()->getId_statut(), 'reference' => $annonce->getReference(), 'prix' => $annonce->getPrix(), 'adresse_propriete' => $annonce->getAdresse_propriete(), 'video_url' => $annonce->getVideo_url(), 'google_map' => $annonce->getGoogle_map(), 'id_sousregion' => $annonce->getSousregion()->getId_sousregion(), 'etat' => true, 'image' => $annonce->getImagePrincipal(), 'is_featuredproperty' => $annonce->getIs_featuredproperty(), 'par_mois' => $annonce->getPar_mois(), 'exclusivite' => $annonce->getExclusivite(), 'date_contrat' => $annonce->getDate_contrat(), 'date_mandat' => $annonce->getDate_mandat());

        if ($annonce->getTag() != null) {
            $object['id_tag'] = $annonce->getTag()->getId_tag();
        }
        if ($annonce->getAgent() != null) {
            $object['id_agent'] = $annonce->getAgent()->getId_agent();
        }
        $this->update('annonce', $object, $where);

        $where = array('id_ann' => $id, 'id_langue' => 1);
        $object_trad = array('titre_annonce' => $annonce->getTitre_annonce(), 'description_annonce' => $annonce->getDescription_annonce());
        $this->update('annonce_trad', $object_trad, $where);

        $where = array('id_ann' => $id, 'id_langue' => 2);
        $object_trad_en = array('titre_annonce' => $annonce->getTitre_annonce_en(), 'description_annonce' => $annonce->getDescription_annonce_en());
        $this->update('annonce_trad', $object_trad_en, $where);
        if ($annonce->getId_ann() != '') {
            $this->saveCaracteristiques($annonce);
            $this->saveIcones($annonce);
            $this->saveImages($annonce);
            $this->saveClients($annonce);
        }
    }

    function remove($annonce) {
        $where = array('id_ann' => $annonce->getId_ann());
        $object = array('etat' => false);
        return $this->update(
                        'annonce', $object, $where);
    }

    function removeTrash($annonce) {
        $where = array('id_ann' => $annonce->getId_ann());
        $this->delete('image_annonce', $where);
        $this->delete('icone_annonce', $where);
        $this->delete('annonce_trad', $where);
        $this->delete('valeur_caracteristique', $where);
        $this->
                delete('annonce', $where);
    }

    function searchMenu($idtype, $idstatut, $langue, $nb = '', $page = '') {
        if (!empty($page)) {
            $skip = ($page * $nb) - $nb;
            $this->db->limit($nb, $skip);
        }
        $this->db->select("*");
        $this->db->from('annonce');
        $this->db->join("annonce_trad", "annonce.id_ann=annonce_trad.id_ann");
        $this->db->join("langue", "langue.id_langue=annonce_trad.id_langue");
        $this->db->like('langue', $langue);
        $this->db->like('id_type', $idtype);
        $this->db->like('id_statut', $idstatut);
        $this->db->like('etat', true);
        $sql = $this->db->get_compiled_select();

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $rset = $query->result();
        }
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);
                if ($rec->id_agent != '') {
                    $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                }
                if ($rec->id_tag != '') {
                    $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                }
                $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                $temp->setTitre_annonce($rec->titre_annonce);
                $temp->setDescription_annonce($rec->description_annonce);
                $temp->setReference($rec->reference);
                $temp->setPrix($rec->prix);
                $temp->setAdresse_propriete($rec->adresse_propriete);
                $temp->setImagePrincipal($rec->image);
                $temp->setImages($this->getImages($temp));
                $temp->setIcones($this->getIcones($temp));
                $temp->setClients($this->getClients($temp));
                $temp->setVideo_url($rec->video_url);
                $temp->setExclusivite($rec->exclusivite);
                $temp->setDate_contrat($rec->date_contrat);
                $temp->setDate_mandat($rec->date_mandat);
                $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                $temp->setGoogle_map($rec->google_map);
                $temp->setPar_mois($rec->par_mois);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function searchByRegion($idregion, $langue, $nb = '', $page = '') {
        if (!empty($page)) {
            $skip = ($page * $nb) - $nb;
            $this->db->limit($nb, $skip);
        }
        $this->db->select("*");
        $this->db->from('annonce');
        $this->db->join("annonce_trad", "annonce.id_ann=annonce_trad.id_ann");
        $this->db->join("langue", "langue.id_langue=annonce_trad.id_langue");
        $this->db->join("sous_region", "sous_region.id_sousregion=annonce.id_sousregion");
        $this->db->like('langue', $langue);
        $this->db->like('id_region', $idregion);
        $this->db->like('etat', true);
        $sql = $this->db->get_compiled_select();

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $rset = $query->result();
        }
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);
                if ($rec->id_agent != '') {
                    $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                }
                if ($rec->id_tag != '') {
                    $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                }
                $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                $temp->setTitre_annonce($rec->titre_annonce);
                $temp->setDescription_annonce($rec->description_annonce);
                $temp->setReference($rec->reference);
                $temp->setPrix($rec->prix);
                $temp->setAdresse_propriete($rec->adresse_propriete);
                $temp->setImagePrincipal($rec->image);
                $temp->setImages($this->getImages($temp));
                $temp->setIcones($this->getIcones($temp));
                $temp->setClients($this->getClients($temp));
                $temp->setVideo_url($rec->video_url);
                $temp->setExclusivite($rec->exclusivite);
                $temp->setDate_contrat($rec->date_contrat);
                $temp->setDate_mandat($rec->date_mandat);
                $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                $temp->setGoogle_map($rec->google_map);
                $temp->setPar_mois($rec->par_mois);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function quickSearch($crit, $langue, $nb = '', $page = '') {
        if (!empty($page)) {
            $skip = ($page * $nb) - $nb;
            $this->db->limit($nb, $skip);
        }
        $this->db->select("*");
        $this->db->from('annonce');
        $this->db->join("annonce_trad", "annonce.id_ann=annonce_trad.id_ann");
        $this->db->join("sous_region", "annonce.id_sousregion=sous_region.id_sousregion");
        $this->db->join("langue", "langue.id_langue=annonce_trad.id_langue");
        $this->db->like('langue', $langue);
        $this->db->like('etat', true);
        if (isset($crit["id_type"]))
            $this->db->like('id_type', $crit["id_type"]);
        if (isset($crit["id_statut"]))
            $this->db->like('id_statut', $crit["id_statut"]);
        $this->db->like('reference', $crit["ref"]);
        if (isset($crit["id_sousregion"]))
            $this->db->like('annonce.id_sousregion', $crit["id_sousregion"]);

        $sql = $this->db->get_compiled_select();

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $rset = $query->result();
        }
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);
                if ($rec->id_agent != '') {
                    $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                }
                if ($rec->id_tag != '') {
                    $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                }
                $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                $temp->setTitre_annonce($rec->titre_annonce);
                $temp->setDescription_annonce($rec->description_annonce);
                $temp->setReference($rec->reference);
                $temp->setPrix($rec->prix);
                $temp->setAdresse_propriete($rec->adresse_propriete);
                $temp->setImagePrincipal($rec->image);
                $temp->setImages($this->getImages($temp));
                $temp->setIcones($this->getIcones($temp));
                $temp->setClients($this->getClients($temp));
                $temp->setVideo_url($rec->video_url);
                $temp->setExclusivite($rec->exclusivite);
                $temp->setDate_contrat($rec->date_contrat);
                $temp->setDate_mandat($rec->date_mandat);
                $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                $temp->setGoogle_map($rec->google_map);
                $temp->setPar_mois($rec->par_mois);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function searchByKeywords($keyword, $langue, $nb = '', $page = '') {
        if (!empty($page)) {
            $skip = ($page * $nb) - $nb;
            $this->db->limit($nb, $skip);
        }
        $keywords = explode(" ", $keyword);
        $this->db->select("*");
        $this->db->from('annonce');
        $this->db->join("annonce_trad", "annonce.id_ann=annonce_trad.id_ann");
        $this->db->join("langue", "langue.id_langue=annonce_trad.id_langue");
        $this->db->like('langue', $langue);
        $this->db->like('etat', true);
        if (!empty($keywords)) {
            $this->db->like('titre_annonce', $keywords[0]);
            foreach ($keywords as $word) {
                $this->db->or_like('titre_annonce', $word);
                $this->db->or_like('description_annonce', $word);
            }
        }
        $this->db->group_by("annonce.id_ann");
        $sql = $this->db->get_compiled_select();

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $rset = $query->result();
        }
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);
                if ($rec->id_agent != '') {
                    $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                }
                if ($rec->id_tag != '') {
                    $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                }
                $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                $temp->setTitre_annonce($rec->titre_annonce);
                $temp->setDescription_annonce($rec->description_annonce);
                $temp->setReference($rec->reference);
                $temp->setPrix($rec->prix);
                $temp->setAdresse_propriete($rec->adresse_propriete);
                $temp->setImagePrincipal($rec->image);
                $temp->setImages($this->getImages($temp));
                $temp->setIcones($this->getIcones($temp));
                $temp->setClients($this->getClients($temp));
                $temp->setVideo_url($rec->video_url);
                $temp->setExclusivite($rec->exclusivite);
                $temp->setDate_contrat($rec->date_contrat);
                $temp->setDate_mandat($rec->date_mandat);
                $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                $temp->setGoogle_map($rec->google_map);
                $temp->setPar_mois($rec->par_mois);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function searchByCrit($criteres, $langue, $nb = '', $page = '') {
        if (!empty($page)) {
            $skip = ($page * $nb) - $nb;
            $this->db->limit($nb, $skip);
        }
        $this->db->select("*");
        $this->db->from('annonce');
        $this->db->join("sous_region", "annonce.id_sousregion=sous_region.id_sousregion");
        $this->db->join("annonce_trad", "annonce.id_ann=annonce_trad.id_ann");
        $this->db->join("langue", "langue.id_langue=annonce_trad.id_langue");
        $like = array("id_type" => $criteres["id_type"], "id_statut" => $criteres["id_statut"], "sous_region.id_sousregion" => $criteres["id_sousregion"], "annonce.reference" => $criteres["reference"], "langue" => $langue);
        $this->db->like($like);
        $this->db->like('etat', true);
        $sql = $this->db->get_compiled_select();
        $query = $this->db->query($sql);
        if ($query && $query->num_rows() > 0) {
            $rset = $query->result();
        }
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Annonce();
                $temp->setId_ann($rec->id_ann);

                $ok_chambre = true;
                $ok_surface = true;
                if ($criteres["chambre"] != '') {
                    $ok_chambre = false;
                }
                if ($criteres["surface_min"] != '' && $criteres["surface_max"] != '') {
                    $ok_surface = false;
                }

                $icones = $this->getIcones($temp);
                foreach ($icones as $ico) {
                    if ($ico->getNom_icone() == "Chambre" && $ico->getVal_icone() == $criteres["chambre"]) {
                        $ok_chambre = true;
                    }
                    if ($ico->getNom_icone() == "Surface" && floatval($ico->getVal_icone()) >= floatval($criteres["surface_min"]) && floatval($ico->getVal()) <= floatval($criteres["surface_max"])) {
                        $ok_surface = true;
                    }
                }
                if ($ok_chambre && $ok_surface) {
                    if ($rec->id_agent != '') {
                        $temp->setAgent($this->Agent_Model->getById($rec->id_agent));
                    }
                    if ($rec->id_tag != '') {
                        $temp->setTag($this->Tag_Model->getById($rec->id_tag, $langue));
                    }
                    $temp->setDevise($this->Devise_Model->getById($rec->id_devise, $langue));
                    $temp->setType($this->Type_Model->getById($rec->id_type, $langue));
                    $temp->setStatut($this->Statut_Model->getById($rec->id_statut, $langue));
                    $temp->setSousregion($this->Sousregion_Model->getById($rec->id_sousregion, $langue));
                    $temp->setTitre_annonce($rec->titre_annonce);
                    $temp->setDescription_annonce($rec->description_annonce);
                    $temp->setReference($rec->reference);
                    $temp->setPrix($rec->prix);
                    $temp->setAdresse_propriete($rec->adresse_propriete);
                    $temp->setImagePrincipal($rec->image);
                    $temp->setImages($this->getImages($temp));
                    $temp->setIcones($this->getIcones($temp));
                    $temp->setClients($this->getClients($temp));
                    $temp->setVideo_url($rec->video_url);
                    $temp->setExclusivite($rec->exclusivite);
                    $temp->setDate_contrat($rec->date_contrat);
                    $temp->setDate_mandat($rec->date_mandat);
                    $temp->setCaracteristiques($this->getCaracteristiques($temp, $langue));
                    $temp->setGoogle_map($rec->google_map);
                    $temp->setPar_mois($rec->par_mois);
                    $rep[] = $temp;
                }
            }
        }

        return $rep;
    }

    function getImages($annonce) {
        $query = $this->db->query("SELECT * FROM `image_annonce` LEFT JOIN `image` ON `image`.`id_image` = `image_annonce`.`id_image` where id_ann=" . $annonce->getId_ann());
        $rset = $query->result();
//        echo $this->db->last_query();
//        exit;
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Image();
                $temp->setId_image($rec->id_image);
                $temp->setNom_image($rec->nom_image);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getIcones($annonce) {
        $query = $this->db->query("SELECT * FROM `icone_annonce` LEFT JOIN `icone` ON `icone`.`id_icone` = `icone_annonce`.`id_icone` where id_ann=" . $annonce->getId_ann());
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Icone();
                $temp->setId_icone($rec->id_icone);
                $temp->setNom_icone($rec->nom_icone);
                $temp->setVal($rec->val);
                $temp->setVal_icone($rec->val_icone);
                if ($rec->id_mesure != '') {
                    $temp->setMesure($this->Mesure_Model->getById($rec->id_mesure, 'french'));
                }
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getClients($annonce) {
        $query = $this->db->query("SELECT * FROM `client_annonce` LEFT JOIN `client` ON `client`.`id_client` = `client_annonce`.`id_client` where id_ann=" . $annonce->getId_ann());
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Client();
                $temp->setId_client($rec->id_client);
                $temp->setNom($rec->nom);
                $temp->setPrenom($rec->prenom);
                $temp->setNic($rec->nic);
                $temp->setTel($rec->tel);
                $temp->setFax($rec->fax);
                $temp->setAdresse($rec->adresse);
                $temp->setEmail($rec->email);
                $temp->setProfession($rec->profession);
                $temp->setEtat($rec->etat);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getIcone($annonce, $icone) {
        $icones = $annonce->getIcones();

        foreach ($icones as $ic) {
            $val_icone = $ic->getVal_icone();
            $ic = $this->Icone_Model->getById($ic->getId_icone());

            if ($ic->getNom_icone() == $icone) {
                return $val_icone;
            }
        }
        return false;
    }

    function getCar($annonce, $car, $langue) {
        $cars = $this->getCaracteristiques($annonce, $langue);
        foreach ($cars as $c) {
            $val_car = $c->getVal_car();
            $c = $this->Caracteristiques_Model->getById($c->getId_car(), $langue);
            if ($c->getVal() == $car) {
                return $val_car;
            }
        }
        return false;
    }

    function getCaracteristiques($annonce, $langue) {
        $query = $this->db->query("SELECT * FROM caracteristiques LEFT JOIN car_trad on caracteristiques.id_car=car_trad.id_car LEFT JOIN langue on car_trad.id_langue=langue.id_langue LEFT JOIN `valeur_caracteristique` ON `valeur_caracteristique`.`id_car` = `caracteristiques`.`id_car` where id_ann=" . $annonce->getId_ann() . " and langue='" . $langue . "'");

        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Caracteristiques();
                $temp->setId_car($rec->id_car);
                $temp->setVal($rec->val);
                $temp->setVal_car($rec->val_car);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function saveCaracteristiques($annonce) {
        $caracteristiques = $annonce->getCaracteristiques();
        foreach ($caracteristiques as $car) {
            $this->db->query("insert into valeur_caracteristique VALUES (" . $car->getId_car() . "," . $annonce->getId_ann() . ",'" . $car->getVal_car() . "')");
            if (!empty($this->db->error())) {
//                echo "update valeur_caracteristique set val_car='" . $car->getVal_car() . "' where id_ann=" . $annonce->getId_ann() . " and id_car=" . $car->getId_car() . "<br>";
                $this->db->query("update valeur_caracteristique set val_car='" . $car->getVal_car() . "' where id_ann=" . $annonce->getId_ann() . " and id_car=" . $car->getId_car()
                );
            }
        }
    }

    function saveIcones($annonce) {
        $icones = $annonce->getIcones();

        foreach ($icones as $icone) {
            $this->Icone_Model->modify($icone);
            $this->db->query("insert into icone_annonce VALUES (" . $annonce->getId_ann() . "," . $icone->getId_icone() . ",'" . $icone->getVal_icone() . "')");
            if (!empty($this->db->error())) {
//                echo "update icone_annonce set val_icone=" . $icone->getVal_icone() . " where id_ann=" . $annonce->getId_ann() . " and id_icone=" . $icone->getId_icone() . "<br>";
                $this->db->query("update icone_annonce set val_icone=" . $icone->getVal_icone() . " where id_ann=" . $annonce->getId_ann() . " and id_icone=" . $icone->getId_icone()
                );
            }
        }
    }

    function saveImages($annonce) {
        $images = $annonce->getImages();

        foreach ($images as $image) {
            $this->Image_Model->save($image);
            $this->db->query("insert into image_annonce values(" . $annonce->getId_ann() . "," . $image->
                            getId_image() . ")");
        }
    }

    function saveClients($annonce) {
        $clients = $annonce->getClients();

        foreach ($clients as $client) {
            $this->db->query("insert into client_annonce values(" . $annonce->getId_ann() . "," . $client->
                            getId_client() . ")");
        }
    }

    function del_image_annonce($id_ann, $id_image) {
        $where = array("id_ann" => $id_ann, "id_image" => $id_image);
        $this->delete
                ("image_annonce", $where);
    }

    function del_image_principal($id_ann) {
        $where = array("id_ann" => $id_ann);
        $object = array("image" => '');
        $this->update(
                "annonce", $object, $where);
    }

    function restore($annonce) {
        $where = array("id_ann" => $annonce->getId_ann());
        $object = array("etat" => true);
        $this->update("annonce", $object, $where);
    }

}
