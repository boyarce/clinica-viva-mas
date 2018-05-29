<?php

if(isset($_POST['idPaciente']) && isset($_POST['idProfesional']) && isset($_POST['fecha']) && isset($_POST['hora'])) {
    echo ingresarReserva($_POST['idPaciente'],$_POST['idProfesional'], $_POST['fecha'], $_POST['hora']);
}

function ingresarReserva($idPaciente, $idProfesional, $fecha, $hora) {
    $host = "localhost";
    $user = "dbavivamas";
    $password = "a1s2d3";
    $database = "clinicavivamas";
    $port = 3306;           

    $query = "INSERT INTO reserva (id_paciente, id_profesional, fecha, hora) VALUES(?, ?, ?, ?)";
    
    $db = new mysqli($host, $user, $password, $database, $port);

    if($db->errno) {
        echo '<div class="error">No se pudo conectar a la base de datos: '.$db->error.'</div>';
        exit;
    }       

    $db->set_charset("utf8");
    $stmt = $db->prepare($query);
    $stmt->bind_param("iisi", $idPaciente, $idProfesional, $fecha, $hora);

    $resultado = $stmt->execute();
    
    if($resultado != false) {        
       echo "La reserva se ha ingresado correctamente"."\n";
        echo "Datos de la reserva "."\n";
        
        echo "Rut: ". $_POST['idPaciente']."\n";
        

        switch ($_POST['idProfesional']){
            case 9876345:
                echo "Profesional: "."Patricia Pamela Vásquez Vidal"."\n";
                break;
            
            case 10987123:
                echo "Profesional: "."Alfredo Alfonso Ramírez Riquelme"."\n";
                break;
            
            case 11111111:
                echo "Profesional: "."Juan José Pérez Pereira"."\n";
                break;
            
            case 11321123:
                echo "Profesional: "."Javiera Jacinta Monato Muñoz"."\n";
                break;
            
            case 12123123:
                echo "Profesional: "."Pedro Pablo Cárdenas Contreras"."\n";
                break;
            
            case 22222222:
                echo "Profesional: "."Amanda Antonia Burgos Barros"."\n";
                break;
            
        }
            
        echo "Fecha: ". $_POST['fecha']."\n";
        switch ($_POST['hora']){
            case 1:
                echo "Horario: "."08:00"."\n";
                break;
            
            case 2:
                echo "Horario: "."08:30"."\n";
                break;
            
            case 3:
                 echo "Horario: "."09:00"."\n";
                break;
            
            case 4:
                 echo "Horario: "."09:30"."\n";
                break;
            
            case 5:
                 echo "Horario: "."10:00"."\n";
                break;
            
            case 6:
                 echo "Horario: "."10:30"."\n";
                break;
            case 7:
                 echo "Horario: "."11:00"."\n";
                break;
            
            case 8:
                 echo "Horario: "."11:30"."\n";
                break;
            
            case 9:
                echo "Horario: "."12:00"."\n";
                break;
            
            case 10:
                 echo "Horario: "."12:30"."\n";
                break;
            
            case 11:
                echo "Horario: "."13:00"."\n";
                break;
            
            case 12:
                 echo "Horario: "."13:30"."\n";
                break;
            
            case 13:
                echo "Horario: "."14:00"."\n";
                break;
            
            case 14:
               echo "Horario: "."14:30"."\n";
                break;
            
            case 15:
                 echo "Horario: "."15:00"."\n";
                break;
            
            case 16:
                 echo "Horario: "."15:30"."\n";
                break;
            
            case 17:
                echo "Horario: "."16:00"."\n";
                break;
            
            case 18:
                 echo "Horario: "."16:30"."\n";
                break;
            
            case 19:
                echo "Horario: "."17:00"."\n";
                break;
            
            
            case 20:
                 echo "Horario: "."17:30"."\n";
                break;
            
            
            case 21:
                 echo "Horario: "."18:00"."\n";
                break;
            
            case 22:
                 echo "Horario: "."18:30"."\n";
                break;
            
            
            case 23:
                echo "Horario: "."19:00"."\n";
                break;
            
            
            case 24:
                 echo "Horario: "."19:30"."\n";
                break;
            
            
            
            case 25:
                 echo "Horario: "."20:00"."\n";
                break;
            
            
            case 26:
                 echo "Horario: "."20:30"."\n";
                break;
            
            
            case 27:
                 echo "Horario: "."21:00"."\n";
                break;
            
        }
    } else {
        return "No fue posible ingresar la reserva";
    }   
}