<div>
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif
    <section class="admin-news">
        <div class="container">
            <h2 class="admin-news__title">Управление Новостями</h2>
            <div class="admin-news__items">
                <ul class="admin-news__list">
                    <div class="admin-news__list-title">Список новостей</div>
                    @foreach ($posts as $post)
                        <li class="admin-news__list-item" wire:click="editPost({{ $post->id }})">{{ $post->title }}
                        </li>
                    @endforeach
                </ul>
                <form wire:submit.prevent="createNew" class="admin-news__form">
                    @csrf
                    <div class="admin-news__form-title">Создание новости<span>/</span>Редактирование новости</div>
                    <div class="admin-news__form-item">
                        <label for="title">Заголовок:</label>
                        <input type="text" wire:model="title" id="title">
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-news__form-item">
                        <label for="description">Описание:</label>
                        <textarea wire:model="description" id="description"></textarea>
                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-news__form-item">
                        <label for="image">Изображение:</label>
                        <input type="text" wire:model="image" id="image">
                        @error('image')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-news__form-btsn">
                        <button type="submit" class="admin-news__form-add">Добавить</button>
                        <button type="button" class="admin-news__form-delete"
                            wire:click.prevent="deletePost">Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
