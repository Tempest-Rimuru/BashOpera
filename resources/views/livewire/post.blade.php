<div>
    <section class="post">
        <div class="container">
            <div class="post__img"></div>

            <div class="post__main">
                <button class="post__main-btn" onclick="location.href='{{ route('posts') }}'">Назад</button>
                <div class="post__main-date">{{ $post->created_at->format('d.m.Y') }}</div>
                <h2 class="post__main-title">{{ $post->title }}</h2>
            </div>
            <div class="post__content">{{ $post->description }}</div>
        </div>
    </section>
</div>
