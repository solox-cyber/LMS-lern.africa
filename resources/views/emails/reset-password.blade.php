<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 16px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <h1>Password Reset</h1>

    <p>
        You are receiving this email because we received a password reset request for your account.
        Click the button below to reset your password:
    </p>

    <a href="{{ $resetLink }}">Reset Password</a>

    <p>
        If you did not request a password reset, no further action is required.
        This password reset link is only valid for the next {{ config('auth.passwords.'.config('auth.defaults.passwords').'.expire') }} minutes.
    </p>

    <p>Regards,</p>
    <p>Your Application</p>
</body>

</html>
