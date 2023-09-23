<!DOCTYPE html>
<html>
<head>
    <title>Payment Success</title>
</head>
<body>
    <h1>Payment Successful</h1>
    @if(isset($_GET['status']) && $_GET['status'] === 'success')
        <p>Your payment was successful.</p>
        <p>Thank you for completing your registration.</p>
        <p>Your account has been activated.</p>
    @else
        <p>Oops! Payment failed. Please try again later.</p>
    @endif
</body>
</html>
