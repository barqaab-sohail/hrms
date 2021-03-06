
@extends('layouts.master.master')
@section('title', 'BARQAAB HR')
@section('Heading')
	@include('hr.hrHeading')
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
						  
 
		        		@can('hr_edit_record')
		                <div style="margin-top:10px; margin-right: 10px;">
		                    
		                    <button type="button"  id ="hideButton"  class="btn btn-info float-right">Add Transfer/Posting</button>
		                    
		                </div>
		                @endcan
		                 
 

		                <div class="card-body" id="hideDiv" >

		                    <form action="{{route('posting.store')}}" method="post" class="form-horizontal form-prevent-multiple-submits" enctype="multipart/form-data">
		                        {{csrf_field()}}
		                        <div class="form-body">
		                            
		                            <h3 class="box-title">Transfer/Posting</h3>
		                            <hr class="m-t-0 m-b-40">
		                            <div class="row">
		                                <div class="col-md-7">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right">Position<span class="text_requried">*</span></label>
		                                        

													<select  name="designation_id"  class="form-control selectTwo" required>
                                                      <option></option>
                                                     @foreach($positions as $position)
														
														<option value="{{$position->id}}" {{(old("position")==$position->id? "selected" : "")}}>{{$position->name}}</option>
                                                        @endforeach
                                                        
                                                    </select>

		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-5">
		                                    <div class="form-group row">
		                                        <div class="col-md-12 date_input">
		                                        	<label class="control-label text-right">Posting Date<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text" id="posting_date" name="posting_date" value="{{ old('posting_date') }}" class="form-control " placeholder="Enter Posting Date" required readonly>
													 
 

		                                            <br>
		                                            @can('hr_edit_record')<i class="fas fa-trash-alt text_requried"></i>@endcan
		                                             
 

		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="row">
		                                <div class="col-md-7">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">HOD<span class="text_requried">*</span></label>
		                                        
		                                           <select  name="manager_id"  class="form-control selectTwo" required>
                                                        <option value=""></option>
                                                        @foreach($managers as $employee)
														<option value="{{$employee->id}}" {{(old("manager_id")==$employee->id? "selected" : "")}}>{{$employee->first_name." ".$employee->middle_name." ".$employee->last_name." - "}} {{isset($employee->promotion_designation)?$employee->promotion_designation:$employee->appointment_designation}}</option>
                                                       @endforeach
                                                      
                                                    </select>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-5">
		                                    <div class="form-group row date_input">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right">Joining Date<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text" id="joining_date" name="joining_date" value="{{ old('joining_date') }}" class="form-control " placeholder="Enter joining Date" required readonly>
													 
 

		                                            <br>
		                                            <i  class="fas fa-trash-alt text_requried"></i>
		                                             
 

		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                                
		                            <!--/row-->
		                             <div class="row">
		                                <div class="col-md-7">
                                	
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right">Project<span class="text_requried">*</span></label>
		                                        
			
		                                            <select  name="project_id"  class="form-control selectTwo" required>
                                                        <option value=""></option>
                                                        @foreach($projects as $project)
														<option value="{{$project->id}}" {{(old("project")==$project->id? "selected" : "")}}>{{$project->name." - ".$project->status}}</option>
                                                        @endforeach
                                                      
                                                    </select>

		                                        </div>
		                                      
		                                   
		                                    </div>
		                                </div>
		                                <div class="col-md-5">
                                	
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right">Location</label>
		                                        
		                                        	<input type="text" name="location" value="{{ old('location') }}" class="form-control " placeholder="Enter Location" >
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

		                                    	 
 

		                                        <div class="col-md-offset-3 col-md-9">
		                                        	@can('hr_edit_record')
		                                            <button type="submit" class="btn btn-success btn-prevent-multiple-submits">Save</button>
		                                            @endcan
		                                            
		                                        </div>
		                                         
 

		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </form>
		                </div>   
	@if($postingIds->count()!=0)		                    
	
	@include('hr.posting.list')

	@endif
			                    
		        		    
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