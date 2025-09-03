@extends('front-office.admin.index', [
    'title' => 'Update Career'
])

@section('content')
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Career</h3>
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
                  <a href="{{ route('career.index') }}">Career</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="{{ route('career.create') }}">Update</a>
                </li>
              </ul>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Update Career</div>
                  </div>
                  <form action="{{ route('career.update', $career->id) }}" method="career" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 col-lg-12">
                          <div class="form-group">
                            <label for="title" class="fw-bold"><h5 class="mb-1">Title</h5></label>
                            <input
                              type="text"
                              class="form-control"
                              id="title"
                              name="title"
                              placeholder="Fill Career title here..."
                              value="{{ $career->title }}"
                            />
                          </div>
  
                          <div class="form-group">
                            <label for="category" class="fw-bold"><h5 class="mb-1">Select Category</h5></label>
                            <select
                              class="form-select form-control"
                              id="category"
                              name="category_id"
                            >
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}"
                                  {{ old('category_id', $career->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                  {{ $category->name }}
                                  </option>
                              @endforeach
                            </select>
                          </div>
                          
                          <div class="form-group">
                            <label for="myeditorinstance" class="fw-bold"><h5 class="mb-1">Content</h5></label>
                            <x-forms.tinymce-editor value="{{ $career->content }}"/>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="card-action">
                      <button type="submit" class="btn btn-success">Submit</button>
                      <a href="{{ route('career.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection
@push('js')
    <script src="{{ asset('assets/favicon/android-chrome-144x144.png') }}"></script>
@endpush