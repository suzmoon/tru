// Function to update the price based on selected service (if applicable)
function updatePrice() {
    const serviceSelect = document.getElementById("service-select");
    const price = serviceSelect.value;
    const serviceName = serviceSelect.options[serviceSelect.selectedIndex].dataset.name;
    const vat = (price * 0.1).toFixed(2);
    const total = (parseFloat(price) + parseFloat(vat)).toFixed(2);

    document.getElementById("service-name").innerText = `${serviceName} - $${price}`;
    document.getElementById("product-price").innerText = `$${price}`;
    document.getElementById("vat").innerText = `$${vat}`;
    document.getElementById("total").innerText = `$${total}`;
}

// Function to show the relevant payment details based on selected method
function showPaymentDetails() {
    const paymentMethod = document.querySelector('input[name="payment-method"]:checked').value;

    // Hide all payment details
    document.querySelectorAll('.payment-details').forEach((el) => {
        el.style.display = 'none';
    });

    // Show relevant payment details
    if (paymentMethod === 'credit-card') {
        document.getElementById('credit-card-details').style.display = 'block';
    } else if (paymentMethod === 'paypal') {
        document.getElementById('paypal-details').style.display = 'block';
    } else if (paymentMethod === 'bank-transfer') {
        document.getElementById('bank-transfer-details').style.display = 'block';
    }
}

// Function to simulate payment process
function processPayment() {
    alert("Payment Processed Successfully!");
    // Normally, here you'd process the payment via an API.
}
