<!-- subscription.blade.php -->

<form id="subscriptionForm" action="{{ route('subscribe') }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="amount">Amount (in Naira):</label>
    <input type="number" id="amount" name="amount" required>

    <button type="submit" id="subscribeButton">Subscribe</button>
</form>

<div id="paymentPopup"></div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const subscriptionForm = document.getElementById("subscriptionForm");
        const subscribeButton = document.getElementById("subscribeButton");
        const paymentPopup = document.getElementById("paymentPopup");



            const email = document.getElementById("email").value;
            const amount = document.getElementById("amount").value;


            paymentPopup.innerHTML = "Creating subscription and initiating payment...";

            createSubscriptionAndInitiatePayment(email, amount);

        function createSubscriptionAndInitiatePayment(email, amount) {
            fetch("{{ route('create-subscription') }}", {
                method: "POST",
                body: JSON.stringify({ email: email, amount: amount }),
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    paymentPopup.innerHTML = data.paymentPopupHtml;
                } else {
                    paymentPopup.innerHTML = "Error creating subscription and initiating payment.";
                }
            })
            .catch(error => {
                paymentPopup.innerHTML = "An error occurred: " + error;
            });
        }
    });
</script>
