document.addEventListener('DOMContentLoaded', function() {
  const moreInfoButtons = document.querySelectorAll('.more-info-btn');
  const itemInfoModal = new bootstrap.Modal(document.getElementById('itemInfoModal'));

  moreInfoButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      const itemId = btn.getAttribute('data-item-id');
      const itemName = btn.getAttribute('data-item-name');
      const itemPrice = btn.getAttribute('data-item-price');
      const itemTime = btn.getAttribute('data-item-time');
      const sellPrice = btn.getAttribute('data-item-id-auto');

      document.getElementById('itemInfoModalLabel').textContent = itemName + ' Information';
      document.getElementById('itemId').value = itemId;
      document.getElementById('itemName').value = itemName;
      document.getElementById('itemPrice').value = itemPrice;
      document.getElementById('itemTime').value = itemTime;
      document.getElementById('sellPrice').value = sellPrice;

      // disable the item name and time recorded input fields
      document.getElementById('itemName').disabled = true;
      document.getElementById('itemTime').disabled = true;

      itemInfoModal.show();
    });
  });

  const updateItemBtn = document.getElementById('updateItemBtn');
  const updateItemForm = document.getElementById('updateItemForm');

  updateItemBtn.addEventListener('click', function() {
    const formData = new FormData(updateItemForm);

    fetch('includes/update_item_info_user.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (response.status === 200) {
        // reload the page to reflect the updated data
        console.log("Succes")
      } else if (response.status === 400) {
        throw new Error('Failed to update item: bad request');
      } else if (response.status === 500) {
        throw new Error('Failed to update item: server error');
      } else {
        throw new Error('Failed to update item: unknown error');
      }
    })
    .catch(error => {
      console.error(error);
      alert(error.message);
    });
  });
});
