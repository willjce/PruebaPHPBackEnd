<?php
function pr( $s_Text )
{
    echo "<pre>";
    print_r( $s_Text );
    echo "</pre>";
}

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
 
require("vendor/autoload.php");

$app = new \Slim\App;

$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer( "templates" );

$app->get
(
    '/', 
    function ( Request $request, Response $response ) 
    {
        $s_Json = file_get_contents( './employees.json' );

        $a_JsonData = json_decode( $s_Json, true );
        //pr( $a_JsonData );
        
        $response = $this->view->render( $response, "gridSuccess.php", ["a_JsonData" => $a_JsonData] );
        return $response;
	}
);

$app->post
(
        '/info_det',
        function ( Request $request, Response $response )
        {
            $s_Json = file_get_contents( './employees.json' );

            $a_JsonData = json_decode( $s_Json, true );
            
            $s_IdDet = $request->getParam( "id_det" );
            
            $a_DataJsonResult = array();
            foreach ( $a_JsonData as $i_Key => $a_Data )
            {
                if( $a_Data['id'] == $s_IdDet )
                {
                    $a_DataJsonResult = $a_Data;
                }
            }

            $response = $this->view->render( $response, "infoDetSuccess.php", ["a_JsonDataSel" => $a_DataJsonResult] );
            return $response;
}
);

$app->post
(
    '/',
    function ( Request $request, Response $response )
    {
        $s_Json = file_get_contents( './employees.json' );
        
        $a_JsonData = json_decode( $s_Json, true );
        //pr( $a_JsonData );
        //pr( get_class_methods( $request ) );
        
        $s_TextEmail = $request->getParam( "txt_email" );
        
        //AHORA SE HACE EL FILTRO
        if( $s_TextEmail != "" )
        {
            $a_DataJsonResult = array();
            /*foreach ( $a_JsonData as $i_Key => $a_Data )
            {
                if( $a_Data['email'] == $s_TextEmail )
                {
                    $a_DataJsonResult[] = $a_Data;
                }
            }*/
            $a_DataJsonResult = array_filter
            ( 
                $a_JsonData, function ( $item ) use ( $s_TextEmail ) 
                {
                    if ( stripos( $item['email'], $s_TextEmail ) !== false ) 
                    {
                        return true;
                    }
                    return false;
                }
            );
        }
        else
        {
            $a_DataJsonResult = $a_JsonData;
        }
        //pr( "post" );
        
        $response = $this->view->render( $response, "gridSuccess.php", ["a_JsonData" => $a_DataJsonResult] );
        return $response;
    }
);

$app->get
(
    '/webservice',
    function ( Request $request, Response $response )
    {
        $s_Json = file_get_contents( './employees.json' );
        $a_JsonData = json_decode( $s_Json, true );
        
        $f_MinValue = floatval( $request->getParam( "min" ) );
        $f_MaxValue = floatval( $request->getParam( "max" ) );
        
        $a_Rs = array();
        foreach ( $a_JsonData as $i_Key => $a_Data )
        {
            $s_NwSalary = str_replace( array( "$", "," ), array( "", "" ), $a_Data['salary'] );
            $f_Salary = floatval( $s_NwSalary );
            if( $f_Salary >= $f_MinValue && $f_Salary <= $f_MaxValue )
            {
                $a_Rs[] = $a_Data;
            }
        }
        
        //pr( $a_Rs );
        
        $v_Content = xmlrpc_encode_request( "WebServiceEmployees", $a_Rs );
        
        $response->withHeader( 'Content-Type', 'application/xml' );
        $response->write( $v_Content );
       
        return $response;
    }
);

$app->run();