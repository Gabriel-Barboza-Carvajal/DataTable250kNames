<?php

$strJsonFileContents = file_get_contents("nombresCompletosJson.json");

$array = json_decode($strJsonFileContents, true);

$nombres = $array['results'];

$respuesta = array();
// se resta 249000 dado que el servidor no puede procesar tantos datos...
for ($index = 0; $index < count($nombres)-249900; $index++) {
    array_push($respuesta, [
        $nombres[$index]['Name'],
        $nombres[$index]['Gender']
    ]);
}
$js = json_encode(['data' => $respuesta]);

echo $js;

function generarScript() {
    $strJsonFileContents = file_get_contents("nombresCompletosJson.json");

    $array = json_decode($strJsonFileContents, true);

    $nombres = $array['results'];
    
    echo "<br> insert into ??? (nombre,genero) values <br>";
    for ($index = 0; $index < count($nombres); $index++) {
        echo '(' . $nombres[$index]['Name'] . ',' . $nombres[$index]['Gender'] . ') , <br>';
    }
}

//echo generarScript();
