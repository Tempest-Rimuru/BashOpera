<div>
    @if (session('success'))
        <script>
            alert('{{ session('success') }}')
        </script>
    @endif

    <section class="head">
        <div class="container">
            <div class="head__background">
                <h1 class="head__background-title">
                    Башкирский государственный
                    театр оперы и балета
                </h1>
            </div>
            <div class="head__content">
                <div class="head__content-item">
                    <div class="head__content-title">Дата основания</div>
                    <div class="head__content-text">1938 г.</div>
                </div>
                <div class="head__content-item">
                    <div class="head__content-title">Репертуар</div>
                    <div class="head__content-text">72 произведения</div>
                </div>
                <div class="head__content-item">
                    <div class="head__content-title">Абсолютно для всех</div>
                    <div class="head__content-text">0+</div>
                </div>
                <a href="{{ route('modal-theater') }}" class="head__content-link">Узнать подробнее</a>
            </div>
        </div>
    </section>

    <section class="premieres">
        <div class="container">
            <div class="premiers__title">
                <h2 class="title">Ближайшие премьеры</h2>
                <a href="{{ route('events') }}" class="premiers__title-link">Показать все</a>
            </div>
            <div class="premieres__cards">
                @foreach ($events as $event)
                    <div class="premieres__card">
                        <div class="premieres__card-info">
                            <div class="premieres__card-date">{{ $event->show_date }}</div>
                            <div class="premieres__card-age">{{ $event->id_age_restriction }}</div>
                        </div>
                        <div class="premieres__card-content">
                            <div class="premieres__card-name">{{ $event->title }}</div>
                            <div class="premieres__card-description">{{ $event->subtitle }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="about__theater">
        <a href="{{ route('modal-theater', ['activeLink' => 'conduct-rules']) }}" class="about__theater-item">Правила
            поведения</a>
        <a href="{{ route('modal-theater', ['activeLink' => 'hall-layout']) }}" class="about__theater-item">Схема
            зала</a>
        <a href="{{ route('modal-theater', ['activeLink' => 'theater-history']) }}" class="about__theater-item">История
            театра</a>
        <a href="{{ route('modal-theater', ['activeLink' => 'theater-team']) }}" class="about__theater-item">Коллектив
            театра</a>
    </section>

    <section class="news">
        <div class="container">
            <div class="news__title">
                <h2 class="title">Новости театра </h2>
                <a href="{{ route('posts') }}" class="news__title-link">Показать все</a>
            </div>
            <div class="news__cards">
                @foreach ($posts as $post)
                    <div class="news__card">
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
                <div class="news__card">
                    <div class="news__card-img">
                        <img src="{{ asset('images/news__card-img.jpg') }}" alt="news card img">
                    </div>
                    <div class="news__card-info">
                        <div class="news__card-title">Академия вокального искусства Аскара Абдразакова</div>
                        <div class="news__card-date">09.12.2022</div>
                    </div>
                    <div class="news__card-content">
                        Завершилась первая сессия проекта «Академия вокального искусства Аскара Абдразакова». Слушателей
                        ждали четыре насыщенных знаниями и эмоциями дня.
                    </div>
                </div>

                <div class="news__card">
                    <div class="news__card-img">
                        <img src="{{ asset('images/news__card-img.jpg') }}" alt="news card img">
                    </div>
                    <div class="news__card-info">
                        <div class="news__card-title">Академия вокального искусства Аскара Абдразакова</div>
                        <div class="news__card-date">09.12.2022</div>
                    </div>
                    <div class="news__card-content">
                        Завершилась первая сессия проекта «Академия вокального искусства Аскара Абдразакова». Слушателей
                        ждали четыре насыщенных знаниями и эмоциями дня.
                    </div>
                </div>

                <div class="news__card">
                    <div class="news__card-img">
                        <img src="{{ asset('images/news__card-img.jpg') }}" alt="news card img">
                    </div>
                    <div class="news__card-info">
                        <div class="news__card-title">Академия вокального искусства Аскара Абдразакова</div>
                        <div class="news__card-date">09.12.2022</div>
                    </div>
                    <div class="news__card-content">
                        Завершилась первая сессия проекта «Академия вокального искусства Аскара Абдразакова». Слушателей
                        ждали четыре насыщенных знаниями и эмоциями дня.
                    </div>
                </div>

                <div class="news__card">
                    <div class="news__card-img">
                        <img src="{{ asset('images/news__card-img.jpg') }}" alt="news card img">
                    </div>
                    <div class="news__card-info">
                        <div class="news__card-title">Академия вокального искусства Аскара Абдразакова</div>
                        <div class="news__card-date">09.12.2022</div>
                    </div>
                    <div class="news__card-content">
                        Завершилась первая сессия проекта «Академия вокального искусства Аскара Абдразакова». Слушателей
                        ждали четыре насыщенных знаниями и эмоциями дня.
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
