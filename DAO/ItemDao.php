<?php 

include_once  __DIR__ . "/../Models/item.php";

class ItemDAO implements IItens {

    private $conn;

    public function __construct(PDO $conn){
        $this->conn = $conn;
    }

    public function findAll(){

        $itens = [];

        $stmt = $this->conn->query("SELECT * FROM VerItens");

        $data = $stmt->fetchAll();

        foreach($data as $alimento) {

            $item = new item;

            $item->setItem($alimento["nm_Item"]);

            $itens[] = $item;
        }

        return $itens;

    }

    public function create(item $item){

        $stmt = $this->conn->prepare("CALL AdicionarItem(:item)");
        $stmt->bindParam(":item", $item->getItem());
        $stmt ->execute();

    }
}

?>