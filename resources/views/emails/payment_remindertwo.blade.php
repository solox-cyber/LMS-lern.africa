<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Reminder</title>
</head>
<body>

<p>Hi {{ $userName }},</p>

<p>This is your final reminder to secure your reserved seat at Lern.Africa. Time is running out, and we don't want you to miss out on this incredible opportunity. Your current reserved seat number is {{ $serialNumber }}.</p>

<p>Please note that failure to make the payment for your selected course within the next 48 hours will result in the loss of your reserved seat number and your chances for a faster payout. We'd hate for you to lose your place in line!</p>

<p>To ensure your spot is secured, take immediate action by following these steps:</p>

<p>Click the link below to log in to your Lern.Africa account:<br>
<a href="{{ url('http://lern.africa/login/') }}">Login here</a></p>

<p>Proceed to the payment section and complete your registration by making the payment for your chosen course.</p>

<p>Remember, this is your chance to join a vibrant community of learners, gain valuable skills, and unlock new career opportunities. Don't let this opportunity slip away.</p>

<p>If you need any assistance or have questions, please don't hesitate to reach out to us. We're here to support you every step of the way.</p>

<p>Secure your seat now, and let's embark on this exciting learning journey together!</p>

<p>Best regards,</p>

<p>[Your Name]<br>
Lern.Africa Team</p>
</body>
</html>
