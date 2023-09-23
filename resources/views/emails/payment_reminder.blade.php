<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Reminder</title>
</head>
<body>
<p>Hi {{ $userName }},</p>

<p>We hope this email finds you well and excited about your reserved seat at Lern.Africa. We wanted to remind you that time is ticking, and we wouldn't want you to miss out on this incredible opportunity to kickstart your tech journey. Your current reserved seat number is {{ $serialNumber }}.</p>

<p>As a friendly reminder, failure to complete your payment within the next 3 days will result in the loss of your reserved seat number and your chances for a faster payout. Don't let this slip away! Take action now and secure your spot by following these steps:
</p>

<p>Log in to your Lern.Africa account using the link below:<br>
<a href="{{ url('http://lern.africa/login/') }}">Login here</a></p>

<p>Navigate to the payment section and complete your registration by making the payment for your selected course.</p>

<p>Remember, by making the payment, you not only guarantee your spot but also unlock access to our premium course content and exclusive benefits. Don't miss out on this opportunity to enhance your tech skills and open doors to exciting career prospects.</p>

<p>If you have any questions or need assistance, our dedicated support team is here to help. Simply reply to this email, and we'll get back to you promptly.</p>

<p>We look forward to welcoming you officially to Lern.Africa and supporting you on your learning journey. Act now to secure your reserved seat before it's too late!</p>

<p>Best regards,</p>

<p>[Your Name]<br>
Lern.Africa Team
</p>
</body>
</html>
