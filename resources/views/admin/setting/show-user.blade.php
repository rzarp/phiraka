@extends('admin.base')
@section('show-user')
        <div class="container-fluid">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="#" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show User</li>
                            </ol>
                            </nav>
                        <h1 class="mb-0 fw-bold">Data User</h1> 
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
                                <div class="table-responsive">
                                    <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>role</th>
                                        <th>created_at</th>
                                        <th>updated_at</th>
                                        <th>fungsi</th>
                                        </tr>
                                    </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
              
            </div> 
           
        </div>
      
@endsection

@push('scripts')

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('show-user') }}",
        columns: [
            {
                data: 'DT_RowIndex', 
                name: 'DT_RowIndex'
            },
            {
                data: 'name', 
                name: 'name',
            },
            {
                data: 'email', 
                name: 'email',
            },
            {
                data: 'is_admin', 
                name: 'is_admin',
            },

            {
                  data: 'created_at', 
                  name: 'created_at',
                  type: 'num',
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    }
              },
              {
                  data: 'updated_at', 
                  name: 'updated_at',
                  type: 'num',
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    }
              },
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: false, 
                  searchable: false
              },
            
        ]
    });
    
  });
</script>



<script>
  $('body').on('click','.delete-confirm',function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    Swal.fire({
      title: 'Apakah Kamu Yakin ? ',
      text: "Hapus Data ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus'
    }).then((result) => {
      if (result.value) {
        window.location.href = url;
      }
    })
  });
</script>

<script>
  $('body').on('click','.edit-confirm',function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    Swal.fire({
      title: 'Apakah Kamu Yakin ? ',
      text: "Edit Data ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Edit'
    }).then((result) => {
      if (result.value) {
        window.location.href = url;
      }
    })
  });
</script>

@endpush

