<?php
        try {
            $mbd = new PDO('mysql:host=localhost;dbname=control_de_impresiones', 'root', '');
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }

?>