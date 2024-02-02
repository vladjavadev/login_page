<x-layouts.app>
    <h1 class='text-4xl mb-5'>Register</h1>

    <form action="{{route('auth.register')}}" method="POST">
        @csrf

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <textarea name="description" cols="30" class="border text-lg rounded-lg px-5 py-1 w-full my-2"></textarea>        

    <button class="border bg-blue-500 text-white text-lg rounded-lg px-5 py-1 w-full my-2" type="submit">Load</button>
    </form>
</x-layouts.app>