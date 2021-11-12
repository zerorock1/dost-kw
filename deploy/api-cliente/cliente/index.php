<?php

$numagencia = "8228_244_ext";
$password = "2bPUPZcA?";
$idioma = 1;





$parameter = $_GET["parameter"];
$codigoprovincia = $_GET["provincia"];
$place = $_GET["place"];
$ficha = $_GET["ficha"];


header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');



switch($parameter)
{
    case "provinciasofertas":
            Procesos ('provinciasofertas',1,100,"","");
            //Procesos ('paginacion',1,100,"","");
            $datos = json_decode(PedirDatos($numagencia,$password,$idioma,1),true);
        
            //47 es vizkaya, incluir en array todas la provincias
            $fitrado = array_filter($datos["provinciasofertas"],function($item){
                return in_array($item["codprov"],[47]);
            });

            echo(json_encode($fitrado));
        break;
    case "ciudades":
            Procesos('ciudades',1,100,"","");
            $datos = json_decode(PedirDatos($numagencia,$password,$idioma,1),true);
        
            //47 es vizkaya, incluir en array todas la provincias
            $fitrado = array_filter($datos["ciudades"],function($item) use($codigoprovincia){
                return $item["codprov"] == $codigoprovincia;
                
            });
            echo(json_encode($fitrado));
        break;

    case "destacadosprovincias":

            $inicio = $_GET["inicio"];
            $fin = $_GET["fin"];

            if(!$inicio)
            {
                $inicio = 1;
            }
            if(!$fin)
            {
                $fin = 50;
            }

            Procesos ('paginacion',$inicio,$fin,"keyprov='".$codigoprovincia."'","");
            //var_dump(PedirDatos($numagencia,$password,$idioma,1));
            $datos = json_decode(PedirDatos($numagencia,$password,$idioma,1),true);
            echo(json_encode($datos));
        break;

        
    case "ofertaslocales":

        //748099->Basauri
        Procesos ('destacados',1,100,"ofertas.key_loca in (".$place.")","");
        $datos = json_decode(PedirDatos($numagencia,$password,$idioma,1),true);
        echo(json_encode($datos["destacados"]));
        break;

    case "ficha":
        Procesos ('ficha',1,100,"cod_ofer=".$ficha,"");
        $datos = json_decode(PedirDatos($numagencia,$password,$idioma,1),true);
        echo(json_encode($datos));
        break;
        
}




// function dameprovincias()
// {

// }
















// Procesos ('tipos',1,100,"","");
//Procesos('ciudades',1,100,"","");
//Procesos('pais',1,100,"","");
//Procesos('provincias',0,100,"","");
//Procesos ('zonas',1,100,"key_loca=32899","");
//Procesos ('ficha',1,1,"ofertas.cod_ofer=350914","");
//Procesos ('destacados',1,20,"keyprov=4","");
//Procesos ('paginacion',1,100,"keyprov=4&aseos=1","precioinmo, precioalq");
//


function Procesos ($tipo,$posinicial,$numelementos,$where,$orden)
{
    global $arrpeticiones;

    $arrpeticiones[count($arrpeticiones)]=$tipo;
    $arrpeticiones[count($arrpeticiones)]=$posinicial;
    $arrpeticiones[count($arrpeticiones)]=$numelementos;
    $arrpeticiones[count($arrpeticiones)]=$where;
    $arrpeticiones[count($arrpeticiones)]=$orden;
}


function Pedirdatos($numagencia,$password,$idioma,$json=0){

    global $arrpeticiones;
    global $addnumagencia;

    $texto="$numagencia$addnumagencia;$password;$idioma;";
    $texto=$texto ."lostipos";

    for  ($i=0;$i<count($arrpeticiones);$i++) {
        $texto=$texto .";" .$arrpeticiones[$i];
    }

    $texto=rawurlencode($texto);

    $url="https://apiweb.inmovilla.com/apiweb/apiweb.php";

    if($json) {
        $contenido  = geturl($url,"param=$texto&json=1");
    }else{
        @eval(geturl($url,"param=$texto"));
    }

    $GLOBALS['arrpeticiones'] = array();

    if($json) {
        return $contenido;
    }
}

function geturl($url,$campospost)
{

    $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
    $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
    $header[] = "Cache-Control: max-age=0";
    $header[] = "Connection: keep-alive";
    $header[] = "Keep-Alive: 300";
    $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $header[] = "Accept-Language: en-us,en;q=0.5";
    $header[] = "Pragma: ";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS,'');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    if (strlen($campospost)>0) {
        //los datos tienen que ser reales, de no ser asi se desactivara el servicio
        $campospost=$campospost . "&ia=" .$_SERVER["REMOTE_ADDR"] ."&ib=" .$_SERVER['HTTP_X_FORWARDED_FOR'];
        curl_setopt($ch, CURLOPT_POSTFIELDS, $campospost);
    }
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");
    $page = curl_exec($ch);

    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
    }

    if (isset($error_msg)) {
        var_dump($error_msg);
        die();
    }

    curl_close($ch);

    return $page;
}



?>