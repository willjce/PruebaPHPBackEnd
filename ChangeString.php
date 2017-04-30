<?php
class ChangeString
{
    public function build( $s_String )
    {
        $a_Lst1 = array( "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z" );
        $a_Lst2 = array( "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z" );
        
        for ( $i=0; $i<strlen( $s_String ); $i++ )
        {
            $s_Letra = substr( $s_String, $i, 1 );
            $a_Rs[$i] = $s_Letra;
            foreach ( $a_Lst1 as $i_Key => $s_L1 )
            {
                if( $s_Letra === $s_L1 )
                {
                    if( isset( $a_Lst1[$i_Key+1] ) )
                    {
                        $i_KeyAsig = $i_Key+1;
                    }
                    else
                    {
                        $i_KeyAsig = 0;
                    }
                    $a_Rs[$i] = $a_Lst1[$i_KeyAsig];
                    continue;
                }
            }
            foreach ( $a_Lst2 as $i_Key => $s_L2 )
            {
                if( $s_Letra === $s_L2 )
                {
                    if( isset( $a_Lst2[$i_Key+1] ) )
                    {
                        $i_KeyAsig = $i_Key+1;
                    }
                    else
                    {
                        $i_KeyAsig = 0;
                    }
                    $a_Rs[$i] = $a_Lst2[$i_KeyAsig];
                }
            }
        }
        return implode( "", $a_Rs );
    }
}

function pr( $s_String )
{
    echo "<pre>";
    print_r( $s_String );
    echo "</pre>";
}

echo "<h1>Problema 01</h1>";

$o_ChangeString = new ChangeString();

$s_Result = $o_ChangeString->build( "123 abcd*3" );
pr( "entrada : '123 abcd*3' salida : ".$s_Result );

$s_Result = $o_ChangeString->build( "**Casa 52" );
pr( "entrada : '**Casa 52' salida : ".$s_Result );

$s_Result = $o_ChangeString->build( "**Casa 52Z" );
pr( "entrada : '**Casa 52Z' salida :".$s_Result );

?>