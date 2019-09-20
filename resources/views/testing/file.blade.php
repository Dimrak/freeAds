<form action="{{ route('advert.store2') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Book title:
    <br />
<!--    <input type="text" name="title" />-->
    <br /><br />
    Logo:
    <br />
    <input type="file" name="logo" />
    <br /><br />
    <input type="submit" value=" Save " />
</form>
