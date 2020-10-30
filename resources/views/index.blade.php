<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Razorpay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>



    <div class="container mt-5 col-6 mx-auto pt-5">

        <div class="text-center">
        <img src="https://img.favpng.com/22/17/14/coffee-cup-breakfast-cafe-png-favpng-wum4UMesrHMdFxfe11NikwYbu.jpg" class="img-fluid" style="height:200px">
        </div>
        <form method="post" action="/payment">
          @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Enter name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter your name">
                 </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Enter amount</label>
              <input type="number" name="amount" class="form-control" id="exampleInputPassword1">
            </div>
           
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>



        




    </div>

    @if(Session::has('data'))
 
    <div class="container tex-center mx-auto">
    <form action="/pay" method="POST" class="text-center mx-auto mt-5">
      <script
          src="https://checkout.razorpay.com/v1/checkout.js"
          data-key="rzp_test_CcRYorXwUKnx5y"
    data-amount="{{Session::get('data.amount')}}" 
          data-currency="INR"
    data-order_id="{{Session::get('data.order_id')}}"
          data-buttontext="Pay with Razorpay"
          data-name="Coffee"
          data-description="Test transaction"
         
          data-theme.color="#F37254"
      ></script>
      <input type="hidden" custom="Hidden Element" name="hidden">
      </form>

    </div>
    
    @endif
</body>
</html>