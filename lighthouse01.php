<?php
// run this in a directory with these command lines:
// cd c:\path_to_lighthouse001.php
// c:\path_to_php_bin_directory\php.exe -q lighthouse001.php
// it will create json and html file for each url
// it will create a out1.csv                            
// it will create a lighthouse-score-rank-for-pwa.html  


// for the ones commented, the manifest file has non been founded
$urls=array(  // the apps I like :-)
 'https://freesolitaire.win/',
 'https://cdn.htmlgames.com/KlondikeSolitaire/index.html?bgcolor=%23d9edf7',
 'https://www.solitaire-web-app.com/',
 'https://worldofsolitaire.com/fr/',
 'https://zen-of-programming.com/',
 'https://appsco.pe/',
 'https://www.koolsol.com/', // good game
 'https://airhorner.com/',
 'https://grrd01.github.io/4inaRow/index.html',
 'https://grrd01.github.io/Puzzle/index.html',
 'https://grrd01.github.io/Dice/index.html',
 'https://maaatch.games/',
 'https://pwa-directory.appspot.com/',
 'https://calculator.iondrimbafilho.me/',
 'https://outweb.io/',
 
 // I like solitaire games but many of them are not pwas
 'https://www.google.com/logos/fnbx/solitaire/standalone.html',
 'https://jeux-dot-metronews-compute-plateform.appspot.com/solitaire#content',
 'https://www.jeu-du-solitaire.com/',
 'https://amsarkadium-a.akamaihd.net/assets/global/game/webgl-klondike-solitaire/7cd852a3-2cad-498e-86f5-d30241d5b7de/?show_game_end=false&locale=en-US',
 'https://games.softgames.com/games/best-classic-solitaire/gamesites/844/locale/en',
 'https://solitaire.frvr.com/', // good game
 'http://pasjans-online.pl/',
 'http://www.mathster.com/games/solitaire/',
 'https://www.20minutes.fr/services/solitaire',
 'https://games.gameboss.com/klondikesolitaire/index.html?lang=fr', // good game
 'https://www.lci.fr/jeux/solitaire/',
 'https://www.solitr.com/',
 'https://www.planet.fr/jeu-solitaire',
 'http://www.classic-solitaire.com/',
 'http://jeux.lemonde.fr/games/klondike-solitaire/',
 'https://games.washingtonpost.com/games/klondike-solitaire/',
 'http://games.latimes.com/games/klondike-solitaire/',
 'https://justsolitaire.com/Klondike_Solitaire/',
 'https://www.solitaire-klondike.com/klondike.html',
 'https://www.solitr.com/klondike-turn-one',
 'http://jeux.meteocity.com/games/klondike-solitaire/',
 'https://games.aarp.org/games/klondike-solitaire-new',
 'https://www.klondikesolitaire.net/',
 'https://www.solitaire-play.com/',
 'https://www.solitairejeux.com/jeu/Pirate+Klondike',
 'http://solitaires-online.com/',
 'http://www.10001games.fr/jeu/klondike-solitaire',
 'https://poki.com/en/g/poki-klondike-solitaire',
 
);

/*
// for test only, reduce the size of the array of urls
$urls=array(  
// 'https://airhorner.com/',
 'https://freesolitaire.win/',
 'https://www.koolsol.com/',
// 'https://www.google.com/logos/fnbx/solitaire/standalone.html',
);
*/

