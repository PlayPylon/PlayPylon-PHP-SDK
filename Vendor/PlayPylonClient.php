<?php
/**
 * Copyright 2017 PlayPylon LtD.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * PlayPylon.
 *
 */
namespace PlayPylon;

class PlayPylonClient
{
    protected $id;
    protected $secret;

    public function __construct($id, $secret)
    {
        // We cast as a string in case a valid int was set on a 64-bit system and this is unserialised on a 32-bit system
        $this->id = (string) $id;
        $this->secret = $secret;
    }

    public function pushPotentialLead($lead_reference,$lead_type,$metadata) {
    	/*
    		LEAD REFERENCE : Use any unique varchar(188) identifier, transaction id, case number, user id ect.
			LEAD TYPE : Use reference key provided by PlayPylon.
			METADATA : Any data you would like to apply to the lead.
    	*/
        $dispatch_url => "https://api.playpylon.com/v1/registerlead",
        $dispatch_data = array(
	        "gameid" => $this->id,
	        "secret" => md5($this->secret),
	        "metadata" => $metadata
        );
        $this->curlDispatch($dispatch_url,$dispatch_data);
  }


    public function pushConfirmedLead($lead_reference,$lead_type,$metadata) {
    	/*
    		LEAD REFERENCE : Use any unique varchar(188) identifier, transaction id, case number, user id ect.
			LEAD TYPE : Use reference key provided by PlayPylon.
			METADATA : Any data you would like to apply to the lead.
    	*/
        CURLOPT_URL => "https://api.playpylon.com/v1/registerlead",
        $dispatch_data = array(
	        "gameid" => $this->id,
	        "secret" => md5($this->secret),
	        "metadata" => $metadata,
	        "confirmed" => true
        );
        $this->curlDispatch(,$dispatch_data);
  }



    public function curlDispatch($url,$data) {
    	/*
    		Sends off the signal to the PlayPylon backend.
    	*/
    	curl_setopt_array($ch = curl_init(), array(
	        CURLOPT_URL => $url,
	        CURLOPT_POSTFIELDS => $data
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_exec($ch);
        curl_close($ch);
  }


}