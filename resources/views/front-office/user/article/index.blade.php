@extends('front-office.index', [
    'title' => 'Articles'
])
@section('content')
      <section id="blog" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">Blog</h6>
            <h2 class="mb-6">@lang('home.blog.title')</h2>
            <p>
              @lang('home.blog.description')
            </p>
          </div>

          <div class="row">
            @foreach ($posts as $post)
              <div class="scroll-revealed col-12 sm:col-12 lg:col-4">
                <article class="group">
                  <div class="relative">
                    <a
                      href="{{ route('article.show', [$post->id, $post->slug]) }}"
                      class="w-full aspect-[3/2] rounded-xl overflow-hidden block"
                    >
                      <img
                        src="{{ url($post->image) }}"
                        alt="{{ $post->title }}"
                        class="w-full h-full object-cover group-hover:scale-[1.05] group-hover:rotate-[2deg]"
                      />
                    </a>
                  </div>
                  <span
                    class="block mt-6 w-full text-sm text-body-light-10 dark:text-body-dark-10"
                    >{{$post->user->name . ' - ' . $post->created_at}}</span
                  >
                  <h4 class="mb-6 mt-3 font-semibold text-[1.5rem]">
                    <a
                      href="{{ route('article.show', [$post->id, $post->slug]) }}"
                      class="text-body-light-12 dark:text-body-dark-12"
                      >{{ substr($post->title, 0, 50) . '...' }}</a
                    >
                  </h4>
                  <p>
                    {!! substr($post->content, 0, 250) . '...' !!}
                  </p>
                </article>
              </div>
            @endforeach
          </div>
        </div>
      </section>
@endsection