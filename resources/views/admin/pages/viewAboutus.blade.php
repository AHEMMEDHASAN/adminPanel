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
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">View About Us</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">About Us</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">About us</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Left Title</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Right Title</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @foreach ($aboutus_data as $key => $values)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>
                                {{ $values->left_title }}
                            </td>
                            <td>
                                <img src="{{ (isset($values->left_image) && $values->left_image != '') ? URL::asset('admin/img/content_images/'.$values->left_image) : URL::asset('admin/img/content_images/noImage.jpg') }}" height="100" width="80" alt="Image Not Available">
                            </td>
                            <td>
                                {{ $values->left_content }}
                            </td>
                            <td>
                                {{ $values->right_title }}
                            </td>
                            <td>
                                <img src="{{ (isset($values->right_image) && $values->right_image != '') ? URL::asset('admin/img/content_images/'.$values->right_image) : URL::asset('admin/img/content_images/noImage.jpg') }}" height="100" width="80" alt="Image Not Available">
                                {{-- <img src="{{ isset($values->right_image) ? url('/').'/admin/img/content_images/'.$values->right_image : url('/').'/admin/img/content_images/noImage.jpg' }}" height="100" width="80" alt="Image Not Available"> --}}
                            </td>
                            <td>
                                {{ $values->right_content }}
                            </td>
                            <td>
                                <a href="{{ url('add-aboutus-content') }}?id={{ $values->id }}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> </a>
                                <a href="{{ url('delete-aboutus') }}?id={{ $values->id }}" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
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
<script>
    setTimeout(function(){
    document.getElementById('welcome').style.display = 'none';
}, 15000);
</script>