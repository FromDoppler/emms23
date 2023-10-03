<?php

class Logger
{
    // Metodo para registrar cualquier tipo de log (ERROR o SUCCESS)
    public function registrarLog($status, $title, $mensaje)
    {
        $contenidoLog = strtoupper($status) ." ". $title .": " . json_encode($mensaje, JSON_UNESCAPED_UNICODE) . PHP_EOL;
        $ruta = $_SERVER['DOCUMENT_ROOT'] . "/wix/logs/" . $status."_wix.log";
        return $this->guardarEnArchivo($contenidoLog, $ruta);
    }

    private function guardarEnArchivo($contenido, $ruta)
    {
        // Generar el contenido para el log con la fecha, hora y objeto del contenido
        $contenidoLog = "[" . date('Y-m-d H:i:s') . "] " . $contenido . PHP_EOL;
        // Guardar la información en el archivo log
        file_put_contents($ruta, $contenidoLog, FILE_APPEND);
        return $contenidoLog;
    }
}
