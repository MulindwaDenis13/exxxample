@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')

       <div class="col-md-2">
       </div>

       <div class="col-md-8">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-2">
                  <label for=""> Date Created</label>
                </td>

                <td class="col-md-3">
                  <label for="">Doctor</label>
                </td>

                <td class="col-md-3">
                  <label for="">Amount</label>
                </td>


                <td class="col-md-2">
                  <label for="">Status</label>
                </td>
                
              </tr>


              @foreach($appointments as $appointment)
       <tr>
                <td class="col-md-1">
                  <label for=""> {{ $appointment->created_at->format('d-m-Y') }}</label>
                </td>

                <td class="col-md-3">
                  <label for="">Dr. {{ $appointment->doctor->name }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $appointment->amount }}</label>
                </td>

         <td class="col-md-2">
          <label for=""> 

    @if($appointment->approved == 0)        
        <span class="badge badge-pill badge-warning" style="background: red"> Pending </span>
        @elseif($appointment->approved == 1)
         <span class="badge badge-pill badge-warning" style="background: #008000;"> Confirmed </span>

          @endif
            </label>
        </td>
                
              </tr>
              @endforeach





            </tbody>
            
          </table>
          
        </div>




         
       </div> <!-- / end col md 8 -->

		 

		 
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection