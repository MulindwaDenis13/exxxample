@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">






<!--   ------------ Add Brand Page -------- -->


          <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Doctor</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('doctor.update',$doctor->id) }}" enctype="multipart/form-data">
	 	@csrf
	 <input type="hidden" name="id" value="{{ $doctor->id }}">
	 <input type="hidden" name="old_image" value="{{ $doctor->image }}">

	 <div class="form-group">
		<h5>Name <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="name" class="form-control" value="{{ $doctor->name }}" >
	 @error('name')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	</div>
	</div>

    <div class="form-group">
		<h5>Qualification <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="qualification" class="form-control" value="{{$doctor->qualification}}" >
	 @error('qualification')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	</div>
	</div>

    <div class="form-group">
		<h5>Speciality<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="speciality" class="form-control" value="{{$doctor->speciality}}" >
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
	 <input type="text" name="brand_name_hin" class="form-control" value="" >
     @error('name_hin')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div> -->



	<div class="form-group">
		<h5>Doctor Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="image" class="form-control" >
     @error('image')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div>


			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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