<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Registration</h1>

                <form method="POST" action="/register" class="mt-10">
                    @csrf

                    <x-form.input name="name" required/>
                    <x-form.input name="username" required/>
                    <x-form.input name="email" type="email" autocomplete="username" required/>
                    <x-form.input name="password" type="password" autocomplete="new-password" required/>

                    <x-form.button>Register</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
