<?php

namespace App;

class Response
{
    /**
     * 
     *  Renvoi du contenu serialisé en JSON en tant que réponse
     * 
     * @param $trucARenvoyerAuClient
     * 
     * @return void
     * 
     */


    public static function json($trucARenvoyerAuClient)
    {
        header('Access-Control-Allow-Origin: *');
        echo json_encode($trucARenvoyerAuClient);
    }


//        $url = "index.php";
//            if($parametres){
//                        $url = "?";
//
//
//                        foreach($parametres as $cle => $valeur){
//
//                            $nouveauParamGet = $cle."=".$valeur."&";
//
//                            $url.=$nouveauParamGet;
//
//   }
//
//        header("Location: ".$url);
//        exit();
//    }


}