<?php
// run this in a directory with these command lines:
// cd c:\path_to_lighthouse001.php
// c:\path_to_php_bin_directory\php.exe -q lighthouse001.php
// it will create json and html file for each url
// it will create a out1.csv                            
// it will create a lighthouse-score-rank-for-pwa.html  


// for the ones commented, the manifest file has non been founded
$urls=array(  
 'https://www.labrador-retrievers.com.au/labrador-puppies-for-sale-in-nsw-australia/',
 'https://amp-playground.firebaseapp.com/', // KO
 'https://hnpwa-vanilla.firebaseapp.com/?page=1',
 'https://www.cinelah.com/',
 'https://next-hnpwa.now.sh/',
 'https://chemist.li/',
 'https://grrd01.github.io/Puzzle/index.html',
 'https://roneetkumar.github.io/webstore/index.html?homescreen=1',
 'https://chi.miantiao.me/',
 'https://www.bestprice.gr/',
 'https://appsco.pe/',
 'https://tubealert.co.uk/',
 'https://calculator.iondrimbafilho.me/',
 'https://abrah.am/',
 'https://blog.nfz.moe/?pwa=true',
 'https://schsrch.xyz/',
 'https://ecmasyntax.io/about',
 'https://iot.gdedeck.com/',
 'https://preact-pwa.appspot.com/',
 'https://adaptivewebdesign.info/1st-edition/read/index.html',
 'https://aidoru.tk/',
 'https://www.sscheduler.com/v3/index.php?launcher=true',
 'https://www.ventureharbour.com/',
 'https://helloworldemojis.hwalab.com/',
 'https://vrixe.com/app/pwa.html',
 'https://www.koolsol.com/',
 'https://mcslite.netlify.com/index.html',
 'https://www.vitormalencar.com/?utm_medium=web_app_manifest',
 'https://www.zpeed.in/', //
 'https://restbasis.com/about',
 'https://sii.im/playground/takt/index.html',
 'https://know-it-all.io/',
 'https://gusachenko.github.io/',
 'https://savewater.rmartinplumbing.com/index.html',
 'https://lao-helper.firebaseapp.com/',
 'https://www.project-a.com/en',
 'https://www.istitlaa.me/?standalone=true',
 'https://www.polymer-project.org/',
 'https://pwa-directory.appspot.com/',
 'https://dev.to/',
 'https://salvacam.js.org/polenGranada/',
 'https://tomrobertshaw.net/index.html',
 'https://outweb.io/',
 'https://paulhoughton.github.io/preact-pwa/#/',
 'https://paleoleap.com/',
 'https://pwa-rocks.nl/',
 'https://www.alpertron.com.ar/ECM.HTM?launcher=true',
 'https://angular.io/',
 'https://shop.polymer-project.org/',
 'https://browsersync.io/',
 'https://grrd01.github.io/Dice/index.html',
 'https://vuepress.vuejs.org/',
 'https://www.infiniteimaginations.co/index.html#/hello/',
 'https://airhorner.com/',
 'https://so-pwa.firebaseapp.com/',
 'https://headline.tooo.io/',
 'https://expancio.com/',
 'https://getunitrack.com/',
 'https://amp.scrabble123.net/',
 'https://linuxhub.it/pwa/index.html',
 'https://thenotquiz.com/',
 'https://m.reliefweb.int/',
 'https://michaelhsu.tw/index.html',
 'https://pwa.ng/',
 'https://ergenekonyigit.github.io/',
 'https://huffduffer.com/',
 'https://www.stevepdp.com/noise-machine/index.html',
 'https://noushevr.github.io/',
 'https://use-the-platform.com/periodic-weather/',
 'https://www.leasingrechnen.at/',
 'https://www.afdb.org/en/',
 'https://closerinti.me/',
 'https://www.limeroad.com/?start_url=WEBAPP',
 'https://www.chromestatus.com/features',
 'https://hnpwa-firebase.firebaseapp.com/',
 'https://marvelapi.iondrimbafilho.me/',
 'https://wow-character-lookup.firebaseapp.com/',
 'https://ng-pokedex.firebaseapp.com/pokemon',
 'https://wickeyappstore.com/',
 'https://relaxing.world/',
 'https://shapeshifter.design/',
 'https://nhm.ac.uk/naturenauts/register',
 'https://tomitm.github.io/appmanifest/',
 'https://advent-calendar.glitch.me/',
 'https://pwa.topicdeck.com/',
 'https://www.restorebin.com/',
 'https://igenapps.com/',
 'https://milanojs.com/',
 'https://snake-pwa.github.io/',
 'https://www.womentechmakers.com/',
 'https://1tuner.com/',
 'https://www.decorpad.com/amp/?homescreen=1',
 'https://www.tailorpost.com/de-at/',
 'https://wetainment.com/',
 'https://grrd01.github.io/4inaRow/index.html',
 'https://feuerwehr-eisolzried.de/',
 'https://m.weibo.cn/',
 'https://fr.mappy.com/',
 'https://dk.trustpilot.com/',
 'https://avia.yandex.ua/?utm_medium=link',
 'https://www.euroki.org/?utm_medium=pwa-icon',
 
// 'https://shuttling.org/', // KO
// 'https://material.money/', // KO
// 'https://instasee.me/', // KO
// 'https://ademola.adegbuyi.me/', // KO
// 'https://pwa.compellia.com/', // KO
// 'https://ibmc.site/', // KO
// 'https://joelhanson.ml/index.html', // KO
// 'https://saka7.github.io/esoteric-schedule', // KO
// 'https://developers.google.com/web/tools/workbox/', // KO
// 'https://helloworldpwa.applbr.com/', // KO
// 'https://state-of-the-web.com/', // KO
// 'https://www.progressivewebflap.com/index.html', // KO


// 'https://vue-hn.now.sh/top', // not 100 % pwa

// canary 69.0.3488.0 bugs on these pages when an action is done

// Error: connect EADDRINUSE 127.0.0.1:53134    at Object._errnoException (util.js:1022:11)       at _exceptionWithHostPort (util.js:1044:20)     at TCPConnectWrap.afterConnect [as oncomplete] (net.js:1198:14)


);
/*
// for test only, reduce the size of the array of urls
$urls=array(  
 'https://airhorner.com/',
 'https://closerinti.me/',
 'https://www.koolsol.com/',
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
   $cmd1='C:\\Users\\user1\\AppData\\Roaming\\npm\\lighthouse.cmd '.$v1.'  --max-wait-for-load 10000 --skip-audits errors-in-console --quiet --output json >'.$fichier1."\r\n";
   
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
 }
}
//===============================================================================================================================
//===============================================================================================================================
function cmp01($a, $b){
 if($a['global-score'] == $b['global-score']) {
  if($a['url'] == $b['url']) {
   return 0;
  }
  return ($a['url'] < $b['url']) ? -1 : 1;
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
  }                            
 }
 foreach( $lesManifestsEtUrls as $k1 => $v1 ){
  if(!isset($v1['global-score'])){
   unset($lesManifestsEtUrls[$k1]);
  }
 }
 
 if(sizeof($lesManifestsEtUrls)>0){
  usort($lesManifestsEtUrls,'cmp01');
  if($fd=fopen('out1.csv','w')){
   $line= 'url;pwa;performance;accessibility;best-practices;seo;score (10*pwa+4*perf+3*accs+2*bstPr+1*seo)' ."\r\n";
   fwrite($fd,$line);
   foreach( $lesManifestsEtUrls as $k1 => $v1 ){
    $line='"'.$v1['url'].'";' . 
     '"'.str_replace('.',',',$v1['pwa-score'])                . '";' . // in french, the decimal separator is the comma "," and not the point "."
     '"'.str_replace('.',',',$v1['performance-score'])        . '";' .
     '"'.str_replace('.',',',$v1['accessibility-score'])      . '";' .
     '"'.str_replace('.',',',$v1['best-practices-score'])     . '";' .
     '"'.str_replace('.',',',$v1['seo-score'])                . '";' .
     '"'.str_replace('.',',',$v1['global-score'])             . '";' .
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
   foreach($lesManifestsEtUrls as $k1=> $v1){
    $jsonMan=json_decode($v1['manifestContent'],true);
    if(!is_null($jsonMan)){
     $count++;
    }
   }
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
   $line.='<h1>lighthouse score rank for pwa</h1>' ."\r\n";
   $line.='<p>Pwa ranking according to the lighthouse score. Lighthouse is the the tool present in google chrome to audit web apps.</p>' ."\r\n";
   $line.='<p>The score is computed with this formula : 10*pwa + 4*performance + 3*accessibility + 2*best-practices + 1*seo<p>' ."\r\n";
   $line.='<p>The php source file that produces this list is here : <a target="_blank" href="https://github.com/hugues-koolsol/lighthouse">https://github.com/hugues-koolsol/lighthouse</a></p>' ."\r\n";
   $line.='<table style="margin:5px auto;">' ."\r\n";
   $line.='<tr>' ."\r\n";
   $line.='<th>Rank<br />score</th>' ."\r\n";
   $line.='<th>apps ('.$count.')</th>' ."\r\n";
   $line.='<th colspan="5" style="max-width:50%;font-size:0.8em;">pwa|perf.|accessi.<br />bst-practi.|seo</th>' ."\r\n";
   $line.='</tr>' ."\r\n";
   fwrite($fd,$line);
   $rank=0;
   $rankGlobal=0;
   $scorePrec=0;
   foreach($lesManifestsEtUrls as $k1=> $v1){
     
    $jsonMan=json_decode($v1['manifestContent'],true);
    if(!is_null($jsonMan)){
     $icon='';
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
     if($icon==''){
      echo __LINE__ . ' icon not founded = <pre>' . var_export( $v1 , true ) . '</pre>' ; 
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
      '<td class="centered" style="background-color:#'.$theColor.';'.$theBorderColor.';color:'.($score=='1.0000'?'#eaf59c':'#333').';">'.$rank.'/'.$count.'<br />'.($score=='1.0000'?'100':substr($score*100,0)). '</td>' .
      '<td class="centered" style="background:'.(isset($jsonMan['theme_color'])?$jsonMan['theme_color']:'#ffffff').';'.$theBorderColor.'">'.
      '<table  style="width:100%;border:0;"><tr>'.
       '<td style="width:50px;border:0;"><a target="_blank" href="'.$v1['url'].'" title="'.(isset($jsonMan['description'])?htmlentities($jsonMan['description'],ENT_COMPAT,'UTF-8'):'').'">'.
       '<img src="'.$icon.'" height="48" width="48" /> '.
       '</a></td>'.
       '<td style="text-align:center;width:200px;border:0;"><a class="l1" target="_blank" href="'.$v1['url'].'" title="'.(isset($jsonMan['description'])?htmlentities($jsonMan['description'],ENT_COMPAT,'UTF-8'):'').'">'.
       ''.(isset($jsonMan['name'])?$jsonMan['name']:$v1['url']).'</td>'.
       '</tr></table></td>' . 
      '<td colspan="5" style="background-color:#'.$theColor.';max-width:50%;font-size:0.9em;'.$theBorderColor.'">'                 .
      '' .($v1['pwa-score']           =='1.00'?'1':subsr($v1['pwa-score'],1))                .
      '|'.($v1['performance-score']   =='1.00'?'1':substr($v1['performance-score'],1))       .
      '|'.($v1['accessibility-score'] =='1.00'?'1':substr($v1['accessibility-score'],1))     .
      '|'.($v1['best-practices-score']=='1.00'?'1':substr($v1['best-practices-score'],1))    .
      '|'.($v1['seo-score']           =='1.00'?'1':substr($v1['seo-score'],1))               .
      '<br /><a style="display:block;width:80%;margin:3px auto;" class="l1" target="_blank" href="'.$v1['curlinfo2']['url'].'" style="float:right;" >manifest</a>' .
      ''.'</td>' .
      "</tr>\r\n" ;
     fwrite($fd,$line);
    }
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
