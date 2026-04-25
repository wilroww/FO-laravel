<div class="product-popup" id="product-popup">
    <div class="popup-content">
        <img id="popup-img" src="" alt="Product">
        <div class="popup-details">
            <h3 id="popup-name"></h3>
            <div class="popup-rating">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <span>10K+ reviews | 26.7K+ items sold</span>
            </div>
            <h4 id="popup-price"></h4>
            <p>Soft bristles that gently clean your teeth while protecting your gums.</p>

            <form action="{{ route('cart.add') }}" method="POST" id="popup-form">
                @csrf
                <input type="hidden" name="product_id" id="popup-product-id">
                <div class="quantity-control">
                    <button type="button" id="decrease">-</button>
                    <span id="quantity-display">1</span>
                    <input type="hidden" name="quantity" id="quantity-input" value="1">
                    <button type="button" id="increase">+</button>
                </div>
                <button type="submit" id="add-to-bag">Add to bag</button>
            </form>
        </div>
        <span id="close-popup">&times;</span>
    </div>
</div>