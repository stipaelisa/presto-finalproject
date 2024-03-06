<form class="d-inline" action="{{route('setLocale',$lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="22" height="22">
    </button>
</form>