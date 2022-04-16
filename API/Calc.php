<?php
class myObj{
    public $has;
    public $hasnot;
    public function __construct($has, $hasnot){
        $this->hasnot=($hasnot);
        $this->has=($has);
    }  
    
}
    require_once "../model/modelHome.php";
    require_once "../control/controlHome.php";
    $call = new Calls($_GET["from"],$_GET["to"],$_GET["minute"],$_GET["plan"]);
    $call->price($call);    
    $myobj = new myObj($call->getSpeackMore(),$call->getNoSpeackMore());    
    $myJSON = json_encode($myobj);
    echo $myJSON;
?>