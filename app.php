<?php
date_default_timezone_set('UTC');
$endpoint = "https://api.europapark.de/api-5.5/waitingtimes";
$secret = "ZhQCqoZp";
$time = date("YmdH", time());
$token = strtoupper(implode(unpack("H*", hash_hmac("sha256", $time, $secret, true))));
$waitingTimes = json_decode(file_get_contents($endpoint . "?token=" . $token), true);
$link = $endpoint . "?token=" . $token;

for($i = 0; $i < count($waitingTimes); $i++) {

    /*
    
{"time":1,"code":600,"type":3,"status":0}, // Skandinavien



{"time":0,"code":204,"type":3,"status":3}] // Irland
    */
    switch($waitingTimes[$i]["code"]) {
      /*Fehlt*/ case 853:
            $waitingTimes[$i]['name'] = 'Wodan Timburcoaster';
            break;
      /*Fehlt*/  case 850:           
             $waitingTimes[$i]['name'] = 'blue fire megacoaster';
            break;
        case 250:
            $waitingTimes[$i]['name'] = 'Silver Star';
            break;
        case 200:
            $waitingTimes[$i]['name'] = 'Eurosat - CanCanCoaster';
            break;
        case 500:
            $waitingTimes[$i]['name'] = 'Euro-Mir';
            break;
        case 701:
            $waitingTimes[$i]['name'] = 'Alpenexpress "Enzian"';
            break;
        case 351:
            $waitingTimes[$i]['name'] = 'Matterhorn Blitz';
            break;
        case 403:
            $waitingTimes[$i]['name'] = 'Pegasus';
            break;
        case 700:
            $waitingTimes[$i]['name'] = 'Tiroler Wildwasserbahn';
            break;
        case 800:
            $waitingTimes[$i]['name'] = 'Atlantica SuperSplash';
            break;
        case 400:
            $waitingTimes[$i]['name'] = 'Poseidon';
            break;
        case 650:
            $waitingTimes[$i]['name'] = 'Fjord Rafting';
            break;
        case 350:
            $waitingTimes[$i]['name'] = 'Schweizer Bobbahn';
            break;
        case 851:
            $waitingTimes[$i]['name'] = 'Whale Adventures - Splash Tours';
            break;
        case 404:
            $waitingTimes[$i]['name'] = 'Abenteuer Atlantis';
            break;
        case 100:
            $waitingTimes[$i]['name'] = 'Piraten in Batavia';
            break;
            /*Fehlt*/
        case 550:
            $waitingTimes[$i]['name'] = 'Madame Freudenreichs Curiositées';
            break;
            /* Fehlt*/
       case 201:
            $waitingTimes[$i]['name'] = 'Ba-a-a Express';
            break;
        case 157:
            $waitingTimes[$i]['name'] = 'Dancing Dingie';
            break;
        case 159:
            $waitingTimes[$i]['name'] = 'Dschungel-Flossfahrt';
            break;
        case 753:
            $waitingTimes[$i]['name'] = 'Kolumbusjolle';
            break;
        case 155:
            $waitingTimes[$i]['name'] = 'Old Mac Donald\'s Tractor Fun';
            break;
        case 901:
            $waitingTimes[$i]['name'] = 'Poppy Tower';
            break;
        case 651:
            $waitingTimes[$i]['name'] = 'Vindjammer';
            break;
        case 702:
            $waitingTimes[$i]['name'] = 'Wiener Wellenflieger';
            break;
        case 9:
            $waitingTimes[$i]['name'] = 'Voletarium';
            break;
        case 900:
            $waitingTimes[$i]['name'] = 'Arthur - Im Königreich der Minimoys';
            break;
        case 202:
            $waitingTimes[$i]['name'] = 'Euro-Tower';
            break;
        case 495:
            $waitingTimes[$i]['name'] = 'Arena of Football';
            break;
        case 102:
            $waitingTimes[$i]['name'] = 'Volo da Vinci';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Wartezeiten</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </head>
    <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">Wartezeiten</span>
    </div>
  </header>
  <main class="mdl-layout__content">
    <div class="page-content">
    <?php echo $link ?>

    <ul class="demo-list-controll mdl-list">
    <?php
		    for($i = 0; $i < count($waitingTimes); $i++) {
                $badgeString = "success";
  
                if($waitingTimes[$i]['time'] > 5) {
                  $badgeString = "warning";
                } 
  
                if($waitingTimes[$i]['time'] >= 20) {
                  $badgeString = "danger";
                }
  
                if($waitingTimes[$i]['status'] != 0) {
                  $badgeString = "default";
                }

            echo '

                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-avatar">person</i>
                        ' . $waitingTimes[$i]['name'] .'
                    </span>
                    <span class="mdl-list__item-secondary-action">
                        ' . $waitingTimes[$i]['time'] . ' Minuten
                    </span>
                </li>';      
            }
        ?>
        </ul>
    </div>
  </main>
</div>
    </body>
</html>

<ul class="demo-list-control mdl-list">
<li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
    <i class="material-icons  mdl-list__item-avatar">person</i>
    Bryan Cranston
  </span>
  <span class="mdl-list__item-secondary-action">
    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="list-checkbox-1">
      <input type="checkbox" id="list-checkbox-1" class="mdl-checkbox__input" checked />
    </label>
  </span>
</li>
</ul>