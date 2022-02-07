const stripe = Stripe('pk_test_51KPGaxKRmSFE4yc5SjGah08iLnclpyhxkq1tkNeA6vKQvjRwMY7IzalcEjj5TwU9eBmMQhT0th5GaxKCRsQrCSmy00pzH1Hegm');

const elements = stripe.elements();
const cardElement = elements.create('card');
cardElement.mount('#card-element');

const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');

cardButton.addEventListener('click', async (e) => {
    e.preventDefault()
    const { paymentMethod, error } = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: { name: cardHolderName.value }
            }
        );

    if (error) {
        // Display "error.message" to the user...
        console.log(error);
    } else {
        // The card has been verified successfully...
        stripePaymentIdHandler(paymentMethod.id);
    }
});

function stripePaymentIdHandler(paymentMethodId) {
    const form = document.getElementById('setup-form');

    const hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'paymentMethodId');
    hiddenInput.setAttribute('value', paymentMethodId);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}