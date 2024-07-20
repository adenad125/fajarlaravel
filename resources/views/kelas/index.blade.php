@extends('template.main')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">kelas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data kelas</h3>
  
               <div class="card-tools">
                <a href="/kelas/create" class="btn btn-primary">Tambah</a>
                
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama kelas</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($kelas as $k)
                     
                   
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$k->nama_kelas}}</td>
                      <td></td>
                      <td><a href="{{url("kelas/$k->id/edit") }}" class="btn btn-warning">Edit</a>
                      <form action="{{url("kelas/$k->id")}}" method="post" class="d-inline" >
                      @method('delete')
                      @csrf
                        <button class="btn btn-danger" onclick="return confirm ('Yakin mau hapus data?')" >Hapus</button>
                        </form>
                      @endforeach
                    </td>
                    </tr>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
  
          <!-- /.row (main row) -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
  
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection