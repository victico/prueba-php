<?php
    include("./conection.php");
    include("./functions.php"); 
    
    // Mensaje de bienvenida.
    echo "Hola, como estas?\nIngresa la capacidad maxima de peso del camión\nEscribe solo el numero por defecto la medida de peso es (KG):" ;
    
    $camion      = trim(fgets(STDIN)); //Peso del camion.
    $vacas = [];
    
    //valiadamos que esta bien formateado, si pedimos que vuelva a intentar.
    if(stristr($camion, "kg") === FALSE) {
        echo "\n\n\nIngresa los datos de las vacas prospectos a comprar bajo el siguiente formato:\n  Peso,producción  \nCuando hayas ingresado todo los datos escribe la palabra \"Listo\":\n" ;
        $vaca = trim(fgets(STDIN));


        while (strtolower($vaca) !== "listo" ) { 
            if($vaca !=""){
                array_push($vacas, $vaca);
                echo "Ingrese datos de la siguiente vaca o la palabra \"listo\" si deseas terminar:\n";
                $vaca = trim(fgets(STDIN));
            }else{
                echo "Datos invalidos!";
            }
            
        }
        produccionTotal($camion,$vacas);
    
    }else{
        echo "\nEscribe solo numero!, VUELVE A EJECUTAR!";
        die();
    }
?>