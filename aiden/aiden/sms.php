<?php
try{
include_once (__DIR__.'/ZenophSMSGH/lib/ZenophSMSGH.php');
$zs = new ZenophSMSGH();
$zs->setUser('aidensms@protonmail.com');
$zs->setPassword('aidensms1');

$zs->setMessageType(ZenophSMSGH_MESSAGETYPE::TEXT);
$zs->setSenderId('AIDEN HOMES');

$zs->SetMessage("Thank you for your reservation at Aiden Homes And Apartments\n
Client: $name\n
RoomName: $roomname\n
No Of Rooms: $norooms\n
Arrival Date: $fromdate $fromtime\n
Departure Date: $todate $totime\n
Date: $date\n");
$zs->addDestination("0241436100");
if($zs->sendMessage()){
    echo "Message Sent";
}else{
    echo $zs->getMessage();
}
}catch(Exception $ex){
    echo $ex->getMessage();
}