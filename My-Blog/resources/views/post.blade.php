
<x-layout>

    <article>

        <h1>
            {{  $post->title }}
        </h1>

        <p>
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>

        <div>
            <p>

                {!!  $post->body !!}
            </p>
        </div>
        <br>
        <a href="/"> Go Back </a>
    </article>

</x-layout>


