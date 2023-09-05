
<x-layout>

    <article>

        <h1>
            {{  $post->title }}
        </h1>

        <div>
            {!!  $post->body !!}
        </div>
        <br>
        <a href="/"> Go Back </a>
    </article>

</x-layout>


