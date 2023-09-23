<!DOCTYPE html>
<html>


<body>
    <!-- <h2>Serial Number Notification</h2> -->
    <p>Dear {{ $user->name }},</p>
    <p>
    Welcome to Lern.Africa, where your tech dreams come to life! We noticed you signed up but didnt follow through with payment for your selected course.
    </p>
    <p>To secure your spot and maximize your earning potential as the network expands, follow these simple steps:</p>
    <p>1. Click the link below complete your registration by making the payment for your chosen course.</p>
 
        <p><a href="{{ $paymentUrl }}">Click to Register</a></p>

    <p>2. Login to your user dashboard and upload your contact list of friends and family (minimum of 10 contacts) who are passionate about a career in tech. We'll handle the rest and ensure they receive the information they need to join this exciting journey.</p>

    <p>If you have any questions or need assistance, please don't hesitate to reach out to our dedicated support team via email: <a href="mailto:support@lern.africa">support@lern.africa</a>
</p>

    <p>Thank you for choosing <a href="https://lern.africa">Lern.Africa</a>. Let's unlock your tech potential together!</p>

    <p>Best regards,</p>

    <p>AMOS AGBORO<br>
    Lean.Africa Team</p>

</body>

</html>
