<form action='{{URL::route('auth.register.submit')}}'>
    <div>
        <input name='name' type='text'>
    </div>
    <div>
        <input name='email' type='text'>
    </div>
    <div>
        <input name='confirm_email' type='text'>
    </div>
    <div>
        <input name='password' type='password'>
    </div>
</form>