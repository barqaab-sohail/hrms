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
						 
		                <div style="margin-top:10px; margin-right: 10px;">
		                    
		                </div>
		                 
 

		                <div class="card-body">

		                    <form id="employee" action="{{route('employee.update', ['id'=>$employee->id])}}" method="post" class="form-horizontal form-prevent-multiple-submits" enctype="multipart/form-data">
		                    @method('PATCH')
		                        {{csrf_field()}}
		                        <div class="form-body">
		                            
		                            <h3 class="box-title">Employee Information</h3>
		                            <hr class="m-t-0 m-b-40">
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">First Name<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text"  name="first_name" value="{{old('first_name', $employee->first_name)}}"   class="form-control " placeholder="Enter First Name" required>
		                                        </div>
		                                    </div>
		                                </div>
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right">Middle Name</label>
		                                        	<input type="text" name="middle_name" value="{{old('middle_name', $employee->middle_name) }}" class="form-control " placeholder="Enter Middle Name" >
		                                        </div>
		                                    </div>
		                                </div>
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">Last Name<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text" name="last_name" value="{{old('last_name', $employee->last_name) }}"    class="form-control " placeholder="Enter Last Name" required>
		                                        </div>
		                                    </div>
		                                </div>
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">Father Name<span class="text_requried">*</span></label>
		                                            <input type="text" name="father_name" value="{{ old('father_name', $employee->father_name) }}" class="form-control " placeholder="Enter Father Name" required>
		                                        </div>
		                                    </div>
		                                </div>
		                                <!--/span-->
		                            </div>
		                            <!--/row-->
		                            <div class="row">
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12 date_input">
		                                        	<label class="control-label text-right">Date of Birth<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}" class="form-control " placeholder="Enter Date of Birth"  required>
		                                             
 
		                                            @can('hr_edit_record')
		                                            <br>
		                                            @can('hr_edit_record')<i class="fas fa-trash-alt text_requried"></i>@endcan
		                                            @endcan
		                                             
 

		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-8">
		                                        	<label class="control-label text-right">Gender<span class="text_requried">*</span></label>
		                                        		                                            
		                                           	<select  name="gender_id"  class="form-control selectTwo" required>
                                                         
														<option value=""></option>
                                                        @foreach($genders as $gender)
														<option value="{{$gender->id}}" @if($gender->id == $employee->gender_id) selected="selected" @endif>{{$gender->name}}</option>
                                                        @endforeach
		                                             	
                                                                                                          
                                                    </select>
		                                        		                                        
		                                        </div>
		                                    </div>
		                                </div>
		                                <!--/span-->
		                            </div>
		                            <!--/row-->
		                            <div class="row">
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        
		                                        	<label class="control-label text-right">CNIC<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text" name="cnic" id="cnic" value="{{ old('cnic', $employee->cnic) }}" pattern="[0-9.-]{15}" title= "13 digit Number without dash" class="form-control " placeholder="Enter CNIC without dash" required>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12 date_input">
		                                        	<label class="control-label text-right">CNIC Expiry<span class="text_requried">*</span></label>
		                                        		                                            
		                                            <input type="text" id="cnic_expiry" name="cnic_expiry"  value="{{ old('cnic_expiry',$employee->cnic_expiry) }}" placeholder="Enter CNIC Expiry Date" class="form-control " readonly required>
													 
 
		                                            @can('hr_edit_record')
		                                            <br>
		                                            @can('hr_edit_record')<i class="fas fa-trash-alt text_requried"></i>@endcan
		                                            @endcan
		                                             
 

		                                       
		                                        </div>
		                                    </div>
		                                </div>
		                                <!--/span-->
		                                
		                            </div>
		                            <!--/row-->

		                            
		                            <div class="row">
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">Employee No.</label>
		                                        
		                                            <input type="text" name="employee_no" value="{{ old('employee_no',$employee->employee_no) }}" class="form-control " placeholder="Enter Employee No" >
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-8">
		                                        	<label class="control-label text-right">Marital Status<span class="text_requried">*</span></label>
		                                        	                                           
		                                           	<select  name="marital_status_id"  class="form-control selectTwo" required>
                                                        
														 <option value=""></option>
                                                        @foreach($maritalStatuses as $maritalStatus)
														<option value="{{$maritalStatus->id}}" @if($maritalStatus->id == $employee->marital_status_id) selected="selected" @endif>{{$maritalStatus->name}}</option>
                                                        @endforeach
                                                        
                                                    </select>
		                                        		                                        
		                                        </div>
		                                    </div>
		                                </div>
		                                <!--/span-->
		                            </div>
		                        <div class="row">
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">Religon<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text" name="religon" value="{{ old('religon',$employee->religon) }}" class="form-control " placeholder="Enter Religon" required>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-10">
		                                        	<label class="control-label text-right">Nationality<span class="text_requried">*</span></label>
		                                          
		                                           	<select  name="country_id"  class="form-control selectTwo" required>
		                                           	
		  	                                        	<option value=""></option>	
		  	                                        	@foreach($countries as $country)
		                                              	<option value="{{$country->id}}" @if($country->id == optional($nationality1)->country_id) selected="selected" @endif>{{$country->name}}</option>
          												@endforeach
                                                    </select>
		                                            
		                                        </div>
		                                        <div class="col-md-2"><br>
		                                       		<button type="button" name="add" id="add" class="btn btn-success">+</button>
		                                        </div>
		                                    </div>
		                                </div>
		                                <!--/span-->
		                            </div>
								     <div class="row">
		                                <!--/span-->
		                                <div class="col-md-6">
		                                	<div class="form-group row">
		                                        <div class="col-md-8">
		                                        <label class="control-label text-right">Division<span class="text_requried">*</span></label>
		                                        
		                                            
		                                           	 <select  name="division_id"  class="form-control selectTwo" required>
                                                        <option value=""></option>
                                                        @foreach($divisions as $division)
														<option value="{{$division->id}}" @if($division->id == $employee->division_id) selected="selected" @endif>{{$division->name}}</option>                        @endforeach
                                                                                                               
                                                    </select>
		                                            
		                                       
		                                        </div>
		                                    </div>
		                                    
		                                </div>
		                               
		                               <div id="nationality2" class="col-md-6">
		                                   
											<div class="form-group row">
		                                        <div class="col-md-10">
		                                        
		                                        <label class="control-label text-right">Nationality-2</label>
		                                        
		                                          	<select  name="nationality_name2"  class="form-control selectTwo" >
		                                           	<option value=""></option>
		                                           	
		                                           	@foreach($countries as $country)
														
														<option value="{{$country->id}}" @if($country->id == optional($nationality2)->country_id) selected="selected" @endif>{{$country->name}}</option>
                                                    	
                                                    @endforeach 	
                                                    </select>
		                                        </div>
		                                    </div>
		                                </div>
		                               
		                                <!--/span-->
		                            </div>


		                        </div>
		                         
 

		                        <hr>
		                        <div class="form-actions">
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="row">
		                                        <div class="col-md-offset-3 col-md-9">
		                                        	@can('hr_edit_record')
		                                            <button type="submit" class="btn btn-success btn-prevent-multiple-submits">Edit Employee</button>
		                                            @endcan
		                                            
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                         
 

		                    </form>
		        		</div>       
		        	</div>
		        </div>
            </div>
        </div>
    </div>
 @push('scripts')
    <script>
    $(document).ready(function(){

		$("#nationality2").hide();
	    $("#add").click (function(){
		$("#nationality2").toggle();
		$('#add').html($('#add').text() == '-' ? '+' : '-');
	  	});


	//Make sure that the event fires on input change
	$("#cnic").on('input', function(ev){
		
		//Prevent default
		ev.preventDefault();
		
		//Remove hyphens
		let input = ev.target.value.split("-").join("");
		
		//Make a new string with the hyphens
		// Note that we make it into an array, and then join it at the end
		// This is so that we can use .map() 
		input = input.split('').map(function(cur, index){
			
			//If the size of input is 6 or 8, insert dash before it
			//else, just insert input
			if(index == 5 || index == 12)
				return "-" + cur;
			else
				return cur;
		}).join('');
		
		//Return the new string
		$(this).val(input);
	});

	});


    

    



    </script>

        

    @endpush

@stop