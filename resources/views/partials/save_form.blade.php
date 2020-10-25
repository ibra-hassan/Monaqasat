<div class="form-group d-flex justify-content-between">
    <button class="btn btn-danger" type="submit">
        {{ trans('global.save') }}
    </button>
    <a href="{{ route('admin.'.$slot.'s.index') }}" class="btn btn-default">
        {{ trans('global.cancel') }}
    </a>
</div>
