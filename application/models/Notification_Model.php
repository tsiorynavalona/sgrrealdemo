<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estimation_Model
 *
 * @author mrandria
 */
class Notification_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Notification_bien');
    }

    function getAllperPage($langue, $nb = '', $page = '') {
        //$rset = $this->read('estimation_bien', '*');
		
		$dat = date("Y-m-d", time());
		
		$time = strtotime($dat);
		
		$tim = $time;
		$tim11 = date("m-d", $tim);
		$tim12 = date("m-d", strtotime("+1 day", $tim));
		$tim13 = date("m-d", strtotime("+2 day", $tim));
		$tim14 = date("m-d", strtotime("+3 day", $tim));
		$tim15 = date("m-d", strtotime("+4 day", $tim));
		$tim16 = date("m-d", strtotime("+5 day", $tim));
		$tim17 = date("m-d", strtotime("+6 day", $tim));
		$tim18 = date("m-d", strtotime("+7 day", $tim));
		$tim19 = date("m-d", strtotime("+8 day", $tim));
		$tim110 = date("m-d", strtotime("+9 day", $tim));
		$tim111 = date("m-d", strtotime("+10 day", $tim));
		$tim112 = date("m-d", strtotime("+11 day", $tim));
		$tim113 = date("m-d", strtotime("+12 day", $tim));
		$tim114 = date("m-d", strtotime("+13 day", $tim));
		
		$tim2 = strtotime("+6 month", $time);
		$tim21 = date("m-d", $tim2);
		$tim22 = date("m-d", strtotime("+1 day", $tim2));
		$tim23 = date("m-d", strtotime("+2 day", $tim2));
		$tim24 = date("m-d", strtotime("+3 day", $tim2));
		$tim25 = date("m-d", strtotime("+4 day", $tim2));
		$tim26 = date("m-d", strtotime("+5 day", $tim2));
		$tim27 = date("m-d", strtotime("+6 day", $tim2));
		$tim28 = date("m-d", strtotime("+7 day", $tim2));
		$tim29 = date("m-d", strtotime("+8 day", $tim2));
		$tim210 = date("m-d", strtotime("+9 day", $tim2));
		$tim211 = date("m-d", strtotime("+10 day", $tim2));
		$tim212 = date("m-d", strtotime("+11 day", $tim2));
		$tim213 = date("m-d", strtotime("+12 day", $tim2));
		$tim214 = date("m-d", strtotime("+13 day", $tim2));
		
		$whr .= " AND (annonce.date_mandat like '%-".$tim11."'  OR annonce.date_mandat like '%-".$tim12."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim13."'  OR annonce.date_mandat like '%-".$tim14."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim15."'  OR annonce.date_mandat like '%-".$tim16."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim17."'  OR annonce.date_mandat like '%-".$tim18."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim19."'  OR annonce.date_mandat like '%-".$tim110."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim111."'  OR annonce.date_mandat like '%-".$tim112."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim113."'  OR annonce.date_mandat like '%-".$tim114."'";
		
		$whr .= " OR annonce.date_mandat like '%-".$tim21."'  OR annonce.date_mandat like '%-".$tim22."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim23."'  OR annonce.date_mandat like '%-".$tim24."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim25."'  OR annonce.date_mandat like '%-".$tim26."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim27."'  OR annonce.date_mandat like '%-".$tim28."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim29."'  OR annonce.date_mandat like '%-".$tim210."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim211."'  OR annonce.date_mandat like '%-".$tim212."'";
		$whr .= " OR annonce.date_mandat like '%-".$tim213."'  OR annonce.date_mandat like '%-".$tim214."' ) ";
		
		if (!empty($page)) {
            $skip = ($page * $nb) - $nb;
            //$this->db->limit($nb, $skip);
			
			$sql = "SELECT annonce.*, annonce_trad.titre_annonce, agent.prenom FROM `annonce` 
			INNER JOIN agent ON agent.id_agent = annonce.id_agent 
			LEFT JOIN annonce_trad on annonce_trad.id_ann=annonce.id_ann 
			LEFT JOIN langue on annonce_trad.id_langue=langue.id_langue 
			where langue='" . $langue ."' ". $whr . " and annonce.etat=1 limit " . $skip . "," . $nb;
		
            $query = $this->db->query($sql);
        } else {
			$sql = "SELECT annonce.*, annonce_trad.titre_annonce, agent.prenom FROM `annonce` 
			INNER JOIN agent ON agent.id_agent = annonce.id_agent 
			LEFT JOIN annonce_trad on annonce_trad.id_ann=annonce.id_ann 
			LEFT JOIN langue on annonce_trad.id_langue=langue.id_langue 
			where langue='" . $langue . "'" . $whr . " and annonce.etat=1";
            $query = $this->db->query($sql);
        }
	
	//echo $sql;	
		
		
		$query = $this->db->query($sql);
		$rset = $query->result();
		$rep = array();
		$ct = 0;
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
				
				$csql = "SELECT client.prenom FROM client INNER JOIN client_annonce ON client_annonce.id_client = client.id_client WHERE client_annonce.id_ann = " . $rec->id_ann;
				//echo $csql;
				$cquery = $this->db->query($csql);
				$clnts = $cquery->result();
				
				$clnt = "";
				foreach($clnts as $cldt){
					if($clnt == ""){
						$clnt .= $cldt->prenom;
					}else{
						$clnt .= ", ".$cldt->prenom;
					}
				}
				
				
                $temp = new Notification_bien();
                $temp->settitle($rec->titre_annonce);
                $temp->setreference($rec->reference);
				$temp->setmandate($rec->date_mandat);
				$temp->setclient($clnt);
				$temp->setagent($rec->prenom);
				
				$time = strtotime($rec->date_mandat);
				$final = date("Y-m-d", strtotime("+6 month", $time));
				$temp->setexpiration($final);
                $rep[] = $temp;
				$ct++;
            }
        }
		
        return $rep;
    }

    function getById($id = '') {
        $where = array('id_estimation' => $id);
        $rset = $this->read('Notification_bien', '*', $where);
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            $rec = $rset[0];
            $temp = new Estimation_bien();
            $temp->setId_estimation($rec->id_estimation);
            $temp->setNom_prenom($rec->nom_prenom);
            $temp->setTel($rec->tel);
            $temp->setFax($rec->fax);
            $temp->setEmail($rec->email);
            $temp->setType_bien($rec->type_bien);
            $temp->setLocalisation($rec->localisation);
            $temp->setSurface($rec->surface);
            $temp->setNbre_piece($rec->nbre_piece);
            $temp->setRemarque($rec->remarque);
            $rep = $temp;
        }
        return $rep;
    }

    function save($estimation) {
        $object = array('nom_prenom' => $estimation->getNom_prenom(), 'tel' => $estimation->getTel(), 'fax' => $estimation->getFax(), 'email' => $estimation->getEmail(), 'type_bien' => $estimation->getType_bien(), 'localisation' => $estimation->getLocalisation(), 'surface' => $estimation->getSurface(), 'remarque' => $estimation->getRemarque(), 'nbre_piece' => $estimation->getNbre_piece());
        $id = $this->create('Notification_bien', $object, TRUE);
        if ($id != false) {
            $estimation->setId_estimation($id);
        }
    }

    function modify($estimation) {
        $where = array('id_estimation' => $estimation->getId_estimation());
        $object = array('nom_prenom' => $estimation->getNom_prenom(), 'tel' => $estimation->getTel(), 'fax' => $estimation->getFax(), 'email' => $estimation->getEmail(), 'type_bien' => $estimation->getType_bien(), 'localisation' => $estimation->getLocalisation(), 'surface' => $estimation->getSurface(), 'remarque' => $estimation->getRemarque());
        return $this->update('notification', $object, $where);
    }

    function remove($estimation) {
        $where = array('id_estimation' => $estimation->getId_estimation());
        return $this->delete('Notification_bien', $where);
    }

}
