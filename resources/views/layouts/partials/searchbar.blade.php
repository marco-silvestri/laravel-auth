<form class="form-inline my-2 my-lg-0" action=" 
@guest
    {{route('search') }}
    @else
    {{route('admin.search') }}
@endguest
" method="POST"> 
            @csrf
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="keys">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>