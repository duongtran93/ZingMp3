@include('layouts.app')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <form method="post" action="{{route('user.updatepass')}}">
                @csrf
                <div class="form-group">
                    <label>Mật khẩu cũ</label>
                    <input type="password" class="form-control" name="old_password">
                </div>
                <div class="form-group">
                    <label>Mật khẩu mới</label>
                    <input type="password" class="form-control" name="new_password">
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirm">
                </div>
                <button type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>
            </form>
        </div>
    </div>
</div>

