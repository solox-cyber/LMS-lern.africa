<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Payment Reminder</title>
</head>

<body>
    <p>Hi {{ $userName }},</p>

    <p>We wanted to reach out one final time to ensure you don't lose your reserved seat at Lern.Africa. Your current reserved seat number is [{{ $serialNumber }}, and we'd hate to see it go to waste.</p>

    <p>Please be aware that the deadline to make the payment for your selected course is approaching fast. If payment is not completed within the next 24 hours, your reserved seat number will be released, and you'll miss out on the opportunity for a faster payout as you'll be moved to the buttom of the network.</p>

    <p>To secure your spot and continue on the path of earning N1.5million in the next 30-60 days, follow these steps immediately:</p>

    <p>Access your Lern.Africa account by clicking the link below:<br>
    <a href="{{ url('http://lern.africa/login/') }}">Login here</a>
    </p>

    <p>Navigate to the payment section and finalize your registration by making the payment for the course you selected.</p>

    <p>By taking prompt action, you not only ensure your reserved seat but also gain access to an incredible learning experience, expert guidance, and valuable industry insights.</p>

    <p>If you encounter any issues or if you need any assistance or have questions, please don't hesitate to reach out to us. We're here to support you every step of the way.
    </p>

    <p>Best regards,</p>

    <p>[Your Name]<br>
        Lern.Africa Team
    </p>
</body>

</html>
