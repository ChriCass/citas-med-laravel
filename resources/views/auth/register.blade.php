 @extends('layouts.guest')

 @section('content')
     <x-authentication-card>
         <x-slot name="logo">
             <x-authentication-card-logo />
         </x-slot>
         <x-slot name="content">
             <form method="POST">
                 @csrf
                 <x-input teal label="Name" name="name" />
                 <x-input teal label="Email" name="email" type="email" />
                 <x-input teal label="Password" name="password" type="password" />
                 <x-input teal label="Confirm Password" name="password_confirmation" type="password" />
                 <x-button teal label="Register" class="mt-4" />
             </form>
         </x-slot>
     </x-authentication-card>
 @endsection
