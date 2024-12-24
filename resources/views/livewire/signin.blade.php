<div>
    <div>
        <section class="signin">
            <div class="container">
                <h2 class="title">Панель администратора</h2>
                <form class="signin__form" wire:submit.prevent="auth">
                    @csrf
                    <div class="signin__form-item">
                        <label for="login">Логин:</label>
                        <input type="text" wire:model="login" id="login">
                        @error('login')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="signin__form-item">
                        <label for="password">Пароль:</label>
                        <input type="password" wire:model="password" id="password">
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    @if (session()->has('error'))
                        <div class="error">{{ session('error') }}</div>
                    @endif

                    <div class="signin__form-btns">
                        <button type="submit" class="signin__form-login">Войти</button>
                        <a href="{{ route('index') }}" class="signin__form-close">Отмена</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
