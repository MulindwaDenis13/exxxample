@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>

@section('title')
Appointment Payment
@endsection


<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.waveElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.waveElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.waveElement--invalid {
  border-color: #fa755a;
}
.waveElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Appointment</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> 




<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				 




				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Enter Payment Details </h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">

					 
<hr>
		 <li>
		 	@if(Session::has('coupon'))

{{-- <strong>SubTotal: </strong> UGX{{ $grandTotal }} <hr> --}}

{{-- <strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
( {{ session()->get('coupon')['coupon_discount'] }} % )
 <hr>

 <strong>Coupon Discount : </strong> ${{ session()->get('coupon')['discount_amount'] }} 
 <hr>

  <strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount'] }} 
 <hr> --}}


		 	@else
            <form method="POST" action="{{route('appointment.pay')}}">
                @csrf
                {{-- <label for="card-element"> --}}
                  <input type="hidden" name="doctor_id" value="{{$doctor}}">

                  <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1"><b>Amount</b>  <span>*</span></label>
                      <input type="text" name="amount" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" required="" value="UGX-30000" readonly>
                  </div>
  
                  <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1"><b>Full Name</b>  <span>*</span></label>
                      <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" required="" value={{auth()->user()->name}}>
                  </div> 
      
                  <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1"><b>Phone number</b>  <span>*</span></label>
                      <input type="text" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone Number" required="" value={{auth()->user()->phone}}>
                  </div> 
  
                  <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1"><b>Email</b>  <span>*</span></label>
                      <input type="text" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" required="" value={{auth()->user()->email}}>
                  </div>
                {{-- </label> --}}
    
                <button class="btn btn-primary" type="submit">Submit Payment</button>
            </form>

{{-- <strong>SubTotal: </strong> UGX{{ $grandTotal }} <hr>

<strong>Grand Total : </strong> UGX{{ $grandTotal }} <hr> --}}


		 	@endif 

		 </li>
					 
					

				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div> <!--  // end col md 6 -->







	<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
{{-- <div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Appointment Payment Method</h4>
		    </div>

<form action="{{ route('wave.pay') }}" method="post" id="payment-form">
                            @csrf
        <div class="form-row">
            <label for="card-element">
                <input type="text" name="" id="">
            </label>
             
            <div id="card-element">
            <!-- A Wave Element will be inserted here. -->
            </div>
            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
        </div>
        <br>
        <button class="btn btn-primary" type="submit">Submit Payment</button>
        </form>
		    
 

		</div>
	</div>
</div>  --}}
<!-- checkout-progress-sidebar -->
 </div><!--  // end col md 6 -->



 



</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->
 







<!-- ===== == BRANDS CAROUSEL : END === === -->	
</div><!-- /.container -->
</div><!-- /.body-content -->



  

 <script type="text/javascript">
</script>




@endsection