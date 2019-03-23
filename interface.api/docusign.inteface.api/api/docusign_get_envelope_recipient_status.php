<?php
/*
 * http://api.netcube.com.au/projects/netcube/docusign/api/docusign_get_envelope_recipient_status.php?envelopeId=ce2bbc71-36f8-483a-9218-6c12fb11cc82
 */


$envelopeId				= "";
if ( isset($_REQUEST['envelopeId']) && !empty($_REQUEST['envelopeId']) ) {
	$envelopeId			= trim ( $_REQUEST ['envelopeId'] );
}
else {
	$ret ['result'] 	= "NOK";
	$ret ['info']		= "Fail to get the mandatory parameter envelopeId";
	echo json_encode ( $ret );
	die;
}

// Input your info here:
$email = "Jerry.xu@novatel.com.au";			// your account email
$password = "xgp_950254";		// your account password
$integratorKey = "b22103d7-3e79-487f-b59e-4d0e1aca8a3e";		// your account integrator key, found on (Preferences -> API page)

// construct the authentication header:
$header = "<DocuSignCredentials><Username>" . $email . "</Username><Password>" . $password . "</Password><IntegratorKey>" . $integratorKey . "</IntegratorKey></DocuSignCredentials>";

/////////////////////////////////////////////////////////////////////////////////////////////////
// STEP 1 - Login (retrieves baseUrl and accountId)
/////////////////////////////////////////////////////////////////////////////////////////////////
$url = "https://demo.docusign.net/restapi/v2/login_information";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("X-DocuSign-Authentication: $header"));

$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 200 ) {
	echo "error calling webservice, status is:" . $status;
	exit(-1);
}

$response = json_decode($json_response, true);
$accountId = $response["loginAccounts"][0]["accountId"];
$baseUrl = $response["loginAccounts"][0]["baseUrl"];
curl_close($curl);
//--- display results
echo "\naccountId = " . $accountId . "\nbaseUrl = " . $baseUrl . "\n";

/////////////////////////////////////////////////////////////////////////////////////////////////
// STEP 2 - Get envelope information
/////////////////////////////////////////////////////////////////////////////////////////////////
$data_string = json_encode($data);
$curl = curl_init($baseUrl . "/envelopes/" . $envelopeId . "/recipients" );
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
"X-DocuSign-Authentication: $header" )
);

$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ( $status != 200 ) {
	echo "error calling webservice, status is:" . $status . "\nError text --> ";
	print_r($json_response); echo "\n";
	exit(-1);
}

$response = json_decode($json_response, true);
echo "<pre>"; var_dump($response); echo "</pre>";
?>