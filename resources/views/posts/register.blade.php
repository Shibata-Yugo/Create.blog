<div class="form-group row">
  <label for="phone" class="col-md-4 col-form-label text-md-right">電話番号</label>
  <div class="col-md-6">
    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
    @if ($errors->has('phone'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('phone') }}</strong>
      </span>
    @endif
  </div>
</div>
<div class="form-group row">
  <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>
  <div class="col-md-6">
    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
    @if ($errors->has('address'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('address') }}</strong>
      </span>
    @endif
  </div>
</div>
