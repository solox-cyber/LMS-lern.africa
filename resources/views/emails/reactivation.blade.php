<!DOCTYPE html>
<html>
<head>
    <title>Account Reactivation</title>
</head>
<body>
    <h1>Account Reactivation</h1>
    <p>Dear {{ $user->name }},</p>
    <p>Your account has been reactivated successfully. <br> You can now log in using the link below:</p>
    <a href="{{ route('login') }}">Login</a>
    <p>If you have any questions, please contact our support team.</p>
</body>
</html>
