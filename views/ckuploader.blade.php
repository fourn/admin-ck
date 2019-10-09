<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <input id="ckfinder-input-{{$id}}" type="hidden" name="{{$name}}" value="{{ old($column, $value) }}" {!! $attributes !!}/>
        <button id="ckfinder-popup-{{$id}}" type="button" class="btn btn-primary">选择</button>
        <img id="ckfinder-image-{{$id}}" src="{{$value}}" class="img-thumbnail" style="display:block;min-width: 150px;height: 150px; margin-top:10px;">

        @include('admin::form.help-block')

    </div>
</div>
