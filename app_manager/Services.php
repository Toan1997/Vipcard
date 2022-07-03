<?php

     function getAPI($linkApi){

         $uri = $_SERVER[REQUEST_URI];
         $linkApi = 'https://manager.vipcard.biz/api/'.$linkApi.$uri;
         $response = file_get_contents($linkApi);
         return $response;
    }

    function getUser(){
        $infomationData = getAPI('infomation');
        $dataUser = json_decode($infomationData,true);
//        echo "<pre>";print_r($dataUser[0]);exit;
        checkActiveAccount($dataUser[0]);
        return $dataUser[0];

    }

    function getAffiliates(){
        $dataAffiliate = getAPI('linked');
        $affiliates = json_decode($dataAffiliate,true);
        return $affiliates;

    }
    function checkExistUser($user){
        if(!$user){
            header("Location: /404.php");
            die();
        }
    }
    function checkActiveAccount($dataUser){
        $isActive = $dataUser['users_is_active'];
        $createdAt = $dataUser['user_create_at'];
        $dateNow = date("d-m-Y");
        $addingDate = date('d-m-Y', strtotime($createdAt. ' + 7 days'));
        if($isActive OR strtotime($dateNow)  < strtotime($addingDate)){
            return true;
        }else{
            header("Location: /404.php");
            die();
        }


    }






