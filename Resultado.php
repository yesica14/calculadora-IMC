
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Calculadora</title>
</head>
<body>
    <h2>Calculadora WEB</h2>
    <br><br>

    <form class="" action="Resultado.php" method="get">
     valor1 <input type="number" name="numero1" value="" placeholder="Ingrese su estatura" required><br><br>
     valor2 <input type="number" name="numero2" value="" placeholder="Ingrese su peso" required><br><br>
     <input type="submit" name="" value="Calcular">
    </form>
    <br>
    <br>
</body>

</html>
<?php

if (isset($_GET['numero1']) && isset($_GET['numero2']) && is_numeric($_GET['numero1']) && is_numeric($_GET['numero2']) ) {
    $numero1=$_GET['numero1'];
    $numero2=$_GET['numero2'];
    echo $numero1 + $numero2;

}

?>