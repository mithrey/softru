<?php

include (dirname(__FILE__).'/src/Client.php');
include (dirname(__FILE__).'/src/Transport.php');
include (dirname(__FILE__).'/src/transport/CurlTransport.php');
include (dirname(__FILE__).'/src/Exception.php');

$client = new outcomebet\casino\api\client\Client(array('sslKeyPath' => getcwd()."/apikey.pem", 'url' => "https://api.skygamming.net/"));

if(isset($_POST['f'])){
    if($_POST['f'] == 'createPlayer'){
        
        setcookie('player_id',$_POST['player_id']);
        $client->setPlayerInfo($_POST['player_id']);

        echo( json_encode(['player_id' => $_POST['player_id'], 'balance' => $client->getBalance($_POST['player_id']), 'games' => $client->listGames()]) );
    }
    if($_POST['f'] == 'changeBalance'){

        $id = $_COOKIE['player_id'];
        $client->changeBalance( $id, $_POST['amount']);
        echo( json_encode(['player_id' => $id, 'balance' => $client->getBalance($id)]) );
    }
    if($_POST['f'] == 'gameList'){
        $id = $_COOKIE['player_id'];
        
        echo( json_encode(['player_id' => $id, 'balance' => $client->getBalance($id), "game" => $client->runGame($_POST['dropdown'], $id)]));
    }
    if($_POST['f'] == 'updateBalance'){
        $id = $_COOKIE['player_id'];
        
        echo( json_encode(['player_id' => $id, 'balance' => $client->getBalance($id)]));
    }

}else{
    include('index.html');
}


// // register player
// print_r($client->setPlayerInfo('user234'));
// // or print_r($client->setPlayerInfo(array('player_id' => 'user234', 'nick' => 'user234')));

// // check balance
// print_r($client->getBalance('user234'));

// // deposit balance
// print_r($client->changeBalance('user234', 15));

// // list games
// $games = $client->listGames();
// print_r($games);

// // run the game
// print_r($client->runGame($games[0]['id'], 'user234'));







// $curl = curl_init(); 
// curl_setopt_array($curl, 
//     [CURLOPT_URL => $APIurl, 
//     CURLOPT_SSL_VERIFYHOST => 0, 
//     CURLOPT_SSL_VERIFYPEER => 1,
//     CURLOPT_POST => 1, 
//     //CURLOPT_RETURNTRANSFER => 1,
//     CURLOPT_SSLKEY => getcwd() . $keyFile,
//     //CURLOPT_CAINFO => getcwd() . $caFile,
//     CURLOPT_SSLCERT => getcwd() . $caFile,
//     CURLOPT_HTTPHEADER => [
//          'Content-Type: application/json',                                                                                
//          'Content-Length: ' . strlen($playerSetDataJSON)
//     ],
//     CURLOPT_POSTFIELDS => $playerSetDataJSON
//     ] 
// ); 
// $playerSetResponse = json_decode(curl_exec($curl)); 
// if (curl_errno($curl)) { 
//     print curl_error($curl); 
//  } 
//  //curl_close($curl);
// var_dump($playerSetResponse);
// echo "</br>";

// ///////////////////////////////////////////////
// //add balance
// $balanceSetData = ['action' => "Balance.change", 
//     'arguments' => [
//         "player"=> $player,
//         "amount" => "200"
//     ]
// ];    
// $balanceSetDataJSON = json_encode($balanceSetData);
// curl_setopt_array($curl, 
//     [CURLOPT_HTTPHEADER => [
//          'Content-Type: application/json',                                                                                
//          'Content-Length: ' . strlen($balanceSetDataJSON)
//     ],
//     CURLOPT_POSTFIELDS => $balanceSetDataJSON
//     ] 
// ); 
// $balanceChangeResponse = json_decode(curl_exec($curl)); 
// if (curl_errno($curl)) { 
//     print curl_error($curl); 
//  } 
//  //curl_close($curl);
// var_dump($balanceChangeResponse);
// echo "</br>";

// ///////////////////////////////////////////////
// //get games
// $gameGetData = ['action' => "Game.list", 'arguments' => []];    
// $gameGetDataJSON = json_encode($gameGetData);

// curl_setopt_array($curl, 
//     [CURLOPT_HTTPHEADER => [
//          'Content-Type: application/json',                                                                                
//          'Content-Length: ' . strlen($gameGetDataJSON)
//     ],
//     CURLOPT_POSTFIELDS => $gameGetDataJSON
//     ] 
// ); 
// $gameGetResponse = json_decode(curl_exec($curl)); 
// if (curl_errno($curl)) { 
//     print curl_error($curl); 
//  } 
//  //curl_close($curl);
// var_dump($gameGetResponse);
// echo "</br>";

// ///////////////////////////////////////////////
// //get games
// $gameRunData = ['action' => "Game.run", 
//     'arguments' => [
//         'game' => 'anksunamun_tqoe',
//         'player' => $player
//     ]
// ];    
// $gameRunDataJSON = json_encode($gameRunData);

// curl_setopt_array($curl, 
//     [CURLOPT_HTTPHEADER => [
//          'Content-Type: application/json',                                                                                
//          'Content-Length: ' . strlen($gameRunDataJSON)
//     ],
//     CURLOPT_POSTFIELDS => $gameRunDataJSON
//     ] 
// ); 
// $gameRunResponse = json_decode(curl_exec($curl)); 
// if (curl_errno($curl)) { 
//     print curl_error($curl); 
//  } 
//  //curl_close($curl);
// var_dump($gameRunResponse);
// echo "</br>";

// ///////////////////////////////////////////////
// //get games
// $spinData = ['action' => "Spin.spin", 
//     'arguments' => [
//         'game' => 'anksunamun_tqoe',
//         'bet' => 1
//     ]
// ];    
// $spinDataJSON = json_encode($spinData);

// curl_setopt_array($curl, 
//     [CURLOPT_HTTPHEADER => [
//          'Content-Type: application/json',                                                                                
//          'Content-Length: ' . strlen($spinDataJSON)
//     ],
//     CURLOPT_POSTFIELDS => $spinDataJSON
//     ] 
// ); 
// $spinResponse = json_decode(curl_exec($curl)); 
// if (curl_errno($curl)) { 
//     print curl_error($curl); 
//  } 
//  //curl_close($curl);
// var_dump($spinResponse);
// echo "</br>";