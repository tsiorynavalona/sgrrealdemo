<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Annonce
 *
 * @author mrandria
 */
class Annonce {

    //put your code here
    private $id_ann;
    private $agent;
    private $clients;
    private $sousregion;
    private $tag;
    private $devise;
    private $statut;
    private $type;
    private $titre_annonce;
    private $titre_annonce_en;
    private $description_annonce;
    private $description_annonce_en;
    private $reference;
    private $prix;
	private $measure_terrin;
	private $measure_habit;
    private $adresse_propriete;
    private $etat;
    private $caracteristiques;
    private $icones;
    private $imagePrincipal;
    private $images;
    private $google_map;
    private $video_url;
    private $is_featuredproperty;
    private $date_annonce;
    private $date_contrat;
    private $date_propriete;
    private $exclusivite;
    private $date_mandat;
    private $par_mois;

    function getGoogle_map() {
        return $this->google_map;
    }

    function getVideo_url() {
        return $this->video_url;
    }

    function setGoogle_map($google_map) {
        $this->google_map = $google_map;
    }

    function setVideo_url($video_url) {
        $this->video_url = $video_url;
    }

    function getImages() {
        return $this->images;
    }

    function setImages($images) {
        $this->images = $images;
    }

    function getAgent() {
        return $this->agent;
    }

    function getSousregion() {
        return $this->sousregion;
    }

    function getTag() {
        return $this->tag;
    }

    function getDevise() {
        return $this->devise;
    }

    function getStatut() {
        return $this->statut;
    }

    function getType() {
        return $this->type;
    }

    function getTitre_annonce() {
        return $this->titre_annonce;
    }

    function getDescription_annonce() {
        return $this->description_annonce;
    }

    function getReference() {
        return $this->reference;
    }

    function getPrix() {
        return $this->prix;
    }
	function getMeasure_Terrin(){
		return $this->measure_terrin;
	}
	function getMeasure_Habit(){
		return $this->measure_habit;
	}

    function getAdresse_propriete() {
        return $this->adresse_propriete;
    }

    function getEtat() {
        return $this->etat;
    }

    function getPar_mois() {
        return $this->par_mois;
    }

    function getDate_contrat() {
        return $this->date_contrat;
    }

    function getDate_propriete() {
        return $this->date_propriete;
    }

    function getDate_mandat() {
        return $this->date_mandat;
    }

    function setDate_contrat($date_contrat) {
        $this->date_contrat = $date_contrat;
    }

    function setDate_propriete($date_propriete) {
        $this->date_propriete = $date_propriete;
    }

    function setDate_mandat($date_mandat) {
        $this->date_mandat = $date_mandat;
    }

    function getExclusivite() {
        return $this->exclusivite;
    }

    function setExclusivite($exclusivite) {
        $this->exclusivite = $exclusivite;
    }

    function getClients() {
        return $this->clients;
    }

    function setClients($clients) {
        $this->clients = $clients;
    }

    function setPar_mois($par_mois) {
        $this->par_mois = $par_mois;
    }

    function setAgent($agent) {
        $this->agent = $agent;
    }

    function setSousregion($sousregion) {
        $this->sousregion = $sousregion;
    }

    function setTag($tag) {
        $this->tag = $tag;
    }

    function setDevise($devise) {
        $this->devise = $devise;
    }

    function setStatut($statut) {
        $this->statut = $statut;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setTitre_annonce($titre_annonce) {
        $this->titre_annonce = $titre_annonce;
    }

    function setDescription_annonce($description_annonce) {
        $this->description_annonce = $description_annonce;
    }

    function setReference($reference) {
        $this->reference = $reference;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }
	function setMeasure_Terrin($measure_terrin){
		$this->measure_terrin = $measure_terrin;
	}
	function setMeasure_Habit($measure_habit){
		$this->measure_habit = $measure_habit;
	}
    function setAdresse_propriete($adresse_propriete) {
        $this->adresse_propriete = $adresse_propriete;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

    function getId_ann() {
        return $this->id_ann;
    }

    function setId_ann($id_ann) {
        $this->id_ann = $id_ann;
    }

    function getCaracteristiques() {
        return $this->caracteristiques;
    }

    function setCaracteristiques($caracteristiques) {
        $this->caracteristiques = $caracteristiques;
    }

    function getTitre_annonce_en() {
        return $this->titre_annonce_en;
    }

    function getDescription_annonce_en() {
        return $this->description_annonce_en;
    }

    function setTitre_annonce_en($titre_annonce_en) {
        $this->titre_annonce_en = $titre_annonce_en;
    }

    function setDescription_annonce_en($description_annonce_en) {
        $this->description_annonce_en = $description_annonce_en;
    }

    function getIs_featuredproperty() {
        return $this->is_featuredproperty;
    }

    function setIs_featuredproperty($is_featuredproperty) {
        $this->is_featuredproperty = $is_featuredproperty;
    }

    function getIcones() {
        return $this->icones;
    }

    function setIcones($icones) {
        $this->icones = $icones;
    }

    function getImagePrincipal() {
        return $this->imagePrincipal;
    }

    function setImagePrincipal($imagePrincipal) {
        $this->imagePrincipal = $imagePrincipal;
    }

    function getDate_annonce() {
        return $this->date_annonce;
    }

    function setDate_annonce($date_annonce) {
        $this->date_annonce = $date_annonce;
    }

}
