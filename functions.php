<?php
function produccionTotal($capacidadMaxima, $vacas){
    $maxima = 0;
    $Totalproduccion = 0;
    $vacasFormat =  array();
    $cantidad = 0;

    //formateamos los datos de vacas
    foreach ($vacas as &$key) {
        $keyx  = explode(",", $key);
        array_push($vacasFormat, new Vaca(intval(trim($keyx[1])), intval(trim($keyx[0])))); // el usuario de vacas pasa a ser $vacasFormat 
        
    }
    rsort($vacasFormat); 
    var_dump($vacasFormat);

    for ($i=0; $i < count($vacasFormat) ; $i++) { 
        $maxima = $maxima + $vacasFormat[$i]->peso;
        $next = $i+1 < 8 ? $vacasFormat[$i+1]->peso: 0 ;

        if ($maxima <= $capacidadMaxima){

                $Totalproduccion = $Totalproduccion + $vacasFormat[$i]->produccion;
                $cantidad= $cantidad + 1;  

        }else if(($capacidadMaxima - ($maxima - $vacasFormat[$i]->peso)) < 
                 ($capacidadMaxima - ($maxima - $vacasFormat[$i-1]->peso)) &&
                 $vacasFormat[$i]->produccion >= $vacasFormat[$i-1]->produccion )
        {

            $maxima = $maxima - $vacasFormat[$i-1]->peso;
            $Totalproduccion = ($Totalproduccion + $vacasFormat[$i]->produccion) - $vacasFormat[$i-1]->produccion; 

        }else{

            if($vacasFormat[$i]->produccion > $Totalproduccion && $vacasFormat[$i]->peso <= $capacidadMaxima ){
                $Totalproduccion = $vacasFormat[$i]->produccion;
            }else{
                $maxima = $maxima - $vacasFormat[$i]->peso;
            }

        }
    }
        
    
    echo "\nPeso total ".$maxima."kg Seleccionamos ".$cantidad." vaca(s)\nsu produccion total es de:".$Totalproduccion;
}
?>