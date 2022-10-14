@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Doctor List <span class="badge badge-pill badge-danger"> {{ count($doctors) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
                                <th>Name</th>
								<th>Speciality</th>
                                <th>Qualification</th>
                                <th>Detail</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($doctors as $item)
	 <tr>
         <td><img src="{{ asset($item->image) }}" style="width: 70px; height: 40px;"> </td>
        <td>{{ $item->name }}</td>
		 <td>{{ $item->speciality }}</td>
         <td>{{ $item->qualification}}</td>
         <td>{{$item->detail}}</td>
        <td class="d-flex">
            <a href="{{ route('doctor.edit',$item->id) }}" class="btn btn-info mr-2" title="Edit Data"><i class="fa fa-pencil"></i> </a>
            <a href="{{ route('doctor.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
                <i class="fa fa-trash"></i></a>
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


<!--   ------------ Add Brand Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Doctor </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('doctor.store') }}" enctype="multipart/form-data">
	 	@csrf


	 <div class="form-group">
		<h5>Name <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="name" class="form-control" >
	 @error('brand_name_en')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	</div>
	</div>

    <div class="form-group">
		<h5>Qualification <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="qualification" class="form-control" >
	 @error('qualification')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	</div>
	</div>

    <div class="form-group">
		<h5>Speciality<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="speciality" class="form-control" >
	 @error('speciality')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	</div>
	</div>

    <div class="form-group">
        <h5>Detail <span>*</span></h5>
        <textarea name="detail" id="" cols="30" rows="5" class="form-control"></textarea>
    </div>


	<!-- <div class="form-group">
		<h5>Brand Name Hindi <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="brand_name_hin" class="form-control" >
     @error('brand_name_hin')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div> -->



	<div class="form-group">
		<h5>Doctor Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="doctor_image" class="form-control" required>
     @error('doctor_image')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div>


			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
						</div>
					</form>





					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>




		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection