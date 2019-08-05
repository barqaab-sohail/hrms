
@extends('layouts.master.master')
@section('Heading')
	<h3 class="text-themecolor">Employee Name: {{$employee->first_name. " ".$employee->last_name}}</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
		
		
	</ol>
@stop
@section('content')
   
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-outline-info">
			
				<div class="row">
					<div class="col-lg-2">
					@include('layouts.master.hrVerticalEditButton')
					</div>
        			
		        	<div class="col-lg-10">
						@can('entry', Auth::user())
		                <div style="margin-top:10px; margin-right: 10px;">
		                    <button type="button" onclick="window.location.href='{{route('employeeList')}}'" class="btn btn-info float-right">Back</button>
		                    
		                </div>
		                @endcan
		                <div class="card-body">

		                    <form action="{!!route('editPublication', ['id'=>optional($data)->id])!!}" method="post" class="form-horizontal" enctype="multipart/form-data">
		                        {{csrf_field()}}
		                        <div class="form-body">
		                            
		                            <h3 class="box-title">Publication</h3>
		                            <hr class="m-t-0 m-b-40">
									<div class="row">
		                                <div class="col-md-12">
		                                    <div class="form-group row">
		                                       	<div class="col-md-12">
		                                        	<label class="control-label text-right">Title<span class="text_requried">*</span></label>
		                                       
		                                        	<input type="text"  name="title" value="{!! old('title', optional($data)->title) !!}" placeholder="Enter Publication Title " class="form-control"  required>
		                                            
		                                        </div>
		                                    </div>
		                                </div>
		                               
		                               
		                            </div>
		                                
		                            <!--/row-->

		                            <div class="row">
		                                <div class="col-md-12">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Description</label>
		                                        
		                                            <textarea type="text" rows=3 cols=20 name="description" class="form-control" placeholder="Enter Description">{!! old('description', optional($data)->description) !!}</textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                               
		                               
		                            </div>
		                                
		                            <!--/row-->
		                             <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        
		                                        	<label class="control-label text-right">Channel/Media<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text"  name="channel" value="{!! old('channel', optional($data)->channel) !!}" placeholder="Enter Publication Channel/Media " class="form-control"  required>
		                                        </div>
		                                        
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-6">
		                                        	<label class="control-label text-right">Year</label>
		                                        
		                                            <input type="text"  name="year" value="{!! old('year', optional($data)->year) !!}" class="form-control"  placeholder="Enter Year of Publication" >
		                                        </div>

		                                        <input type="number" name="employee_id" value="{{session('employee_id')}}"   class="form-control " hidden>
		                                    </div>
		                                </div>
		                            </div>
		                            		                           
		                        </div>
		                         <hr>
		                        <div class="form-actions">
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="row">
		                                    	@can('entry', Auth::user())
		                                        <div class="col-md-offset-3 col-md-9">
		                                            <button type="submit" class="btn btn-success">Add Publication</button>
		                                            <button type="button" onclick="window.location.href='{{route('employeeList')}}'" class="btn btn-inverse">Cancel</button>
		                                        </div>
		                                        @endcan
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </form>
		@if($publicationIds->count()!=0)		                    
			                    <br>
			                    <hr>
			                    <br>
		<div class="card">
		<div class="card-body">
			<!--<div class="float-right">
				<input id="month" class="form-control" value="" type="month">
			</div>-->
			<h2 class="card-title">Stored Publication</h2>
			
			<div class="table-responsive m-t-40">
				
				<table id="myTable" class="table table-bordered table-striped" width="100%" cellspacing="0">
					<thead>
					
					<tr>
						<th>Title</th>
						<th>Channel</th>
						<th>Year</th>
						
						 @can('entry', Auth::user())<th> Actions </th> @endcan
					</tr>
					</thead>
					<tbody>
						@foreach($publicationIds as $publicationId)
							<tr>
								<td>{{$publicationId->title}}</td>
								<td>{{$publicationId->channel}}</td>
								<td>{{$publicationId->year}}</td>
								
								<td>
								@can('entry', Auth::user())
								 <a class="btn btn-info btn-sm" href="{{route('publication.edit',['id'=>$publicationId->id])}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fas fa-pencil-alt text-white "></i></a>
								 <a class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure to Delete')" href="{{route('deletePublication',['id'=>$publicationId->id])}}" data-toggle="tooltip" data-original-title="Delete"> <i class="fas fa-trash-alt"></i></a>
								 @endcan
															
							</tr>
						@endforeach
					
					 
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	@endif
			                    
		        		</div>       
		        	</div>
		        </div>
            </div>
        </div>
    </div>
 @push('scripts')
        <script>
            $(document).ready(function(){
			
			});
        </script>
    @endpush

@stop