@extends('front-office.admin.index', [
    'title' => 'Update Article'
])

@section('content')
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Article</h3>
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
                  <a href="{{ route('post.index') }}">Article</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="{{ route('post.edit', $post->id) }}">Update</a>
                </li>
              </ul>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Update Article</div>
                  </div>
                  <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 col-lg-12">
                          <div class="form-group {{ $errors->has('title') ? 'has-error has-feedback' : ''}}">
                            <label for="title" class="fw-bold"><h5 class="mb-1">Title</h5></label>
                            <input
                              type="text"
                              class="form-control"
                              id="title"
                              name="title"
                              placeholder="Fill article title here..."
                              value="{{ $post->title }}"
                            />
                              @error('title')
                                <small class="text-danger">* {{ $message }}</small>
                              @enderror
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
                                  {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                  {{ $category->name }}
                                  </option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="hashtags" class="fw-bold"><h5 class="mb-1">Hashtags</h5></label>
                            <input
                              type="text"
                              id="hashtag-input"
                              class="form-control"
                              placeholder="Type hashtag and then press enter or ','"
                            />
                            <small class="text-muted">Press <kbd>Enter</kbd> or <kbd>,</kbd> to add hashtag</small>
                            <div id="hashtags-list" class="d-flex flex-wrap gap-1 mt-2">
                            </div>
                            <input type="hidden" name="hashtags" id="hashtags-hidden" />
                          </div>
                          
                          <div class="form-group {{ $errors->has('content') ? 'has-error has-feedback' : ''}}">
                            <label for="myeditorinstance" class="fw-bold"><h5 class="mb-1">Content</h5></label>
                            <x-forms.tinymce-editor value="{{ $post->content }}"/>
                            @error('content')
                              <small class="text-danger">* {{ $message }}</small>
                            @enderror
                          </div>
  
                          <div class="form-group {{ $errors->has('image') ? 'has-error has-feedback' : ''}}">
                            <label for="image" class="fw-bold"><h5 class="mb-1">Cover</h5></label>
                            <div class="input-group">
                              <input
                                type="file"
                                class="form-control"
                                name="image"
                                id="image"
                                capture='user' 
                                accept='image/*'
                                onchange="document.getElementById('myImg').src = window.URL.createObjectURL(this.files[0])"
                              />
                            </div>
                            <div class="mt-3">
                              @error('image')
                                <small class="text-danger">* {{ $message }} <br></small>
                              @enderror
                              <label for="myImg" class="text-muted small">*Current cover image</label>
                              <p><img src="{{ url($post->image) }}" width="300" height="170" id="myImg" alt="{{ $post->title }}"></p> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-action">
                      <button type="submit" class="btn btn-success">Submit</button>
                      <a href="{{ route('post.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection
@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.getElementById('hashtag-input');
        const list = document.getElementById('hashtags-list');
        const hiddenInput = document.getElementById('hashtags-hidden');

        let hashtags = JSON.parse(@json($post->tags ?? '[]'));
        console.log(hashtags);

        function renderHashtags() {
            list.innerHTML = '';
            hashtags.forEach((tag, index) => {
                const tagElement = document.createElement('div');
                tagElement.className = 'd-inline-flex align-items-center bg-light border rounded px-2 py-1';
                tagElement.style.marginRight = '4px';
                tagElement.innerHTML = `
                    <span>#${tag}</span>
                    <button type="button" class="btn btn-link btn-sm text-danger p-0 ms-1" onclick="removeHashtag(${index})">&times;</button>
                `;
                list.appendChild(tagElement);
            });
            hiddenInput.value = hashtags.join(',');
            console.log(hiddenInput.value);
        }

        window.removeHashtag = function (index) {
            hashtags.splice(index, 1);
            renderHashtags();
        }

        input.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ',') {
                e.preventDefault();
                const value = input.value.trim().replace(/,/g, '');
                if (value && !hashtags.includes(value)) {
                    hashtags.push(value);
                    renderHashtags();
                }
                input.value = '';
            }
        });
        renderHashtags();
    });
</script>

    <script src="{{ asset('assets/favicon/android-chrome-144x144.png') }}"></script>
@endpush