<?php
error_reporting(E_ALL);
$self = $_SERVER['PHP_SELF'];
$thispath = dirname($_SERVER['PHP_SELF']);
$sitebasepath = $_SERVER['DOCUMENT_ROOT'] . '/STO';

// DTO's
//require_once($sitebasepath.'/REST/v1/Common/DTO/BatchCount.php');

// Logic
//require_once($sitebasepath.'/REST/v1/Logic/UserLogic.php');

// Sonstiger Shizzle
require_once($sitebasepath . '/REST/v1/ResourceFactory.php');

// Datebase 
require_once($sitebasepath.'/REST/v1/DataAccess/DataBase.php');
require_once($sitebasepath.'/REST/v1/DataAccess/PositionRepo.php');
//require_once($sitebasepath.'/REST/v1/DataAccess/AuthRepo.php');

// Controller
require_once($sitebasepath . '/REST/v1/Controller/PositionController.php');


$request = $_SERVER['REQUEST_URI'];
$tokens = explode('/', $request);



$RessourceID = 0;
for ($i = 0; $i < count($tokens) && $RessourceID == 0; $i++) {
    if ($tokens[$i] === 'v1') {
        $RessourceID = $i + 1;
    }
}

$ressource = $tokens[$RessourceID];



$args = array();

if (count($tokens) > $RessourceID + 1) {
    for ($i = 1; $i <= (count($tokens) - $RessourceID); $i++) {
        $args[$i] = $tokens[$RessourceID + $i];
    }
}

$resFactory = new ResourceFactory();
$resObj = $resFactory->GetResource($ressource);

$method = $_SERVER['REQUEST_METHOD'];


try {
    $resObj->Execute($args, $method);
    http_response_code(200);
} catch (Exception $ex) {
    echo $ex->getMessage();
    http_response_code(500);
    //exit;
}
