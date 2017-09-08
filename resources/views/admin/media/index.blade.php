@extends("layouts.admin")
@section("content")
    <h1>Media</h1>
@if($photos)
    <form action="delete/media" method="POST" class="form-inline">
        {{csrf_field()}}
        {{method_field("delete")}}
        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="delete_all" class="btn btn-primary">
        </div>


    <table class="table table-striped">
        <thead>
        <tr>
            <th><input type="checkbox" id="options"></th>
            <th>Id</th>
            <th>Path</th>
            <th>Create</th>
            <th>Update</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($photos as $photo)
            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                <td scope="row">{{$photo->id}}</td>
            <td><img height="100px" src="{{$photo->file}}" alt=""></td>
                <td>{{$photo->created_at->diffForHumans()}}</td>
                <td>{{$photo->updated_at->diffForHumans()}}</td>
            <td>
                <input type="hidden" name="photo" value="{{$photo->id}}">
               <div class="form-group">
                   <input type="submit"  name="delete_single" value="Delete" class="btn btn-danger">
                </div>
           </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </form>
@endif

    @stop
@section("script")
<script>
    $(document).ready(function (){
        $("#options").click(function () {
            if(this.checked){
               $(".checkBoxes").each(function () {
                   this.checked = true;
               })
            }else{
                $(".checkBoxes").each(function () {
                    this.checked = false;

                })
            }
        })
    })
</script>
    @endsection