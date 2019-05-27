<?php

/*
 * retrieveEchosignDocumentKeys.php
 * 		Insert table web_echosignOrderInfo
 * 		Used by Java Simulator seekWebsite.jar to insert all records, synchronized from online Echosign system, to NetCube-Hub table web_echosignOrderInfo
 * 
 * migrateADSLOrdersFromCPToNetCubeHub.php/migrateNBNOrdersFromCPToNetCubeHub.php
 * 		Insert table web_cp_adsl_onlineOrderInfo/web_cp_nbn_onlineOrderInfo
 * 		Convert all ADSL/NBN records from CP database to NetCube-Hub table web_cp_adsl_onlineOrderInfo/web_cp_nbn_onlineOrderInfo
 * 
 * getEchosignInfoBasedOnEmail.php
 * 		Refer to table web_echosignOrderInfo, update table web_cp_adsl_onlineOrderInfo/web_cp_nbn_onlineOrderInfo
 * 		Used by Java Simulator seekWebsite.jar to add Echosign-document-key info to table web_cp_adsl_onlineOrderInfo/web_cp_nbn_onlineOrderInfo
 * 		Correct wrong order numbers using file C:\Jerry.xu\Webnova.Project\Website\due_diligence\order_number_table.txt
 * 
 * checkIfOrderPDFFileExisted.php		(not used for now)
 * 		Check the depot folder on NetCube website, whether a pdf/fdf file exists for a credit/form contract
 * 
 * isOnlineOrderBasedOnEmersion.php		(not used for now)
 * 		For each emersion, scan three online order tables to find whether this email exists, write not found records into file emersion.csv
 * 
 * function.php
 * 		Action - list_echosign_files_on_depot
 * 		Action - check_if_file_existed_on_depot
 * 
 * sync_web_due_diligence_info.php
 * 		Insert table web_due_diligence_info
 * 		For each emersion, this file tries to find the most matched orderNumber/Echosign-document-key 
 * 		syncStatus	3208								OK/NOK
 * 					===============================================	============================================================================================
 * 					155		none/empty email			0/155		(UPDATE web_due_diligence_info SET processStatus = 'NOK' WHERE  syncStatus LIKE  'none%')
 * 					2025	none/none matched			0/2025
 * 					6		duplicated/unique			0/6
 * 					5		duplicated/none matched		0/5
 * 					24		duplicated/one later		0/24
 * 					4		duplicated/close enough		0/4
 * 					24		suspicious					0/24
 * 					965		unique						164/801		(Java Simulator)
 * 					===============================================	============================================================================================
 * 					3208
 * 
 * 		syncStatus	3462								OK/NOK
 * 					===============================================	============================================================================================
 * 					160		none/empty email			0/160		(UPDATE web_due_diligence_info SET processStatus = 'NOK' WHERE  syncStatus LIKE  'none%')
 * 					2113	none/none matched			0/2113
 * 					0		duplicated/unique			0/0			(unique)
 * 					0		duplicated/none matched		0/0			(none/none matched)
 * 					0		duplicated/one later		0/0			(unique)
 * 					0		duplicated/close enough		0/0			(unique)
 * 					0		suspicious					0/0
 * 					1189	unique						0/0		(Java Simulator)
 * 					===============================================	============================================================================================
 * 							SIGNED						151/149		(deadlyserious@mac.com/ashishrimal3@gmail.com)
 * 							OUT_FOR_SIGNATURE			76/75		(thewearnes@hotmail.com)
 * 							APPROVED					146/146
 * 							OUT_FOR_APPROVAL			119/116		(justin@pbevents.com.au/susan_f.x@hotmail.com/everlast0203@gmail.com)
 * 					===============================================	============================================================================================
 * 					3462								492/486
 * 
 * finalDueDiligenceSyncEmersion.php	(Ongoing)	-> getDocument_due_diligence.php
 * 		With an input parameter emersion ID, this file should be used to terminate this Due Diligence record for each emersion
 */

?>