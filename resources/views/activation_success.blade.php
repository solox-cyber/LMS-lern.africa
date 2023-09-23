<!DOCTYPE html>
<html>
<head>
    <title>Account Expired</title>
</head>
<body>
    <h1>Your Account Has Expired</h1>
    <p>Dear {{ $user->name }},</p>
    <p>Your account has expired. To reactivate it, please click the link below:</p>
    <a href="{{ route('activated', ['token' => $user->activation_token]) }}">Reactivate Account</a>
    <p>If you have any questions, please contact our support team.</p>
</body>
</html>
