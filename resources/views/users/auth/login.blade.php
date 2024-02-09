@extends('layouts.user.app')

@section('title', __('messages.user.login.title'))

@section('content')
<div class="pt-4 pb-2">
  <h5 class="card-title text-center pb-0 fs-4">{{__('messages.user.login.note')}}</h5>
  <p class="text-center small">{{__('messages.user.login.sub_note')}}</p>
</div>

<form id="loginForm" method="POST" action="{{route('user.login')}}" class="row g-3 needs-validation" novalidate>
  @csrf
  {{--<input type="hidden" name="timezone" id="timezone">--}}
  <div class="col-12">
    <label for="email" class="form-label">{{__('messages.user.login.email')}} *</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" id="email" name="email" class="form-control" placeholder="{{__('messages.user.login.email_placeholder')}}" value="{{old('email')}}" required>
      <div class="invalid-feedback">{{__('messages.user.login.email_invalid_feedback')}}</div>
    </div>
  </div>

  <div class="col-12">
    <label for="password" class="form-label">{{__('messages.user.login.password')}} *</label>
    <input type="password" id="password" name="password" class="form-control password" placeholder="{{__('messages.user.login.password_placeholder')}}" required>
    <div class="invalid-feedback">{{__('messages.user.login.password_invalid_feedback')}}</div>
  </div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="remember_me" value="true" id="rememberMe">
      <label class="form-check-label" for="rememberMe">{{__('messages.user.login.remember_me')}}</label>
    </div>
  </div>
  <div class="col-12">
    <button id="loginBtn" class="btn btn-primary w-100" type="submit">
      {{__('messages.user.login.submit_btn')}}
    </button>
  </div>
  <div class="col-12">
    <p class="small mb-0">{{__('messages.user.login.register_note')}} 
      <a href="{{route('user.registerForm')}}">
        {{__('messages.user.login.register_btn')}}
      </a>
    </p>
  </div>
</form>
@endsection

@section('script')
  <script type="text/javascript">
    $("#loginForm").on("submit", function() {
      if($("#email").val() && $("#password").val().length >= 8) {
        $("#loginBtn").attr("disabled", true);
        $("#loginBtn").text("{{__('messages.user.login.submit_btn_loading_text')}}");
      }
    });
  </script>
  {{--
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.7/jstz.min.js'></script>
    <script type="text/javascript">
      var tz = jstz.determine();
      var timezone = tz.name();
      $("#timezone").val(timezone);
    </script>
  --}}
@endsection