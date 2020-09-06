<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($bill->order as $orderVal )
        {{$orderVal->date_start}}
        {{$orderVal->date_end}}
    @endforeach
</body>
</html>
