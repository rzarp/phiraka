@extends('admin.base')
@section('edit-user')


<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
                </nav>
            <h1 class="mb-0 fw-bold">Profile</h1> 
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="{{route('insert-user')}}" class="btn btn-primary text-white"
                    target="_blank">Insert Data</a>
                <a href="{{route('show-user')}}" class="btn btn-success text-white"
                target="_blank">Show Data</a>
            </div>

            
        </div>
    </div>
</div>

<div class="container-fluid">
   
    <div class="row">
      
        <div class="col-lg-12 col-xlg-3 col-md-12">

            @if (session()->has('pesan'))
                <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session()->get('pesan') }}
                </div>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update.user',['id' => $user->id]) }}" class="form-horizontal form-material mx-2" method="post" >
                        @method('put')
                        
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="name" id="" value="{{ $user->name }}">
                            
                                @error('name')
                                <div class="text-danger">
                                    {{ $message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" class="form-control form-control-line" name="email" id="" value="{{ $user->email }}">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_admin" class="col-md-12">Is_Admin</label>
                            <div class="col-sm-12">
                                <select name="is_admin" class="form-select shadow-none form-control-line">
                                    <option value=""></option>
                                    @foreach($is_admin as $admin)
                                    <option value="{{ $admin }}" {{ ($user->is_admin == $admin ) ? 'selected' : '' }}>{{ $admin }}</option>
                                    @endforeach
                                @error('is_admin')
                                    <div class="text-danger">
                                        {{ $message}}
                                    </div>
                                @enderror
                                </select>
                            </div>
                            
                        </div>
                            
                        
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line" name="password" id="">
                                @error('password')
                                <div class="text-danger">
                                    {{ $message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection