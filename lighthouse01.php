<?php
// run this in a directory with these command lines:
// cd c:\path_to_lighthouse001.php
// c:\path_to_php_bin_directory\php.exe -q lighthouse001.php
// it will create json and html file for each url
// it will create a out1.csv                            
// it will create a lighthouse-score-rank-for-pwa.html  
// To install lighthouse on your pc, install node then run:
// npm install -g lighthouse


// for the ones commented, the manifest file has non been founded
$urls=array(  // the apps I like :-)
 
 // the best lighthouse scores first
 'https://memory.koolsol.app/',    // ;-)
 'https://sudoku.koolsol.app/',    // ;-)
 'https://todo.koolsol.app/',      // ;-)
 'https://syllabes.koolsol.app/',  // ;-)
 'https://www.koolsol.app/',       // ;-)
 'https://www.koolsol.com/',       // ;-) // test to see if .app and .com are different even if it is the same app on the same server.
 'https://minesweeper.koolsol.app/',
 'https://freesolitaire.win/',
 'https://grrd01.github.io/TicTacToe/index.html',
 'https://calculator.iondrimbafilho.me/',
 'https://www.timroes.de/'     ,   // 100
 'https://tcg.loke.dev/?standalone=true',
 'https://rotavo-pwa.firebaseapp.com/',
 'https://rgbtohex.samdlc.com/',
 'https://mastermind.jull.dev/',
 'https://sudoku.jull.dev/',
 'https://janzbinden.github.io/tictactoe/',
 'https://yelli.com/',
 'https://findpwa.com/',
 'https://pwapps.co/',

 'https://pwa-directory.appspot.com/',
 'https://appsco.pe/',
 'https://pwa-store.firebaseapp.com/',
 'https://airhorner.com/',
 'https://grrd01.github.io/4inaRow/index.html',
 'https://grrd01.github.io/Puzzle/index.html',
 'https://grrd01.github.io/Dice/index.html',
 'https://maaatch.games/',
 'https://stopwatch-app.com/',
 'https://minesweeper.now.sh/',
 'https://proxx.app/', // the google proxx does not work on ie and is not so good on lighthouse ( do google teams meet or speak together ? )
 'https://squoosh.app/',
 'https://typing.octet.app/',
 'https://stammel.net/projekte/sfxr/',
 'http://appsmartpush.com/',

 // 100% on pwa-directory to check
 'https://www.climasurgba.com.ar/menu',
 'https://cloudfour.com/',
 'https://www.valor-dolar.cl/',
 'https://www.mankier.com/',
 
 // I like solitaire games but many of them are not pwas and I think games should have an offline mode.
 'https://www.solitaire-web-app.com/',
 'https://www.google.com/logos/fnbx/solitaire/standalone.html',
 'https://www.jeu-du-solitaire.com/',
 'https://www.planet.fr/jeu-solitaire',
 'https://www.solitaire-klondike.com/klondike.html',
 'https://games.aarp.org/games/klondike-solitaire-new', // 
 'https://www.solitaire-play.com/',
 'https://poki.com/en/g/poki-klondike-solitaire',
 'https://www.gralon.net/jeux-en-ligne/jeu-solitaire.htm',
 'https://www.vivenoel.com/calendrier/2dec.htm',
 'https://cardgames.io/solitaire/',
 'http://pasjans-online.pl/',
 'http://www.mathster.com/games/solitaire/',
 'http://solitaires-online.com/',
 'http://www.10001games.fr/jeu/klondike-solitaire',
 
// 'https://gameclock.app/#/', // does not exist anymore
// 'https://tldr.hackeryogi.com', // manifest file not founded for url
// 'https://outweb.io/', // does not exist anymore
// 'https://games.softgames.com/games/best-classic-solitaire/gamesites/844/locale/en', // no picto
// 'https://games.gameboss.com/klondikesolitaire/index.html?lang=fr', // good game but no picto
// 'https://www.solitr.com/klondike-turn-one', // no picto
// 'https://lowerspendings.com/',  // KO
// 'https://worldofsolitaire.com/fr/', // Runtime error encountered: Lighthouse was unable to reliably load the page you requested. Make sure you are testing the correct URL and that the server is properly responding to all requests. (Details: net::ERR_CONNECTION_CLOSED)
// 'http://www.jeusolitairegratuit.fr/jeux-de-cartes-gratuits-en-ligne.php?jeu-de-cartes-en-ligne=20', // gameboss, voir plus haut
// 'https://games.washingtonpost.com/games/klondike-solitaire/', // Runtime error encountered: Lighthouse was unable to reliably load the URL you requested because the page stopped responding.
// 'https://solitaire.frvr.com/', // good game but does not work on private mode anymore
// 'https://www.20minutes.fr/services/solitaire', // not on mobile
// 'https://www.lci.fr/jeux/solitaire/', // not mobile iframe sur https://jeux-dot-metronews-compute-plateform.appspot.com/solitaire-mobile#content
// 'http://www.classic-solitaire.com/', // does not work on mobile
// 'http://solitaire-jeu.eu/', // same as http://solitaires-online.com/
// 'https://www.klondikesolitaire.net/', // good game on web but not on mobile
// 'https://www.solitairejeux.com/jeu/Pirate+Klondike', // pubs invasives
// 'http://www.4j.com/Solitaire-Master', // pub invasive
// 'https://jeux-dot-metronews-compute-plateform.appspot.com/solitaire#content', // add on first page
// 'http://jeux.meteocity.com/games/klondike-solitaire/', // bad score same as latimes, lemonde and meteo
// 'http://jeux.lemonde.fr/games/klondike-solitaire/', // bad score
// 'http://www.jeusolitaire.fr/jouerausolitaire/solitaire.php', // bad score
// 'http://games.latimes.com/games/klondike-solitaire/', // bad score same as latimes, lemonde and meteo
// 'http://www.jeux.fr/jeu/solitaire-classique', // bad score
);

/*
// for test only, reduce the array of urls
$urls=array(  
 'https://maaatch.games/',
 'https://www.koolsol.com/',
 'https://memory.koolsol.app/',
// 'https://todo.koolsol.app/',
// 'https://grrd01.github.io/4inaRow/index.html',
// 'https://www.koolsol.com/',
// 'https://freesolitaire.win/',
);
*/


