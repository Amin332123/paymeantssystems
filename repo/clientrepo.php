<?php 
include "../connection.php";
class ClientRepository 
{
    private $conn;
    public function __construct(){
        $newconnection = new database();
        $this->conn = $newconnection->getconection();
    }
    public function createClient($client)
    {
        $query = "insert into customers (name,email) values (:name,:email)";
        $stmt = $this->conn->prepare($query);
        $name = $client->getName();
        $email = $client->getEmail();
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    }
    public function getAllClients()
    {
        $query = "select * from customers";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $allclients_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $clients = [];

        foreach($allclients_array as $row){
            $clients[] = new Client($row["name"], $row["email"]);
        }
        return $clients;
    }
}


















?>