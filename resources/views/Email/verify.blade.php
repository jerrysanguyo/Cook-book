<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>
    <p>Please click the link below to verify your email address:</p>
    <p><a href="{{ $url }}">Verify Email</a></p>
    <p>This link will expire in 1 minute.</p>
    <p>Thank you!</p>
</body>
</html>
