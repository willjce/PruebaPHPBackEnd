<?php
class CompleteRange
{
    public function build( $a_Coleccion )
    {
        $a_Rs = array();
        $i_Ini = array_shift( $a_Coleccion );
        $i_Fin = array_pop( $a_Coleccion );
        for ( $i=$i_Ini; $i<=$i_Fin; $i++  )
        {
            $a_Rs[] = $i;
        }
        return $a_Rs;
    }
}

function pr( $s_String )
{
    echo "<pre>";
    print_r( $s_String );
    echo "</pre>";
}

echo "<h1>Problema 02</h1>";

$o_CompleteRange = new CompleteRange();

$a_Result = $o_CompleteRange->build( array( 1, 2, 4, 5 ) );
pr( "entrada : [1, 2, 4, 5] salida : ".implode( ", ", $a_Result ) );

$a_Result = $o_CompleteRange->build( array( 2, 4, 9 ) );
pr( "entrada : [2, 4, 9] salida : ".implode( ", ", $a_Result ) );

$a_Result = $o_CompleteRange->build( array( 55, 58, 60 ) );
pr( "entrada : [55, 58, 60] salida : ".implode( ", ", $a_Result ) );