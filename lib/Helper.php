<?php
    class Helper{
              public static function ImageUpload($tmp_name,$img_name,$path,$type,$id=0,$FileName2=""){
                $path2 = substr($path,3);
                       $msg = 0;
                       if(count($type)>0){
                          $ext = pathinfo($img_name, PATHINFO_EXTENSION);
                          foreach($type as $val){
                               if($val==$ext){
                                $msg = 1;
                                $Integer = strtotime(Date('Y-m-d h:i:s'));
                                $img_name="Img".$Integer.".".$ext;
                               }
                          } if($msg==0){ 
                            return false; 
                            }else{
                             if($id>0 && $FileName2 !=""){ unlink($path.$FileName2); }  
                            $uploadFile = move_uploaded_file($tmp_name,$path.$img_name);
                            $data = array("file_path"=>APPURL.$path2.$img_name,"file_name"=>$img_name);
                            return $data;
                            //end
                          }
                       }
              }
     public static function ImageSizeCrop($tmp_name,$img_name,$path,$type,$thumb_path1,$thumb_path2,$id=0,$Filename2=""){
      $path2 = substr($path,3);
      $msg=0;
      $filename_old=$img_name;
      $oldpath=$tmp_name;
      $ext = pathinfo($img_name, PATHINFO_EXTENSION);
      $newpath=$path.$filename_old;
      foreach($type as $val){
        if($val==$ext){
         $msg = 1;
         $Integer = strtotime(Date('Y-m-d h:i:s'));
         $img_name="Img-L".$Integer.".".$ext;
         $newpath=$path.$img_name;
         $filename_old = $img_name;
        }
      } if($msg==0){ 
      return false; 
      } else{
      if(move_uploaded_file($oldpath,$newpath)){}else{die('error');}
      //$link=$_SERVER["SERVER_ADDR"]."/Xenium/admin/media/elearn/".$filename_old;
      $link123=$path.$filename_old;
      ini_set('display_errors',1);
      error_reporting(E_ALL);
      $filename = $filename_old;
      $thumb_filename=  $thumb_path1.$filename; //largesize
      $original_info = getimagesize($link123);
      $original_w = $original_info[0];
      $original_h = $original_info[1];
      $original_img = imagecreatefromjpeg($link123);
      $thumb_w = 600;
      $thumb_h = 704;
      $thumb_img = imagecreatetruecolor($thumb_w, $thumb_h);
      imagecopyresampled($thumb_img, $original_img,
                         0, 0,
                         0, 0,
                         $thumb_w, $thumb_h,
                        $original_w, $original_h);
      imagejpeg($thumb_img, $thumb_filename);
      imagedestroy($thumb_img);
      unlink($link123);
      $result['large'] = array("file_name"=>$filename,"file_path"=>$thumb_filename);
      $result['small']=array();
      for($i=0;$i<3;$i++){
        $thumb_w = 300;
        $thumb_h = 270;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $Integer = strtotime(Date('Y-m-d h:i:s'));
        $img_name="Img-S".$i.$Integer.".".$ext;
        $newpath=$thumb_path2.$img_name;
        $thumb_filename= $newpath; //smallsize
      $thumb_img = imagecreatetruecolor($thumb_w, $thumb_h);											
      imagecopyresampled($thumb_img, $original_img,
                         0, 0,
                         0, 0,
                         $thumb_w, $thumb_h,
                         $original_w, $original_h);							
                 imagejpeg($thumb_img, $thumb_filename);
                 array_push($result['small'],["file_name"=>$img_name,"file_path"=>$newpath]);						
                 imagedestroy($thumb_img);
        }
      }
          
          return $result;      
   }
    }
?>