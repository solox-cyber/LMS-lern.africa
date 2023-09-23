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
    <p>To participate in our enrollment referal program and maximize your earning potential while waiting for the course start date in November, follow these simple steps:</p>
    <p>1. Verify your email address and log in to your account by clicking the link below:
        <a href="{{ $verificationUrl }}">Verify Email Address</a></p>
    <p>2. Login to your user dashboard and upload your contact list of friends and family (minimum of 10 contacts) who are passionate about a career in tech. We'll handle the rest and ensure they receive the information they need to join this exciting journey.</p>

    <p>If you have any questions or need assistance, please don't hesitate to reach out to our dedicated support team via email: <a href="mailto:support@lern.africa">support@lern.africa</a>
    </p>
    <p>Thank you for choosing Lern.Africa. Let's unlock your tech potential together!</p>

    <p>Best regards,</p>

    <p>AMOS AGBORO<br>
        Lean.Africa Team</p>

</body>

</html>
