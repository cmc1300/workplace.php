<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    /*
     *  Setup variables
     *  Change these before testing
     */
    $api_key = 'XEPFKPLXJ5Q2NXH';
    
    $recipient_email = 'cmc1300@hotmail.com';
    
    $merge_fields = array(
                            'firstname' => 'cmc1300', 
                            'surname' => 'Test', 
    						'dob1' => '0',
    						'dob2' => '2',
				    		'dob3' => '1',
				    		'dob4' => '0',
				    		'dob5' => '1',
				    		'dob6' => '9',
				    		'dob7' => '7',
				    		'dob8' => '3',
    						'email' => 'cmc1300@hotmail.com',
    						'unit' => '201',
    						'housenumber' => '21',
    						'street' => 'Saint Mangos',
    						'suburb' => 'Docklands',
				    		'state' => 'VIC',
				    		'postcode' => '3008',
				    		'phoneno' => '0312345678',
                            'mobile' => '0467741379',
				    		'adsl1' => 'yes',
				    		'adsl2' => 'true',
				    		'adsl3' => 'true',
    		'servicevalue1' => 'servicevalue1',
    		'servicevalue2' => 'servicevalue2',
    		'serviceinstallation1' => 'true',
    		'serviceinstallation2' => 'true',
    		'serviceinstallation3' => 'serviceinstallation3',
    		'serviceinstallation4' => 'serviceinstallation4',
    		'serviceinstallation5' => 'serviceinstallation5',
    		'serviceinstallation6' => 'serviceinstallation6',
    		'serviceinstallation7' => 'serviceinstallation7',
    		'serviceinstallation8' => 'serviceinstallation8',
    		
    		'payementoptions1' => 'payementoptions1',
    		'payementoptions2' => 'payementoptions2',
    		'payementoptions3' => 'payementoptions3',
    		'payementoptions4' => 'payementoptions4',
    		'payementoptions5' => 'payementoptions5',
    		'payementoptions6' => 'payementoptions6',
    		'payementoptions7' => 'payementoptions7',
    		'payementoptions8' => 'payementoptions8',
    		'payementoptions9' => 'payementoptions9',
    		'payementoptions10' => 'payementoptions10',
    		'paymentoptions_expirtydate1' => '0',
    		'paymentoptions_expirtydate2' => '1',
    		'paymentoptions_expirtydate3' => '2',
    		'paymentoptions_expirtydate4' => '0',
    		'paymentoptions_expirtydate5' => '1',
    		'paymentoptions_expirtydate6' => '5'
                         );
    
    //for testing document methods not required to start
    $document_key = 'AN EXISTING DOCUMENT KEY'; 
    $mega_sign_document_key = 'AN EXISTING MEGA SIGN DOCUMENT KEY';
    
    $filepath = './NewApp_Form.pdf';
    //end setup variables
    
    include('./Autoloader.php');
    
    $ESLoader = new SplClassLoader('EchoSign', realpath(__DIR__.'/./lib').'/');
    $ESLoader->register();
    
    $client = new SoapClient(EchoSign\API::getWSDL());
    $api = new EchoSign\API($client, $api_key);
    
    print '<pre>';
