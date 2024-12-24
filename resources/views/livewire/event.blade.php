<div>
    <section class="event">
        <div class="container">
            <div class="event__img"></div>


            <div class="event__main" style="display: {{ $activeLink === 'buy' ? 'none' : 'flex' }}">
                <div class="event__main-title">
                    <h2 class="title">{{ $event->title }}</h2>
                    <h3 class="subtitle">{{ $event->subtitle }}</h3>
                </div>
                <div class="event__main-items">
                    <div class="event__main-item">
                        <div class="event__main-item-name">Длительность</div>
                        <div class="event__main-item-text">{{ $event->duration }}</div>
                    </div>
                    <div class="event__main-item">
                        <div class="event__main-item-name">Ограничение</div>
                        <div class="event__main-item-text">{{ $ageRestriction->tvalue }}</div>
                    </div>
                </div>
                <button class="event__main-btn" wire:click.prevent="setActiveLink('buy')">Купить билет</button>
            </div>

            <div class="event__content" style="display: {{ $activeLink === 'buy' ? 'none' : 'block' }}">
                <div class="event__content-items">
                    <a href="#" class="event__content-link" wire:click.prevent="setActiveLink('event-about')">О
                        спектакле</a>
                    <a href="#" class="event__content-link"
                        wire:click.prevent="setActiveLink('event-team')">Коллектив</a>

                    <div
                        class="event__content-line {{ $activeLink === 'event-about' ? 'event__content-line--active' : '' }}">
                    </div>
                    <div
                        class="event__content-line {{ $activeLink === 'event-team' ? 'event__content-line--active' : '' }}">
                    </div>
                </div>
                <div class="event__content-text"
                    style="display: {{ $activeLink === 'event-about' ? 'block' : 'none' }}">
                    {{ $event->description }}</div>
                <ul class="event__content-team" style="display: {{ $activeLink === 'event-team' ? 'block' : 'none' }}">
                    @foreach ($team as $member)
                        <li class="event__content-team-item">{{ $member }}</li>
                    @endforeach

                    @if ($conductor)
                        <li class="event__content-team-conductor">Дирижёр - {{ $conductor }}</li>
                    @endif
                </ul>
            </div>



            <div class="event__ticket-main" style="display: {{ $activeLink === 'buy' ? 'flex' : 'none' }}">
                <h2 class="event__ticket-main-title">Покупка билета</h2>
                <div class="event__ticket-main-price">600 рублей</div>

            </div>
            <div class="event__ticket-content" style="display: {{ $activeLink === 'buy' ? 'flex' : 'none' }}">
                <form action="" class="event__ticket-content-form">
                    <div class="event__ticket-content-form-title">Выберите дату показа премьеры</div>
                    <input class="event__ticket-content-form-date" type="datetime-local">
                    <p class="event__ticket-content-form-warning">
                        Внимание! Выбранные вами билеты должны быть оплачены банковской картой в течение 30 минут.
                        Обязательно распечатайте приобретенный вами электронный билет. Его необходимо предъявить при
                        входе в театр.
                    </p>
                    <div class="event__ticket-content-form__btns">
                        <button class="event__ticket-content-form__btns-confirm" wire:click.prevent="showModal">Оплатить
                            билет</button>
                        <button class="event__ticket-content-form__btns-cancel"
                            wire:click.prevent="setActiveLink('event-about')">Отменить</button>
                    </div>
                </form>
                <div class="event__ticket-content-scheme">
                    <div class="event__ticket-content-scheme-title">Схема зала</div>
                    <ul class="event__ticket-content-scheme-places">
                        <li class="event__ticket-content-scheme-row">
                            <span class="event__ticket-content-scheme-row-number">1</span>
                            @for ($i = 0; $i < 10; $i++)
                                <div class="event__ticket-content-scheme-row-cell {{ $cell === $i && $row === 1 ? 'event__ticket-content-scheme-row-cell--active' : '' }}"
                                    wire:click="getCell(1, {{ $i }})"></div>
                            @endfor
                        </li>
                        <li class="event__ticket-content-scheme-row">
                            <span class="event__ticket-content-scheme-row-number">2</span>
                            @for ($i = 0; $i < 12; $i++)
                                <div class="event__ticket-content-scheme-row-cell {{ $cell === $i && $row === 2 ? 'event__ticket-content-scheme-row-cell--active' : '' }}"
                                    wire:click="getCell(2, {{ $i }})"></div>
                            @endfor
                        </li>
                        <li class="event__ticket-content-scheme-row">
                            <span class="event__ticket-content-scheme-row-number">3</span>
                            @for ($i = 0; $i < 14; $i++)
                                <div class="event__ticket-content-scheme-row-cell {{ $cell === $i && $row === 3 ? 'event__ticket-content-scheme-row-cell--active' : '' }}"
                                    wire:click="getCell(3, {{ $i }})"></div>
                            @endfor
                        </li>
                        <li class="event__ticket-content-scheme-row">
                            <span class="event__ticket-content-scheme-row-number">4</span>
                            @for ($i = 0; $i < 14; $i++)
                                <div class="event__ticket-content-scheme-row-cell {{ $cell === $i && $row === 4 ? 'event__ticket-content-scheme-row-cell--active' : '' }}"
                                    wire:click="getCell(4, {{ $i }})"></div>
                            @endfor
                        </li>
                        <li class="event__ticket-content-scheme-row">
                            <span class="event__ticket-content-scheme-row-number">5</span>
                            @for ($i = 0; $i < 14; $i++)
                                <div class="event__ticket-content-scheme-row-cell {{ $cell === $i && $row === 5 ? 'event__ticket-content-scheme-row-cell--active' : '' }}"
                                    wire:click="getCell(5, {{ $i }})"></div>
                            @endfor
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="event__overlay {{ $modal ? 'event__overlay--active' : '' }}">
            <div class="event__overlay-modal">
                <h2 class="event__overlay-modal-title">Оплата билета</h2>
                <div class="event__overlay-modal-name">Мероприятие:</div>
                <div class="event__overlay-modal-value">{{ $event->title }}</div>
                <div class="event__overlay-modal-name">Длительность:</div>
                <div class="event__overlay-modal-value">{{ $event->duration }}</div>
                <div class="event__overlay-modal-name">Ограничение:</div>
                <div class="event__overlay-modal-value">{{ $ageRestriction->tvalue }}</div>
                <div class="event__overlay-modal-name">Время</div>
                <div class="event__overlay-modal-value">
                    {{ \Carbon\Carbon::parse($event->show_date)->format('d F, H:i') }}</div>
                <div class="event__overlay-modal-name">Место:</div>
                <div class="event__overlay-modal-value">1 ряд, 5 место</div>
                <div class="event__overlay-modal-btns">
                    <button class="event__overlay-modal-btns-confirm">Оплатить билет</button>
                    <button class="event__overlay-modal-btns-close" wire:click="hideModal">Отменить</button>
                </div>
            </div>
        </div>
    </section>

</div>
