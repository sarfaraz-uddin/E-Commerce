<form action="{{route('token')}}" method="post">
    @csrf
    <button type="submit">Submit</button>
</form>