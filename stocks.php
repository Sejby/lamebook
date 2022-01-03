<?php

class StockAPI{
     function getAPI(){
        $json = file_get_contents('https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=BTC&to_currency=USD&apikey=PU0BNT9UUX1IV9VL');
        $data = json_decode($json,true);
        print_r($data);
    }
}

?>