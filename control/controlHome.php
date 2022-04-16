<?php
require_once "../model/modelHome.php";
class Calls{
    private $from;
    private $to;
    private $minu;
    private $plan;
    private $speakMore;
    private $noSpeakMore;
    private $citys;
    
    public function getCitys(){
        return $this->citys;
    }    
    public function getFrom(){
        return $this->from;
    }
    public function getTo(){
        return $this->to;
    }
    public function getMin(){
        return $this->minu;
    }
    public function getPlan(){
        return $this->plan;
    }    
    public function getSpeackMore(){
        return $this->speakMore;
    }
    public function getNoSpeackMore(){
        return $this->noSpeakMore;
    }            
    public function setFrom($f){
        $this->from = $f;
    }        
    public function setSpeackMore($fm){
        $this->speakMore = $fm;
    }
    public function setNoSpeackMore($sfm){
        $this->noSpeakMore = $sfm;
    }
    public function setCity($citi){
        $this->citys = $citi;
    }
    public function setTo($t){
        $this->to = $t;
    }
    public function setMin($min){
        $this->minu = $min;
    }
    public function setPlan($plan){
        $this->plan = $plan;
    }
    public function __construct($from, $to, $minu, $plan){
        $this->setFrom($from);
        $this->setTo($to);
        $this->setMin($minu);
        $this->setPlan($plan);
    }    
    public function showPrice($data,$c){
        $speakMore="-";
        $noSpeakMore="-";
        if(!count($data)){
            $this->setNoSpeackMore("-");
            $this->setSpeackMore("-");
        }else{
            
            $cost = $data[0][1];
            $speakMore=0;
            $noSpeakMore=$c->minu*$cost;
            //validação com plano FalaMais
            if(!($c->minu<=$c->plan)){
                $speakMore=($cost+$cost*0.1)*($c->minu-$c->plan);
            }
            $this->setNoSpeackMore($noSpeakMore);
            $this->setSpeackMore($speakMore);            
        }
    }
    
    public function findCity(){
        $dB=new CallsDao();
        $d = $dB->searchCity();        
        $this->setCity($d);
    }
    
    public function findPlan(){
        $dB=new CallsDao();
        $d = $dB->saerchPlan();        
        $this->setPlan($d);
    }
    
    public function price(Calls $c){
        $bD=new CallsDao();
        $d = $bD->searchPrice($c);
        $this->showPrice($d,$c);
    }   
}
/*if(isset($_POST["from"]) && isset($_POST["to"])){
    $call = new Calls($_POST["from"],$_POST["to"],$_POST["minute"],$_POST["plan"]);
    $call->price($call);    
}*/
?>
