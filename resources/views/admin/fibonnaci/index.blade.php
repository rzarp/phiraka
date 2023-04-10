@extends('admin.base')
@section('fibonacci')

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

                    <div class="table-responsive">
                        <table class="table">
                          <thead>
                            @for($i = 0; $i < $row; $i++) 
                            {{-- menampilkan baris tabel sebanyak $row --}}
                            <tr>
                                @for($j = 0; $j < $column; $j++)
                                {{-- perulangan akan terus berjalan sampai nilai variabel $j sama atau lebih besar dari $column. --}}
                                @if ($i == 0 && $j < 1)
                                  <td>{{ $a }}</td>
                                  <td>{{ $b }}</td>
                                  @php
                                  $j += 1;    
                                  @endphp
                                {{-- Jika tidak memenuhi kondisi pada langkah sebelumnya, 
                                  maka akan menampilkan nilai dari hasil penjumlahan
                                   variabel $a dan $b, yang kemudian nilai dari variabel $a 
                                   akan diganti dengan nilai dari variabel $b, dan nilai dari 
                                   variabel $b akan diganti dengan nilai dari variabel $c --}}
                                @else
                                    @php
                                    $c = $a + $b;
                                    @endphp
                                    <td>{{ $c }}</td>
                                    @php
                                    $a = $b;
                                    $b = $c;
                                    @endphp
                                @endif
                              @endfor
                            </tr>
                            @endfor
                          </thead>
                          <tbody>
                           
                          </tbody>
                        </table>
                      </div>
                    {{-- <div class="card-body">
                        KOLOM = {{ $column }}
                        <br>
                        ROW = {{ $row }}
                        <br>
                        <table border='1'>
                          @for($i = 0; $i < $row; $i++)
                            <tr>
                              @for($j = 0; $j < $column; $j++)
                                @if ($i == 0 && $j < 1)
                                  <td>{{ $a }}</td>
                                  <td>{{ $b }}</td>
                                  @php
                                  $j += 1;    
                                  @endphp
                                @else
                                    @php
                                    $c = $a + $b;
                                    @endphp
                                    <td>{{ $c }}</td>
                                    @php
                                    $a = $b;
                                    $b = $c;
                                    @endphp
                                @endif
                              @endfor
                            </tr>
                          @endfor
                        
                        </table> --}}
                        
                        {{-- Rumus FIBONACI
                            c = a+b
                            a = b
                            b = c    
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> 
</div>
@endsection


