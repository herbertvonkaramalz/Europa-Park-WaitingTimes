<?php
date_default_timezone_set('UTC');
$endpoint = "https://api.europapark.de/api-5.5/waitingtimes";
$secret = "ZhQCqoZp";
$time = date("YmdH", time());
$token = strtoupper(implode(unpack("H*", hash_hmac("sha256", $time, $secret, true))));
$waitingTimes = json_decode(file_get_contents($endpoint . "?token=" . $token), true);
for ($i = 0; $i < count($waitingTimes); $i++) {
    switch ($waitingTimes[$i]["code"]) {
        case 853:
            $waitingTimes[$i]['name'] = 'Wodan Timburcoaster';
            $waitingTimes[$i]['country'] = 'ISL';
            break;
        case 850:
            $waitingTimes[$i]['name'] = 'blue fire megacoaster';
            $waitingTimes[$i]['country'] = 'ISL';
            break;
        case 250:
            $waitingTimes[$i]['name'] = 'Silver Star';
            $waitingTimes[$i]['country'] = 'FRA';
            break;
        case 200:
            $waitingTimes[$i]['name'] = 'Eurosat CanCan Coaster';
            $waitingTimes[$i]['country'] = 'FRA';
            break;
        case 500:
            $waitingTimes[$i]['name'] = 'Euro-Mir';
            $waitingTimes[$i]['country'] = 'RUS';
            break;
        case 701:
            $waitingTimes[$i]['name'] = 'Alpenexpress "Enzian"';
            $waitingTimes[$i]['country'] = 'AUT';
            break;
        case 351:
            $waitingTimes[$i]['name'] = 'Matterhorn Blitz';
            $waitingTimes[$i]['country'] = 'SUI';
            break;
        case 403:
            $waitingTimes[$i]['name'] = 'Pegasus';
            $waitingTimes[$i]['country'] = 'GRE';
            break;
        case 700:
            $waitingTimes[$i]['name'] = 'Tiroler Wildwasserbahn';
            $waitingTimes[$i]['country'] = 'AUT';
            break;
        case 800:
            $waitingTimes[$i]['name'] = 'Atlantica SuperSplash';
            $waitingTimes[$i]['country'] = 'POR';
            break;
        case 400:
            $waitingTimes[$i]['name'] = 'Poseidon';
            $waitingTimes[$i]['country'] = 'GRE';
            break;
        case 650:
            $waitingTimes[$i]['name'] = 'Fjord Rafting';
            $waitingTimes[$i]['country'] = 'SKA';
            break;
        case 350:
            $waitingTimes[$i]['name'] = 'Schweizer Bobbahn';
            $waitingTimes[$i]['country'] = 'SUI';
            break;
        case 851:
            $waitingTimes[$i]['name'] = 'Whale Adventures - Splash Tour';
            $waitingTimes[$i]['country'] = 'ISL';
            break;
        case 404:
            $waitingTimes[$i]['name'] = 'Abenteuer Atlantis';
            $waitingTimes[$i]['country'] = 'GRE';
            break;
        case 100:
            $waitingTimes[$i]['name'] = 'Geisterschloss';
            $waitingTimes[$i]['country'] = 'ITA';
            break;
        case 550:
            $waitingTimes[$i]['name'] = 'Piraten in Batavia';
            $waitingTimes[$i]['country'] = 'NED';
            break;
        case 201:
            $waitingTimes[$i]['name'] = 'Madame Freudenreich Curiositées';
            $waitingTimes[$i]['country'] = 'FRA';
            break;
        case 157:
            $waitingTimes[$i]['name'] = 'Ba-a-a Express';
            $waitingTimes[$i]['country'] = 'IRL';
            break;
        case 159:
            $waitingTimes[$i]['name'] = 'Dancing Dingie';
            $waitingTimes[$i]['country'] = 'IRL';
            break;
        case 600:
            $waitingTimes[$i]['name'] = 'Dschungel-Floßfahrt';
            $waitingTimes[$i]['country'] = 'EU';
            break;
        case 753:
            $waitingTimes[$i]['name'] = 'Kolumbusjolle';
            $waitingTimes[$i]['country'] = 'ESP';
            break;
        case 155:
            $waitingTimes[$i]['name'] = 'Old Mac Donald\'s Traktorfun';
            $waitingTimes[$i]['country'] = 'IRL';
            break;
        case 901:
            $waitingTimes[$i]['name'] = 'Poppy Tower';
            $waitingTimes[$i]['country'] = 'EU';
            break;
        case 651:
            $waitingTimes[$i]['name'] = 'Vindjammer';
            $waitingTimes[$i]['country'] = 'SKA';
            break;
        case 702:
            $waitingTimes[$i]['name'] = 'Wiener Wellenflieger';
            $waitingTimes[$i]['country'] = 'AUT';
            break;
        case 9:
            $waitingTimes[$i]['name'] = 'Voletarium';
            $waitingTimes[$i]['country'] = 'GER';
            break;
        case 900:
            $waitingTimes[$i]['name'] = 'Arthur - Im Königreich der Minimoys';
            $waitingTimes[$i]['country'] = 'EU';
            break;
        case 202:
            $waitingTimes[$i]['name'] = 'Euro-Tower';
            $waitingTimes[$i]['country'] = 'FRA';
            break;
        case 495:
            $waitingTimes[$i]['name'] = 'Arena of Football';
            $waitingTimes[$i]['country'] = 'GBR';
            break;
        case 102:
            $waitingTimes[$i]['name'] = 'Volo da Vinci';
            $waitingTimes[$i]['country'] = 'ITA';
            break;
        case 204:
            $waitingTimes[$i]['name'] = 'Jim Knopf - Reise nach Lummerland';
            $waitingTimes[$i]['country'] = 'FRA';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="UTF-8">
        <title>Wartezeiten</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="./flags.css">
        <link rel="stylesheet" href="./main.css">
        <link rel="stylesheet" href="material.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans"
        <link rel="manifest" href="/manifest.json">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <style>
        body {
            font-family: 'Google Sans', Helvetica Neue, Arial, sans-serif;
            font-weight: normal;
            font-style: normal;
        }
        </style>
    </head>
    <body>
      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header" style="background-color: #008080">
          <div class="mdl-layout__header-row" style="background-color: #008080">
            <span class="mdl-layout-title" style="margin-left: -35px;">Aktuelle Wartezeiten</span>
          </div>
        </header>
      <main class="mdl-layout__content">
        <div class="page-content">
          <ul class="demo-list-controll mdl-list">
            <?php
              for ($i = 0; $i < count($waitingTimes); $i++) {

                if(!$waitingTimes[$i]['name'] == null || !$waitingTimes[$i]['name'] == '') {
                    $badgeStatus = "lightgreen; color: white;";

                    if ($waitingTimes[$i]['time'] > 5) {
                      $badgeStatus = "yellow";
                    }
                    if ($waitingTimes[$i]['time'] >= 20) {
                      $badgeStatus = "tomato; color: white;";
                    }
                    if ($waitingTimes[$i]['status'] != 0) {
                      $badgeStatus = "lightgrey; color: white";
                    }
                    if ($waitingTimes[$i]['time'] == 0) {
                        $timeStamp = 'Keine Wartezeit';
                    } else if ($waitingTimes[$i]['time'] == 1) {
                        $timeStamp = '1 Minute';
                    } else if ($waitingTimes[$i]['time'] == 60) {
                        $timeStamp = '1 Stunde';
                    } else if ($waitingTimes[$i]['time'] == 120) {
                        $timeStamp = '2 Stunden';
                    } else {
                        $timeStamp = $waitingTimes[$i]['time'] . ' Minuten';
                    }
    
                    echo '
                      <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-avatar">
                            <div class="flag-' . $waitingTimes[$i]['country'] . '"></div></i>
                            ' . $waitingTimes[$i]['name'] . '
                        </span>
                        <span class="mdl-list__item-secondary-action">
                            <span class="mdl-chip" style="background-color: ' . $badgeStatus . ';">
                                <span class="mdl-chip__text">' . $timeStamp . '</span>
                            </span>
                        </span>
                      </li>';
                }    
                }
              ?>
            </ul>
          </div>
        </main>
        </div>
      </body>

      <script>
      if('serviceWorker' in navigator) {
        console.log('Will the service worker register?');
        navigator.serviceWorker.register('service-worker.js')
          .then(function(reg) {
            console.log("Yes, it did.");
          }).catch(function(err) {
            console.log("No, " , err)
          });
      }
      </script>
</html>
