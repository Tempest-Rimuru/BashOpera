<div>
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif
    <section class="admin-poster">
        <div class="container">
            <h2 class="admin-poster__title">Управление Афишей</h2>
            <div class="admin-poster__items">
                <ul class="admin-poster__list">
                    <div class="admin-poster__list-title">Управление Афишей</div>
                    @foreach ($events as $event)
                        <li class="admin-poster__list-item" wire:click="editEvent({{ $event->id }})">
                            {{ $event->title }}
                        </li>
                    @endforeach
                </ul>
                <form wire:submit.prevent="createNew" class="admin-poster__form">
                    @csrf
                    <div class="admin-poster__form-title">Создание мероприятия<span>/</span>Редактирование мероприятия
                    </div>

                    <div class="admin-poster__form-item">
                        <label for="title">Заголовок:</label>
                        <input type="text" wire:model="title" id="title">
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-poster__form-item">
                        <label for="subtitle">Подзаголовок:</label>
                        <input type="text" wire:model="subtitle" id="subtitle">
                        @error('subtitle')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-poster__form-item">
                        <label for="id_age_restriction">Ограничение:</label>
                        <select wire:model="id_age_restriction" id="id_age_restriction">
                            <option value="" selected disabled></option>
                            @foreach ($age_restrictions as $age_restriction)
                                <option value="{{ $age_restriction->id }}">{{ $age_restriction->tvalue }}</option>
                            @endforeach
                        </select>
                        @error('id_age_restriction')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-poster__form-item">
                        <label for="duration">Длительность:</label>
                        <input type="time" wire:model="duration" id="duration">
                        @error('duration')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-poster__form-item">
                        <label for="show_date">Дата/время показа:</label>
                        <input type="datetime-local" wire:model="show_date" id="show_date">
                        @error('show_date')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-poster__form-item">
                        <label for="description">Описание:</label>
                        <textarea wire:model="description" id="description"></textarea>
                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-poster__form-item">
                        <label for="team">Коллектив:</label>
                        <textarea wire:model="team" id="team"></textarea>
                        @error('team')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-poster__form-item">
                        <label for="image">Изображение:</label>
                        <input type="text" wire:model="image" id="image">
                        @error('image')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-poster__form-btsn">
                        <button class="admin-poster__form-add">Добавить</button>
                        <button class="admin-poster__form-delete" wire:click.prevent="deleteEvent">Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