$lesManifestsEtUrls=array();
$countUrl=0;
$sizeOfurls=sizeof($urls);
foreach( $urls as $k1 => $v1){
 $countUrl++;
 echo __LINE__ . ' ' . $countUrl . '/' . $sizeOfurls . ' url='. $v1."\r\n";
 $ch = curl_init();

 curl_setopt($ch, CURLOPT_HEADER         , 0);
 curl_setopt($ch, CURLOPT_URL            , $v1 );
 curl_setopt($ch, CURLOPT_HEADER         , 0);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
 curl_setopt($ch, CURLOPT_TIMEOUT        , 5);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
 curl_setopt($ch, CURLOPT_USERAGENT      ,'Mozilla/5.0 (Linux; Android 6.0;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36');

 $manifest='';
 $data=curl_exec($ch);
 $curlinfo1=curl_getinfo($ch);
 // find the manifest file name
 $pos1=stripos($data,'rel="manifest"');
 if($pos1!==false){
  $pos2=-1;
  $goon=true;
  
  for($i=$pos1;$i>=0&&$goon==true;$i--){
   if(substr($data,$i,1)=='<'){
    $pos2=$i;
    $goon=false;
   }
  }
  if($pos2>0){
   $pos3=0;
   $goon=true;
   for($i=$pos2;$i<strlen($data)&&$goon==true;$i++){
    if(substr($data,$i,1)=='>'){
     $pos3=$i;
     $goon=false;
    }
   }
   if($pos3>0){
    $dta2=substr($data,$pos2,$pos3-$pos2+1);
    $pos4=stripos($dta2,'href="');
    if($pos4!==false){
     $dta2=substr($dta2,$pos4+6);
     $pos5=stripos($dta2,'"');
     if($pos5!==false){
      $manifest=substr($dta2,0,$pos5);
     }
    }
   }
  }
 }
 if($manifest==''){ // for pwa-directory there is a rel=manifest without double quote around the value of the property rel !!!
  $pos1=stripos($data,'rel=manifest');
  if($pos1!==false){
   $pos2=-1;
   $goon=true;
   for($i=$pos1;$i>=0&&$goon==true;$i--){
    if(substr($data,$i,1)=='<'){
     $pos2=$i;
     $goon=false;
    }
   }
   if($pos2>0){
    $pos3=0;
    $goon=true;
    for($i=$pos2;$i<strlen($data)&&$goon==true;$i++){
     if(substr($data,$i,1)=='>'){
      $pos3=$i;
      $goon=false;
     }
    }
    if($pos3>0){
     $dta2=substr($data,$pos2,$pos3-$pos2+1);
     $dta2=str_replace('"','',$dta2); // remove all '"' 
     $pos4=stripos($dta2,'href=');
     if($pos4!==false){
      $dta2=substr($dta2,$pos4+5);
      $pos5=stripos($dta2,' ');
      if($pos5!==false){
       $manifest=substr($dta2,0,$pos5);
      }else{
       $pos5=stripos($dta2,'>');
       if($pos5!==false){
        $manifest=substr($dta2,0,$pos5);
       }
      }
     }
    }
   }
  }
 }
 curl_close($ch);
 
 $fichier0=rawurlencode($v1).'.html';
 if($fdhtml=fopen($fichier0,'w')){ fwrite($fdhtml, $data ); fclose($fdhtml); }
 
 
 if($manifest!=''){
  $manifUrl='';
  if(strpos($manifest,'https://')!==false){
   $manifUrl=$manifest;
  }else{
   if(substr($manifest,0,1)=='/'){
    $pos1=strpos($v1,'/',8);
    if($pos1!==false){
     $manifUrl=substr($v1,0,$pos1).$manifest;
    }
   }else{
    $pos1=strrpos($v1,'/');
    if($pos1!==false){
     $manifUrl=substr($v1,0,$pos1).'/'.$manifest;
    }
   }
  }
  if($manifUrl!=''){
   $ch=curl_init();

   curl_setopt($ch, CURLOPT_HEADER         , 0);
   curl_setopt($ch, CURLOPT_URL            , $manifUrl );
   curl_setopt($ch, CURLOPT_HEADER         , 0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
   curl_setopt($ch, CURLOPT_TIMEOUT        , 5);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
   curl_setopt($ch, CURLOPT_USERAGENT      ,'Mozilla/5.0 (Linux; Android 6.0;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36');

   $manifestContent=curl_exec($ch);
   $curlinfo2=curl_getinfo($ch);
   curl_close($ch);
   $fichier2=rawurlencode($v1).'.manifest.json';
   if($fdmani=fopen($fichier2,'w')){ fwrite($fdmani, $manifestContent ); fclose($fdmani); }
   if(!isset($curlinfo2['http_code']) || $curlinfo2['http_code']!=200){
    echo __LINE__ . ' manifest url "' . $manifUrl . '" not pinged !' . "\r\n" ;   
   }
   
   $fichier1=rawurlencode($v1).'.lighthouse.json';   
   // launch lighthouse : adjust the path to reach thr lighthouse.cmd
   // --skip-audits errors-in-console : skip errors in console because if you have a google analytics or a google adsense, some errors are logged, even if they are google products !!!!
   // --max-wait-for-load 10000       : after 10 seconds, abort !!
   
   // C:\Users\user1\AppData\Roaming\npm\lighthouse.cmd https://www.google.com/logos/fnbx/solitaire/standalone.html  --max-wait-for-load 5000 --skip-audits errors-in-console --quiet --output json >https%3A%2F%2Fwww.google.com%2Flogos%2Ffnbx%2Fsolitaire%2Fstandalone.html.lighthouse.json
   // C:\Users\user1\AppData\Roaming\npm\lighthouse.cmd https://www.google.com/logos/fnbx/solitaire/standalone.html  --throttling.rttMs --max-wait-for-load 5000 --skip-audits errors-in-console --quiet --output json >https%3A%2F%2Fwww.google.com%2Flogos%2Ffnbx%2Fsolitaire%2Fstandalone.html.lighthouse.json
   
   $cmd1='C:\\Users\\user1\\AppData\\Roaming\\npm\\lighthouse.cmd '.$v1.' --throttling.rttMs --max-wait-for-load 10000 --skip-audits errors-in-console --quiet --output json >'.$fichier1."\r\n";
   
   passthru($cmd1); // run it !

   $lesManifestsEtUrls[]=array(
    'manifest'        => $manifest,
    'manifestContent' => $manifestContent ,
    'url'             => $v1,
    'fichier'         => $fichier1,
    'fichhtml'        => $fichier0,
    'curlinfo1'       => $curlinfo1,
    'curlinfo2'       => $curlinfo2,
   );
   sleep(1); // relax 1 second
   
   
  }else{
   echo __LINE__ . ' manifest file not founded for url = ' . $v1 . "\r\n" ;
   
  }
  
 }else{
  echo __LINE__ . ' manifest reference not founded for url = ' . $v1 . "\r\n" ;
  
//  echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $data , true ) . '</pre>' ; exit(0);
  $title='no title';
  $pos1=stripos($data,'<title');
  if($pos1!==false){
   $pos2=-1;
   $goon=true;
//   echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = '.$pos1.' ' . var_export( substr($data,$pos1,100) , true ) . '' ; exit(0);
   for($i=$pos1;$i<strlen($data)&&$goon==true;$i++){
    if(substr($data,$i,1)=='>'){
     $pos2=$i;
     $goon=false;
    }
   }
   if($pos2>0){
//    echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = '.$pos2.' ' . var_export( substr($data,$pos2,100) , true ) . '' ; exit(0);
    $pos3=0;
    $goon=true;
    for($i=$pos2;$i<strlen($data)&&$goon==true;$i++){
     if(substr($data,$i,1)=='<'){
      $pos3=$i;
      $goon=false;
     }
    }
    if($pos3>0){
     $title=substr($data,$pos2+1,$pos3-$pos2-1);
//     echo __FILE__ . ' ' . __LINE__ . ' $dta2 = "' . $dta2 . '"' ; exit(0);
    }
   }
  }
  
  
  $fichier1=rawurlencode($v1).'.lighthouse.json';   
  // launch lighthouse : adjust the path to reach thr lighthouse.cmd
  // --skip-audits errors-in-console : skip errors in console because if you have a google analytics or a google adsense, some errors are logged, even if they are google products !!!!
  // --max-wait-for-load 10000       : after 10 seconds, abort !!
  $cmd1='C:\\Users\\user1\\AppData\\Roaming\\npm\\lighthouse.cmd '.$v1.' --throttling.rttMs --max-wait-for-load 5000 --skip-audits errors-in-console --quiet --output json >'.$fichier1."\r\n";
  // C:\Users\user1\AppData\Roaming\npm\lighthouse.cmd https://www.google.com/logos/fnbx/solitaire/standalone.html  --max-wait-for-load 5000 --skip-audits errors-in-console --quiet --output json >https%3A%2F%2Fwww.google.com%2Flogos%2Ffnbx%2Fsolitaire%2Fstandalone.html.lighthouse.json
  // throttlingMethod='devtools'
//  echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = ' . $cmd1  . '' ; exit(0);
  
  passthru($cmd1); // run it !

  $lesManifestsEtUrls[]=array(
//   'manifest'        => $manifest,
//   'manifestContent' => $manifestContent ,
   'url'             => $v1,
   'fichier'         => $fichier1,
   'fichhtml'        => $fichier0,
   'curlinfo1'       => $curlinfo1,
   'title'           => $title,
//   'curlinfo2'       => $curlinfo2,
  );
  
  
  
 }
}
//===============================================================================================================================
//===============================================================================================================================
function cmp01($a, $b){
 if($a['global-score'] == $b['global-score']) {
  if($a['curlinfo1']['total_time'] == $b['curlinfo1']['total_time']) {
   return 0;
  }
  return ($a['curlinfo1']['total_time'] < $b['curlinfo1']['total_time']) ? -1 : 1;
 }
 return ($a['global-score'] > $b['global-score']) ? -1 : 1;
} 
//===============================================================================================================================
//===============================================================================================================================

if(sizeof($lesManifestsEtUrls)>0){
 
 foreach( $lesManifestsEtUrls as $k1 => $v1 ){
  $fichier1=$v1['fichier'];
  $datajson=json_decode(file_get_contents($fichier1),true);
  if($datajson!==NULL){
   if(isset($v1['title'])){
    $lesManifestsEtUrls[$k1]['pwa-score']=0;
    $datajson['categories']['pwa']['score']=0;
   }
   $lesManifestsEtUrls[$k1]['pwa-score']            =number_format($datajson['categories']['pwa']['score'],2,'.','');
   $lesManifestsEtUrls[$k1]['performance-score']    =number_format($datajson['categories']['performance']['score'],2,'.','');
   $lesManifestsEtUrls[$k1]['accessibility-score']  =number_format($datajson['categories']['accessibility']['score'],2,'.','');
   $lesManifestsEtUrls[$k1]['best-practices-score'] =number_format($datajson['categories']['best-practices']['score'],2,'.','');
   $lesManifestsEtUrls[$k1]['seo-score']            =number_format($datajson['categories']['seo']['score'],2,'.','');
   $lesManifestsEtUrls[$k1]['global-score']         =number_format(($datajson['categories']['pwa']['score']*10+                   // weight = 10
                                                                    $datajson['categories']['performance']['score']*4+            // weight =  4
                                                                    $datajson['categories']['accessibility']['score']*3+          // weight =  3
                                                                    $datajson['categories']['best-practices']['score']*2+         // weight =  2
                                                                    $datajson['categories']['seo']['score']*1)/20 , 5 ,'.','');   // weight =  1
   $lesManifestsEtUrls[$k1]['curl-total_time']      =$v1['curlinfo1']['total_time'];
                                                                       
  }                            
 }
 foreach( $lesManifestsEtUrls as $k1 => $v1 ){
  if(!isset($v1['global-score'])){
   unset($lesManifestsEtUrls[$k1]);
  }
 }
// echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $lesManifestsEtUrls , true ) . '</pre>' ; exit(0);
 
 if(sizeof($lesManifestsEtUrls)>0){
  usort($lesManifestsEtUrls,'cmp01');
  if($fd=fopen('out1.csv','w')){
   $line= 'url;pwa;performance;accessibility;best-practices;seo;score (10*pwa+5*perf+4*accs+3*bstPr+2*seo+1*curl total_time)' ."\r\n";
   fwrite($fd,$line);
   foreach( $lesManifestsEtUrls as $k1 => $v1 ){
    $line='"'.$v1['url'].'";' . 
     '"'.str_replace('.',',',$v1['pwa-score'])                . '";' . // in french, the decimal separator is the comma "," and not the point "."
     '"'.str_replace('.',',',$v1['performance-score'])        . '";' .
     '"'.str_replace('.',',',$v1['accessibility-score'])      . '";' .
     '"'.str_replace('.',',',$v1['best-practices-score'])     . '";' .
     '"'.str_replace('.',',',$v1['seo-score'])                . '";' .
     '"'.str_replace('.',',',$v1['global-score'])             . '";' .
     '"'.str_replace('.',',',$v1['curl-total_time'])          . '";' .
     "\r\n" ;
    fwrite($fd,$line);
   }
   foreach($urls as $k1 => $v1){
    $trouve=false;
    foreach( $lesManifestsEtUrls as $k2 => $v2 ){
     if($v2['url']==$v1){
      $trouve=true;
      break;
     }
    }
    if($trouve==false){
     $line=$v1.';0;0;0;0;0;0'."\r\n" ;
     fwrite($fd,$line);
 //    echo $line;
    }
   }
   fclose($fd);
  }
  
  if($fdlesManifestsEtUrls=fopen('lesManifestsEtUrls.php','w')){ 
   fwrite($fdlesManifestsEtUrls, '<'.'?php'."\r\n".'$lesManifestsEtUrls=' . var_export( $lesManifestsEtUrls,true ) .';' ); 
   fclose($fdlesManifestsEtUrls); 
  }
  
  

  // build the final html file
  if($fd=fopen('lighthouse-score-rank-for-pwa.html','w')){
   $count=0;
/*   
   foreach($lesManifestsEtUrls as $k1=> $v1){
    $jsonMan=json_decode($v1['manifestContent'],true);
    if(!is_null($jsonMan)){
    }
   }
*/   
   $count++;
   $line='';
   
   $line.='<html lang="en">'."\r\n";
   $line.='<head>'."\r\n";
   $line.='<meta charset="utf-8">'."\r\n";
   $line.='<title>lighthouse score rank for pwa</title>'."\r\n";
   $line.='<meta name="mobile-web-app-capable" content="yes" />'."\r\n";
   $line.='<meta name="viewport" content="width=device-width, initial-scale=1">'."\r\n";
   $line.='<meta name="description" content="Pwa ranking according to the lighthouse score, lighthouse is the the tool present in google chrome to audit web apps." />'."\r\n";
   $line.='<meta name="keywords" content="pwa,directory,rank,lighthouse,google chrome" />'."\r\n";
   $line.='<meta name="author" content="Hugues Koolsol" />'."\r\n";
   $line.='<meta name="Content-Language" content="en" />'."\r\n";
   $line.='<meta name="google" content="notranslate" />'."\r\n";
   $line.='<meta property="og:title" content="lighthouse score rank for pwa" />'."\r\n";
   $line.='<meta property="og:description" content="pwa ranking according to the lighthouse score, lighthouse is the the tool present in google chrome to audit web apps." />'."\r\n";
   $line.='<meta property="og:type" content="website" />'."\r\n";
   $line.='<meta property="og:site_name" content="www.mypitself.com">'."\r\n";
   
   $line.='<style type="text/css">'."\r\n";
   $line.=' body{font-family:arial;font-size:16px;box-sizing: border-box;margin: 0;padding: 0;font-color:#333;}'."\r\n";
   $line.=' h1{text-align:center;}'."\r\n";
   $line.=' table{border:1px #ddd solid;border-collapse: collapse;}'."\r\n";
   $line.=' td{text-align:center;border:1px #ddd solid;}'."\r\n";
   $line.=' td.centered{text-align:center;}'."\r\n";
   $line.=' a.l1,a.l1:visited{color:#444;background:#fefefe;display:inline-block;padding:2px;border:0;box-shadow: 2px 2px 2px #222;border-radius:3px;text-decoration:none;margin-top:3px;}'."\r\n";
   $line.=' img{border:0;box-shadow: 2px 2px 2px #222;border-radius:3px;}'."\r\n";
   $line.=' p{margin:15px auto;width:100%;text-align:justify;padding:3px;max-width:600px;line-height:1.5em;}'."\r\n";
   $line.='</style>'."\r\n";

   $line.='</head>' ."\r\n";
   $line.='<body>' ."\r\n";
   $line.='<h1>lighthouse score rank for some of pwas that I like !</h1>' ."\r\n";
   $line.='<p>Pwa ranking according to the lighthouse score. Lighthouse is the the tool present in google chrome to audit web apps.</p>' ."\r\n";
   $line.='<p>The score is computed with this formula : 10*pwa + 4*performance + 3*accessibility + 2*best-practices + 1*seo and in case of equality, the curl time in seconds makes the difference<p>' ."\r\n";
   $line.='<p>The php source file that produces this list is here : <a target="_blank" href="https://github.com/hugues-koolsol/lighthouse">https://github.com/hugues-koolsol/lighthouse</a></p>' ."\r\n";
   $line.='<p>Last update : '.date('Y-m-d').'</p>' ."\r\n";
   $line.='<table style="margin:5px auto;">' ."\r\n";
   $line.='<tr>' ."\r\n";
   $line.='<th>Rank<br />score</th>' ."\r\n";
   $line.='<th>apps ('.sizeof($lesManifestsEtUrls).')</th>' ."\r\n";
   $line.='<th colspan="5" style="max-width:50%;font-size:0.8em;">pwa|perf.|accessi.<br />bst-practi.|seo</th>' ."\r\n";
   $line.='<th style="font-size:0.8em;">curl time <br />seconds</th>' ."\r\n";
   $line.='</tr>' ."\r\n";
   fwrite($fd,$line);
   $rank=0;
   $rankGlobal=0;
   $scorePrec=0;
   foreach($lesManifestsEtUrls as $k1=> $v1){
    $manifestContent=isset($v1['manifestContent'])?$v1['manifestContent']:'';
    $jsonMan=json_decode($manifestContent,true);
    $icon='';
    if(!is_null($jsonMan)){
     foreach($jsonMan['icons'] as $k2 => $v2){
      if($icon==''){
       $sizes=$v2['sizes'];
       if($sizes=='16x16'){
        
       }else{
        $icon=$v2['src'];
        if(substr($icon,0,1) == '/'){ //$v1['url'])
         $pos1=strpos($v1['curlinfo2']['url'],'/',8);
         if($pos1!==false){
          $icon=substr($v1['curlinfo2']['url'],0,$pos1).$icon;
         }
        }else if(substr($icon,0,8) == 'https://'){
         $icon=$icon;
        }else{
         $pos1=strrpos($v1['curlinfo2']['url'],'/');
         if($pos1!==false){
          $icon=substr($v1['curlinfo2']['url'],0,$pos1).'/'.$icon;
         }       
        }
       }
      }
     }
    }
    if($icon==''){
//     echo __LINE__ . ' icon not founded = <pre>' . var_export( $v1 , true ) . '</pre>' ; 
    }
    $score=substr($v1['global-score'],0,6);
    $rankGlobal++;
    if($scorePrec!=$score){
     $rank=$rankGlobal; 
    }
    $scorePrec=$score;
    if($count!=1){
     $couleur=(255/($count-1))*$rank-(255/($count-1));
    }else{
     $couleur=0;      
    }
    $couleurHex=dechex($couleur);
    $couleurHex=strlen($couleurHex)==1?'0'.$couleurHex:$couleurHex;
    if($rank==1){
     $theColor='009400';
     $theBorderColor='border:2px red solid;';
    }else{
     $theColor=$couleurHex.'ff00';
     $theBorderColor='border:2px #'.$couleurHex.'ff00'.' solid;';
     $theBorderColor='';
    }
    
    $line='<tr>'.
     '<td class="centered" style="background-color:#'.$theColor.';'.$theBorderColor.';color:'.($score=='1.0000'?'#eaf59c':'#333').';">'.$rank.'/'.sizeof($lesManifestsEtUrls).'<br />'.($score=='1.0000'?'100':substr($score*100,0)). '</td>' .
     '<td class="centered" style="background:'.(isset($jsonMan['theme_color'])?$jsonMan['theme_color']:'#ffffff').';'.$theBorderColor.'">'.
     '<table  style="width:100%;border:0;"><tr>'.
      '<td style="width:50px;border:0;"><a target="_blank" href="'.$v1['url'].'" title="'.(isset($jsonMan['description'])?htmlentities($jsonMan['description'],ENT_COMPAT,'UTF-8'):'').'">'.
      ''.($icon!=''?'<img src="'.$icon.'" height="48" width="48" />':'').''.
      '</a></td>'.
      '<td style="text-align:center;width:200px;border:0;">';
    if(isset($v1['title'])){
     $line.=''.
       '<a class="l1" target="_blank" href="'.$v1['url'].'">'.
       ''.$v1['title'].'</a>';
     
    }else{
     $line.=''.
       '<a class="l1" target="_blank" href="'.$v1['url'].'" title="'.(isset($jsonMan['description'])?htmlentities($jsonMan['description'],ENT_COMPAT,'UTF-8'):'').'">'.
       ''.(isset($jsonMan['name'])?$jsonMan['name']:$v1['url']).'</a>';
     
    }
    $line.=''.
      '</td>'.
      '</tr></table></td>' . 
     '<td colspan="5" style="background-color:#'.$theColor.';max-width:50%;font-size:0.9em;'.$theBorderColor.'">'                 .
     '' .($v1['pwa-score']           =='1.00'?'1':substr($v1['pwa-score'],1))                .
     '|'.($v1['performance-score']   =='1.00'?'1':substr($v1['performance-score'],1))       .
     '|'.($v1['accessibility-score'] =='1.00'?'1':substr($v1['accessibility-score'],1))     .
     '|'.($v1['best-practices-score']=='1.00'?'1':substr($v1['best-practices-score'],1))    .
     '|'.($v1['seo-score']           =='1.00'?'1':substr($v1['seo-score'],1))               .
     '<br />'.(isset($v1['curlinfo2']['url'])?'<a style="display:block;width:80%;margin:3px auto;" class="l1" target="_blank" href="'.$v1['curlinfo2']['url'].'" style="float:right;" >manifest</a>':'').'' .
     ''.'</td>' ;
    $line.='<td style="background-color:#'.$theColor.';max-width:50%;font-size:0.9em;'.$theBorderColor.'">'.number_format($v1['curl-total_time'],2,'.',' ').'</td>';
    $line.=''."</tr>\r\n" ;
    fwrite($fd,$line);
   }
   $line= '</table>'."\r\n";  fwrite($fd,$line);
   
   $line='<p>This list has been updated the '.date('Y-m-d').'<p>' ."\r\n";
   fwrite($fd,$line);
   $line='<p>Do not forget to play koolsol ;-) <a target="_blank" href="https://www.koolsol.com/">https://www.koolsol.com/</a></p>' ."\r\n";
   fwrite($fd,$line);
   
   @include('lighthouse-write-google-tag.php'); // optional : writes the google analytics code at the end of the file ( see the source genetated at the end of this page : http://www.mypitself.com/lighthouse-score-rank-for-pwa.html)
   
   
   
   $line= '</body>' ."\r\n";  fwrite($fd,$line);
   $line= '</html>' ."\r\n";  fwrite($fd,$line);
   fclose($fd);
  }
    
  
  
  
 
 
 }
}
echo "Good job!";

exit(0);
