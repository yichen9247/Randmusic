<?php
function online_users() {
    $filename=__INCLUDE_DIR__.'/Onlinecatch/online.txt';
    $cookiename='OnLineCount';
    $onlinetime=30;
    $online=file($filename); 
    $nowtime=$_SERVER['REQUEST_TIME']; 
    $nowonline=array(); 
    foreach($online as $line){
      $row=explode('|',$line); 
      $sesstime=trim($row[1]); 
      if(($nowtime - $sesstime)<=$onlinetime){
        $nowonline[$row[0]]=$sesstime;
        }
      }
      if(isset($_COOKIE[$cookiename])){
            $uid=$_COOKIE[$cookiename]; 
      }else{
        {} $vid=0;
           do{
               $vid++; 
               $uid='U'.$vid; 
               }while(array_key_exists($uid,$nowonline)); 
             setcookie($cookiename,$uid); 
        } 
        $nowonline[$uid]=$nowtime;
        $total_online=count($nowonline); 
        if($fp=@fopen($filename,'w')){ 
            if(flock($fp,LOCK_EX)){ 
                rewind($fp); 
                foreach($nowonline as $fuid=>$ftime){ 
                    $fline=$fuid.'|'.$ftime."\n"; 
                    @fputs($fp,$fline); 
                } 
                flock($fp,LOCK_UN); 
                fclose($fp); 
            } 
        } 
        return "$total_online";
    }
    
function timer_get( $display = 0, $precision = 3 ) {
    $timestart = $_SERVER ['REQUEST_TIME'];
    $mtime = explode(' ',microtime());
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r = $timetotal < 1 ? $timetotal * 1000 . " MS" : $timetotal . " S";
    if ( $display ) {
        echo $r;
    }
    return $r;
}

function rand_code($length) {
    $str_code = "";
    for($i= 0;$i < $length;$i++) {
        $str_code .= rand(0,9);
    }
    return $str_code;
}
?>