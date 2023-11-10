<!DOCTYPE html>
<html>

<head>
    <title>AUTOPLANET COMANDA</title>
</head>

<body>
    <h2>COMANDA D'AUTOPLANET</h2>

    <p>Gràcies per la teva compra!</p>

    <p>Aquí tens els detalls del teu comanda:</p>

    <p>Escaneja el codi QR de sota:</p>

    <img src="data:image/svg+xml;base64,{{ base64_encode($qrCodeData) }}" alt="Codi QR">

    <p>Gràcies per escollir AUTOPLANET!</p>

</body>

</html>
