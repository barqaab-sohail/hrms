
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

		                    <form action="{!!route('document.update', ['id'=>optional($data)->id])!!}"  id="document" method="post" class="form-horizontal form-prevent-multiple-submits" enctype="multipart/form-data">
		                    @method('PATCh')
		                        {{csrf_field()}}
		                        <div class="form-body">
		                            
		                            <h3 class="box-title">Document</h3>
		                            <hr class="m-t-0 m-b-40">
		                            <div class="row">
		                                <div class="col-md-7">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right ">Document Name<span class="text_requried">*</span></label>
		                                        
		                                             <select  name="document_name" id="document_name"    class="form-control selectTwo" required>

                                                       
                                                        <option value="{{$data->document_name}}">{{$data->document_name}}</option>
                                                        <option value="CNIC Front" @if($data->document_name =="CNIC Front") selected="selected"@endif>CNIC Front </option>
                                                        <option value="CNIC Back"  @if($data->document_name =="CNIC Back") selected="selected"@endif>CNIC Back</option>
                                                        <option value="Appointment Letter"  @if($data->document_name =="Appointment Letter") selected="selected"@endif>Appointment Letter</option>
                                                        <option value="HR Form"  @if($data->document_name =="HR Form") selected="selected"@endif>HR Form</option>
                                                        <option value="Joining Report"  @if($data->document_name =="Joining Report") selected="selected"@endif>Joining Report</option>
                                                        <option value="Other"  {{ old('name') == "Other" ? 'selected' : '' }}>Other</option>
                                                        
                                                    </select>


		                                        </div>
		                                    </div>
		                                </div>
		                                
		                                <!--/span-->
		                                <div class="col-md-5">
		                                    <div class="form-group row">
		                                        <div class="col-md-12">
		                                        <label class="control-label text-right">Reference No.</label>
		                                        
		                                            <input type="text" name="reference_no" value="{!! old('reference_no', optional($data)->reference_no) !!}" class="form-control " placeholder="Enter Reference No" >
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                                
		                            <!--/row-->
		                             <div class="row">
		                                <div class="col-md-7">
		                                    <div class="form-group row">
		                                        <div class="col-md-6 date_input">
		                                        <label class="control-label text-right">Date</label>
		                                        
		                                            <input ype="text"  id="date" name="date" value="{!! old('date', optional($data)->date) !!}" class="form-control" readonly >
													 
 

		                                            <br>
		                                            @can('hr_edit_record')<i class="fas fa-trash-alt text_requried"></i>@endcan
		                                             
 

		                                        </div>
		                                       
		                                       
		                                    </div>
		                                </div>
		        						<div class="col-md-2">
		        						</div>
		                                <div class="col-md-3">
		                                	 
 
		                                	@can('hr_edit_record')
		                                    <div class="form-group row">
		                                        <center >
		                                        @if($data->type!='application/pdf')
		                                		<img  src="{{asset(isset($data->file_name)? 'storage/'.$data->file_path.$data->file_name: 'Massets/images/document.png') }}" class="img-round picture-container picture-src"  id="wizardPicturePreview" title="" width="150" />
		                                		@else
		                                		<img  src="{{asset('Massets/images/document.png')}}" class="img-round picture-container picture-src"  id="wizardPicturePreview"  title="" width="150" >
		                                		@endif

		                                		<input type="file"  name="document" id="wizard-picture" class=""  hidden>
		                                				                                		

				                                <h6 id="h6" class="card-title m-t-10">Click On Image to Change New Document</h6>
		                                
					                            </center>
		                                       
		                                       <input type="number" name="employee_id" value="{{session('employee_id')}}"   class="form-control " hidden>
		                                    </div>
		                                    @endcan
 

		                                </div>
		                                		                                
		                            </div>
									 <div class="row">
		                                <div class="col-md-12" id="pdf">
		                                	@if($data->type=='application/pdf')
		                            		<embed id="pdf" src="{{asset('storage/'.$data->file_path.$data->file_name)}}#toolbar=0&navpanes=0&scrollbar=0"  type="application/pdf" height="300" width="100%" />
		                            		@endif
		                            		
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
		                                            <button type="submit" class="btn btn-success btn-prevent-multiple-submits">Add Document</button>
		                                        @endcan
		                                        </div>
		                                         
 

		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </form>
	@if($documentIds->count()!=0)		                    

	@include('hr.document.list')
		
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

        	            
        	$("#document_name").change(function (){
				var other = $('#document_name').val();
					if (other == 'Other'){
					var name=prompt("Enter Document Name");
					if (name === null) {

     				   return; 
    				}

					var select = $('#document_name');
					select.empty().append(new Option(name, name, true, true),new Option('CNIC Front', 'CNIC Front'),new Option('CNIC Back', 'CNIC Back'),new Option('Appointment Letter', 'Appointment Letter'));
					}
			});

        	$("#document").submit(function(e) {
				var name = $('#document_name').val();

				if (name=='Other'){
					alert('Please Enter Valid Document Name');
					e.preventDefault();
				}

			});





			// Prepare the preview for profile picture
		    $("#wizard-picture").change(function(){
		        	var fileName = this.files[0].name;
		        	var fileType = this.files[0].type;
		        	var fileSize = this.files[0].size;

		        	
		        	 //Restrict File Size Less Than 500kb
		        if (fileSize> 2048000){
		        	alert('File Size is bigger than 2MB');
		        	$(this).val('');
		        }else{
		        	//Restrict File Type
		        	if ((fileType =='image/jpeg') || (fileType=='image/png')){
                    	$( "#pdf" ).hide();
                    	readURL(this);
                    	document.getElementById("h6").innerHTML = "Image is Attached";
                	}else if(fileType=='application/pdf')
                	{
                	readURL(this);// for Default Image
                	
                	document.getElementById("pdf").src="{{asset('Massets/images/document.png')}}";	
                	$( "#pdf" ).show();
                	}else{
                		alert('Only PDF, JPG and PNG Files Allowed');
		        	$(this).val('');

                	}
                }
                
            });
        });
            function readURL(input) {
            	var fileName = input.files[0].name;
		         var fileType = input.files[0].type;
		        //var fileType = fileName.split('.').pop();
		        		        	
		        if (fileType !='application/pdf'){
            	//Read URL if image
	                if (input.files && input.files[0]) {
	                    var reader = new FileReader();
	                    
		                    reader.onload = function (e) {
		                        $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
		                    }
	                   		reader.readAsDataURL(input.files[0]);
	               	}
	                	
	            }else{
	               
	                if (input.files && input.files[0]) {
	                    var reader = new FileReader();
	                    
		                    reader.onload = function (e) {
		                        $('embed').attr('src', e.target.result.concat('#toolbar=0&navpanes=0&scrollbar=0'));
		                    }
	                   		reader.readAsDataURL(input.files[0]);
	               	}	
	                document.getElementById("wizardPicturePreview").src="{{asset('Massets/images/document.png')}}";	

	                document.getElementById("h6").innerHTML = "PDF File is Attached";
			    }           
            }
            

			$("#wizardPicturePreview" ).click (function() {
               $("input[id='wizard-picture']").click();

            });

            $(function(){
 			 $('#viewPDF, #viewIMG').EZView();
			});
			
			
        </script>
    @endpush

@stop