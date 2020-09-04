<?php

    class Usuarios
    {

        public static function verificarLogin($login,$senha){
            $verifica = MySql::conectar()->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
            $verifica->execute(array($login,$senha));

            if ($verifica->rowCount() == 1) {
                return true;
            }else{
                return false; 
            }
        }

        public static function startSession($login,$id){
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $id;
            //PEgar restante das informações
            $info= MySql::conectar()->prepare("SELECT * FROM usuarios WHERE id = ?");
            $info->execute(array($id));
            $info = $info->fetch();
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['localizacao'] = $info['localizacao'];
            $_SESSION['latitude'] = $info['lat_cord'];
            $_SESSION['longitude'] = $info['long_cord'];
            $_SESSION['sexo'] = $info['sexo'];
        }

        public static function getUserId($email){
            $id = MySql::conectar()->prepare("SELECT id FROM usuarios WHERE email = ?");
            $id->execute(array($email));
            $id = $id->fetch()['id'];
            return $id;
        }

        public static function deslogar(){
            session_destroy();
        }

        public static function pegaUsuarioNovo(){
            if ($_SESSION['sexo'] == 'masculino') {
                $pegaUsuarioRandom = MySql::conectar()->prepare("SELECT * FROM usuarios WHERE sexo != 'masculino' ORDER BY RAND() LIMIT 1");
                $pegaUsuarioRandom->execute();
                $pegaUsuarioRandom = $pegaUsuarioRandom->fetch();
                return $pegaUsuarioRandom;
            }
        }
    }


?>