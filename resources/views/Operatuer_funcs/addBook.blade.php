{{-- <form action="{{ route('addBook') }}" method="POST" enctype="multipart/form-data">
@csrf
    <label for="name">name</label>
    <input type="text" name="name">
    <label for="description">description</label>
    <input type="text" name="description">
    <label for="number">number</label>
    <input type="number" name="number">
    <label for="price">price</label>
    <input type="float" name="price">
    <label for="language">language</label>
    <input type="text" name="language">
    <label for="writer">writer</label>
    <input type="text" name="writer">
    <label for="image">image</label>
    <input type="file" name="image">
    <select name="categorys_id" id="">
        @foreach ($categorys as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">submit</button>
</form> --}}

@include('navbar')

<h1 style="display: flex; justify-content: center; margin-bottom: -100px; margin-top: 100px; color: brown; margin-left: 80px;">Add Book</h1>
<section class="form_section">
    <form action="{{ route('addBook') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="">Book Title</label>
            <input type="text" name="name">
            <label for="">Book description</label>
            <input type="text" name="description">
            <label for="">Number Of Stock</label>
            <input type="number" name="number">
            <label for="">Price</label>
            <input type="float" name="price">
            <label for="">Book language</label>
            <input type="text" name="language">
            <label for="">Book Writer</label>
            <input type="text" name="writer">
            <label for="">Book Cover</label>
            <input type="file" name="image">
            <label for="image">Book's Category</label>
            <select name="categorys_id" type="options" id="">
                <option value="">Get category for your book</option>
                @foreach ($categorys as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">submit</button>
        </form>
        
</section>

@include('sideBar')
