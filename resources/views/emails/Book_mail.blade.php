<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Please return the book</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>
    
    <p>This email is to remind you that you have borrowed the book "{{ $bookName }}" from our library, and the return deadline has passed.</p>
    
    <p>Please return the book at your earliest convenience.</p>
    
    <p>Thank you!</p>
</body>
</html>
