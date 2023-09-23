<!DOCTYPE html>
<html>

<head>
    <title>Verify Email Address</title>
</head>

<body>
    <!-- <h2>Serial Number Notification</h2> -->
    <p>Dear {{ $name }},</p>
    <p>Welcome to Lern.Africa, where your tech dreams come to life! We're thrilled to have you on board, and we want to ensure you make the most of your reserved seat. Your exclusive seat number is: {{ $serialNumber }}.
    </p>
    <p>To secure your spot, follow these simple steps:</p>
    <p>Verify your email address and log in to your account by clicking the link below:
        <a href="{{ $verificationUrl }}">Verify Email Address</a></p>

        <p><b>Your generated Password:{{ $password }}</b><br>
       Please keep this information secure. Thank you!</p>
    <p>Complete your registration by making the payment for your chosen course. Please note that failure to pay within the next 7 days will result in the forfeiture of your reserved seat number.</p>

    <p>Earn referal commission by uploading your contact list of friends and family who are passionate about a career in tech. We'll handle the rest and ensure they receive the information they need to join this exciting journey.</p>

    <p>Act now to seize this incredible opportunity! Your reserved seat is waiting for you, and we can't wait to see you thrive at Lern.Africa.
    </p>
    <p>If you have any questions or need assistance, please don't hesitate to reach out to our dedicated support team.
    </p>
    <p>Thank you for choosing Lern.Africa. Let's unlock your tech potential together!</p>

    <p>Best regards,</p>

    <p>AMOS AGBORO<br>
    Lean.Africa Team</p>

</body>

</html>
