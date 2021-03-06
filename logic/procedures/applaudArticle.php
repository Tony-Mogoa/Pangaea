<?php
 require_once("utility.inc.php");

 /**
  * This script applauds an article. The applaud is toggle (clap and unclap)
  */
    $articleId = isset($_POST['id']) ? (int)$_POST['id'] :"";
    
    if( $articleId == 0 || !is_int($articleId) ){
        echo "NIE";//no id error
        exit;
    }

    $reader = new Reader($_SESSION['userId']);

    if($reader->applaudArticle($articleId)){
        $article = new Article($articleId);
        echo json_encode(["status" => "OK", "applauds" => $article->getApplauds()]);
    }else{
        echo json_encode(["status" => "UE"]);;//unknown error occurred
    }

?>