<!DOCTYPE HTML>
<html>
<body>

<form action="compSupervisar.php" method="post">
ID prueba: <input type="number" name="id"><br>
Correcto    <input type="radio" name="CorrectRadio" value = "Correcto" checked><br>
No Correcto <input type="radio" name="CorrectRadio" value = "Incorrecto" checked><br>
<textarea
  ID="text"
  cols="40"
  rows="4"
  name="motivo"
  placeholder="Motivos...">
</textarea>
<input type="submit" value = "Valorar">
</form>
</body>
</html>
