@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- FILE UPLODE CSS -->
        <link href="{{ asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>
		<!-- INTERNAL Fancy File Upload css -->
		<link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
        <!-- WYSIWYG EDITOR CSS -->
        <link href="{{ asset('assets/plugins/wysiwyag/richtext.css') }}" rel="stylesheet"/>

        <!-- SUMMERNOTE CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">

        <!-- INTERNAL Quill css -->
        <link href="{{ asset('assets/plugins/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/quill/quill.bubble.css') }}" rel="stylesheet">
        <!-- INTERNAL SELECT2 CSS -->
        <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>

		<!-- INTERNAL Jquerytransfer css-->
		<link rel="stylesheet" href="{{ asset('assets/plugins/jQuerytransfer/jquery.transfer.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/plugins/jQuerytransfer/icon_font/icon_font.css') }}">


		<!-- MULTI SELECT CSS -->
		<link rel="stylesheet" href="{{ asset('assets/plugins/multipleselect/multiple-select.css') }}">

		<!--INTERNAL IntlTelInput css-->
		<link rel="stylesheet" href="{{ asset('assets/plugins/intl-tel-input-master/intlTelInput.css') }}">

		<!-- INTERNAL multi css-->
		<link rel="stylesheet" href="{{ asset('assets/plugins/multi/multi.min.css') }}">






		        <!-- FILE UPLODE CSS -->
				<link href="{{ asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>

				<!-- SELECT2 CSS -->
				<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>

				<!-- INTERNAL Fancy File Upload css -->
				<link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

				<!--BOOTSTRAP-DATERANGEPICKER CSS-->
				<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">

				<!-- TIME PICKER CSS -->
				<link href="{{ asset('assets/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet"/>

				<!-- INTERNAL Date Picker css -->
				<link href="{{ asset('assets/plugins/date-picker/date-picker.css') }}" rel="stylesheet" />

				<!-- INTERNAL Sumoselect css-->
				<link rel="stylesheet" href="{{ asset('assets/plugins/sumoselect/sumoselect.css') }}">

				<!-- INTERNAL Jquerytransfer css-->
				<link rel="stylesheet" href="{{ asset('assets/plugins/jQuerytransfer/jquery.transfer.css') }}">
				<link rel="stylesheet" href="{{ asset('assets/plugins/jQuerytransfer/icon_font/icon_font.css') }}">

				<!-- INTERNAL Bootstrap DatePicker css-->
				<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">

				<!-- MULTI SELECT CSS -->
				<link rel="stylesheet" href="{{ asset('assets/plugins/multipleselect/multiple-select.css') }}">

				<!--INTERNAL IntlTelInput css-->
				<link rel="stylesheet" href="{{ asset('assets/plugins/intl-tel-input-master/intlTelInput.css') }}">

				<!-- INTERNAL multi css-->
				<link rel="stylesheet" href="{{ asset('assets/plugins/multi/multi.min.css') }}">

@endsection

