<?php include_once 'session.php' ?>
<script src="js/reservar.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.rut.js"></script>

<script>
    
 function limpiarValores(){
 
     document.getElementById('idPaciente').value="";
     document.getElementById('especialidad').value ="-- Seleccionar Especialidad --";
     document.getElementById('centroMedico').value ="-- Seleccionar Centro M&eacute;dico --";
     document.getElementById('profesional').value ="-- Seleccionar Profesional --";     
     document.getElementById('fecha').value="dd-mm-aaaa";
      document.getElementById('horario').value ="-- Seleccionar Hora --"; 
 }
 </script>
<script>
$(function() {
    $("#rut").rut().on('rutValido', function(e, rut, dv) {
        alert("El rut " + rut + "-" + dv + " es correcto");
    }, { minimumLength: 7} );
})
</script>
<section class="reserva">
    <b>Reserva de Horas</b>
    <p>
        Seleccione a continuaci&oacute;n la especialidad, centro m&eacute;dico,
        profesional y horario que m&aacute;s le acomode.
    </p>
    
    <div id="ajaxLoading">
        <img src="img/ajax-loader.gif" alt="cargando..."/>
    </div>
    
    <div class="areaPaciente">
        <label>RUT del Paciente: </label>
    <input type="test" id="rut" name="rut" />
    </div>

    <div class="areaSelectores">
        <label>Especialidad: </label>
        <select id="especialidad" name="especialidad">
            <option value="" disabled="">-- Seleccionar Especialidad --</option>
        </select>

        <label>Centro M&eacute;dico: </label>
        <select id="centroMedico" name="centro">
            <option value="" disabled >-- Seleccionar Centro M&eacute;dico --</option>
        </select>

        <label>Profesional: </label>
        <select id="profesional" name="profesional">
            <option value="" disabled>-- Seleccionar Profesional --</option>
        </select>

        <label>Fecha: </label>
        <input type="date" id="fecha" name="fecha" value="" placeholder="seleccione una fecha" min=<?php echo date('Y-m-d',strtotime("-1 days"));?> >

        <label>Horario: </label>
        <select id="horario" name="horario">
            <option value="">-- Seleccionar Hora --</option>
        </select>
    </div>    

    <div class="areaBotones">
        <input id="cancelar" type="button" value="Cancelar" name="cancelar" />
        <input id="reservar" type="button" value="Reservar" name="reservar" />
        
        <input id="limpiar" type="button" value="Clear" name="limpiar" onclick="limpiarValores()"/>
    </div>

</section>
