<!--  IMPRIMIR
<a href="javascript:imprSelec('seleccion')" >Imprime la ficha</a>
<input type="button" onclick="imprSelec('seleccion')" value="imprimir div" />-->
<style>
.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.center2 {
  margin: 0;
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translate(-50%, -100%);
}
</style>

<DIV ID="seleccion">
    <IMG SRC="<?php echo base_url(); ?>/public/images/logo.png" width="125" height="30" >
    <!--   <div id="container" style="width: 1366px; height: 750px; border:15 ; margin: auto"></div> -->
    <div class="center" id="container"></div>
</DIV>



<!--   <input type="button" name="imprimir" value="Imprimir" onclick="window.print();">    -->
<table class="center2" border="1" align="Left" width="60%">

    <tr>
        <td class="boton"> AjustarEscala : </td>
        <td class="texto">Minimo :<input id="min" type="text" value="1"></input></td>
        <td class="texto">Maximo :<input id="max" type="text" value="2"></input></td>
        <td><button type="submit" class="boton" id="change">OK</button></td>
        <td><button type="button" class="btn btn-primary btn-sm" onclick="imprSelec('seleccion')" class="botonprint">Imprimir Grafico</button></td>
    </tr>

    

</table>