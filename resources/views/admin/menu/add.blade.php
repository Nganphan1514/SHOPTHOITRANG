@extends('admin.main')

@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

@endsection

@section('content')
    
    <form action="" method="POST">
        <div class="card-body">

        <div class="form-group">
            <label for="menu">Ten danh muc</label>
                <input type="text" name="menu" class="form-control" id="menu" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label>Danh muc</label>
                <select class="form-control" name="parent_id" id="menu" >
                    <option value="0">Danh muc cha</option>
                </select>
        </div>

        <div class="form-group">
            <label >Mo ta</label>
                <textarea  name="description" class="form-control" ></textarea>
        </div>
                
        <div class="form-group">
            <label>Mo ta chi tiet</label>
                <textarea  name="content" id="content" class="form-control" ></textarea>
        </div>

        <div class="form-group">

            <label for="">Kich hoat</label>
                <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
            <label for="active" class="custom-control-label">Co</label>
                </div>
                <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
            <label for="no_active" class="custom-control-label">Khong</label>
                </div>
                        
                      

        </div>
                
        </div>
                <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tao danh muc</button>
        </div>
    </form>

@endsection

@section('footer')
    <script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>


@endsection