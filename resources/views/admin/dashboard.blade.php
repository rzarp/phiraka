@extends('admin.base')
@section('content')
        <div class="container-fluid">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="#" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Fibonaci</li>
                            </ol>
                            </nav>
                        <h1 class="mb-0 fw-bold">Fibonaci</h1> 
                    </div>
                    {{-- <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="" class="btn btn-primary text-white"
                                target="_blank">Lihat Data</a>
                        </div>
                    </div> --}}
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
                                <form action="{{route('fibonacci.store')}}" class="form-horizontal form-material mx-2" method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group m-t-40">
                                        <label class="col-md-12">Row</label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-line" name="row" id="" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Columns</label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-line" name="column" id="" value="">
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
         
              
            </div> 
           
        </div>
      
@endsection

