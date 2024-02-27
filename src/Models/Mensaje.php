<?php

namespace Models;

use Lib\BaseDatos;
use PDOException;
use PDO;

class Mensaje
{
    private int|null $id;
    
    private string $de;
    private string $asunto;
    private string $cuerpo;
    private string $fecha;
    private string $para;
    private int $selected;
    private BaseDatos $db;

    public function  __construct(?int $id, string $de, string $asunto, string $cuerpo, string $fecha, string $para, int $selected)
    {
        $this->db = new BaseDatos();
        $this->id = $id;
        $this->de = $de;
        $this->asunto = $asunto;
        $this->cuerpo = $cuerpo;
        $this->fecha = $fecha;
        $this->para = $para;
        $this->selected=$selected;
    }

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getSelected(): int
    {
        return $this->selected;
    }

    public function getDe(): string
    {
        return $this->de;
    }

    public function getAsunto(): ?string
    {
        return $this->asunto;
    }


    public function getCuerpo(): ?string
    {
        return $this->cuerpo;
    }

    public function getFecha(): string
    {
        return $this->fecha;
    }
    public function getPara(): string
    {
        return $this->para;
    }

    // Setters
    public function setId(int|null $id): void
    {
        $this->id = $id;
    }

    public function setSelected(int $selected): void
    {
        $this->selected = $selected;
    }

    public function setDe(string $de): void
    {
        $this->de = $de;
    }

    public function setAsunto(?string $asunto): void
    {
        $this->asunto = $asunto;
    }
    public function setCuerpo(?string $cuerpo): void
    {
        $this->cuerpo = $cuerpo;
    }

    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function setPara(?string $para): void
    {
        $this->para = $para;
    }


    public static function fromArray(array $data): Mensaje
    {
        return new Mensaje(
            $data['id'] ?? null,
            $data['de'] ?? '',
            $data['cuerpo'] ?? null,
            $data['cuerpo'] ?? null,
            $data['fecha'] ?? '',
            $data['para'] ?? '',
            $data['selected'] ?? 0,
        );
    }
    public static function obtenerPorId($id)
    {
        $db = new BaseDatos();

        try {
            $stmt = $db->preparada("SELECT * FROM mensajes WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $mensaje = $stmt->fetch(PDO::FETCH_ASSOC);
                return new Mensaje(
                    $mensaje['id'],
                    $mensaje['de'],
                    $mensaje['asunto'],
                    $mensaje['cuerpo'],
                    $mensaje['fecha'],
                    $mensaje['para'],
                    $mensaje['selected']
                );
            } else {
                return null;
            }
        } catch (PDOException $e) {
            // Manejar la excepción si ocurre un error al ejecutar la consulta
            return null;
        }
    }

    public static function obtenerTodos()
    {
        $db = new BaseDatos();

        try {
            $igual=$_SESSION['identity']->email;
            $stmt = $db->preparada("SELECT * FROM mensajes where para = :igual");
            $stmt->bindValue(':igual', $igual, PDO::PARAM_STR);
            $stmt->execute();

            $mensajes = [];

            while ($mensaje = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $mensajes[] = new Mensaje(
                    $mensaje['id'],
                    $mensaje['de'],
                    $mensaje['asunto'],
                    $mensaje['cuerpo'],
                    $mensaje['fecha'],
                    $mensaje['para'],
                    $mensaje['selected']
                );
            }

            return $mensajes;
        } catch (PDOException $e) {
            // Manejar la excepción si ocurre un error al ejecutar la consulta
            return [];
        }
    }


    public function desconecta(): void
    {
        $this->db == null;
    }

    public function save()
    {
         return $this->create();
    }

    public function create(): bool
    {
        
        $id = null;
        $de= $this->getDe();
        $asunto = $this->getAsunto();
        $cuerpo = $this->getCuerpo();
        $para = $this->getPara();
        $selected = $this->getSelected();
        
        try {
            $upd = $this->db->preparada("INSERT INTO mensajes (id, de, asunto, cuerpo, para, fecha, selected) VALUES (:id, :de, :asunto, :cuerpo, :para, CURDATE(), :selected)");
            $upd->bindValue(':id', $id, PDO::PARAM_INT);
            $upd->bindValue(':de', $de, PDO::PARAM_STR);
            $upd->bindValue(':asunto', $asunto, PDO::PARAM_STR);
            $upd->bindValue(':cuerpo', $cuerpo, PDO::PARAM_STR);
            $upd->bindValue(':para', $para, PDO::PARAM_STR);
            $upd->bindValue(':selected', $selected, PDO::PARAM_STR);
            
            $upd->execute();
            $result = true;
        } catch (PDOException $e) {
            $result = false;
            die(var_dump($e));
        }
        return $result;
    }

    public function update(): bool
    {
        $id = $this->getId();
        $de= $this->getDe();
        $asunto = $this->getAsunto();
        $cuerpo = $this->getCuerpo();
        $para = $this->getPara();
        $fecha = $this->getFecha();
        $selected = $this->getSelected();

        try {
            $upd = $this->db->preparada("UPDATE productos SET de = :de, asunto = :asunto, cuerpo = :cuerpo,  para= :para, fecha = :fecha, selected = :selected WHERE id = :id");
            $upd->bindValue(':id', $id, PDO::PARAM_INT);
            $upd->bindValue(':de', $de, PDO::PARAM_INT);
            $upd->bindValue(':asunto', $asunto, PDO::PARAM_STR);
            $upd->bindValue(':cuerpo', $cuerpo, PDO::PARAM_STR);
            $upd->bindValue(':para', $para, PDO::PARAM_STR);
            $upd->bindValue(':fecha', $fecha, PDO::PARAM_STR);
            $upd->bindValue(':selected', $selected, PDO::PARAM_STR);
            $upd->execute();
            $result = true;
        } catch (PDOException $e) {
            $result = false;
        }
        return $result;
    }

    public function delete(): bool
    {
        $id = $this->getId();

        try {
            $del = $this->db->preparada("DELETE FROM mensajes WHERE id = :id");
            $del->bindValue(':id', $id, PDO::PARAM_INT);
            $del->execute();
            $result = true;
        } catch (PDOException $e) {
            $result = false;
        }
        return $result;
    }
}