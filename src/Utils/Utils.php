<?php
namespace Utils;

use Exception;

class Utils{

public static function deleteSession($name):void{
if(isset($_SESSION[$name])){
$_SESSION[$name] = null;
unset($_SESSION[$name]);
}
}
public static function validarDireccion(string $texto, bool $checkLength = true) : bool|string {
    try {
        if (!preg_match("/^[a-zA-Z0-9\s\-_\/º°!¡?¿.,áéíóúÁÉÍÓÚñÑ]*$/", $texto)) {
            throw new Exception("La direccion no puede contener caracteres especiales");
        }
        if ($checkLength === true) {
            if (strlen($texto) < 3) {
                throw new Exception("La direccion debe tener al menos 3 caracteres");
            }
        }

        if (strlen($texto) > 200) {
            throw new Exception("La direccion no puede tener más de 200 caracteres");
        }
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
public static function validarNombre($nombre) : bool|string {
    try {
        if (strlen($nombre) < 3) {
            throw new Exception("El nombre debe ser de al menos 3 caracteres");
        }
        if (!preg_match("/^[a-zA-Z0-9\sáéíóúÁÉÍÓÚñÑ]*$/", $nombre)) {
            throw new Exception("El nombre solo puede contener letras y números");
        }
        if (strlen($nombre) > 50) {
            throw new Exception("El nombre no puede ser de más de 50 caracteres");
        }
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

}