<?php
namespace Controllers;
Use Lib\Pages;
use Models\Usuario;
use Utils\Utils;
use Lib\BaseDatos;
use PDO;
use PDOException;
class UsuarioController{
    private Pages $pages;





    function __construct(){

        $this->pages= new Pages();
        

    }
    public function registro():void{
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Falta sanear y validar
        if($_POST['data']){
        $registrado = $_POST['data'];

        
        
        //Encriptar contraseña
        $registrado['pass'] = password_hash($registrado['pass'], PASSWORD_BCRYPT, ['cost'=>4]);

        
        
        $usuario = Usuario::fromArray($registrado);

        

        
        
        $save= $usuario->save();
        if($save){
            
        $_SESSION['register'] = "complete";
        }else{
            $_SESSION['register'] = "failed";
        }
    }else{
        $_SESSION['register'] = "failed";
    }
}
$this->pages->render('usuario/registro');
}

public function login(): void {

    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['data'])) {
            $auth = $_POST['data']; //SANEAR Y VALIDAR
            


            // Buscar el usuario en la base de datos por su correo electrónico
            $usuario = Usuario::fromArray($auth);

            
            
            $identity = $usuario->login();


            //Crear sesión
            
            if ($identity && is_object($identity)) {
                // Iniciar sesión y guardar los datos del usuario en la variable de sesión
                
                $_SESSION['identity'] = $identity;

               


                

                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
                

            }else{
                $_SESSION['error_login']='Identificación fallida!!';
            }
                // Redirigir a la página de inicio o a la página de usuario autenticado
            $this->pages->render('dashboard/index');
            
        }

    }

}

public function identifica(){
    $this->pages->render('usuario/login');
}


public function logout(){
    Utils::deleteSession('identity');
    header( "Location:".BASE_URL);
}



}