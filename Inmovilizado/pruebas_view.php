<!DOCTYPE html>
  <html lang="es">
  <head>
  <meta charset="utf-8">
  <title>'pruebas_view'</title></head>
  <body>
  <div>
  <center>
     <img src=".\LogoStimey.jpg" alt="Logo Stimey"/>
     <br> Mostrando tabla pruebas <br>
  <table border = 1><br><tr><br>
  <td>'id'</td>
    <td>'type'</td>
    <td>'user'</td>
    <td>'supervisor'</td>
    <td>'status'</td>
    <td>'requestDate'</td>
    <td>'deadDate'</td>
    </tr><br>
  </table>
  </center>
  </div>
  <?php
  header("Location: menuSupervisar.php");
  ?>
  </body>
  </html>