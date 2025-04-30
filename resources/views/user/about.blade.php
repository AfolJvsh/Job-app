<x-layout>
    <x-form.form method="post" action="/about">
        @csrf
        @method('PATCH')
        <x-form.textarea rows="20" name='about' label="About">{{ $user->about}}</x-form.textarea>
        <x-form.button>Save</x-form.button>
    </x-form.form>
    
</x-layout>