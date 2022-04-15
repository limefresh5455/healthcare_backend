

<form action="{{ url('submit-data') }}" method="post">
    @csrf
 <input type="text" name="given" >
 <input type="text" name="name" >
 <input type="submit" name="submit" value="submit">
</form>    