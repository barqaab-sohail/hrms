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

		                    <form action="{{route('otherInformation.update', ['id'=>$employee->id])}}" method="post" class="form-horizontal form-prevent-multiple-submits" enctype="multipart/form-data">
		                    @method('PATCH')
		                        {{csrf_field()}}
		                        <div class="form-body">
		                            
		                            <h3 class="box-title">Other Information</h3>
		                            <hr class="m-t-0 m-b-40">
		                            <div class="row">
		                                <div class="col-md-7">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Driving Licence</label>
		                                        
		                                            <input type="text"  name="driving_licence" value="{!! old('driving_licence',isset($employee->other_information->driving_licence)?$employee->other_information->driving_licence:'')!!}" class="form-control" placeholder="Enter Driving Licence No." >
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-5">
		                                    <div class="form-group row">
		                                        <div class="col-md-12 date_input">
		                                        <label class="control-label text-right">Expiry Date</label>
		                                        
		                                            <input type="text"  id="licence_expiry" name="licence_expiry" value="{!! old('licence_expiry',isset($employee->other_information->licence_expiry)?$employee->other_information->licence_expiry:'')!!}" class="form-control" placeholder="Enter Driving Licence Expiry" readonly>
													 
 
		                                            @can('hr_edit_record')
		                                            <br>
		                                            <i  class="fas fa-trash-alt text_requried"></i>
		                                             @endcan
 

		                                        </div>
		                                    </div>
		                                    
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="row">
		                                <div class="col-md-7">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right ">Disability</label>
		                                        
		                                            <input type="text"  name="disability" value="{!! old('disability',isset($employee->other_information->disability)?$employee->other_information->disability:'')!!}" class="form-control" placeholder="Enter Disability Detail" >
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-5">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right ">Blood Group</label>
		                                        
		                                            <select  name="blood_group"  class="form-control selectTwo" >
                                                        <option value=""></option>
                                                        @foreach($blood_groups as $blood_group)
															<option value="{{$blood_group->id}}"
															@if(!empty($employee->other_information->blood_group))
																@if($blood_group->id == $employee->other_information->blood_group) selected="selected" @endif
															@endif
															>{{$blood_group->name}}</option>
														@endforeach
                                                                                                               
                                                    </select>

		                                        </div>
		                                    </div>
		                                    
		                                </div>
		                            </div>

		                            <div class="row">
		                                <div class="col-md-7">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right ">Passport No</label>
		                                        
		                                            <input type="text"  name="passport_no" value="{!! old('passport_no',isset($employee->other_information->passport_no)?$employee->other_information->passport_no:'')!!}" class="form-control" placeholder="Enter Passport No." >
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-5">
		                                    <div class="form-group row">
		                                        <div class="col-md-12 date_input">
		                                        <label class="control-label text-right ">Expiry Date</label>
		                                        
		                                            <input type="text"  id="passport_expiry" name="passport_expiry" value="{!! old('passport_expiry',isset($employee->other_information->passport_expiry)?$employee->other_information->passport_expiry:'')!!}" class="form-control" placeholder="Enter Passport Expiry" readonly>
													 
 
		                                            @can('hr_edit_record')
		                                            <br>
		                                            <i  class="fas fa-trash-alt text_requried"></i>
		                                             @endcan
 

		                                        </div>
		                                    </div>
		                                   
		                                </div>
		                            </div>
									
									<hr>
									<h3 class="box-title">Next to Kin Detail</h3>
		                            		                           
		                            <div class="row">
		                                <div class="col-md-7">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right ">Name</label>
		                                        
		                                            <input type="text"  name="kin_name" value="{!! old('kin_name',isset($employee->other_information->kin_name)?$employee->other_information->kin_name:'')!!}" class="form-control" placeholder="Enter Name" >
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-5">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right ">Relation</label>
		                                        
		                                            <input type="text"  name="kin_relation" value="{!! old('kin_relation',isset($employee->other_information->kin_relation)?$employee->other_information->kin_relation:'')!!}" class="form-control" placeholder="Enter Relation with Employee">
													
		                                        </div>
		                                    </div>
		                                    
		                                </div>
		                            </div>
		                            <div class="row">
		                                <div class="col-md-7">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right ">Address</label>
		                                        
		                                            <input type="text"  name="kin_address" value="{!! old('kin_address',isset($employee->other_information->kin_address)?$employee->other_information->kin_address:'')!!}" class="form-control" placeholder="Enter Address" >
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-5">
		                                    <div class="form-group row">
		                                        <div class="col-md-12 ">
		                                        <label class="control-label text-right ">Contact No.</label>
		                                        
		                                            <input type="text"  name="kin_contact_number" value="{!! old('kin_contact_number',isset($employee->other_information->kin_contact_number)?$employee->other_information->kin_contact_number:'')!!}" class="form-control" placeholder="Enter Contact Number">
													
		                                        </div>
		                                    </div>
		                                    <input type="text"  name="employee_id" value="{{session('employee_id')}}
		                                            " class="form-control" hidden >
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
		                            <br>
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
        	



        });
        </script>
    @endpush

@stop