/*
// these url are suppose to be 100 for pwa-directory
$urls=array(  
 'https://memory.koolsol.app/',                // 100 :-) my reference
 'https://minesweeper.koolsol.app/',
// 'https://whatsadd.tools/' ,                 // 99.1
// 'https://pwatictactoe.web.app/index.html',  // 99.55
// 'https://hnpwa-vanilla.firebaseapp.com/',   // 97.6
// 'https://madskristensen.net/' ,             // 98.5
// 'https://jcl.cz/',                          // 93.9
// 'https://ehazi.hu/',                        // 92.8
);
*/
//===============================================================================
function find1( $what , $contentOf , $body){ // find the manifest file name
 $ret='';
 $pos1=stripos($body,$what);
 if($pos1!==false){
  $pos2=-1;
  $goon=true;
  
  for($i=$pos1;$i>=0&&$goon==true;$i--){
   if(substr($body,$i,1)=='<'){
    $pos2=$i;
    $goon=false;
   }
  }
  if($pos2>0){
   $pos3=0;
   $goon=true;
   for($i=$pos2;$i<strlen($body)&&$goon==true;$i++){
    if(substr($body,$i,1)=='>'){
     $pos3=$i;
     $goon=false;
    }
   }
   if($pos3>0){
    $dta2=substr($body,$pos2,$pos3-$pos2+1);
    $pos4=stripos($dta2,$contentOf);
    if($pos4!==false){
     $dta2=substr($dta2,$pos4+strlen($contentOf));
     $pos5=stripos($dta2,'"');
     if($pos5!==false){
      $ret=substr($dta2,0,$pos5);
     }
    }
   }
  }
 }
 return $ret;
 
}
//===============================================================================
function find2( $what , $contentOf , $body){ // find the manifest file name without "
 $ret='';
 $pos1=stripos($body,$what);
 if($pos1!==false){
  $pos2=-1;
  $goon=true;
  for($i=$pos1;$i>=0&&$goon==true;$i--){
   if(substr($body,$i,1)=='<'){
    $pos2=$i;
    $goon=false;
   }
  }
  if($pos2>0){
   $pos3=0;
   $goon=true;
   for($i=$pos2;$i<strlen($body)&&$goon==true;$i++){
    if(substr($body,$i,1)=='>'){
     $pos3=$i;
     $goon=false;
    }
   }
   if($pos3>0){
    $dta2=substr($body,$pos2,$pos3-$pos2+1);
    $dta2=str_replace('"','',$dta2); // remove all '"' 
    $pos4=stripos($dta2,$contentOf);
    if($pos4!==false){
     $dta2=substr($dta2,$pos4+5);
     $pos5=stripos($dta2,' ');
     if($pos5!==false){
      $ret=substr($dta2,0,$pos5);
     }else{
      $pos5=stripos($dta2,'>');
      if($pos5!==false){
       $ret=substr($dta2,0,$pos5);
      }
     }
    }
   }
  }
 }
 return $ret;
  
}
//===============================================================================
function find3($what,$body){ // find "<title" in the body
 $ret='';
 $pos1=stripos($body,$what);
 if($pos1!==false){
  $pos2=-1;
  $goon=true;
  for($i=$pos1;$i<strlen($body)&&$goon==true;$i++){
   if(substr($body,$i,1)=='>'){
    $pos2=$i;
    $goon=false;
   }
  }
  if($pos2>0){
   $pos3=0;
   $goon=true;
   for($i=$pos2;$i<strlen($body)&&$goon==true;$i++){
    if(substr($body,$i,1)=='<'){
     $pos3=$i;
     $goon=false;
    }
   }
   if($pos3>0){
    $ret=substr($body,$pos2+1,$pos3-$pos2-1);
   }
  }
 }
 
 return $ret;
}
//===============================================================================
function absoluteUrl1($ref,$baseUrl){
 $ret='';
 if(strpos($ref,'https://')!==false){
  $ret=$ref;
 }else{
  if(substr($ref,0,2)=='//'){
   $ref=substr($ref,1);
   $pos1=strrpos($ref,'/');
   $ref=substr($ref,$pos1);
  }
  if(substr($ref,0,1)=='/'){
   $pos1=strpos($baseUrl,'/',8);
   if($pos1!==false){
    $ret=substr($baseUrl,0,$pos1).$ref;
   }
  }else{
   $pos1=strrpos($baseUrl,'/');
   if($pos1!==false){
    $ret=substr($baseUrl,0,$pos1).'/'.$ref;
   }
  }
 }
 return $ret;
}
//===============================================================================

$dir1='temp';
if(!is_dir($dir1)){
 if(!mkdir($dir1,0777,true)){
  die(__LINE__ . ' impossible de créer le répertoire '.dir1);
 }
}
// two times first loops to wakeup the urls
for($i=0;$i<2;$i++){
 foreach( $urls as $k1 => $v1){
  echo __LINE__ . ' wake up url='. $v1."\r\n"; 
  $data='';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HEADER         , 0);
  curl_setopt($ch, CURLOPT_URL            , $v1 );
  curl_setopt($ch, CURLOPT_HEADER         , 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
  curl_setopt($ch, CURLOPT_TIMEOUT        , 5);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
  curl_setopt($ch, CURLOPT_USERAGENT      ,'Mozilla/5.0 (Linux; Android 6.0;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36');
  curl_setopt($ch, CURLOPT_ENCODING       , ''); // avoid gzip format
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION , true); // redirect
  $manifest='';
  $data=curl_exec($ch);
  $curlinfo1=curl_getinfo($ch);
  curl_close($ch);
  usleep(30000);
 }
}

$lesManifestsEtUrls=array();
$countUrl=0;
$sizeOfurls=sizeof($urls);
foreach( $urls as $k1 => $v1){
 $countUrl++;

 echo __LINE__ . ' ' . $countUrl . '/' . $sizeOfurls . ' url='. $v1."\r\n"; 
 $data='';
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_HEADER         , 0);
 curl_setopt($ch, CURLOPT_URL            , $v1 );
 curl_setopt($ch, CURLOPT_HEADER         , 0);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
 curl_setopt($ch, CURLOPT_TIMEOUT        , 5);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
 curl_setopt($ch, CURLOPT_USERAGENT      ,'Mozilla/5.0 (Linux; Android 6.0;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36');
 curl_setopt($ch, CURLOPT_ENCODING       , ''); // avoid gzip format
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION , true); // redirect
 $manifest='';
 $data=curl_exec($ch);
 $curlinfo1=curl_getinfo($ch);
 curl_close($ch);
 
// echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $curlinfo1 , true ) . '</pre>' ; 
// echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $data , true ) . '</pre>' ; 
 
 $descriptionHtml='';
 $descriptionHtml=find1('name="description"' , 'content="' , $data); 
// echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $descriptionHtml , true ) . '</pre>' ; exit(0);
 
 $manifest=find1('rel="manifest"' , 'href="' , $data);
 
 $htmlicon='';
 $htmlicon=find1('rel="shortcut icon"' , 'href="' , $data); //<link rel="shortcut icon" href="/favicon.ico">
 if($htmlicon!=''){
  $htmlicon=absoluteUrl1($htmlicon,$v1);
 }else{
  $htmlicon=find1('rel="icon"' , 'href="' , $data); //<link rel="shortcut icon" href="/favicon.ico">
  if($htmlicon!=''){
   $htmlicon=absoluteUrl1($htmlicon,$v1);
  }else{
   $htmlicon=find1('rel="apple-touch-icon"' , 'href="' , $data); //<link rel="shortcut icon" href="/favicon.ico">
   if($htmlicon!=''){
    $htmlicon=absoluteUrl1($htmlicon,$v1);
   }
  }
 }
// echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $htmlicon , true ) . '</pre>' ; exit(0);
 $typeIcone='gif';
 $dataFav='R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs';
 if($htmlicon!=''){
  $dataFav='';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HEADER         , 0);
  curl_setopt($ch, CURLOPT_URL            , $htmlicon );
  curl_setopt($ch, CURLOPT_HEADER         , 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
  curl_setopt($ch, CURLOPT_TIMEOUT        , 5);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
  curl_setopt($ch, CURLOPT_USERAGENT      ,'Mozilla/5.0 (Linux; Android 6.0;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36');
  curl_setopt($ch, CURLOPT_ENCODING       , ''); // avoid gzip format
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION , true); // redirect
  $dataFav=curl_exec($ch);
  $curlinfo0=curl_getinfo($ch);
//  echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $curlinfo0 , true ) . '</pre>' ; exit(0);
  curl_close($ch);
  if(!isset($curlinfo0['http_code']) || $curlinfo0['http_code']!=200 || ( isset($curlinfo0['content_type']) && $curlinfo0['content_type'] == 'text/html' ) ){
   $htmlicon='';
  }else{
   $dataFav=base64_encode($dataFav);
   $typeIcone=(strpos($htmlicon,'.png')!==false?'png':(strpos($htmlicon,'.gif')!==false?'gif':(strpos($htmlicon,'.jpg')!==false?'jpg':(strpos($htmlicon,'.ico')!==false?'ico':''))));
  }
 }

 
 if($htmlicon==''){
  $pos1=strpos($v1,'//');
  $pos2=strpos($v1,'/',$pos1+2);
  if($pos2!==null){
   $urlFav=substr($v1,0,$pos2).'/favicon.ico';
  }else{
   $urlFav=$v1.'/favicon.ico';   
  }
  $dataFav='';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HEADER         , 0);
  curl_setopt($ch, CURLOPT_URL            , $urlFav );
  curl_setopt($ch, CURLOPT_HEADER         , 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
  curl_setopt($ch, CURLOPT_TIMEOUT        , 5);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
  curl_setopt($ch, CURLOPT_USERAGENT      ,'Mozilla/5.0 (Linux; Android 6.0;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36');
  curl_setopt($ch, CURLOPT_ENCODING       , ''); // avoid gzip format
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION , true); // redirect
  $dataFav=curl_exec($ch);
  $curlinfo0=curl_getinfo($ch);
  curl_close($ch);
  if(isset($curlinfo0['http_code']) && $curlinfo0['http_code']==200 && isset($curlinfo0['content_type']) && $curlinfo0['content_type']!='text/html' && $curlinfo0['download_content_length']>50){
   $htmlicon=$urlFav;
   $typeIcone='ico';
   $dataFav=base64_encode($dataFav);
  }
 }
 
 
 $titleHtml='';
 $titleHtml=find3('<title',$data);
 if($titleHtml==''){
  $titleHtml=find1(' property="og:title"' , 'content="' , $data); // pas de title pour lemonde.fr  
 }
 
// echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $titleHtml , true ) . '</pre>' ; exit(0);
 
 
 if($manifest==''){ // for pwa-directory there is a rel=manifest without double quote around the value of the property rel !!!
  $manifest=find2('rel=manifest' , 'href=' , $data);
 }
 
// echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $manifest , true ) . '</pre>' ; exit(0);
 $fichier0='temp/'.rawurlencode($v1).'.html';
 if($fdhtml=fopen($fichier0,'w')){ fwrite($fdhtml, $data ); fclose($fdhtml); }
 
 if($manifest!=''){
  $manifUrl=absoluteUrl1($manifest,$v1);
  if($manifUrl!=''){
   $ch=curl_init();

   curl_setopt($ch, CURLOPT_HEADER         , 0);
   curl_setopt($ch, CURLOPT_URL            , $manifUrl );
   curl_setopt($ch, CURLOPT_HEADER         , 0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
   curl_setopt($ch, CURLOPT_TIMEOUT        , 5);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
   curl_setopt($ch, CURLOPT_USERAGENT      ,'Mozilla/5.0 (Linux; Android 6.0;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36');
   curl_setopt($ch, CURLOPT_ENCODING       , ''); // avoid gzip format
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION , true); // redirect

   $manifestContent=curl_exec($ch);
   
//   echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $manifestContent , true ) . '</pre>' ; exit(0);
   
   $curlinfo2=curl_getinfo($ch);
   curl_close($ch);
   $fichier2='temp/'.rawurlencode($v1).'.manifest.json';
   if($fdmani=fopen($fichier2,'w')){ fwrite($fdmani, $manifestContent ); fclose($fdmani); }
   if(!isset($curlinfo2['http_code']) || $curlinfo2['http_code']!=200){
    echo __LINE__ . ' manifest url "' . $manifUrl . '" not pinged !' . "\r\n" ;   
   }
   
   $fichier1='temp/'.rawurlencode($v1).'.lighthouse.json';   
   // launch lighthouse : adjust the path to reach thr lighthouse.cmd
   // --skip-audits errors-in-console : skip errors in console because if you have a google analytics or a google adsense, some errors are logged, even if they are google products !!!!
   // --max-wait-for-load 3000       : after 3 seconds, abort !!
   
   // C:\Users\user1\AppData\Roaming\npm\lighthouse.cmd https://www.google.com/logos/fnbx/solitaire/standalone.html  --max-wait-for-load 5000 --skip-audits errors-in-console --quiet --output json >https%3A%2F%2Fwww.google.com%2Flogos%2Ffnbx%2Fsolitaire%2Fstandalone.html.lighthouse.json
   // C:\Users\user1\AppData\Roaming\npm\lighthouse.cmd https://www.google.com/logos/fnbx/solitaire/standalone.html  --throttling.rttMs --max-wait-for-load 5000 --skip-audits errors-in-console --quiet --output json >https%3A%2F%2Fwww.google.com%2Flogos%2Ffnbx%2Fsolitaire%2Fstandalone.html.lighthouse.json
   
   
   $cmd1='C:\\Users\\user1\\AppData\\Roaming\\npm\\lighthouse.cmd '.$v1.' --chrome-flags="--headless" --throttling.rttMs --max-wait-for-load 3000 --quiet --output json >'.$fichier1."\r\n";
   

   passthru($cmd1); // run it !
   
   

   $toAdd=array(
    'manifest'        => $manifest,
    'manifestContent' => $manifestContent ,
    'url'             => $v1,
    'fichier'         => $fichier1,
    'fichhtml'        => $fichier0,
    'curlinfo1'       => $curlinfo1,
    'curlinfo2'       => $curlinfo2,
    'htmlicon'        => $htmlicon,
    'base64icon'      => $dataFav,
    'typeIcone'       => $typeIcone
   );
   if($descriptionHtml!=''){
    $toAdd['descriptionHtml']=$descriptionHtml;
   }
//   echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $toAdd , true ) . '</pre>' ; exit(0);
   
   
   $lesManifestsEtUrls[]=$toAdd;
   usleep(250000); // relax 0.25 second
   
   
  }else{
   echo __LINE__ . ' manifest file not founded for url = ' . $v1 . "\r\n" ;
   
  }
  
 }else{
  
  $title=$titleHtml;
  
  $fichier1='temp/'.rawurlencode($v1).'.lighthouse.json';   
  // launch lighthouse : adjust the path to reach thr lighthouse.cmd
  // --skip-audits errors-in-console : skip errors in console because if you have a google analytics or a google adsense, some errors are logged, even if they are google products !!!!
  // --max-wait-for-load 3000        : after 3 seconds, abort !!
  $cmd1='C:\\Users\\user1\\AppData\\Roaming\\npm\\lighthouse.cmd '.$v1.' --chrome-flags="--headless" --throttling.rttMs --max-wait-for-load 3000 --quiet --output json >'.$fichier1."\r\n";
  
  passthru($cmd1); // run it !

  $toAdd=array(
//   'manifest'        => $manifest,
//   'manifestContent' => $manifestContent ,
   'url'             => $v1,
   'fichier'         => $fichier1,
   'fichhtml'        => $fichier0,
   'curlinfo1'       => $curlinfo1,
   'title'           => $title,
   'htmlicon'        => $htmlicon,
   'titleHtml'       => $titleHtml,
   'base64icon'      => $dataFav,
   'typeIcone'       => $typeIcone
  );
  if($descriptionHtml!=''){
   $toAdd['descriptionHtml']=$descriptionHtml;
  }
  
  
  $lesManifestsEtUrls[]=$toAdd;
  usleep(250000); // relax 0.25 second
  
  
  
 }
}

//echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $lesManifestsEtUrls , true ) . '</pre>' ; exit(0);

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
function cmp02($a, $b){
 if($a['global-score'] == $b['global-score']) {
  if($a['firstContentfulPaint'] == $b['firstContentfulPaint']) {
   return 0;
  }
  return ($a['firstContentfulPaint'] < $b['firstContentfulPaint']) ? -1 : 1;
 }
 return ($a['global-score'] > $b['global-score']) ? -1 : 1;
} 
//===============================================================================================================================
//===============================================================================================================================

//echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $lesManifestsEtUrls , true ) . '</pre>' ; exit(0);


if(sizeof($lesManifestsEtUrls)>0){
 
 foreach( $lesManifestsEtUrls as $k1 => $v1 ){
  $fichier1=$v1['fichier'];
//  echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $fichier1 , true ) . '</pre>' ; exit(0);
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
   
   $lesManifestsEtUrls[$k1]['firstContentfulPaint']=10000;
   if(isset($datajson['audits']['metrics']['details']['items'][0])){
    foreach( $datajson['audits']['metrics']['details']['items'][0] as $kau1 => $vau1){
     if($kau1==='firstContentfulPaint'){
 //     echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $vau1 , true ) . '</pre>' ; exit(0);
      $lesManifestsEtUrls[$k1]['firstContentfulPaint']=$vau1;
     }
    }
   }
//   echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $datajson['audits']['metrics']['details']['items'] , true ) . '</pre>' ; exit(0);
  }else{
   echo __FILE__ . ' ' . __LINE__ . ' json incorrect pour = ' . $fichier1 . "\r\n" ; 
  }   
 }
// echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( __LINE__ , true ) . '</pre>' ; exit(0);
 foreach( $lesManifestsEtUrls as $k1 => $v1 ){
  if(!isset($v1['global-score'])){
   unset($lesManifestsEtUrls[$k1]);
  }
 }
 
// echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $lesManifestsEtUrls , true ) . '</pre>' ; exit(0);
 
 if(sizeof($lesManifestsEtUrls)>0){
  usort($lesManifestsEtUrls,'cmp02');
  if($fd=fopen('out1.csv','w')){
   $line= 'url;pwa;performance;accessibility;best-practices;seo;score (10*pwa+4*perf+3*accs+2*bstPr+1*seo)' ."\r\n";
   fwrite($fd,$line);
   foreach( $lesManifestsEtUrls as $k1 => $v1 ){
    if($v1['firstContentfulPaint']<10000){
     $line='"'.$v1['url'].'";' . 
      '"'.str_replace('.',',',$v1['pwa-score'])                . '";' . // in french, the decimal separator is the comma "," and not the point "."
      '"'.str_replace('.',',',$v1['performance-score'])        . '";' .
      '"'.str_replace('.',',',$v1['accessibility-score'])      . '";' .
      '"'.str_replace('.',',',$v1['best-practices-score'])     . '";' .
      '"'.str_replace('.',',',$v1['seo-score'])                . '";' .
      '"'.str_replace('.',',',$v1['global-score'])             . '";' .
      '"'.str_replace('.',',',$v1['curl-total_time'])          . '";' .
      '"'.str_replace('.',',',$v1['firstContentfulPaint'])     . '";' .
      "\r\n" ;
     fwrite($fd,$line);
    }
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
    }
   }
   fclose($fd);
  }
  
