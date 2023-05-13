<?php 
    class SliderModal extends BaseModal{
       public function GetSlider(){
           $sql = "select * from homeslider";
           return $this->GetResultLoop($sql);
        }
   }
  $slider = new SliderModal(); 
?>