@section('content')

						<!-- PAGE-HEADER -->
						<div class="page-header">
							<div>
								<h1 class="page-title">{{ isset($job) ? 'Edit ' : 'Create '}}Job</h1>
								{{-- <ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Tables</a></li>
									<li class="breadcrumb-item active" aria-current="page">Table</li>
								</ol> --}}
							</div>
							<div class="ms-auto pageheader-btn">
								<a href="{{route('admin.jobs.index')}}" class="btn btn-primary btn-icon text-white me-2">
									<span>
										{{-- <i class="fe fe-minus"></i> --}}
									</span> Back To List
								</a>
								{{-- <a href="#" class="btn btn-success btn-icon text-white">
									<span>
										<i class="fe fe-log-in"></i>
									</span> Export
								</a> --}}
							</div>
						</div>
						<!-- PAGE-HEADER END -->

                   <!-- ROW-1 OPEN -->
    <form method="POST" action="{{isset($job) ? route('admin.jobs.update',$job->id) : route('admin.jobs.store')}}" enctype="multipart/form-data">
    @csrf
    @isset($job)
    @method('PUT')
    @endisset
	<div class="row">
		{{-- Left Side --}}
		<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Upload Image</h3>
				</div>
				<div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

					<div class="form-group">
						<label for="exampleInputname">Job Title</label>
						<input type="text" class="form-control" value="{{$job->title ?? old('title')}}" name="title" id="" placeholder="Job Title">
					</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Employment Status</label>
                                        <input type="text" class="form-control" value="{{$job->employement_status ?? old('employement_status')}}" name="employement_status" id="" placeholder="Use comma (,) to seperate statuses. eg: full-time, part-time, contractual">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Application Deadline</label>
                                        <input type="date" class="form-control" value="{{$job->application_deadline ?? old('application_deadline')}}" name="application_deadline" id="" placeholder="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Vacancy</label>
                                        <input type="number" class="form-control" value="{{$job->vacancy ?? old('vacancy')}}" name="vacancy" id="" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Experience in Years</label>
                                        <input type="text" class="form-control" value="{{$job->exp_in_year ?? old('exp_in_year')}}" name="exp_in_year" id="" placeholder="enter years of experience">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


					<div class="form-group">
						<label for="exampleInputContent">Job Description</label>
						<div class="ql-wrapper ql-wrapper-demo bg-light">
                            <textarea name="body" class="my-editor form-control" id="ckeditor" style="height: 200px;" cols="30" rows="10">{!!$job->body ?? old('body')!!}</textarea>
						</div>
					</div>

                    <div class="form-group">
						<label for="exampleInputContent">Read Before Apply</label>
						<div class="ql-wrapper ql-wrapper-demo bg-light">
                            <textarea name="read_before" class="my-editor form-control" id="" style="height: 100px;" cols="30" rows="10">{!!$job->read_before ?? old('read_before')!!}</textarea>
						</div>
					</div>

                    <div class="form-group">
						<label for="exampleInputname">Email (Where applicatints will send their CVs) </label>
						<input type="text" class="form-control" value="{{$job->email ?? old('email')}}" name="email" id="" placeholder="enter email address">
					</div>

                    <div class="form-group">
						<label for="exampleInputname">Meta Title</label>
						<input type="text" class="form-control" value="{{$job->meta_title ?? old('meta_title')}}" name="meta_title" id="">
					</div>

                    <div class="form-group">
						<label for="exampleInputname">Meta Description</label>
                        <textarea name="meta_desc" class="my-editor form-control" id="" style="height: 200px;" cols="30" rows="10">{{$job->meta_desc ?? old('meta_desc')}}</textarea>
					</div>

                    {{-- <input type="radio" name="link" checked id="test2">
                    <label for="css">Feature Image</label>
                    <input type="radio" name="link" id="test1">
                    <label for="html">Youtube Link</label>


                    <div class="form-group youtube" style="display:none">
						<label for="exampleInputname">Youtube Link</label>
						<input type="text" class="form-control" value="{{$post->youtube_link ?? old('youtube_link')}}" name="youtube_link" id="youtube_link" placeholder="Youtube Video Link">
					</div>

					<div class="form-group featur">
						<label class="form-label">Feature Image</label>
						<!-- <input id="demo" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png" multiple="" class="ff_fileupload_hidden"> -->
                        <input type="file" data-height="100" class="dropify form-control" data-default-file="{{ isset($post) ? asset($post->image) : '' }}" name="image">
					</div> --}}



				</div>
				<div class="card-footer text-end">
					<button type="submit" class="btn btn-success mt-1">
                        @isset($job)
                        <i class="fas fa-arrow-circle-up"></i>
                        Update
                        @else
                        <i class="fe fe-plus"></i>
                        Create
                        @endisset
                    </button>
					<a href="{{route('admin.jobs.index')}}" class="btn btn-danger mt-1">Cancel</a>
				</div>
			</div>
		</div>

		{{-- Right Side --}}
		<div class="col-lg-3 col-xl-3 col-md-12 col-sm-12" style="float: left">

            <div class="card shadow-none border">
				<div class="card-header">
					<h5 class="card-title">Select Category</h5>
				</div>
				<div class="card-body" style="padding:2px;">
					<div class="transfer">
						<div class="transfer-double" id="transfer_double_languageInput">
							<div class="transfer-double-header"></div>
							<div class="transfer-double-content clearfix">

								<div class="transfer-double-list transfer-double-list-1636878492751 tab-content-first-1636878492751 tab-content-active">
									{{-- <div class="transfer-double-list-header">
										<div class="transfer-double-list-search"><input class="transfer-double-list-search-input" type="text" id="groupListSearch_1636878492751" placeholder="Search" value="" /></div>
									</div> --}}

                                    @isset($job)

                                    <div class="transfer-double-list-content">
										<div class="transfer-double-list-main">

											<ul class="transfer-double-group-list-ul transfer-double-group-list-ul-1636878492751">

                                            @foreach($categories as $key => $categoryy)

												<li class="transfer-double-group-list-li transfer-double-group-list-li-1636878492751">
													<div class="checkbox-group">

														<input type="checkbox" name="categories" value="{{$categoryy->id}}" {{$categoryy->id == $job->jobcategory_id ? 'checked' : ''}} class="checkbox-normal group-select-all-1636878492751" id="group_{{$key}}_1636878492751" /><label for="group_{{$key}}_1636878492751" class="group-name-1636878492751">{{$categoryy->name}}</label>

													</div>
												</li>
                                            @endforeach

											</ul>
										</div>
									</div>


                                    @else

									<div class="transfer-double-list-content">
										<div class="transfer-double-list-main">

											<ul class="transfer-double-group-list-ul transfer-double-group-list-ul-1636878492751">

                                            @foreach($categories as $key => $category)

                                            @if($category->status == true)

												<li class="transfer-double-group-list-li transfer-double-group-list-li-1636878492751">
													<div class="checkbox-group">
														<input type="checkbox" name="categories" value="{{$category->id}}" class="checkbox-normal group-select-all-1636878492751" id="group_{{$key}}_1636878492751" /><label for="group_{{$key}}_1636878492751" class="group-name-1636878492751">{{$category->name}}</label>
													</div>
												</li>

                                            @endif
                                            @endforeach


											</ul>
										</div>
									</div>

                                    @endisset

								</div>

							</div>
							<div class="transfer-double-footer"></div>
						</div>
					</div>
				</div>

			</div>

            <div class="card">
				<div class="card-header">
					<h3 class="card-title">Create Page</h3>
				</div>
				<div class="card-body">
                    @isset($job)
					<div class="form-group">
						<div class="form-label">Status</div>
						<label class="custom-switch">
							<input type="checkbox" name="status" {{$job->status == true ? 'checked' : ''}} class="custom-switch-input ">
							<span class="custom-switch-indicator"></span>
						</label>
					</div>

                    @else

                    <div class="form-group">
						<div class="form-label">Status</div>
						<label class="custom-switch">
							<input type="checkbox" name="status" class="custom-switch-input ">
							<span class="custom-switch-indicator"></span>
						</label>
					</div>

                    @endisset



				</div>

			</div>

		</div>

	</div>
    </form>
	<!-- ROW-1 CLOSED -->
