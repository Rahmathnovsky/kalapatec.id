@extends('front-office.index', [
    'title' => $post->title
])

@section('content')
      <section id="blog" class="section-area">
        <div class="container">
          <div class="row">
              <div class="scroll-revealed col-7 sm:col-12">
                <article class="group">
                    <h3 class="mb-6 mt-3 font-semibold text-[1.5rem]">
                        <a
                        href="{{ route('article.show', [$post->id, $post->slug]) }}"
                        class="text-body-light-12 dark:text-body-dark-12"
                        >{{ $post->title }}</a
                        >
                    </h3>
                    <span
                    class="block mt-6 mb-2 w-full text-sm text-body-light-10 dark:text-body-dark-10"
                    >{!! $post->created_at . ' <br> ' . $post->user->name !!}</span
                    >
                    <div class="relative" style="margin-bottom: 5%">
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
                  <div class="post-content">
                    {!! $post->content !!}
                  </div>
                </article>
                <br>
                <hr>
                <br>
                  <div class="font-bold">
                    @foreach (json_decode($post->tags) as $tag)
                      # {{$tag}}
                    @endforeach
                  </div>
                </div>
              </div>
          </div>
        </div>
      </section>
@endsection