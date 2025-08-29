@extends('front-office.admin.index', [
  'title' => 'User Management'
])
@section('content')
          <div class="page-inner">
            <div class="page-header">
              {{-- <h3 class="fw-bold mb-3">DataTables.Net</h3> --}}
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
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
                  <a href="#">User</a>
                </li>
              </ul>
            </div>
            <div class="row">

              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">User Management</h4>
                      <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Add New User
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
                              <span class="fw-light"> User </span>
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
                              Create a new user using this form, make sure you
                              fill them all
                            </p>
                            <form method="POST" action="{{ route('user-management.store') }}">
                              @csrf
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input
                                      id="addName"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill name"
                                      name="name"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6 pe-0">
                                  <div class="form-group form-group-default">
                                    <label>Email</label>
                                    <input
                                      id="addEmail"
                                      type="email"
                                      class="form-control"
                                      placeholder="fill email"
                                      name="email"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>Password</label>
                                    <input
                                      id="addPassword"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill password"
                                      name="password"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-">
                                  <div class="form-group form-group-default">
                                    <label>Select</label>
                                    <select class="form-select" id="addRole" name="role">
                                      @foreach ($roles as $role)
                                        <option value="{{$role}}">{{$role}}</option>
                                      @endforeach
                                    </select>
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
                            <th>Name</th> {{-- Name --}}
                            <th>Email</th> {{-- Position --}}
                            <th>Verified</th> {{-- Privilege --}}
                            <th>Role</th> {{-- Privilege --}}
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Name</th> {{-- Name --}}
                            <th>Email</th> {{-- Position --}}
                            <th>Verified</th> {{-- Privilege --}}
                            <th>Role</th> {{-- Privilege --}}
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email_verified_at ? $user->email_verified_at : 'Not Verified' }}</td>
                            <td class="fw-bold {{ $user->role == 'administrator' ? 'text-danger' :
                                         ($user->role == 'dm' ? 'text-primary' : 'text-success') }}" >
                                         {{ $user->role }}
                            </td>
                            <td>
                              <div class="form-button-action">
                                <button
                                  type="button"
                                  title=""
                                  class="btn btn-link btn-primary btn-lg"
                                  data-original-title="Edit Task"
                                  data-bs-toggle="modal"
                                  data-bs-target={{ "#updateRowModal" . $user->id }}
                                >
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-danger"
                                  data-original-title="Remove"
                                  onclick="initDemos({{ $user->id }})"
                                >
                                  <i class="fa fa-times"></i>
                              </button>
                              </div>
                            </td>
                          </tr>
                          
                          <!-- Update Modal -->
                          <div
                            class="modal fade"
                            id={{ "updateRowModal" . $user->id }}
                            tabindex="-1"
                            role="dialog"
                            aria-hidden="true"
                          >
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header border-0">
                                  <h5 class="modal-title">
                                    <span class="fw-mediumbold"> Update</span>
                                    <span class="fw-light"> User </span>
                                  </h5>
                                  <button
                                    type="button"
                                    class="close"
                                    data-bs-toggle="modal"
                                    data-bs-target={{ "#updateRowModal" . $user->id }}
                                    aria-label="Close"
                                  >
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p class="small">
                                    Update user information using this form, make sure you
                                    fill them all
                                  </p>
                                  <form method="POST" action="{{ route('user-management.update', $user->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                          <label>Name</label>
                                          <input
                                            id="addName"
                                            type="text"
                                            class="form-control"
                                            placeholder="fill name"
                                            name="name"
                                            value="{{ old('name', $user->name) }}"
                                            required
                                          />
                                        </div>
                                      </div>
                                      <div class="col-md-6 pe-0">
                                        <div class="form-group form-group-default">
                                          <label>Email</label>
                                          <input
                                            id="addEmail"
                                            type="email"
                                            class="form-control"
                                            placeholder="fill email"
                                            name="email"
                                            value="{{ old('email', $user->email) }}"
                                            required
                                          />
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                          <label>New Password</label>
                                          <input
                                            id="addPassword"
                                            type="text"
                                            class="form-control"
                                            placeholder="fill password"
                                            name="password"
                                          />
                                        </div>
                                      </div>
                                      <div class="col-md-">
                                        <div class="form-group form-group-default">
                                          <label>Select</label>
                                          <select class="form-select" id="addRole" name="role">
                                            @foreach ($roles as $role)
                                              <option value="{{ $role }}"
                                                {{ old('role', $user->role ?? '') == $role ? 'selected' : '' }}>
                                                {{ $role }}
                                              </option>
                                            @endforeach
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                      <button
                                        type="submit"
                                        id={{ "updateRowButton" . $user->id }}
                                        class="btn btn-primary"
                                      >
                                        Update
                                      </button>
                                      <button
                                        type="button"
                                        class="btn btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target={{ "#updateRowModal" . $user->id }}
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
          <script>
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

              $("#addRowButton").click(function () {
                $("#add-row")
                  .dataTable()
                  .fnAddData([
                    $("#addName").val(),
                    $("#addEmail").val(),
                    $("#addPassword").val(),
                    $("#addRole").val(),
                    action,
                  ]);
                $("#addRowModal").modal("hide");
              });
            });
            
              var initDemos = function (id) {
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
                          url: "/admin/user-management/" + id,
                          method: "GET",
                          success:function(){
                            $('#add-row').DataTable().ajax.reload();
                          }
                      });
                      swal("User has been deleted", {
                        icon: "success",
                        buttons: {
                          confirm: {
                            className: "btn btn-success",
                          },
                        },
                      });
                    }
                  });
              };
          </script>
@endpush