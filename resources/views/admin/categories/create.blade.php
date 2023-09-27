<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h1>Form dang nhap</h1>
    <p>

        <label for="category_name">Create Name:</label><br>
        <input id="category_name" name="category_name" type="text" value=""><br>
        @error('category_name')
        <div style="color: blue">{{ $message }}</div>
            
        @enderror
    </p>

    <p>
        </p>
        <label for="description">Description:</label><br>
        <input id="description" name="description" type="text" value=""><br>
        


    <input type="submit" name="submit" value="Add" />
</form>