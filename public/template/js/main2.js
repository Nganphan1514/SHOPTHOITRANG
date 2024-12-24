
    // Wait for the document to load
    document.addEventListener('DOMContentLoaded', function() {
        // Find the first available size button and select it
        const firstSizeButton = document.querySelector('.size-button');

    if (firstSizeButton) {
        // Trigger a click on the first size button to mark it as selected
        firstSizeButton.click();

    // Set the selected size and quantity
    const sizeId = firstSizeButton.getAttribute('data-size-id');
    const quantity = firstSizeButton.getAttribute('data-quantity');

    // Set the hidden inputs for size and quantity
    document.getElementById('selected-size').value = sizeId;
    document.getElementById('selected-quantity').value = quantity;

    // Display the quantity section
    document.getElementById('size-quantity').style.display = 'block';
    document.getElementById('quantity-value').textContent = quantity;

    // Highlight the first button as selected
    firstSizeButton.classList.add('selected');
        }

    // Handle click on size buttons
    const sizeButtons = document.querySelectorAll('.size-button');
        sizeButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Remove 'selected' class from all buttons
            sizeButtons.forEach(btn => btn.classList.remove('selected'));

            // Add 'selected' class to the clicked button
            this.classList.add('selected');

            // Set the selected size and quantity in hidden inputs
            const sizeId = this.getAttribute('data-size-id');
            const quantity = this.getAttribute('data-quantity');
            document.getElementById('selected-size').value = sizeId;
            document.getElementById('selected-quantity').value = quantity;
            const sizeName = this.textContent.trim();
            document.getElementById('selected-size-name').value = sizeName;

            // Update the quantity section
            document.getElementById('size-quantity').style.display = 'block';
            document.getElementById('quantity-value').textContent = quantity;
        });
        });
    });

