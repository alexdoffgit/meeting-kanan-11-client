<script 
type="text/javascript" 
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<button id="pay-button">papap</button>

<script type="text/javascript">
	// For example trigger on button clicked, or any time you need
	var payButton = document.getElementById('pay-button');
	payButton.addEventListener('click', function () {
	// Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
		window.snap.pay('{{ session('snap_token') }}');
	// customer will be redirected after completing payment pop-up
	});
</script>