<?php 

    include_once "../helpers/db.php";
    include_once "../helpers/url.php";
    include_once "../DAO/ConvidadoDAO.php";
    include_once "../DAO/ItemDAO.php";

    $convidadoDao = new ConvidadoDAO($conn);
    $itemDao = new ItemDAO($conn);
    $newitem = new Item;
    $newconvidado = new convidado;

    if(isset($_POST["Convidado"])){
        $convidado = $_POST["Convidado"];
        $Idade = $_POST["Idade"];
        $ConsumoL = $newconvidado->CalcConsumoL(intval($Idade));
        $ConsumoS = $newconvidado->CalcConsumoS(intval($Idade));

        if(isset($_POST["Item"])){
            $item = $_POST["Item"];
            
            $newitem->setItem($item);
            $itemDao->create($newitem);

            $newconvidado->setConvidado($convidado);
            $newconvidado->setIdade($Idade);
            $newconvidado->setConsumoL($ConsumoL);
            $newconvidado->setConsumoS($ConsumoS);
            $convidadoDao->create($newconvidado);
            header("Location: $BASE");
        }
        else{

            $newconvidado->setConvidado($convidado);
            $newconvidado->setIdade($Idade);
            $newconvidado->setConsumoL($ConsumoL);
            $newconvidado->setConsumoS($ConsumoS);
            $convidadoDao->create($newconvidado);
            header("Location: $BASE");
        }
    }


    elseif(isset($_POST["Item"])){
        $item = $_POST["Item"];

        if(isset($_POST["Convidado"])){
            $convidado = $_POST["Convidado"];
            $Idade = $_POST["Idade"];
            $ConsumoL = $newconvidado->CalcConsumoL(intval($Idade));
            $ConsumoS = $newconvidado->CalcConsumoS(intval($Idade));
            

            $newitem->setItem($item);
            $itemDao->create($newitem);

            $newconvidado->setConvidado($convidado);
            $newconvidado->setIdade($Idade);
            $newconvidado->setConsumoL($ConsumoL);
            $newconvidado->setConsumoS($ConsumoS);
            $convidadoDao->create($newconvidado);
            header("Location: $BASE");
        }
        else{
            $newitem->setItem($item);
            $itemDao->create($newitem);
            header("Location: $BASE");
        }
    }
    else{
        header("Location: $BASE");
    }
    
?>