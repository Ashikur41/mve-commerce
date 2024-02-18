<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Triad Solution</title>
</head>
<body>
<table>
    <td>Invoice No: {{ $order['invoice_no'] }}</td>
    <td>Amount : {{ $order['amount'] }}</td>
    <td>Name : {{ $order['name'] }}</td>
    <td>Email : {{ $order['email'] }}</td>
</table>
</body>
</html>
