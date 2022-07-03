<?php

     function getAPI(){

        $uri = $_SERVER[REQUEST_URI];
        $linkApi = 'https://vipcard.biz/rest/V1/vipcard/user'.$uri;

         $response = file_get_contents($linkApi);
         //echo "<pre>";print_r($response);exit;
         return $response;
    }

    function getUser(){
        $response = getAPI();
        $params = json_decode($response,true);
        $dataUser = json_decode($params,true);
        return $dataUser;

    }

    function getAffiliates($dataAffiliate){
        $affiliates = json_decode($dataAffiliate,true);
        return $affiliates;

    }
    function checkExistUser($user){
        if(!$user){
            header("Location: /404.php");
            die();
        }
    }
     function contactVcardExportService($contactResult)
    {
        require_once 'vendor/Behat-Transliterator/Transliterator.php';
        require_once 'vendor/jeroendesloovere-vcard/VCard.php';
        // define vcard
        $vcardObj = new VCard();

        // add personal data
        $vcardObj->addName($contactResult[0]["first_name"] . " " . $contactResult[0]["last_name"]);
        $vcardObj->addBirthday($contactResult[0]["date_of_birth"]);
        $vcardObj->addEmail($contactResult[0]["email"]);
        $vcardObj->addPhoneNumber($contactResult[0]["phone"]);
        $vcardObj->addAddress($contactResult[0]["address"]);

        return $vcardObj->download();
    }





