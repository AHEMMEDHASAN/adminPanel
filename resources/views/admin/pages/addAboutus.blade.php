@extends('admin/components/layout')
@section('content')
<div class="page-content fade-in-up">
   <div class="success" id="welcome">
      @if ($message = Session::get('success-message'))
      <div class="alert alert-success alert-block">
         <strong>{{ $message }}</strong>
         <button type="button" class="close" data-dismiss="alert">×</button>	
      </div>
      @elseif ($message = Session::get('error-message'))
      <div class="alert alert-error alert-block">
         <strong>{{ $message }}</strong>
         <button type="button" class="close" data-dismiss="alert">×</button>	
      </div>
      @endif       
   </div>
   <div class="ibox">
      <div class="ibox-head">
         <div class="ibox-title">
            <b>{{ isset($aboutus_data) ? 'Update About Us Contents' : 'Add About Us Contents' }}</b>
         </div>
         <div class="ibox-tools">
            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
         </div>
      </div>
      <div class="ibox-body">
         <form class="form-horizontal" action="{{ route('add-aboutus-content') }}" id="form-sample-1" method="post" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="row">
               <div class="col-lg-12">
                  <div class="form-group">
                     <label class="col-sm-12 col-form-label">Select Type Of Content</label>
                     <div class="col-sm-12">
                        <select name="main_content_type" class="form-control" id="type">
                           <option value="">--select--</option>
                           <option value="type1" {{ (isset($aboutus_data->main_content_type) && $aboutus_data->main_content_type = 'type1') ? 'selected' : ''; }}>one sided</option>
                           <option value="type2" {{ (isset($aboutus_data->main_content_type) && $aboutus_data->main_content_type = 'type2') ? 'selected' : ''; }}>Two sided</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            {{-- For Left Column --}}
            <div class="row" id="all-content">
               <div class="col-lg-6" id="left-column">
                  <div class="form-group">
                     <label class="col-sm-12 col-form-label">Title(For Left Column)</label>
                     <div class="col-sm-12">
                        <input class="form-control" type="text" name="left_content_title" value="{{ isset($aboutus_data->left_title) ? $aboutus_data->left_title : ''}}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-12 col-form-label">Content Type</label>
                     <div class="col-sm-12">
                        <select name="left_content_type" class="form-control" id="left-content-type">
                           <option value="">--select--</option>
                           <option value="image" {{ (isset($aboutus_data->left_content_type) && $aboutus_data->left_content_type = 'image') ? 'selected' : '' }}>image</option>
                           <option value="text" {{ (isset($aboutus_data->left_content_type) && $aboutus_data->left_content_type = 'text') ? 'selected' : '' }}>text</option>
                        </select>
                     </div>  
                  </div>
                  <div class="form-group" id="left-image" 
                     style="display: {{ (isset($aboutus_data->left_content_type) && $aboutus_data->left_content_type == 'image') ? '' : 'none' }};">
                     <label class="col-sm-12 col-form-label"><b>Image</b></label>
                     <div class="col-sm-12">
                        <input class="form-control" type="file" name="left_image">
                        <img src="{{ isset($aboutus_data->left_image) ? Storage::disk('local')->url('public/admin/img/content_images/'.$aboutus_data->left_image) : Storage::disk('local')->url('public/admin/img/content_images/noImage.jpg')  }}" alt="No Image Available" height="150" width="160">
                        {{-- <img src="{{ isset($aboutus_data->left_image) ? url('/').'/admin/img/content_image/'.$aboutus_data->left_image :  url('/')/admin/img/noImage.jpg }}" alt="No Image Available" height="150" width="160"> --}}
                     </div>
                  </div>
                  <div class="form-group" id="left-text" 
                     style="display: {{ (isset($aboutus_data->left_content_type) && $aboutus_data->left_content_type == 'text') ? '' : 'none' }} ">
                     <div class="col-sm-12">
                        <textarea class="ckeditor" name="editor2">{!! isset($aboutus_data->left_content) ?$aboutus_data->left_content : '' !!}</textarea>  
                     </div>
                  </div>
               </div>
               {{-- For Right Column --}}
               <div class="col-lg-6" id="right-column">
                  <div class="form-group">
                     <label class="col-sm-12 col-form-label">Title(For Right Column)</label>
                     <div class="col-sm-12">
                        <input class="form-control" type="text" name="right_content_title" value="{{ isset($aboutus_data->right_title) ? $aboutus_data->right_title : '' }}" >
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-12 col-form-label">Content Type</label>
                     <div class="col-sm-12">
                        <select name="right_content_type" class="form-control" id="right-content-type">
                           <option value="">--select--</option>
                           <option value="image" {{ isset($aboutus_data->right_content_type) && $aboutus_data->right_content_type == 'image' ? 'selected' : '' }}>image</option>
                           <option value="text" {{ isset($aboutus_data->right_content_type) && $aboutus_data->right_content_type == 'text' ? 'selected' : '' }}>text</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group" id="right-image"
                  style="display: {{ (isset($aboutus_data->right_content_type) && $aboutus_data->right_content_type == 'image') ? '' : 'none' }};">
                     <label class="col-sm-12 col-form-label"><b>Image</b></label>
                     <div class="col-sm-12">
                        <input class="form-control" type="file" name="right_image">
                        <img src="{{ isset($aboutus_data->right_image) ? Storage::disk('local')->url('public/admin/img/content_images/'.$aboutus_data->right_image) : Storage::disk('local')->url('public/admin/img/content_images/noImage.jpg')  }}" alt="No Image Available" height="150" width="160">
                        {{-- <img src="{{ $aboutus_data->right_image ? url('/')/admin/img/content_image/$aboutus_data->right_image :  url('/')/admin/img/noImage.jpg }}" alt="No Image Available" height="150" width="160"> --}}
                     </div>
                  </div>
                  <div class="form-group" id="right-text" 
                  style="display: {{ isset($aboutus_data->right_content) ? '' : 'none' }} ">
                     <div class="col-sm-12">
                        <textarea class="ckeditor" name="editor1">{!! isset($aboutus_data->right_content) ? $aboutus_data->right_content : '' !!}</textarea>                        
                     </div>
                  </div>
               </div>
            </div>
            <hr>
            <div class="form-group">
               <div class="col-sm-12 ml-sm-auto">
                  <button class="btn btn-info" type="submit">{{ isset($aboutus_data) ? 'Update' : 'Submit' }}</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <style>
      .visitors-table tbody tr td:last-child {
      display: flex;
      align-items: center;
      }
      .visitors-table .progress {
      flex: 1;
      }
      .visitors-table .progress-parcent {
      text-align: right;
      margin-left: 10px;
      }
   </style>
