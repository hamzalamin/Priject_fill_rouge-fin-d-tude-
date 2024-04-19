<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Credentials</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>

    <p>Your account has been created as an operator. Here are your credentials:</p>

    <ul>
        <li><strong>Email:</strong> {{ $user->email }}</li>

       <li><strong>Password:</strong> you can contact us ASAP for get the password</li>
    </ul>

    <p>You can now log in using the provided email and password.</p>

    <p>Thank you,</p>
    <p>Admin 'LIBEUP'</p>
</body>
</html>
