<div>
    <section class="premieres">
        <div class="container">
            <div class="events__title">
                <h2 class="title">Афиша</h2>
            </div>
            <div class="premieres__cards">
                @foreach ($events as $event)
                    <div class="events__card" wire:click="goToEvent({{ $event->id }})">
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

                <div class="events__cards-button">
                    <button class="events__cards-btn" wire:click="addEvents"
                        style="display:{{ $hideButton ? 'none' : 'block' }}">Смотреть
                        еще</button>
                </div>
            </div>
        </div>
    </section>
</div>