</div>
@endsection
<script src="{{ url('/') }}/admin/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/admin/ckeditor/ckeditor.js"></script>
<script>
   CKEDITOR.replaceAll('ckeditor');

   setTimeout(function(){
   document.getElementById('welcome').style.display = 'none';
   }, 5000);

   
   $(document).ready(function () {
    $('#type').on('change', function() {
        if (this.value == 'type1') {
            $('#right-column').hide();
            $('#right-column').removeClass('col-lg-6');
            $('#left-column').removeClass('col-lg-6');
            $('#left-column').addClass('col-lg-12');
            $('#all-content').addClass('justify-content-center');
        }
        if(this.value == 'type2'){
            $('#right-column').show();
            $('#right-column').addClass('col-lg-6');
            $('#left-column').addClass('col-lg-6');
            $('#left-column').removeClass('col-lg-12');
            $('#all-content').removeClass('justify-content-center');
        }
        
});

    $('#left-content-type').on('change', function() {
        if (this.value == 'image') {
            $('#left-text').hide();
            $('#left-image').show();
        }
        if (this.value == 'text') {
            $('#left-text').show();            
            $('#left-image').hide();            
        }
    });

    $('#right-content-type').on('change', function() {
        if (this.value == 'image') {
            $('#right-text').hide();
            $('#right-image').show();
        }
        if (this.value == 'text') {
            $('#right-text').show();            
            $('#right-image').hide();            
        }
    });
    
});
</script>