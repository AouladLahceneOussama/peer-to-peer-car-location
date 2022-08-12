<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>New email from {{ $data['name'] }}.</h2>
    <p>Email : {{ $data['email'] }}</p>
    <p>{{ $data['message'] }}</p>
</body>
</html>