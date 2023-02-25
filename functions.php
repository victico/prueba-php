<?php
function produccionTotal($capacidadMaxima, $vacas){
    $maxima = 0;
    $Totalproduccion = 0;
    $vacasFormat =  array();
    $cantidad = 0;

    //formateamos los datos de vacas
    foreach ($vacas as &$key) {
        $keyx  = explode(",", $key);
        array_push($vacasFormat, new Vaca(intval(trim($keyx[0])), intval(trim($keyx[1])))); // el usuario de vacas pasa a ser $vacasFormat 
        
    }
    rsort($vacasFormat); 
    var_dump($vacasFormat);

    for ($i=0; $i < count($vacasFormat) ; $i++) { 
        $maxima = $maxima + $vacasFormat[$i]->peso;
        if ($maxima <= $capacidadMaxima){
                $Totalproduccion = $Totalproduccion + $vacasFormat[$i]->produccion;
                $cantidad= $cantidad + 1;  
                echo "\nsi paso por la primera en index\n" .$i;
        }else if(($capacidadMaxima - ($maxima - $vacasFormat[$i]->peso)) < 
                 ($capacidadMaxima - ($maxima - $vacasFormat[$i-1]->peso)))
        {
            $maxima = $maxima - $vacasFormat[$i-1]->peso;
            $Totalproduccion = ($Totalproduccion + $vacasFormat[$i]->produccion) - $vacasFormat[$i-1]->produccion; 
            echo "\nsi paso en index\n" .$i;
        }else{
            if($vacasFormat[$i]->produccion > $Totalproduccion && $vacasFormat[$i]->peso <= $capacidadMaxima ){
                $Totalproduccion = $vacasFormat[$i]->produccion;
                echo "\nsi paso mayor if en index\n" .$i;
            }else{
                $maxima = $maxima - $vacasFormat[$i]->peso;
                echo "\nsi paso mayor else en index\n" .$i;
            }
        }
    }
        
    
    echo "\nPeso total".$maxima."Seleccionamos ".$cantidad." vaca(s)\nsu produccion total es de:".$Totalproduccion;
}
?>