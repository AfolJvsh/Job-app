<x-layout>
<x-page-heading>
      Login
    </x-page:heading>

  <x-form.form method="POST" action="/login">
    <x-form.input label="Email" name="email" type="email"/>
   <x-form.password label="Password" name="password"/>
    <x-form.button>Sign in</x-form.button>
  </x-form.form>
 
</x-layout>
