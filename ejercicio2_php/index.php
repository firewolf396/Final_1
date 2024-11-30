<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Descuentos</title>
    <a href="index.css"></a>
</head>
<body>
    <h1>Calculadora de Descuentos</h1>
    <form method="post" action="">
        <label for="producto">Nombre del Producto:</label>
        <input type="text" id="producto" name="producto" required><br><br>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select><br><br>

        <label for="precio">Precio Unitario:</label>
        <input type="number" id="precio" name="precio" step="0.01" required><br><br>

        <label for="unidades">Unidades:</label>
        <input type="number" id="unidades" name="unidades" required><br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $producto = $_POST['producto'];
        $categoria = $_POST['categoria'];
        $precio = (float)$_POST['precio'];
        $unidades = (int)$_POST['unidades'];

        $descuento = 0;

        if ($categoria === 'A') {
            if ($unidades >= 1 && $unidades <= 10) {
                $descuento = 0.01;
            } elseif ($unidades >= 11 && $unidades <= 20) {
                $descuento = 0.015;
            } elseif ($unidades > 20) {
                $descuento = 0.02;
            }
        } elseif ($categoria === 'B') {
            if ($unidades >= 1 && $unidades <= 10) {
                $descuento = 0.012;
            } elseif ($unidades >= 11 && $unidades <= 20) {
                $descuento = 0.02;
            } elseif ($unidades > 20) {
                $descuento = 0.03;
            }
        } elseif ($categoria === 'C') {
            if ($unidades >= 11 && $unidades <= 20) {
                $descuento = 0.005;
            } elseif ($unidades > 20) {
                $descuento = 0.01;
            }
        }

        
        $precio_total = $precio * $unidades;
        $valor_descuento = $precio_total * $descuento;
        $total = $precio_total - $valor_descuento;

        $clase_categoria = '';
        if ($categoria === 'A') {
            $clase_categoria = 'categoria-a';
        } elseif ($categoria === 'B') {
            $clase_categoria = 'categoria-b';
        } elseif ($categoria === 'C') {
            $clase_categoria = 'categoria-c';
        }

        echo "<div class='resultado $clase_categoria'>";
        echo "<p>Producto: $producto</p>";
        echo "<p>Categoría: $categoria</p>";
        echo "<p>Unidades: $unidades</p>";
        echo "<p>Precio Unitario: ".number_format($precio, 2)."</p>";
        echo "<p>Precio Total: ".number_format($precio_total, 2)."</p>";
        echo "<p>Descuento: ".($descuento * 100)."%</p>";
        echo "<p>Valor del Descuento: ".number_format($valor_descuento, 2)."</p>";
        echo "<p>Total a Pagar: ".number_format($total, 2)."</p>";
        echo "</div>";
    }
    ?>
</body>
</html>
