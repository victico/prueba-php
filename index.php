<?php
    include("./conection.php");
    include("./functions.php"); 
    
    // Mensaje de bienvenida.
    echo "Hola, como estas?\nIngresa la capacidad maxima de peso del camión\nEscribe solo el numero por defecto la medida de peso es (KG):" ;
    
    $camion      = trim(fgets(STDIN)); //Peso del camion.
    
    //valiadamos que esta bien formateado, si pedimos que vuelva a intentar.
    if(stristr($camion, "kg") === FALSE) {
        echo "\n\n\nIngresa los datos de las vacas prospectos a comprar bajo el siguiente formato:\nPeso,producción - peso,producción.... (no onmitir el '-'):\n" ;
        $vacas = trim(fgets(STDIN));
       
        if($vacas !=""){
            $vacas = explode("-", $vacas);
            produccionTotal($camion,$vacas);
        }else{
            echo "Datos invalidos! vuelve a intentar:\n";
            die();
        }
    }else{
        echo "\nEscribe solo numero!, VUELVE A EJECUTAR!";
        die();
    }
?>