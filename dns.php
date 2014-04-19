<?php


while(true){
    update();
    sleep(3600);// Cada uma hora
    echo "\nExecutando";
}
function update(){
// Aqui voce alter para o seu dns
    $HOST="otavio";
    $ch = curl_init();

    $URL="http://162.243.61.124:9999";
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // grab URL and pass it to the browser
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $IP = curl_exec($ch);
    curl_close($ch);

    $UPDATE="$URL/dns?ip=$IP&host=$HOST";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $UPDATE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);

    curl_close($ch);
}