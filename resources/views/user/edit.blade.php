@include('layouts.app')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <form method="post" action="{{route('user.update', $user->id)}}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <button type="submit" class="btn btn-primary">Lưu Thông Tin</button>
            </form>
        </div>
    </div>
</div>

