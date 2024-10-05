const express = require('express');
const mysql = require('mysql');
const cors = require('cors');

const app = express();
app.use(cors()); // Permite solicitudes desde el navegador

// Conexión a la base de datos
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root', // Usuario de tu base de datos
    password: '', // Contraseña de tu base de datos
    database: 'sancayetano', // Nombre de tu base de datos
    port: 3306 // Puerto de la base de datos (opcional si es 3306)
});

db.connect((err) => {
    if (err) {
        console.error('Error de conexión a la base de datos:', err);
    } else {
        console.log('Conectado a la base de datos');
    }
});

// Endpoint para obtener los datos de la tabla
app.get('/datos', (req, res) => {
    const query = 'SELECT `N° Rendicion`, `N° Transferencia`, `Beneficiado`, `Importe`, `Fecha`, `Doc Tipo`, `Doc Serie`, `Doc Numero`, `Proveedor`, `Descripcion`, `Precio` FROM rendiciones'; // Cambia esto por tu consulta SQL
    db.query(query, (err, results) => {
        if (err) {
            res.status(500).json({ error: err });
        } else {
            res.json(results);
        }
    });
});

// Inicia el servidor
app.listen(3000, () => {
    console.log('Servidor corriendo en http://localhost:3000');
});
