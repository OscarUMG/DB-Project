<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Informe de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff; /* Fondo azul para encabezados */
            color: #fff; /* Texto blanco para encabezados */
        }
        /* Estilos para el encabezado */
        #encabezado {
            text-align: center;
            /* background-color: #eee; */
            padding: 10px;
        }
        #encabezado h2 {
            margin: 0;
        }
        #imagen-esquina {
            position: absolute;
            top: 10px; /* Ajusta la posición vertical */
            right: 10px; /* Ajusta la posición horizontal */
        }
    </style>
</head>
<body>
    <img 
        id="imagen-esquina" 
        src="https://umg.edu.gt/assets/umg.png" 
        width="100px"
        height="100x"
        alt="umg"
    >

    <div id="encabezado">
        <h2>UNIVERSIDAD MARIANO GALVEZ</h2>
        <p>3a. AVENIDA 9-00, ZONA 2</p>
        <p>NIT: 57463-5</p>
    </div>

    <span>No de boleta: {{ $pago[0]->no_boleta }}</span>
    <br>
    <span>Estudiante: {{ $pago[0]->nombre_estudiante }}</span>
    <br>
    <br>
    
    <table>
        <thead>
            <tr>
                <th>SEMESTRE</th>
                <th>MES</th>
                <th>AÑO</th>
                <th>TIPO DE PAGO</th>
                <th>METODO DE PAGO</th>
                <th>MONTO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pago[0]->semestre }}</td>
                <td>{{ $pago[0]->mes }}</td>
                <td>{{ $pago[0]->anio }}</td>
                <td>{{ $pago[0]->tipo_de_pago }}</td>
                <td>{{ $pago[0]->metodo_de_pago }}</td>
                <td>{{ $pago[0]->monto }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
