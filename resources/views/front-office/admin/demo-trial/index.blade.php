@extends('front-office.admin.index', [
    'title' => 'Demo/Trial Request'
])

@section('content')
          <div class="page-inner">
            <div class="page-header">
              {{-- <h3 class="fw-bold mb-3">DataTables.Net</h3> --}}
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="{{ route('admin') }}">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Configuration</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Demo/Trial</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Demo/Trial</h4>
                    </div>
                    <button class="btn btn-primary mt-3 mb-3 d-flex align-items-center gap-2"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#exportFormCollapse"
                            aria-expanded="false">
                        Export Data
                        <i class="bi bi-chevron-down"></i>
                    </button>

                    <div id="exportFormCollapse" class="collapse">
                        <form action="{{ route('export') }}" method="GET" class="row g-3">
                            <div class="col-md-6">
                                <label for="start_date" class="form-label fw-bold">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                                <small class="text-muted">Select start date</small>
                            </div>
                            <div class="col-md-6">
                                <label for="end_date" class="form-label fw-bold">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                                <small class="text-muted">Select end date</small>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="text-danger mb-2">
                                    <small>
                                        *Leave start date and end date blank if you want to export all data
                                    </small>
                                </div>
                                <button type="submit" class="btn btn-success">Export to Excel</button>
                            </div>
                        </form>
                    </div>
                  </div>
                  <div class="card-body">

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Phone</th> 
                            <th>Company Name</th>
                            <th>Product Request</th>
                            <th>Description</th>
                            <th>Requested at</th> 
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Name</th>
                            <th>Phone</th> 
                            <th>Company Name</th>
                            <th>Product Request</th>
                            <th>Description</th>
                            <th>Requested at</th> 
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($requests as $request)
                          <tr>
                            <td>{{ $request->name }}</td>
                            <td>{{ $request->phone }}</td>
                            <td>{{ $request->company_name }}</td>
                            <td>{{ $request->product_request }}</td>
                            <td>{!! substr($request->description, 0, 50) . '...' !!}</td>
                            <td>{{ $request->created_at}}</td>
                            <td>
                              <div class="form-button-action">
                                <a
                                  class="btn btn-link btn-primary btn-lg"
                                  href="{{ route('demo-trial.show', $request->id) }}"
                                >
                                  <i class="fa fa-eye"></i>
                                </a>
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-danger"
                                  data-original-title="Remove"
                                  onclick="initDemos({{ $request->id }})"
                                >
                                  <i class="fa fa-times"></i>
                              </button>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('js')
    <script type="text/javascript">
      $(document).ready(function () {
        $("#basic-datatables").DataTable();

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        // $("#addRowButton").click(function () {
        //   $("#add-row")
        //     .dataTable()
        //     .fnAddData([
        //       $("#addName").val(),
        //       $("#addSlug").val(),
        //       $("#addImage").val(),
        //       action,
        //     ]);
        //   $("#addRowModal").modal("hide");
        // });
      });
      
        var initDemos = function (id) {
          const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            swal({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              type: "warning",
              buttons: {
                cancel: {
                  visible: true,
                  text: "No, cancel!",
                  className: "btn btn-danger",
                },
                confirm: {
                  text: "Yes, delete it!",
                  className: "btn btn-success",
                },
              },
            }).then((willDelete) => {
              if (willDelete) {
                $.ajax({
                    url: "/admin/demo-trial/" + id,
                    method: "DELETE",
                    headers: {
                       "X-CSRF-TOKEN": csrfToken
                    }
                });
                swal("Demo/trial request has been deleted", {
                  icon: "success",
                  buttons: {
                    confirm: {
                      className: "btn btn-success",
                    },
                  },
                }).then(() => {
                    location.reload();
                });
              }
            });
        };
    </script>
@endpush