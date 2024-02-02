<x-layouts.app>
    <h1 class='text-4xl mb-5'>Register</h1>

    <form action="{{route('auth.register')}}" method="POST">
        @csrf

        <label for="">
        <input required class="border text-lg rounded-lg px-5 py-1 w-full my-2" type="text" name="username" placeholder="Username">
    </label>
    <label for="">
        <input required class="border text-lg rounded-lg px-5 py-1 w-full my-2" type="password" name="password" placeholder="Password">
        <input required class="border text-lg rounded-lg px-5 py-1 w-full my-2" type="password" name="password_confirmation" placeholder="Repeat Password">
    </label>
    <button class="border bg-blue-500 text-white text-lg rounded-lg px-5 py-1 w-full my-2" type="submit">Register</button>
    </form>
</x-layouts.app>