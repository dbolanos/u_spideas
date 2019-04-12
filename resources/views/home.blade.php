@extends('layouts.app')

@section('content')


          <!-- Begin Page Content -->
          <div>

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Bienvenido al Sistema de Dirección
                de Extensión y Acción Social</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

              <!-- Earnings (Monthly) Card Example -->
              @role(['admin'])
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{route('all.requests')}}">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tramites</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-boxes fa-2x text-success"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{route('all.infrastructures')}}">
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Infraestructuras</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-building fa-2x text-info"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{route('all.events')}}">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Eventos</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar-alt fa-2x text-primary"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{route('report')}}">
                  <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Reportes</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              @endrole

              @role(['student'])
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{route('my.student.requests')}}">
                  <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Mis Solicitudes</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-fw fa-archive"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              @endrole

            </div>


          </div>
          <!-- /.container-fluid -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Listo para Salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Salir" si desea cerrar su sesión.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="login.html">Salir</a>
          </div>
        </div>
      </div>
    </div>

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido!!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    Te has logueado con exito!
                </div>
                <div>
                  <a href="#" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Split Button Primary</span>
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection
