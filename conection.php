<?php
class Vaca
{
    public int $peso;
    public int $produccion;

    public function __construct(int $peso, int $produccion,)
    {
        $this->peso = $peso;
        $this->produccion = $produccion;
    }
}
?>