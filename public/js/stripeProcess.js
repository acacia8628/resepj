const stripe = Stripe('pk_test_51KPGaxKRmSFE4yc5SjGah08iLnclpyhxkq1tkNeA6vKQvjRwMY7IzalcEjj5TwU9eBmMQhT0th5GaxKCRsQrCSmy00pzH1Hegm');

// credit入力欄を#card_elementに代入
const elements = stripe.elements();
const cardElement = elements.create('card');
cardElement.mount('#card_element');

// 名義人と予約ボタンをIDを取得
const cardHolderName = document.getElementById('card_holder_name');
const reserveButton = document.getElementById('reserve_btn');

// 予約ボタンをクリック時、支払い方法が「クレジットカードで支払う」だった場合、クレジット決済処理
reserveButton.addEventListener('click', async (e) => {
    if (document.getElementById('payment_credit').checked) {
        e.preventDefault()
        const { paymentMethod, error } = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: { name: cardHolderName.value }
            }
        );

        if (error) {
            console.log(error);
        } else {
            stripePaymentIdHandler(paymentMethod.id);
        }
    }
});

function stripePaymentIdHandler(paymentMethodId) {
    const form = document.getElementById('setup-form');

    const hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'paymentMethodId');
    hiddenInput.setAttribute('value', paymentMethodId);
    form.appendChild(hiddenInput);

    form.submit();
}