@endsection('content')

@section('scripts')


    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    {{-- <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script> --}}
<script>
	window.onload = function () {
		CKEDITOR.replace('ckeditor', {
	        filebrowserBrowseUrl: filemanager.ckBrowseUrl,
	    });
	}
</script>

<script>
$(document).ready(function() {
    $("input[id$='test1']").click(function() {
        var link = $(this).val();

        $("div.youtube").show();
        $("div.featur").hide();
    });

    $("input[id$='test2']").click(function() {
        var link = $(this).val();

        $("div.youtube").hide();
        $("div.featur").show();
    });
});
</script>


     {{-- <script>

function myFunction() {
    var title = document.getElementById('posttitle').value;
  document.getElementById("postslug").value = title;
}
//         document.getElementById('postslug').addEventListener('click', FILLSLUG);

// function FILLSLUG() {

//     var title = document.getElementById('posttitle');
//     var slug = document.getElementById('postslug');

//     slug.value = title.value;

// };
    </script> --}}


        <!-- <script>
            $('#select-all').click(function(event){
                if(this.checked)
                {
                    $(':checkbox').each(function(){
                        this.checked = true;
                    });
                }
                else
                {
                    $(':checkbox').each(function(){
                        this.checked = false;
                    });
                }
            });
         </script> -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <!-- CHARTJS JS -->
        <script src="{{ asset('assets/plugins/chart/Chart.bundle.js')}}"></script>
		<script src="{{ asset('assets/plugins/chart/utils.js')}}"></script>

        <!-- INTERNAL SELECT2 JS -->
        <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
		<script src="{{ asset('assets/js/select2.js') }}"></script>
		<!-- FILE UPLOADES JS -->
		<script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
		<script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

		<!-- INTERNAL File-Uploads Js-->
		<script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
        <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
        <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
        <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
        <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

		<!-- WYSIWYG Editor JS -->
		<script src="{{ asset('assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
		<script src="{{ asset('assets/plugins/wysiwyag/wysiwyag.js') }}"></script>

		<!-- INTERNAL multi js-->
		<script src="{{ asset('assets/plugins/multi/multi.min.js') }}"></script>

				<!-- MULTI SELECT JS-->
				<script src="{{ asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
				<script src="{{ asset('assets/plugins/multipleselect/multi-select.js') }}"></script>

						<!-- FORMELEMENTS JS -->
		<script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>
		<script src="{{ asset('assets/js/form-elements.js') }}"></script>


		<!-- INTERNAL jquery transfer js-->
		<script src="{{ asset('assets/plugins/jQuerytransfer/jquery.transfer.js') }}"></script>

		<!-- SUMMERNOTE JS -->
		<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>

		<!-- FORMEDITOR JS -->
		<script src="{{ asset('assets/plugins/quill/quill.min.js') }}"></script>
		<script src="{{ asset('assets/js/form-editor2.js') }}"></script>

@endsection
