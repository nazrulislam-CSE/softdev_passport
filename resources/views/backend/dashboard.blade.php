@extends('layouts.backend')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-light shadow-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div>
              <span class="mr-2"><a target="_blank" href="{{ route('admin.dashboard') }}">Dashboard</a></span>
            </div>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content mt-3">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
           <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                 <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
                 </div>
                 <div class="icon">
                    <i class="ion ion-bag"></i>
                 </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
           </div>
           <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                 <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                 </div>
                 <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                 </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
           </div>
           <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                 <div class="inner">
                    <h3>{{ DB::table('users')->count() }}</h3>
                    <p>User Registrations</p>
                 </div>
                 <div class="icon">
                    <i class="ion ion-person-add"></i>
                 </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
           </div>
           <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                 <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                 </div>
                 <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                 </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
           </div>
        </div>
        <!-- /.row (main row) -->
        <div class="row">
           <div class="col-lg-6">
              <div class="card">
                 <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                       <h3 class="card-title">Online Store Visitors</h3>
                       <a href="javascript:void(0);">View Report</a>
                    </div>
                 </div>
                 <div class="card-body">
                    <div class="d-flex">
                       <p class="d-flex flex-column">
                          <span class="text-bold text-lg">820</span>
                          <span>Visitors Over Time</span>
                       </p>
                       <p class="ml-auto d-flex flex-column text-right">
                          <span class="text-success">
                          <i class="fas fa-arrow-up"></i> 12.5%
                          </span>
                          <span class="text-muted">Since last week</span>
                       </p>
                    </div>
                    <div class="position-relative mb-4">
                       <div class="chartjs-size-monitor">
                          <div class="chartjs-size-monitor-expand">
                             <div class=""></div>
                          </div>
                          <div class="chartjs-size-monitor-shrink">
                             <div class=""></div>
                          </div>
                       </div>
                       <canvas id="visitors-chart" height="200" width="487" style="display: block; width: 487px; height: 200px;" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                       <span class="mr-2">
                       <i class="fas fa-square text-primary"></i> This Week
                       </span>
                       <span>
                       <i class="fas fa-square text-gray"></i> Last Week
                       </span>
                    </div>
                 </div>
              </div>
           </div>
           <div class="col-lg-6">
              <div class="card">
                 <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                       <h3 class="card-title">Sales</h3>
                       <a href="javascript:void(0);">View Report</a>
                    </div>
                 </div>
                 <div class="card-body">
                    <div class="d-flex">
                       <p class="d-flex flex-column">
                          <span class="text-bold text-lg">$18,230.00</span>
                          <span>Sales Over Time</span>
                       </p>
                       <p class="ml-auto d-flex flex-column text-right">
                          <span class="text-success">
                          <i class="fas fa-arrow-up"></i> 33.1%
                          </span>
                          <span class="text-muted">Since last month</span>
                       </p>
                    </div>
                    <div class="position-relative mb-4">
                       <div class="chartjs-size-monitor">
                          <div class="chartjs-size-monitor-expand">
                             <div class=""></div>
                          </div>
                          <div class="chartjs-size-monitor-shrink">
                             <div class=""></div>
                          </div>
                       </div>
                       <canvas id="sales-chart" height="200" style="display: block; width: 487px; height: 200px;" width="487" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                       <span class="mr-2">
                       <i class="fas fa-square text-primary"></i> This year
                       </span>
                       <span>
                       <i class="fas fa-square text-gray"></i> Last year
                       </span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection