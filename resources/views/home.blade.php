<!DOCTYPE html>
<html>
<head>
    <title>Some title, i dont know yet</title>
</head>
<body>
    <form class="form-group" action="/">
        {{ csrf_field() }}
        <label>
            Title:
            <input type="text" name="title">
        </label>
        <br>
        <label>
            Image:
            <input type="file" name="image">
        </label>
         <br>
        <label>
            Edition:
            <input type="text" name="edition">
        </label>
         <br>
        <label>
            ISBN:
            <input type="text" name="isbn">
        </label>
         <br>
        <label>
            Sinopsis:
            <textarea name="sinopsis"></textarea>
        </label>
         <br>
        <label>
            Pages:
            <input type="number" name="pages">
        </label>
         <br>
        <label>
            Publisher:
            <select name="publisher">
            @foreach ($publishers as $publisher)
                <option value = "{{ $publisher->id }}">{{ $publisher->name }}</option>
            @endforeach
            </select>
        </label>
         <br>
        <label>
            Author:
            <select name="author">
            @foreach ($authors as $author)
                <option value = "{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
            </select>
        </label>
         <br>
        <label>
            Category:
            <select name="category">
            @foreach ($categorys as $category)
                <option value = "{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
        </label>
        <br>
        <button type="submit" name="save">Save</button>
    </form>
</body>
</html>