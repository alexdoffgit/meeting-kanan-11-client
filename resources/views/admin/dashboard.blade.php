<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <title>PANAGEA - Admin dashboard</title>
	
  <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
	
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('admin-style/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Main styles -->
  <link href="{{ asset('admin-style/css/admin.css') }}" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="{{ asset('admin-style/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="{{ asset('admin-style/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Year Picker -->
  <link href="{{ asset('admin-style/vendor/yearpicker.css') }}" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="{{ asset('admin-style/css/custom.css') }}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  @extends('layout.admin.nav')

  <div class="content-wrapper">
    <div class="container-fluid">
    
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">
            <a href="#">Dashboard</a>
          </li>
        </ol>

        <div class="box_general padding_bottom">

          <form action="{{ url('/admin/dashboard/filter') }}" method="post" class="form-group">
            @csrf
            <input 
              type="text" 
              id="yearpicker"
              {{-- class="form-control" --}}
              style="padding: .375rem .75rem; border: 1px solid #ced4da; border-radius: .25rem;"
              value=""
              name="year"
              placeholder="filter by year">
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
          <hr>

          <!-- top 3 card -->
          <div class="row">

            <!-- Success Card -->
            <div class="col-4">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Success Order Count</p>
                  <h5 class="card-text">{{ $success }}</h5>
                </div>
              </div>
            </div>

            <!-- Cancel Card -->
            <div class="col-4">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Cancel Order Count</p>
                  <h5 class="card-text">{{ $cancel }}</h5>
                </div>
              </div>
            </div>

            <!-- Pending Cart -->
            <div class="col-4">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Pending Order Count</p>
                  <h5 class="card-text">{{ $pending }}</h5>
                </div>
              </div>
            </div>
          </div>
          <br>

          <!-- graph -->
          <div class="row">
            <div class="col">
              <canvas id="success-transaction"></canvas>
            </div>
          </div>
          <br>

          <hr>
          <!-- datatables -->
          <div class="row">
            <div class="col">
              <h5 style="margin-left:12px;">How Many Time Room is Ordered</h5>
              <table class="table" id="order-count">
                <thead>
                  <tr>
                    <th>Room Name</th>
                    <th>Order Count</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ordersCount as $roomName => $count)
                    <tr>
                      <td>{{ $roomName }}</td>
                      <td>{{ $count }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

        </div>
    </div>
  </div>

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin-style/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin-style/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin-style/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('admin-style/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('admin-style/vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('admin-style/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('admin-style/vendor/jquery.selectbox-0.2.js') }}"></script>
  <script src="{{ asset('admin-style/vendor/retina-replace.min.js') }}"></script>
  <script src="{{ asset('admin-style/vendor/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('admin-style/vendor/yearpicker.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin-style/js/admin.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('#order-count').DataTable();
    });
  </script>
  <script>
    $('#yearpicker').yearpicker();
  </script>
  <script>
    var priceData = [
                  @forelse ($incomes as $successPay)
                    {{$successPay['total_price']}},
                  @empty
                  @endforelse
                ];
    var priceDataNullCounter = 0;
    for(let pd of priceData) {
      if(pd === 0) {
        priceDataNullCounter += 1;
      }
    }
    var priceDataAvailable = priceDataNullCounter !== priceData.length
    var ctx = document.getElementById('success-transaction').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 
                      'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                      'Nov', 'Des'],
            datasets: [{
                label: 'Total Successful Room Purchase',
                data: priceData,
                backgroundColor: 'rgba(51,133,73,0.8)',
                borderColor: '#2c6c3d'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    display: priceDataAvailable ? true : false,
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                          return 'Rp.' + value;
                        }
                    }
                }]
            }
        }
    });
  </script>

</body>
</html>