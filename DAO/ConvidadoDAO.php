<?php 

include_once __DIR__ . '/../Models/convidado.php';

class ConvidadoDAO implements IConvidadoDAO {

    private $conn;

    public function __construct(PDO $conn){
        $this->conn = $conn;
    }

    public function findAll(){

        $convidados = [];

        $stmt = $this->conn->query("SELECT * FROM VerConvidados");

        $data = $stmt->fetchAll();

        foreach($data as $pessoa){

            $convidado = new Convidado;

            $convidado->setConvidado($pessoa["nm_Convidado"]);
            $convidado->setIdade($pessoa["nr_IdadeConvidado"]);
            $convidado->setConsumoL($pessoa["nr_ConsumoSolido"]);
            $convidado->setConsumoS($pessoa["nr_ConsumoLiquido"]);

            $convidados[] = $convidado;
        }
        
        return $convidados;
    }

    public function create(Convidado $convidado){

        $stmt = $this->conn->prepare("CALL AdicionarConvidado(:nome, :idade, :consumol, :consumos)");
        $stmt->bindParam(":nome", $convidado->getConvidado());
        $stmt->bindParam(":idade", $convidado->getIdade());
        $stmt->bindParam(":consumol", $convidado->getConsumoL());
        $stmt->bindParam(":consumos", $convidado->getConsumoS());
        
        $stmt->execute();
    }
}

?>