<x-layout>
<x-page-heading>
      Register
    </x-page:heading>

  <x-form.form method="POST" action="/register" enctype="multipart/form-data">
    <x-form.input label="Name" name="name"/>
    <x-form.input label="Email" name="email" type="email"/>
    <x-form.password label="Password" name="password"/>
    <x-form.password label="Password Confirmation" name="password_confirmation" type="password"/>
   <x-form.button>Create Account</x-form.button>
  </x-form.form>
</x-layout>
