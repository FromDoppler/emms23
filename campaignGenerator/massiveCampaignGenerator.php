<?php
//TODO: Esta es una primera iteración del generador de campañas masivas relacionado a la tarea DS-4870
//TODO: Se continuara iterando en este archivo para incrementar las funcionalidades y dinamismos que pueda aportar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $partnerValues = $_POST['partnerValues'];

    // Divide los valores en líneas y crea un arreglo
    $arrayOfPartenerValues = preg_split('/\r\n|\r|\n/', $partnerValues);

    // Directorio donde se guardarán los archivos generados
    $destinationDirectory = 'maquetas-generadas';

    // Verificar si el directorio de destino existe, si no, créalo
    if (!is_dir($destinationDirectory)) {
        mkdir($destinationDirectory, 0777, true);
    }

    // Generar archivos HTML con diferentes valores y los guarda en el directorio especifico
    foreach ($arrayOfPartenerValues as $partnerValue) {
        // Crea un nuevo archivo HTML con un nombre único
        $fileName = $partnerValue . '.html';
        $filePath = $destinationDirectory . '/' . $fileName;

        // Copia el contenido del template a un nuevo archivo
        copy('exampleTemplate.html', $filePath);

        // Sustituye el valor en el nuevo archivo HTML
        $content = file_get_contents($filePath);
        // El valor que se ponga a continuacion sera el que buscara en el template para remplazar
        $replaceValue = '[[partnerPlaceholder]]';
        $content = str_replace($replaceValue, $partnerValue, $content);
        file_put_contents($filePath, $content);
    }

    // Indicar que la generación y descarga de archivos ha finalizado
    echo 'Archivos generados y guardados en el servidor.<br>';

    // Muestra el número total de valores ingresados
    echo 'Número total de valores ingresados: ' . count($arrayOfPartenerValues) . '<br>';

    // Crear una lista de valores ingresados
    echo 'Valores ingresados:<ul>';
    foreach ($arrayOfPartenerValues as $partnerValue) {
        echo '<li>' . $partnerValue . '</li>';
    }
    echo '</ul>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Massive Campaign Generator</title>
</head>

<body>
    <form method="post">
        <textarea name="partnerValues" rows="4" cols="50"></textarea>
        <br>
        <input type="submit" value="Generar y Guardar en el servidor">
    </form>
</body>

</html>
