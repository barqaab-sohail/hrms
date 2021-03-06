 <form action="{!!route('training.update', ['id'=>optional($data)->id])!!}" method="post" class="form-horizontal form-prevent-multiple-submits" enctype="multipart/form-data">
		                    @method('PATCH')
		                        {{csrf_field()}}
		                        <div class="form-body">
		                            
		                            <h3 class="box-title">Edit Training/Workshop/Course</h3>
		                            <hr class="m-t-0 m-b-40">
									<div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Title<span class="text_requried">*</span></label>
		                                        
		                                            <input type="text"  name="title" value="{!! old('title', optional($data)->title) !!}" class="form-control" placeholder="Enter Title Name" required>
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Venue</label>
		                                        
		                                            <input type="text" name="venue" value="{!! old('venue', optional($data)->venue) !!}" class="form-control " placeholder="Enter Venue Name" >
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                                
		                            <!--/row-->

		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Institution</label>
		                                        
		                                            <input type="text"  name="institute" value="{!! old('institute', optional($data)->institute) !!}" class="form-control" placeholder="Enter Institute Name">
		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right ">Country<span class="text_requried">*</span></label>
		                                        
		                                            <select  name="country_id"  class="form-control selectTwo" required>
		                                           	<option value=""></option>
		                                           	@foreach($countries as $country)
													<option value="{{$country->id}}" @if($country->id == $data->country_id) selected="selected" @endif>{{$country->name}}</option>
                                                    @endforeach 	
                                                    </select>

		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                                
		                            <!--/row-->
		                             <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group row">
		                                        <div class="col-md-9 date_input">
		                                        	<label class="control-label text-right ">From</label>
		                                        
		                                            <input type="text"  id="from" name="from" value="{!! old('from', optional($data)->from) !!}" class="form-control"  readonly >
													 
 

		                                            <br>
		                                            @can('hr_edit_record')<i class="fas fa-trash-alt text_requried"></i>@endcan
		                                             
 

		                                        </div>
		                                        
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-6">
		                                	<div class="form-group row">
		                                    	<div class="col-md-9 date_input">
		                                    		<label class="control-label text-right ">To</label>
		                                            <input type="text"  id="to" name="to" value="{!! old('to', optional($data)->to) !!}" class="form-control" readonly>
													 
 

		                                            <br>
		                                            <i  class="fas fa-trash-alt text_requried"></i>
		                                             
 

		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="row">
		                               	<div class="col-md-12">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        	<label class="control-label text-right">Description<span class="text_requried">*</span></label>
		                                        
		                                             <textarea  rows=6 cols=5 name="description" class="form-control " required>{!! old('description', optional($data)->description) !!}</textarea>
		                                        </div>
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
		                                            <button type="submit" class="btn btn-success btn-prevent-multiple-submits">Edit Training</button>
		                                            @endcan
		                                            
		                                        </div>
		                                         
 

		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </form>