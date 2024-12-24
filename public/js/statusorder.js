document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Lấy CSRF token từ meta tag
    const updateStatusUrl = document.querySelector('meta[name="update-status-url"]').getAttribute('content'); // Lấy URL từ meta tag

    document.querySelectorAll('.update-status').forEach(button => {
        button.addEventListener('click', function () {
            const cartId = this.getAttribute('data-id');
            const statusId = this.getAttribute('data-status');

            fetch(updateStatusUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    cart_id: cartId,
                    status_id: statusId
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status) {
                        alert(data.message);
                        location.reload(); // Refresh trang để cập nhật trạng thái
                    } else {
                        alert('Failed to update status');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred');
                });
        });
    });
});
