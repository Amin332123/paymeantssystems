<?php 
include "coonection.php";
include "client.php";
include "./repo/clientrepo.php";
function newclient() {
    $name = readline("Your name : ");
    echo "\n";
    $email = readline("Your email : ");
    if (empty($name) || empty($email)) {
        echo "\n name or email should be full not emtpy \n";
        return;
    }
    $client = new client($name, $email);
    $insertClient = new ClientRepository();
    $insertClient->createClient($client);
}
function displayclients() {
    $clientrepo = new ClientRepository();
    $allClients = $clientrepo->getAllClients();
    foreach ($allClients as $client) {
        $name = $client->getName();
        $email = $client->getEmail();
        echo "\n name : $name . email : $email\n";
    }
}
$green = "\033[32m";
$red = "\033[31m";
$blue = "\033[34m";
$reset = "\033[0m";
while (true) {
    echo $green . "==============================\n" . $reset;
    echo $blue . " SYSTEME DE PAIEMENT - MENU\n" . $reset;
    echo $green . "==============================\n" . $reset;
    echo $red . "1." . $reset . $green . " Créer un client\n" . $reset;
    echo $red . "2." . $reset . $green . " Affisher les clients\n" . $reset;
    echo $red . "3." . $reset . $green . " Créer une commande\n" . $reset;
    echo $red . "4." . $reset . $green . " Payer une commande\n" . $reset;
    echo $red . "5." . $reset . $green . " Afficher les commandes\n" . $reset;
    echo $red . "0." . $reset . $green . " Quitter\n" . $reset;
    echo $green . "------------------------------\n" . $reset;
    $choice = readline("Choix : ");
    switch ($choice) {
        case 1:
            newclient();
            break;
        case 2:
            displayclients();
            break;
        case 3:

            break;
        case 4:

            break;
        case 5:

            break;
        case 0:

            return;
    }
}












?>