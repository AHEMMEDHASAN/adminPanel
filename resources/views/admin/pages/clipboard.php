@extends('admin/components/layout')
@section('content')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="container-fluid">
            
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Categories</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="success" id="welcome">
        @if ($message = Session::get('success-message'))
            <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-bs-dismiss="alert">×</button>	
            </div>
        @elseif ($message = Session::get('error-message'))
            <div class="alert alert-error alert-block">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-bs-dismiss="alert">×</button>	
            </div>
        @endif       
    </div>
    <script>
        setTimeout(function(){
            document.getElementById('welcome').style.display = 'none';
        }, 5000);
    </script>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('add-category') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Category Name...">
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mt-2">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>


   
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Categories Table</h4>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0" id="datatable">
                        <thead class="table-light">                          
                                <th class="align-middle">SL. No.</th>
                                <th class="align-middle">Catgory Name</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $categories as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td><a href="" type="button" class="btn btn-success btn-sm">View More..</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $("#datatable").dataTable();
    });
</script>