//  echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( __LINE__ , true ) . '</pre>' ; exit(0);
  // ====================================================
  // =========== build the final html file ==============
  // ====================================================
  
  $dir=''.date('Y/m/d',time());
  if(!is_dir($dir)){
   if(!mkdir($dir,0777,true)){
    die(__LINE__ . ' impossible de créer le répertoire');
   }
  }
  
  $listePourBlog='';
  if($fd=fopen($dir.'/'.'lighthouse-score-rank-for-pwa.html','w')){
   $count=0;
   $count++;
   $line='';
   
   $listePourBlog.='<p>Dernière mise à jour le '.date('d/m/Y').'</p>'."\r\n";
   $listePourBlog.='<table class="tableResult1">' ."\r\n";
   $listePourBlog.='<tr class="hid1">' ."\r\n";
   $listePourBlog.='<th>apps</th>' ."\r\n";
   $listePourBlog.='<th>class. | score</th>' ."\r\n";
   $listePourBlog.='<th style="max-width:50%;font-size:0.8em;">pwa|perf.|accessi.<br />b-pra.|seo</th>' ."\r\n";
   $listePourBlog.='<th style="font-size:0.8em;">prem.<br />affich.</th>' ."\r\n";
   $listePourBlog.='</tr>' ."\r\n";
   
   
   $rank=0;
   $rankGlobal=0;
   $scorePrec=0;
   foreach($lesManifestsEtUrls as $k1=> $v1){
    $lisPoBlg1='';
//    echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $v1['firstContentfulPaint'] , true ) . '</pre>' ; exit(0);
    if($v1['firstContentfulPaint']<10000){

     $manifestContent=isset($v1['manifestContent'])?$v1['manifestContent']:'';
     $jsonMan=json_decode($manifestContent,true);

     $manifestIcon='';
     if(!is_null($jsonMan)){
      foreach($jsonMan['icons'] as $k2 => $v2){
       if($manifestIcon==''){
        $sizes=$v2['sizes'];
        if($sizes=='16x16'){
         
        }else{
         $manifestIcon=$v2['src'];
         if(substr($manifestIcon,0,1) == '/'){ //$v1['url'])
          $pos1=strpos($v1['curlinfo2']['url'],'/',8);
          if($pos1!==false){
           $manifestIcon=substr($v1['curlinfo2']['url'],0,$pos1).$manifestIcon;
          }
         }else if(substr($manifestIcon,0,8) == 'https://'){
          $manifestIcon=$manifestIcon;
         }else{
          $pos1=strrpos($v1['curlinfo2']['url'],'/');
          if($pos1!==false){
           $manifestIcon=substr($v1['curlinfo2']['url'],0,$pos1).'/'.$manifestIcon;
          }       
         }
        }
       }
      }
     }
     $lesManifestsEtUrls[$k1]['manifestIconData']='';
     $lesManifestsEtUrls[$k1]['manifestIconType']='';
     
     if($manifestIcon==''){
     }else{
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HEADER         , 0);
      curl_setopt($ch, CURLOPT_URL            , $manifestIcon );
      curl_setopt($ch, CURLOPT_HEADER         , 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
      curl_setopt($ch, CURLOPT_TIMEOUT        , 5);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
      curl_setopt($ch, CURLOPT_USERAGENT      ,'Mozilla/5.0 (Linux; Android 6.0;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36');
      curl_setopt($ch, CURLOPT_ENCODING       , ''); // avoid gzip format
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION , true); // redirect
      $dataFav=curl_exec($ch);
      $curlinfo3=curl_getinfo($ch);
      curl_close($ch);
      if(!isset($curlinfo3['http_code']) || $curlinfo3['http_code']!=200 && isset($curlinfo3['content_type']) && $curlinfo3['content_type']!='text/html' && $curlinfo3['download_content_length']>50){
       $manifestIcon='';
      }else{
       $lesManifestsEtUrls[$k1]['manifestIconData']=base64_encode($dataFav);
       $lesManifestsEtUrls[$k1]['manifestIconType']=(strpos($manifestIcon,'.png')!==false?'png':(strpos($manifestIcon,'.gif')!==false?'gif':(strpos($manifestIcon,'.jpg')!==false?'jpg':(strpos($manifestIcon,'.ico')!==false?'ico':''))));
      }
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
      $theColor=$couleurHex.'ff00';
      $theBorderColor='border:2px red solid;';
     }else{
      $theColor='009400';
      $theBorderColor='border:2px #'.$couleurHex.'ff00'.' solid;';
      $theBorderColor='';
     }
     
     $theLinkTitle=(isset($jsonMan['description'])&&$jsonMan['description']!=''?htmlentities($jsonMan['description'],ENT_COMPAT,'UTF-8'):(isset($v1['descriptionHtml'])?htmlentities($v1['descriptionHtml'],ENT_COMPAT,'UTF-8'):''));
     $theLinkTitle=html_entity_decode($theLinkTitle,ENT_COMPAT , 'utf-8');

     if(mb_strlen($theLinkTitle)>30){
      $theLinkTitle=mb_substr($theLinkTitle,0,30,'UTF-8').'...';
     }
     
     $theLinkTitle=htmlentities($theLinkTitle,ENT_COMPAT,'UTF-8');
     $theLinkTitle=htmlentities($theLinkTitle,ENT_COMPAT,'UTF-8');
     $theLinkTitle=str_replace( '&nbsp;',' ', $theLinkTitle );

     
     $tt1="\r\n\r\n\r\n".' <tr>'."\r\n" .
      '  <td data-label="" class="centered" style="background:'.(isset($jsonMan['theme_color'])?$jsonMan['theme_color']:'#ffffff').';'.$theBorderColor.'">'. "\r\n" .
      '   <div style="display:flex;">'. "\r\n" .
      '    <div style="display:block;width:51px;border:0;">'."\r\n" ;
     $line.=$tt1;
     $lisPoBlg1.=$tt1;
     
     // 'https://www.koolsol.com/highres-icon-4.png'
     
/*     
     echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $icon , true ) . '</pre>' ; exit(0);
     if($icon!=''){
      $tt1=''.
       '     <a  target="_blank" rel="noopener" href="'.$v1['url'].'" title="'.$theLinkTitle.'">'.
       '     '.('<img src="'.$icon.'" height="48" width="48" loading="lazy" alt="'.$theLinkTitle.'" />') .
       '     </a>'. "\r\n" ;
      $line.=$tt1;
      $nomImage=md5($icon).(strpos($icon,'.ico')!==false?'.ico':(strpos($icon,'.png')!==false?'.png':''));
      $tt2=''.
       '     <a  target="_blank" rel="noopener" href="'.$v1['url'].'" title="'.$theLinkTitle.'">'.
       '     '.('<img src="'.$icon.'" height="48" width="48" loading="lazy" alt="'.$theLinkTitle.'" />') .
       '     </a>'. "\r\n" ;
      $lisPoBlg1.=$tt2;
     }else{
//      echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( __LINE__ , true ) . '</pre>' ; exit(0);
      if($v1['htmlicon']!=''){
       if(strpos($v1['htmlicon'],'data:image')!==false){
        $v1['htmlicon']=substr($v1['htmlicon'],strpos($v1['htmlicon'],'data:image'));
       }
       $tt1=''.
        '     <a target="_blank" rel="noopener" href="'.$v1['url'].'" title="'.$theLinkTitle.'">'.
        '     '.'<img src="'.$v1['htmlicon'].'" height="48" width="48"  loading="lazy" alt="'.$theLinkTitle.'" />' .
        '     </a>'. "\r\n" ;      
       $line.=$tt1;
       $lisPoBlg1.=$tt1;
        
      }
      
     }
     
*/
/*
   'base64icon'      => base64_encode($dataFav),
   'typeIcone'       => $typeIcone
   // data:image/png;base64,
*/
     if($lesManifestsEtUrls[$k1]['manifestIconType']==''){
      if(strpos($v1['htmlicon'],'data:image')!==false){
       $v1['htmlicon']=substr($v1['htmlicon'],strpos($v1['htmlicon'],'data:image'));
       $tt1=''.
        '     <a  target="_blank" rel="noopener" href="'.$v1['url'].'" title="'.$theLinkTitle.'">'.
        '<img src="data:image/'.$v1['htmlicon'].'" height="48" width="48" loading="lazy" alt="'.$theLinkTitle.'" />' .
        '</a>'. "\r\n" ;
      }else{
       $tt1=''.
        '     <a  target="_blank" rel="noopener" href="'.$v1['url'].'" title="'.$theLinkTitle.'">'.
        '<img src="data:image/'.$v1['typeIcone'].';base64,'.$v1['base64icon'].'" height="48" width="48" loading="lazy" alt="'.$theLinkTitle.'" />' .
        '</a>'. "\r\n" ;
      }
     }else{
      $tt1=''.
       '     <a  target="_blank" rel="noopener" href="'.$v1['url'].'" title="'.$theLinkTitle.'">'.
       '<img src="data:image/'.$lesManifestsEtUrls[$k1]['manifestIconType'].';base64,'.$lesManifestsEtUrls[$k1]['manifestIconData'].'" height="48" width="48" loading="lazy" alt="'.$theLinkTitle.'" />' .
       '</a>'. "\r\n" ;
     }
     $line.=$tt1;
     $lisPoBlg1.=$tt1;
     
     $tt1=''.
      '    </div>'. "\r\n" .
      '    <div style="text-align:center;border:0;margin-left:2px;">'."\r\n" ;
     $line.=$tt1;
     $lisPoBlg1.=$tt1;
//     echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $v1 , true ) . '</pre>' ; exit(0);
     $title=isset($v1['title'])?(trim($v1['title'])==''?htmlentities($v1['titleHtml']):htmlentities($v1['title'])):(isset($jsonMan['name'])?$jsonMan['name']:$v1['url']);
     $title=html_entity_decode($title,ENT_COMPAT , 'utf-8');
     $title=html_entity_decode($title,ENT_COMPAT , 'utf-8');
     $title=str_replace( '&nbsp',' ', $title );
     if(mb_strlen($title)>30){
      $title=mb_substr($title,0,30,'UTF-8').'...';
     }
     $title=htmlentities($title,ENT_COMPAT,'UTF-8');
     $title=str_replace( '&nbsp;',' ', $title );
     
     $tt1='<a class="l1" target="_blank" rel="noopener" href="'.$v1['url'].'" title="'.$theLinkTitle.'">'.$title.'</a>'."\r\n";
     $line.=$tt1;
     $lisPoBlg1.=$tt1;

     $tt1=''.
      '    </div>'."\r\n".
      '   </div>'."\r\n".'  </td>' . "\r\n\r\n" .
      '  <td data-label="rank | score : " class="centered" style="background-color:#'.$theColor.';'.$theBorderColor.';color:'.($score=='1.0000'?'#333':'#c6ffcb').';">'.$rank.'/'.sizeof($lesManifestsEtUrls).'  | '."".($score=='1.0000'?'100 💪':substr($score*100,0)) .'</td>' . "\r\n\r\n" .
      '  <td data-label="scores : pwa , perf , accessi , b-pra. , seo" style="background-color:#'.$theColor.';font-size:0.9em;'.$theBorderColor.';color:'.($score=='1.0000'?'#333':'#c6ffcb').';">'                 .
      '' .($v1['pwa-score']           =='1.00'?'1':substr($v1['pwa-score'],1))                .
      '|'.($v1['performance-score']   =='1.00'?'1':substr($v1['performance-score'],1))       .
      '|'.($v1['accessibility-score'] =='1.00'?'1':substr($v1['accessibility-score'],1))     .
      '|'.($v1['best-practices-score']=='1.00'?'1':substr($v1['best-practices-score'],1))    .
      '|'.($v1['seo-score']           =='1.00'?'1':substr($v1['seo-score'],1))               ;
     $line.=$tt1;

     $tt2=''.
      '    </div>'."\r\n".
      '   </div>'."\r\n".'  </td>' . "\r\n\r\n" .
      '  <td data-label="class. | score : " class="centered" style="text-align:center;background-color:#'.$theColor.';'.$theBorderColor.';color:'.($score=='1.0000'?'#333':'#c6ffcb').';">'.$rank.'  | '."".($score=='1.0000'?'100 💪':substr($score*100,0)) .'</td>' . "\r\n\r\n" .
      '  <td data-label="scores : pwa , perf , accessi , b-pra. , seo" style="text-align:center;background-color:#'.$theColor.';font-size:0.9em;'.$theBorderColor.';color:'.($score=='1.0000'?'#333':'#c6ffcb').';">'                 .
      '' .($v1['pwa-score']           =='1.00'?'1':substr($v1['pwa-score'],1))                .
      '|'.($v1['performance-score']   =='1.00'?'1':substr($v1['performance-score'],1))       .
      '|'.($v1['accessibility-score'] =='1.00'?'1':substr($v1['accessibility-score'],1))     .
      '|'.($v1['best-practices-score']=='1.00'?'1':substr($v1['best-practices-score'],1))    .
      '|'.($v1['seo-score']           =='1.00'?'1':substr($v1['seo-score'],1))               ;
     
     
     $lisPoBlg1.=$tt2;
     $shortUrl=$v1['url'];
     if(strpos($shortUrl,'https://')!==false){
      $shortUrl=substr($shortUrl,8);
     }else{
      $shortUrl=substr($shortUrl,7);     
     }
     $shortUrl=substr($shortUrl,0,strpos($shortUrl,'/'));
      
     $tt1=''.
      '<br class="br2" />'.(isset($v1['curlinfo2']['url'])?'<a style="display:inline-block;margin:3px auto;font-size:0.6em;" class="l1" target="_blank" href="'.$v1['curlinfo2']['url'].'" style="float:right;" >manifest '.$shortUrl.'</a>':'<span style="font-size:0.6em;">'.$shortUrl.'').'</span>' .
      ''.'</td>' ."\r\n";
 //    $line.='  <td data-label="curl total time" style="background-color:#'.$theColor.';font-size:0.9em;'.$theBorderColor.'color:'.($score=='1.0000'?'#333':'#c6ffcb').';">'.number_format($v1['curl-total_time'],2,'.',' ').'</td>';
     $line.=$tt1;
     $lisPoBlg1.=$tt1;
     $tt1='  <td data-label="first paint" style="background-color:#'.$theColor.';font-size:0.9em;'.$theBorderColor.'color:'.($score=='1.0000'?'#333':'#c6ffcb').';">'.number_format($v1['firstContentfulPaint'],0,'.',' ').'</td>';
     $tt2='  <td data-label="prem. affich" style="text-align:center;background-color:#'.$theColor.';font-size:0.9em;'.$theBorderColor.'color:'.($score=='1.0000'?'#333':'#c6ffcb').';">'.number_format($v1['firstContentfulPaint'],0,'.',' ').'</td>';
     $line.=$tt1;
     $lisPoBlg1.=$tt2;
     
     $tt1="\r\n </tr>\r\n" ;
     $line.=$tt1;
     $lisPoBlg1.=$tt1;
     
//     echo __FILE__ . ' ' . __LINE__ . ' __LINE__ = <pre>' . var_export( $line , true ) . '</pre>' ; exit(0);
     
     
     if($v1['pwa-score']>='0.80'){ // seules les pwa >= 80 sont acceptées pour le blog
      $listePourBlog.=$lisPoBlg1;
     }
    }
   }
   $listePourBlog.= '</table>'."\r\n";
   $line.= '</table>'."\r\n";  
   
   $entete='';
   $entete.='<!DOCTYPE html>'."\r\n";
   $entete.='<html lang="en">'."\r\n";
   $entete.='<head>'."\r\n";
   $entete.='<meta charset="utf-8">'."\r\n";
   $entete.='<title>lighthouse score rank for pwa</title>'."\r\n";
   $entete.='<meta name="mobile-web-app-capable" content="yes" />'."\r\n";
   $entete.='<meta name="viewport" content="width=device-width, initial-scale=1">'."\r\n";
   $entete.='<meta name="description" content="Pwa ranking according to the lighthouse score, lighthouse is the the tool present in google chrome to audit web apps." />'."\r\n";
   $entete.='<meta name="keywords" content="pwa,directory,rank,lighthouse,google chrome" />'."\r\n";
   $entete.='<meta name="author" content="Hugues Koolsol" />'."\r\n";
   $entete.='<meta name="Content-Language" content="en" />'."\r\n";
   $entete.='<meta name="google" content="notranslate" />'."\r\n";
   $entete.='<meta property="og:title" content="lighthouse score rank for pwa" />'."\r\n";
   $entete.='<meta property="og:description" content="pwa ranking according to the lighthouse score, lighthouse is the the tool present in google chrome to audit web apps." />'."\r\n";
   $entete.='<meta property="og:type" content="website" />'."\r\n";
   $entete.='<meta property="og:site_name" content="www.mypitself.com">'."\r\n";
   
   $entete.='<style type="text/css">'."\r\n";
   $entete.=' body{font-family:arial;font-size:16px;box-sizing: border-box;margin: 0;padding: 0;font-color:#333;}'."\r\n";
   $entete.=' h1{text-align:center;}'."\r\n";
   $entete.=' table{border:1px #ddd solid;border-collapse: collapse;}'."\r\n";
   $entete.=' td{text-align:center;border:1px #ddd solid;}'."\r\n";
   $entete.=' td.centered{text-align:center;}'."\r\n";
   $entete.=' a.l1,a.l1:visited{color:#444;background:#fefefe;display:inline-block;padding:2px;border:0;box-shadow: 2px 2px 2px #222;border-radius:3px;text-decoration:none;margin-top:3px;}'."\r\n";
   $entete.=' img{border:0;box-shadow: 2px 2px 2px #222;border-radius:3px;}'."\r\n";
   $entete.=' p{margin:15px auto;text-align:justify;padding:3px;max-width:600px;line-height:1.5em;}'."\r\n";
   $entete.=' .tableResult1{max-width:540px;margin:5px auto;}'."\r\n";
   $entete.='@media screen and (max-width: 500px){/* todo adjust size */'."\r\n";
   $entete.=' table.tableResult1{border: 0;margin:5px 5px 5px 5px;}'."\r\n";
   $entete.=' table.tableResult1 thead{border:none;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px;}'."\r\n";
   $entete.=' table.tableResult1 tr{border-bottom:3px solid #eee;display:block;margin-bottom:2.001em;}'."\r\n";
   $entete.=' table.tableResult1 td{border-bottom:1px solid #eee;display:block;text-align:right!important;min-height:30px;}'."\r\n";
   $entete.=' table.tableResult1 td:before{content:attr(data-label);font-weight:bold;margin:5px 5px;padding-left: 15px;float:left;}'."\r\n";
   $entete.=' table.tableResult1 td:last-child{border-bottom:3px red solid;}'."\r\n";
   $entete.=' table.tableResult1 td:first-child{border-top:3px red solid;padding:5px;}'."\r\n";
   $entete.=' table.tableResult1 td.actionColumn div{display:contents;}'."\r\n";
   $entete.=' table.tableResult1 td.actionColumn{height:auto;}'."\r\n";
   $entete.=' .tableResult1 td {height:auto;}'."\r\n";
   $entete.=' .hs1{visibility:hidden;}'."\r\n";
   $entete.=' .hs1:before{content:"hello";}'."\r\n";
   $entete.=' .hid1 th{display:none;}'."\r\n";
   $entete.=' table.insidet1 td:before{font-weight:bold;margin:5px 5px;padding-left: 15px;float:left;}'."\r\n";
   $entete.=' .br2{line-height:2em;}'."\r\n";
   $entete.='}'."\r\n";
   $entete.='</style>'."\r\n";

   $entete.='</head>' ."\r\n";
   $entete.='<body>' ."\r\n";
   $entete.='<h1>lighthouse score rank for some pwa that I like !</h1>' ."\r\n";
   $entete.='<p>Pwa ranking according to the lighthouse score. Lighthouse is the the tool present in google chrome to audit web apps.</p>' ."\r\n";
   $entete.='<p>The score is computed with this formula : 10*pwa + 4*performance + 3*accessibility + 2*best-practices + 1*seo and in case of equality, time for first paint makes the difference<p>' ."\r\n";
   $entete.='<p>The php source file that produces this list is here : <a target="_blank" href="https://github.com/hugues-koolsol/lighthouse">https://github.com/hugues-koolsol/lighthouse</a></p>' ."\r\n";
   $entete.='<p>The pwas on the top of the list below have a 100 for all lighthouse scores : pwa, performance, accessibility, best-practice and seo . It is not very easy to get a 100 for all these scores but some can reach this challenge 💪 :-)</p>' ."\r\n";
   $entete.='<p>I like solitaire game so you will find many of them in the list below.</p>' ."\r\n";
   $entete.='<p>Last update : '.date('Y-m-d').'</p>' ."\r\n";
   $entete.='<table class="tableResult1">' ."\r\n";
   $entete.='<tr class="hid1">' ."\r\n";
   $entete.='<th>apps ('.sizeof($lesManifestsEtUrls).')</th>' ."\r\n";
   $entete.='<th>rank | score</th>' ."\r\n";
   $entete.='<th style="max-width:50%;font-size:0.8em;">pwa|perf.|accessi.<br />bst-practi.|seo</th>' ."\r\n";
   $entete.='<th style="font-size:0.8em;">first <br />paint</th>' ."\r\n";
   $entete.='</tr>' ."\r\n";

   fwrite($fd,$entete.$line);
   
   $line='';
   $line.='<p>'."\r\n";
   $line.='I did koolsol because I wanted a fast and simple solitaire card game with solutions for the players around the world with translations in 27 languages. I am disapointed by the rank Google gives to it because I applied all the requirements ( pwa, offline and online, fast ...) and it is far from being on the first page when one search for solitaire game. Why ?'."\r\n";
   $line.='</p>'."\r\n";
   $line.='<p><a target="_blank" href="https://www.nytimes.com/2013/02/24/opinion/sunday/solitaire-me-vs-me.html">Why should you play solitaire game by Francine Prose ?</a></p>'."\r\n";
   $line.='<p><a target="_blank" href="https://www.newyorker.com/magazine/1972/01/22/solitaire-2">A solitaire story by John Updike</a></p>'."\r\n";
   $line.='<p lang="fr"><a href="https://motherboard.vice.com/fr/article/53ygg3/le-jeu-de-solitaire-a-inspire-loutil-mathematique-le-plus-utilise-au-monde">Le jeu de solitaire a inspiré un des outils mathématique le plus utilisé au monde</a></p>'."\r\n";
   $line.='<p>'."\r\n";
   $line.='It is quite funny that Google doesn\'t like flash games but when you search some solitaire games in the search engine, many of them are flash game !'."\r\n";
   $line.='<br />Why ? :-).'."\r\n";
   $line.='</p>'."\r\n";
   
   $line.='<p>Do not forget to play koolsol and, please, share it ;-) <a  target="_blank" rel="noopener" href="https://www.koolsol.com/">https://www.koolsol.com/</a></p>' ."\r\n";
   fwrite($fd,$line);
   
   @include('lighthouse-write-google-tag.php'); // optional : writes the google analytics code at the end of the file ( see the source genetated at the end of this page : http://www.mypitself.com/lighthouse-score-rank-for-pwa.html)
   
   $line= '</body>' ."\r\n";  fwrite($fd,$line);
   $line= '</html>' ."\r\n";  fwrite($fd,$line);
   fclose($fd);
  }
  if($fd=fopen($dir.'/'.'lighthouse-for-blog.txt','w')){
   fwrite($fd,$listePourBlog);
  }
      
  // ====================================================
  // ========= end build the final html file ============
  // ====================================================

  
  
  
 
 
 }
}

if($fdlesManifestsEtUrls=fopen('lesManifestsEtUrls.php','w')){ 
 fwrite($fdlesManifestsEtUrls, '<'.'?php'."\r\n".'$lesManifestsEtUrls=' . var_export( $lesManifestsEtUrls,true ) .';' ); 
 fclose($fdlesManifestsEtUrls); 
}



echo "Good job!, Now I go for a 10 minutes nap to see the logs";
sleep(600);


exit(0);
