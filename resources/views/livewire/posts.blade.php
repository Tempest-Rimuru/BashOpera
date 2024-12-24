<div>
    <section class="posts">
        <div class="container">
            <div class="news__title">
                <h2 class="title">Новости театра </h2>
            </div>
            <div class="news__cards">
                @foreach ($posts as $post)
                    <div class="news__card" wire:click="goToPost({{ $post->id }})">
                        <div class="news__card-img">
                            <img src="{{ asset('images/news__card-img.jpg') }}" alt="news card img">
                        </div>
                        <div class="news__card-info">
                            <div class="news__card-title">{{ $post->title }}</div>
                            <div class="news__card-date">{{ $post->created_at->format('d.m.Y') }}</div>
                        </div>
                        <div class="news__card-content">{{ $post->description }}</div>
                    </div>
                @endforeach
            </div>
            <button class="news__cards-more-btn" wire:click="addPosts"
                style="display:{{ $hideButton ? 'none' : 'block' }}">Смотреть еще</button>
        </div>
    </section>
</div>
