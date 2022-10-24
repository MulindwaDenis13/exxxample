@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Appointments List <span class="badge badge-pill badge-danger"> {{ count($appointments) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Date Created</th>
								<th>Name</th>
								<th>Phone Number</th>
								<th>Email </th>
                                <td>Doctor</td>
								<th>Status </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($appointments as $item)
	 <tr>
		{{-- <td> <img src="{{ asset($item->product_thambnail) }}" style="width: 60px; height: 50px;">  </td> --}}
		<td>{{$item->created_at->format('d-m-Y')}}</td>
		<td>{{ $item->user->name }}</td>
		 <td>{{ $item->user->phone }} </td>
		 <td>{{ $item->user->email }}</td>
         <td>{{$item->doctor->name}}</td>


		 <td>
		 	@if($item->approved == 1)
		 	<span class="badge badge-pill badge-success"> Confirmed </span>
		 	@else
           <span class="badge badge-pill badge-danger"> Pending </span>
		 	@endif

		 </td>


		<td width="">
 {{-- <a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary" title="Product Details Data"><i class="fa fa-eye"></i> </a> --}}

 {{-- <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a> --}}

 {{-- <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a> --}}

@if($item->approved == 0)
 <a href="{{ route('consultation.inactive',$item->id) }}" class="btn btn-danger" title="Confirm"><i class="fa fa-arrow-down"></i> </a>
	 @else
 <a href="{{ route('consultation.active',$item->id) }}" class="btn btn-success" title="Confirmed"><i class="fa fa-arrow-up"></i> </a>
	 @endif




		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->

 
 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection