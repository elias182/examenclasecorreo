<?php

namespace Routes;

use Controllers\CarritoController;
use Controllers\CategoriaController;
use Controllers\DashBoardController;
use Controllers\MensajeController;
use Controllers\PacienteController;
use Controllers\PedidoController;
use Controllers\ProductoController;
use Controllers\UsuarioController;
use Lib\Router;


class Routes
{
    public static function index(){
        Router::add('GET','/',function (){
            return (new DashBoardController())->index();
        });



        Router::add('GET','/login',function (){
            return (new UsuarioController())->identifica();
        });
        Router::add('POST','/identifica',function (){
            return (new UsuarioController())->login();
        });
        Router::add('GET','/registro',function (){
            return (new UsuarioController())->registro();
        });
        Router::add('POST','/registrof',function (){
            return (new UsuarioController())->registro();
        });
        Router::add('GET','/logout',function (){
            return (new UsuarioController())->logout();
        });
        Router::add('GET','/mensajes',function (){
            return (new MensajeController())->listarMensaje();
        });
        Router::add('GET','/mensajes-info/:id',function ($id){
            return (new MensajeController())->verMensaje($id);
        });
        Router::add('GET','/eliminar/:id',function ($id){
            return (new MensajeController())->eliminarMensaje($id);
        });
        Router::add('GET','/select/:id',function ($id){
            return (new MensajeController())->añadiraseleccion($id);
        });
        Router::add('GET','/selectsaborrar',function (){
            return (new MensajeController())->deleteseleccion();
        });
        Router::add('POST','/mandara',function (){
            return (new MensajeController())->mandarmensaje();
        });
        Router::add('GET','/redactar',function (){
            return (new MensajeController())->redactar();
        });


        
        




        


        Router::dispatch();
    }
}

