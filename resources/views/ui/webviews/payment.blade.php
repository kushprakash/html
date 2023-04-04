 

<form id="pr" action="{{ url('payment-success') }}" method="POST">
    @csrf
    <input id="res" type="hidden" name="razorpay_order_id">
    <!-- <input type="submit" name=""> -->
</form>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = { 

    "key": "rzp_test_Wx7xEXZCz3HPZy", // Enter the Key ID generated from the Dashboard
    "amount": "{{$order->amount}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise or INR 500.
    "currency": "INR",
    "name": "Dinkachika ",
    "description": "Subscribe To Dinkachika ",
    "image": "",
    "order_id": "{{$order->id}}",//This is a sample Order ID. Create an Order using Orders API. (https://razorpay.com/docs/payment-gateway/orders/integration/#step-1-create-an-order). Refer the Checkout form table given below
    "handler": function (response){
        //alert(response.razorpay_order_id);
        document.getElementById('res').value = response.razorpay_order_id;
        document.getElementById('pr').submit();
        console.log(response);
        //location.replace("{{ url('payment-success/') }}"+response);
    },
    "prefill": {
        "name":"{{Auth::user()->name}}",
        "email":"{{Auth::user()->email}}",
        "contact":"{{Auth::user()->phone}}"
    },
    "notes": {
        "address": "note value"
    },
    "theme": {
        "color": "#528FF0"
    },
    "modal": {
        "ondismiss": function(){
            //console.log(‘Checkout form closed’);
            location.replace("{{ url('/') }}");
            //document.getElementById('pr').submit()
        }
    }
};
var rzp1 = new Razorpay(options);
</script>

<script>
    window.onload = function() {
        //document.getElementsById('rzp-button1').click();
        rzp1.open();
        //e.preventDefault();
    };
</script>

 