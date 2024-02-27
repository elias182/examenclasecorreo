<?php

namespace Controllers;

use DateTime;
use Dotenv\Parser\Parser;
use Lib\Pages;
use Models\Mensaje;

class MensajeController
{
    private Pages $pages;

    public function __construct()
    {
        $this->pages = new Pages();
    }

    public function listarMensaje()
    {
        if(isset($_SESSION['identity'])){
        // Obtener la lista de productos desde el modelo
        $mensajes = Mensaje::obtenerTodos();

        // Renderizar la vista de lista de productos
        $this->pages->render('mensaje/lista', ['mensajes' => $mensajes]);
    }else{
        $this->pages->render('usuario/login');
    }
    }


    public function verMensaje($id)
    {
        // Obtener los detalles de un producto específico desde el modelo
        $mensaje = Mensaje::obtenerPorId($id);

        // Renderizar la vista de detalles del producto
        $this->pages->render('mensaje/ver', ['mensaje' => $mensaje]);
    }

    public function redactar()
    {
        if(isset($_SESSION['identity'])){
        // Renderizar la vista de creación de producto
        $this->pages->render('mensaje/formulario');
        }else{
            $this->pages->render('usuario/login');
        }
    }

    public function mandarmensaje()
{
    if(isset($_SESSION['identity'])){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar si se proporcionaron datos
        

        $datos = $_POST['datos'];

        $de=$_SESSION['identity']->email;
        $date="";
        
        // Crear un nuevo producto utilizando los datos proporcionados
        $mensaje = new Mensaje(
            null,
            $de,
            $datos['asunto'],
            $datos['cuerpo'],
            $date,
            $datos['para'],
            1,
        );

        $mensaje->save();

        // Redirigir a la lista de productos
        header("Location: " . BASE_URL . 'mensajes');
        exit;
    }
}else{
    $this->pages->render('usuario/login');
}
}


    public function eliminarMensaje($id)
    {
        // Obtener el producto existente desde el modelo
        $mensaje = Mensaje::obtenerPorId($id);

        

        if ($mensaje) {
            // Eliminar el producto
            $mensaje->delete();

            // Redirigir a la lista de productos
            header("Location: " . BASE_URL . '/mensajes');
        } else {
            // Manejar el caso donde el producto no existe
            // Mostrar un mensaje de error o redirigir a una página de error
        }
    }
    public function añadiraseleccion($id){
        if (!empty($id)) {
            
            // Inicializar o recuperar el carrito de la sesión
            $selects= isset($_SESSION['selects']) ? $_SESSION['selects'] : [];
            

            $mensaje = Mensaje::obtenerPorId($id);

            $mensaje->setSelected(1);
    
            if ($id) {


                // Verificar si el producto ya existe en el carrito
                if (isset($selects['mensajes'][$id])) {

                    unset($selects['mensajes'][$id]);
                    
                } else {
                    // Si no existe, agregar el producto al carrito
                    $selects['mensajes'][$id] = [
                        "id" => $id
                    ];
                }
    


    
                // Guardar el carrito actualizado en la sesión
                $_SESSION['selects'] = $selects;
    
                // Redirigir a la vista del carrito
                header("Location:".BASE_URL."mensajes");
                exit;
            } else {
                echo('Error: mensaje no encontrado');
            }
        } else {
            echo('Error: No se proporcionó un ID de producto válido');
        }
    }
    public function deleteseleccion(){
        if (!empty($_SESSION['selects']['mensajes'])) {
            
            // Inicializar o recuperar el carrito de la sesión
            
    
            foreach($_SESSION['selects']['mensajes'] as $aborrar)
            {
                foreach($aborrar as $mira){
                    $this->eliminarMensaje($mira);
                }

                
            }

            unset($_SESSION['selects']);
                // Redirigir a la vista del carrito
                header("Location:".BASE_URL."mensajes");
                exit;
            
        }else {
            echo "no hay ningun mensaje seleccionado";
        }
    
}
}

?>