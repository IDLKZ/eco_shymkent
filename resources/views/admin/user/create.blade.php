<x-app-layout>
    <div class="container mx-auto py-5">
        <h1 class="mb-4 rounded-lg bg-secondary-100 px-6 py-5 text-base text-secondary-800">Создать новую образовательную программу</h1>
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="relative mb-4" data-te-input-wrapper-init>
                <select name="role_id" class="w-full" data-te-select-init>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->title_ru}}</option>
                    @endforeach
                </select>
            </div>

            <div class="relative mb-4">
                <input
                    type="text"
                    class="@error('name') border-red-600 @enderror peer block min-h-[auto] w-full rounded border-1"
                    name="name"
                    value="{{old('name')}}"
                    placeholder="Имя" />
                @error('name')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative mb-4">
                <input
                    type="email"
                    class="@error('email') border-red-600 @enderror peer block min-h-[auto] w-full rounded border-1"
                    name="email"
                    value="{{old('email')}}"
                    placeholder="Email" />
                @error('email')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative mb-4">
                <input
                    type="password"
                    class="@error('password') border-red-600 @enderror peer block min-h-[auto] w-full rounded border-1"
                    name="password"
                    placeholder="Введите пароль" />
                @error('password')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <button
                type="submit"
                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                Сохранить
            </button>
        </form>

    </div>
</x-app-layout>
