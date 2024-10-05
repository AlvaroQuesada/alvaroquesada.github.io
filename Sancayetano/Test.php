<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambia según tu configuración
$username = "tu_usuario"; // Cambia según tu configuración
$password = "tu_contraseña"; // Cambia según tu configuración
$dbname = "nombre_de_tu_base_de_datos"; // Cambia según tu configuración

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consultar los datos de la rendición de cuentas
$sql = "SELECT fecha, tipo, serie, numero, proveedor, concepto, importe FROM rendicion";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendición de Cuenta</title>
    <style>
        /* Aquí va tu CSS existente */
    </style>
</head>
<body>
    <div class="header">
        <img src="ruta/a/tu/logo.png" alt="Logo" class="logo">
        <div class="company-info">
            <h1>Comercial y Servicios San Cayetano SAC</h1>
            <p>Av. Ejemplo 123, Lima, Perú</p>
            <p>Teléfono: (01) 234-5678</p>
            <p>Email: contacto@cysancayetano.com</p>
        </div>
        <div class="accounting-info">
            <p><strong>N° de Cheque/Transferencia:</strong> 123456789</p>
            <p><strong>Beneficiario:</strong> Juan Pérez</p>
            <p><strong>Importe:</strong> S/ 1,000.00</p>
            <p><strong>Fecha:</strong> 01/10/2024</p>
        </div>
        <div class="rendition-number-box">
            <strong>N° de Rendición:</strong><br>
            <span>001</span>
        </div>
    </div>

    <div class="table-container">
        <table id="rendition-table">
            <thead>
                <tr>
                    <th>N° Fila</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Serie</th>
                    <th>Número</th>
                    <th>Proveedor/Beneficiado</th>
                    <th>Concepto</th>
                    <th>Importe</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $row_number = 1; // Contador de número de fila
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='draggable' draggable='true'>";
                        echo "<td>" . $row_number . "</td>";
                        echo "<td contenteditable='true' class='editable'>" . $row["fecha"] . "</td>";
                        echo "<td contenteditable='true' class='editable'>" . $row["tipo"] . "</td>";
                        echo "<td contenteditable='true' class='editable'>" . $row["serie"] . "</td>";
                        echo "<td contenteditable='true' class='editable'>" . $row["numero"] . "</td>";
                        echo "<td contenteditable='true' class='editable'>" . $row["proveedor"] . "</td>";
                        echo "<td contenteditable='true' class='editable'>" . $row["concepto"] . "</td>";
                        echo "<td contenteditable='true' class='editable'>S/ " . $row["importe"] . "</td>";
                        echo "</tr>";
                        $row_number++;
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay datos disponibles</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // Aquí va tu JavaScript existente
    </script>

</body>
</html>
