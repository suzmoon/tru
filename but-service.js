// Function to update the price dynamically based on service selection
function updatePrice() {
    const serviceSelect = document.getElementById("service-select");
    const price = serviceSelect.value;
    const serviceName = serviceSelect.options[serviceSelect.selectedIndex].dataset.name;
    const vat = (price * 0.1).toFixed(2);
    const total = (parseFloat(price) + parseFloat(vat)).toFixed(2);

    // Update the display
    document.getElementById("service-name").innerText = `${serviceName} - $${price}`;
    document.getElementById("product-price").innerText = `$${price}`;
    document.getElementById("vat").innerText = `$${vat}`;
    document.getElementById("total").innerText = `$${total}`;
}
