<?php
    if (! function_exists('active')) {
        function active($path, $current_path)
        {
            if ($path == $current_path) {
                return 'active';
            } else {
                return '';
            }
        }
    }

    if (!function_exists('enviarDatosUsb')) {
        function enviarDatosUsb( $puerto, $datos) {
            $port =fopen($puerto, "w");// com7 Seria el Puerto USB
            fwrite($port, $datos);
            sleep(1);
            fclose($port);
        }
    }
