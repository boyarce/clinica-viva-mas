<?php include_once 'session.php' ?>
<script>
    
 function limpiarValores(){
 
     document.getElementById('email').value="";
     document.getElementById('nombre').value ="";
     document.getElementById('clave').value ="";
     document.getElementById('perfil').value ="-- Seleccionar Perfil --";   
 }
 </script>

 <section class="usuario">

    <b>Registro de usuario</b>
    <p>
        En esta sección, podrá registrar la información del usuario.
    </p>
   
    
    <div id="ajaxLoading">
        <img src="img/ajax-loader.gif" alt="cargando..."/>
    </div>
    
    <div class="areaEmailUsuario">
        <label>Email: </label>
        <input id="email" type="text" name="email" value="" />
    </div>
    
    <div class="areaClaveUsuario">
        <label>Clave: </label>
        <input id="clave" type="password" name="clave" value="" />
    </div>
    <div class="areaNombreUsuario">
        <label>Nombre: </label>
        <input id="nombre" type="text" name="nombre" value="" />
    </div>
    
  
     
    <div class="areaSelectoresPerfil">
       
        <label>Perfil: </label>
        <select id="perfil" name="perfil">
            <option value="0">-- Seleccionar Perfil --</option>
            <option value="1">Administrador</option>
            <option value="2">Reserva</option>
            <option value="3">Consulta</option>
            
        </select>
    </div>    

    <div class="areaBotonesUsuario">
        <input id="cancelar" type="button" value="Cancelar" name="cancelar" />
        <input id="registrar" type="button" value="Registrar" name="btnRegistrar" />
       
    </div>
    
    

</section>
            


