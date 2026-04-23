document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('product-popup');
    if (!popup) return;

    const popupImg = document.getElementById('popup-img');
    const popupName = document.getElementById('popup-name');
    const popupPrice = document.getElementById('popup-price');
    const popupProductId = document.getElementById('popup-product-id');
    const qtyDisplay = document.getElementById('quantity-display');
    const qtyInput = document.getElementById('quantity-input');
    const items = document.querySelectorAll('[data-slug]');

    items.forEach(box => {
        box.addEventListener('click', () => {
            popupImg.src = box.dataset.img;
            popupName.textContent = box.dataset.name;
            popupPrice.textContent = box.dataset.price;
            popupProductId.value = productMap[box.dataset.slug];
            qtyDisplay.textContent = '1';
            qtyInput.value = 1;
            popup.classList.add('show');
        });
    });

    document.getElementById('close-popup').addEventListener('click', () => {
        popup.classList.remove('show');
    });

    document.getElementById('increase').addEventListener('click', () => {
        let q = parseInt(qtyInput.value) + 1;
        qtyInput.value = q; qtyDisplay.textContent = q;
    });

    document.getElementById('decrease').addEventListener('click', () => {
        let q = parseInt(qtyInput.value);
        if (q > 1) { q--; qtyInput.value = q; qtyDisplay.textContent = q; }
    });

    popup.addEventListener('click', e => {
        if (e.target === popup) popup.classList.remove('show');
    });
});