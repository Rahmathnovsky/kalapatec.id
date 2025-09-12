@extends('front-office.admin.index', [
    'title' => 'Career Page Management'
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
                  <a href="#">Career</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Career Management</h4>
                      <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Add New Career
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Create Modal -->
                    <div
                      class="modal fade"
                      id="addRowModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> New</span>
                              <span class="fw-light"> Career </span>
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-bs-toggle="modal"
                              data-bs-target="#addRowModal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="small">
                              Create a new career using this form, make sure you
                              fill them all
                            </p>
                            <form method="POST" action="{{ route('career.store') }}">
                              @csrf
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>title</label>
                                    <input
                                      id="addName"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill title"
                                      name="title"
                                      required
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer border-0">
                                <button
                                  type="submit"
                                  id="addRowButton"
                                  class="btn btn-primary"
                                >
                                  Add
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#addRowModal"
                                >
                                  Close
                                </button>
                              </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Slug</th> 
                            <th>Author</th>
                            <th>Created at</th> 
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Title</th>
                            <th>Slug</th> 
                            <th>Author</th>
                            <th>Created at</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($careers as $career)
                          <tr>
                            <td>{{ substr($career->title, 0, 35) . '...' }}</td>
                            <td>{{ substr($career->slug, 0, 35) . '...' }}</td>
                            <td>{{ $career->user->name }}</td>
                            <td>{{ $career->created_at}}</td>
                            <td>
                              <div class="form-button-action">
                                <button
                                  type="button"
                                  title=""
                                  class="btn btn-link btn-primary btn-lg"
                                  data-original-title="Edit Task"
                                  data-bs-toggle="modal"
                                  data-bs-target={{ "#updateRowModal" . $career->id }}
                                >
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-danger"
                                  data-original-title="Remove"
                                  onclick="initDemos({{ $career->id }})"
                                >
                                  <i class="fa fa-times"></i>
                              </button>
                              </div>
                            </td>
                          </tr>
                          
                          <!-- Update Modal -->
                          <div
                            class="modal fade"
                            id={{ "updateRowModal" . $career->id }}
                            tabindex="-1"
                            role="dialog"
                            aria-hidden="true"
                          >
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header border-0">
                                  <h5 class="modal-title">
                                    <span class="fw-mediumbold"> Update</span>
                                    <span class="fw-light"> Career </span>
                                  </h5>
                                  <button
                                    type="button"
                                    class="close"
                                    data-bs-toggle="modal"
                                    data-bs-target={{ "#updateRowModal" . $career->id }}
                                    aria-label="Close"
                                  >
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p class="small">
                                    Update career information using this form, make sure you
                                    fill them all
                                  </p>
                                  <form method="POST" action="{{ route('career.update', $career->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                          <label>title</label>
                                          <input
                                            id="addName"
                                            type="text"
                                            class="form-control"
                                            placeholder="fill title"
                                            name="title"
                                            value="{{ old('title', $career->title) }}"
                                            required
                                          />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                      <button
                                        type="submit"
                                        id={{ "updateRowButton" . $career->id }}
                                        class="btn btn-primary"
                                      >
                                        Update
                                      </button>
                                      <button
                                        type="button"
                                        class="btn btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target={{ "#updateRowModal" . $career->id }}
                                      >
                                        Close
                                      </button>
                                    </div>
                                  </form>
                                </div>

                              </div>
                            </div>
                          </div>
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
                    url: "/admin/career/" + id,
                    method: "DELETE",
                    headers: {
                       "X-CSRF-TOKEN": csrfToken
                    }
                });
                swal("career has been deleted", {
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