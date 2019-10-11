<?php


if (isset($_POST['peso']) && isset($_POST['altura']) && is_numeric($_POST['peso']) && is_numeric($_POST['altura']) ) {
    
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $imc = $peso / ($altura*$altura);

    $imc = round($imc,1);
    
    if($imc<18.5){
        $resultado = "Bajo de peso";
        $color ="red";
    }
    if($imc >= 18.5 && $imc < 24.9){
        $resultado = "Normal";
        $color ="green";
    }
    if($imc >= 24.9 && $imc < 29.9){
        $resultado = "Gordito";
        $color ="yellow";
    }
    if($imc > 30)
        $resultado = "Obeso";
        $color ="orange ";
    }



}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Calculadora IMC</title>
</head>
<body>
    <h2>Calculadora IMC</h2>
    <br><br>

    <form class="" action="imc.php" method="post">
     Altura (M): <input type="number" step=".01" name="altura" value="" placeholder="Ingrese su estatura" required><br><br>
     Peso (KG): <input type="number" step=".01" name="peso" value="" placeholder="Ingrese su peso" required><br><br>
     <input type="submit" name="" value="Calcular">
    </form>
    <br>
    
    <?php if (isset($imc)){ ?>
        <?php echo "Tu IMC es de: ".$imc; ?>
    <br>
    <div style="color:<?php echo $color;?>">:<?php echo $resultado; ?></div>
    <?php } ?>
</body>

</html>
