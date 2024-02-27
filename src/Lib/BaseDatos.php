<?php

namespace Lib;

use PDOException;
use PDO;

class BaseDatos {
    private $conexion;
    private mixed $resultado;
    private string $servidor;
    private string $usuario;
    private string $pass;
    private string $base_datos;

    function __construct() {
        $this->servidor = $_ENV['DB_HOST'];
        $this->usuario = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASS'];
        $this->base_datos = $_ENV['DB_DATABASE'];
        $this->conexion = $this->conectar();
    }

    private function conectar(): PDO {
        try {
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::MYSQL_ATTR_FOUND_ROWS => true
            );
            $conexion = new PDO("mysql:host={$this->servidor};dbname={$this->base_datos}", $this->usuario, $this->pass, $opciones);
            return $conexion;
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }

    // Otras funciones de tu clase BaseDatos ...

    public function consulta(string $consultaSQL): void {
        $this->resultado = $this->conexion->query($consultaSQL);
    }

    public function extraer_registro(): mixed {
        return ($fila = $this->resultado->fetch(PDO::FETCH_ASSOC)) ? $fila : false;
    }

    public function extraer_todos(): array {
        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filasAfectadas(): int {
        return $this->resultado->rowCount();
    }

    public function ultimoIdInsertado(): int {
        return $this->conexion->lastInsertId();
    }

    public function preparada($pre) {
        return $this->conexion->prepare($pre);
    }

    public function cierraConexion(): void {
        $this->conexion = null;
    }
    public function beginTransaction(): void {
      $this->conexion->beginTransaction();
  }

  public function commit(): void {
      $this->conexion->commit();
  }

  public function rollBack(): void {
      $this->conexion->rollBack();
  }

  public function lastInsertId(): int {
      return $this->conexion->lastInsertId();
  }
}