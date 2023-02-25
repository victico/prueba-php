<?php
class Vaca
{
    public int $produccion;
    public int $peso;
    

    public function __construct(int $produccion, int $peso)
    {
        $this->produccion = $produccion;
        $this->peso = $peso;
    }
}
?>