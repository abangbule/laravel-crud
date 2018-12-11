@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  
  <a href="{{ route('shares.create')}}" class="btn btn-success">Create</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Stock Name</td>
          <td>Stock Price</td>
          <td>Stock Quantity</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($shares as $share)
        <tr>
            <td>{{$share->id}}</td>
            <td>{{$share->share_name}}</td>
            <td>{{$share->share_price}}</td>
            <td>{{$share->share_qty}}</td>
            <td><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                {{-- <a href="#" id="destroy" class="btn btn-danger">Delete</a> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

@section('page-level-scripts')
    <script>
        $(document).ready(function(){
            $('#destroy').click(function (e) { 
                e.preventDefault();
                console.log(destroy);
                if(destroy) {
                    Swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.value) {
                            Swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        }
                    })
                }
            });
        });
        
    </script>
@endsection