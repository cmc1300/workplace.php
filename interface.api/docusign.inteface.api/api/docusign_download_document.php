<?php
/*
 * http://api.netcube.com.au/projects/netcube/docusign/api/docusign_download_document.php?envelopeId=ce2bbc71-36f8-483a-9218-6c12fb11cc82
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
//echo "accountId = " . $accountId . "\nbaseUrl = " . $baseUrl . "\n";

/////////////////////////////////////////////////////////////////////////////////////////////////
// STEP 2 - Get document information
/////////////////////////////////////////////////////////////////////////////////////////////////
$curl = curl_init($baseUrl . "/envelopes/" . $envelopeId . "/documents" );
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
"X-DocuSign-Authentication: $header" )
);
$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ( $status != 200 ) {
echo "error calling webservice, status is:" . $status;
exit(-1);
}
$response = json_decode($json_response, true);
curl_close($curl);
//--- display results
//echo "Envelope has following document(s) information...\n";
//echo "<pre>"; var_dump($response); echo "</pre>";
//echo "\n";

/////////////////////////////////////////////////////////////////////////////////////////////////
// STEP 3 - Download the envelope's documents
/////////////////////////////////////////////////////////////////////////////////////////////////
foreach( $response["envelopeDocuments"] as $document ) {
	$docUri = $document["uri"];
	if ($document["type"] == "content") {
		$curl = curl_init($baseUrl . $docUri );
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"X-DocuSign-Authentication: $header" )
			);
		
			$data = curl_exec($curl);
			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ( $status != 200 ) {
			echo "error calling webservice, status is:" . $status;
			exit(-1);
		}
		file_put_contents("../download/" . $document["name"], $data);
		curl_close($curl);
	}
	
	//*** Documents should now be downloaded in the same folder as you ran this program
}
//--- display results
echo $json_response; die;
echo "Envelope document(s) have been downloaded, check your local directory.\n";
echo "<pre>"; var_dump($document); echo "</pre>";
?>