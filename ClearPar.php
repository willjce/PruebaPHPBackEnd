<?php
class ClearPar
{
    public function build( $s_String ) 
    {
        $a_Pr = array( "(", ")" );
        //pr( $a_Pr );
        
        $i_Cnt = 0;
        $a_Lst = array();
        $a_Rs = array();
        for ( $i=0; $i<strlen( $s_String ); $i++ )
        {
            $s_Lt = substr( $s_String, $i, 1 );
            //pr( $s_Lt );
            
            if( $s_Lt == $a_Pr[$i_Cnt] )
            {
                $a_Lst[$i_Cnt] = $s_Lt;
                $i_Cnt++;
            }
            
            if( $i_Cnt == 2 )
            {
                $i_Cnt = 0;
                $a_Rs[] = $a_Lst;
                $a_Lst = array();
                continue;
            }
        }
        $callback = create_function('$value', 'return implode("", $value);');
		return implode( "", array_map( $callback, $a_Rs ) );
        
    }
}

function pr( $s_String )
{
    echo "<pre>";
    print_r( $s_String );
    echo "</pre>";
}

echo "<h1>Problema 03</h1>";

$o_ClearPar = new ClearPar();

$s_Result = $o_ClearPar->build( "()())()" );
pr( "entrada : '()())()' salida : ".$s_Result );

$s_Result = $o_ClearPar->build( "()(()" );
pr( "entrada : '()(()' salida : ".$s_Result );

$s_Result = $o_ClearPar->build( ")(" );
pr( "entrada : ')(' salida : ".$s_Result );

$s_Result = $o_ClearPar->build( "((()" );
pr( "entrada : '((()' salida : ".$s_Result );
