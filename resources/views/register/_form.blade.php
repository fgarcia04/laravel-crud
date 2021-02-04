<div class="form-group row">
    <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>
    <div class="col-md-6">
        <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user', $user->user) }}" required autocomplete="user" autofocus>
        @error('user')
        <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
    <div class="col-md-6">
        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile', $user->mobile) }}" required autocomplete="mobile" autofocus>
        @error('mobile')
        <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>
