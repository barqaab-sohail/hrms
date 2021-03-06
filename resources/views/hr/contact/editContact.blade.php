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

		                    <form action="{{route('editPermanentAddress', ['id'=>$employee->id])}}" method="post" class="form-horizontal form-prevent-multiple-submits" enctype="multipart/form-data">
		                        {{csrf_field()}}
		                        <div class="form-body">
		                            
		                            <h3 class="box-title">Permanent Address</h3>
		                            <hr class="m-t-0 m-b-40">
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12 text">
		                                        <label class="control-label text-right ">House No.</label>
		                                        
		                                            <input type="text"  name="house" value="{!! old('house',isset($permanentAddress->house)?$permanentAddress->house:'')!!}" class="form-control" placeholder="Enter House Name / No." required>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Street No.</label>
		                                        
		                                            <input type="text"  name="street" value="{!! old('street',isset($permanentAddress->street)?$permanentAddress->street:'')!!}" class="form-control" placeholder="Enter Street Name / No." >
		                                        </div>
		                                    </div>
		                                    
		                                </div>
		                            </div>
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">Town / Village<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text"  name="town" value="{!! old('house',isset($permanentAddress->town)?$permanentAddress->town:'')!!}" class="form-control" placeholder="Enter Town / Village" required>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Tehsil</label>
		                                        
		                                            <input type="text"  name="tehsil" value="{!! old('tehsil',isset($permanentAddress->tehsil)?$permanentAddress->tehsil:'')!!}" class="form-control" placeholder="Enter Tehsil Name " >
		                                        </div>
		                                    </div>
		                                    
		                                </div>
		                            </div>
		                             <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">City / District<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text"  name="city" value="{!! old('city',isset($permanentAddress->city)?$permanentAddress->city:'')!!}" class="form-control" placeholder="Enter City / District Name " required>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                       <div class="col-md-12">
		                                       	<label class="control-label text-right ">Province<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text"  name="province" value="{!! old('house',isset($permanentAddress->province)?$permanentAddress->province:'')!!}" class="form-control" placeholder="Enter Province" required>
		                                        </div>

		                                    </div>
		                                    
		                                </div>
		                            </div>
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Country<span class="text_requried">*</span></label>
		                                        
		                                            	<select  name="country_id"  class="form-control selectTwo" required>
                                                        <option value=""></option>
                                                        @foreach($countries as $country)
														<option value="{{$country->id}}" @if($country->id == optional($permanentAddress)->country_id) selected="selected" @endif>{{$country->name}}</option>
                                                    	@endforeach 	
                                                        
                                                    	</select>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        
		                                    </div>
		                                    
		                                </div>
		                            </div>
		                             <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Mobile No.<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text"  id='mobileP' name="mobile" value="{!! old('house',isset($permanentAddress->mobile)?$permanentAddress->mobile:'')!!}" class="form-control" placeholder="Enter Mobile No" required>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Landline No.</label>
		                                        
		                                            <input type="text"  name="landline" value="{!! old('landline',isset($permanentAddress->landline)?$permanentAddress->landline:'')!!}" class="form-control" placeholder="Enter Landline No. " >
		                                        </div>
												<input type="number" name="employee_id" value="{{session('employee_id')}}"   class="form-control " hidden>
												
												<input type="number" name="type" value="{{0}}"   class="form-control " hidden>

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
		                                            <button type="submit" class="btn btn-success btn-prevent-multiple-submits">Save Permanent Address</button>
		                                        @endcan
		                                        </div>
		                                     
 

		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </form>
		        		</div>       
						
						<hr>

						 <div class="card-body">

		                    <form action="{{route('editCurrentAddress', ['id'=>$employee->id])}}" method="post" class="form-horizontal form-prevent-multiple-submits" enctype="multipart/form-data">
		                        {{csrf_field()}}
		                        <div class="form-body">
		                            
		                            <h3 class="box-title">Current Address</h3>
		                            <hr class="m-t-0 m-b-40">
     <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12 text">
		                                        <label class="control-label text-right ">House No.</label>
		                                        
		                                            <input type="text"  name="house" value="{!! old('house',isset($currentAddress->house)?$currentAddress->house:'')!!}" class="form-control" placeholder="Enter House Name / No." required>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Street No.</label>
		                                        
		                                            <input type="text"  name="street" value="{!! old('street',isset($currentAddress->street)?$currentAddress->street:'')!!}" class="form-control" placeholder="Enter Street Name / No." >
		                                        </div>
		                                    </div>
		                                    
		                                </div>
		                            </div>
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">Town / Village<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text"  name="town" value="{!! old('house',isset($currentAddress->town)?$currentAddress->town:'')!!}" class="form-control" placeholder="Enter Town / Village" required>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Tehsil</label>
		                                        
		                                            <input type="text"  name="tehsil" value="{!! old('tehsil',isset($currentAddress->tehsil)?$currentAddress->tehsil:'')!!}" class="form-control" placeholder="Enter Tehsil Name " >
		                                        </div>
		                                    </div>
		                                    
		                                </div>
		                            </div>
		                             <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">City / District<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text"  name="city" value="{!! old('city',isset($currentAddress->city)?$currentAddress->city:'')!!}" class="form-control" placeholder="Enter City / District Name " required>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                       <div class="col-md-12">
		                                       	<label class="control-label text-right ">Province<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text"  name="province" value="{!! old('house',isset($currentAddress->province)?$currentAddress->province:'')!!}" class="form-control" placeholder="Enter Province" required>
		                                        </div>

		                                    </div>
		                                    
		                                </div>
		                            </div>
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Country<span class="text_requried">*</span></label>
		                                        
		                                             <select  name="country_id"  class="form-control selectTwo" required>
                                                        <option value=""></option>
                                                        @foreach($countries as $country)
														<option value="{{$country->id}}" @if($country->id == optional($currentAddress)->country_id) selected="selected" @endif>{{$country->name}}</option>
                                                    	@endforeach 	
                                                        
                                                    </select>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        
		                                    </div>
		                                    
		                                </div>
		                            </div>
		                             <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Mobile No.<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text" id='mobileC' name="mobile" value="{!! old('house',isset($currentAddress->mobile)?$currentAddress->mobile:'')!!}" class="form-control" placeholder="Enter Mobile No" required>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Landline No.</label>
		                                        
		                                            <input type="text"  name="landline" value="{!! old('landline',isset($currentAddress->landline)?$currentAddress->landline:'')!!}" class="form-control" placeholder="Enter Landline No. " >
		                                        </div>
												<input type="number" name="employee_id" value="{{session('employee_id')}}"   class="form-control " hidden>
												
												<input type="number" name="type" value="{{1}}"   class="form-control " hidden>

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
		                                            <button type="submit" class="btn btn-success btn-prevent-multiple-submits">Save Current Address</button>
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
           $("#mobileP, #mobileC").on('input', function(ev){
		
		//Prevent default
		ev.preventDefault();
		
		//Remove hyphens
		let input = ev.target.value.split("-").join("");
		
		//Make a new string with the hyphens
		// Note that we make it into an array, and then join it at the end
		// This is so that we can use .map() 
			input = input.split('').map(function(cur, index){
				
				//If the size of input is 4 or 7, insert dash before it
				//else, just insert input
				if(index == 4)
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