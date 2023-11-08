<!DOCTYPE html>
<html>
<head>
    <title>Ticket Autoplanet</title>
</head>
<body>
    <img src="data:image/png;base64,{{ base64_encode($qr) }}" alt="QR Code"> <!--- el base64_encode(var qr (compact de userInfo))-->
</body>
</html>