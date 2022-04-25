<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estimation_bien
 *
 * @author mrandria
 */
class Notification_bien {

    //put your code here
    private $reference;
    private $client;
	private $agent;
    private $mandate;
    private $expiration;
    private $title;
    
    function getreference() {
        return $this->reference;
    }

    function getclient() {
        return $this->client;
    }
	function getagent() {
        return $this->agent;
    }

    function getmandate() {
        return $this->mandate;
    }

    function getexpiration() {
        return $this->expiration;
    }

    function gettitle() {
        return $this->title;
    }

    

    function setreference($reference) {
        $this->reference = $reference;
    }

    function setclient($client) {
        $this->client = $client;
    }
	function setagent($agent) {
        $this->agent = $agent;
    }

    function setmandate($mandate) {
        $this->mandate = $mandate;
    }

    function setexpiration($expiration) {
        $this->expiration = $expiration;
    }

    function settitle($title) {
        $this->title = $title;
    }

   

}
