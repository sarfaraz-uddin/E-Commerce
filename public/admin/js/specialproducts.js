$(document).ready(function() {
    const productId=$('#productId').val();
    const productPrice=$('#productId option:selected').data('price');
    $('#originalPrice').val(productPrice);

    $('#productId').on('change',function(){
        const productId=$('#productId').val();
        const productPrice=$('#productId option:selected').data('price');
        $('#originalPrice').val(productPrice);
    });

    const originalPriceInput=document.getElementById('originalPrice');
    const discountPercentInput = document.getElementById('discountPercent');
    const discountPriceInput = document.getElementById('discountPrice');

    discountPercentInput.addEventListener('input', calculateDiscount);

    discountPriceInput.addEventListener('input', calculateDiscountedPrice);

    function calculateDiscount(){
        const originalPrice = Number(originalPriceInput.value);
        const discountPercent = Number(discountPercentInput.value);
        const discountPrice = originalPrice - (originalPrice * (discountPercent / 100));
        discountPriceInput.value = discountPrice.toFixed(0);
    }

    function calculateDiscountedPrice(){
        const originalPrice = Number(originalPriceInput.value);
        const discountPrice=Number(discountPriceInput.value);
        const discountPercent=((originalPrice-discountPrice)/originalPrice)*100;
        discountPercentInput.value=discountPercent;
    }
});

