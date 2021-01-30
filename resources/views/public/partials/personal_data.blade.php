<form action="" method="post">
    <div class="container">
        <div class="row">
            <div class="form-group col-6">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" placeholder="{{$user->name}}">
            </div>

            <div class="form-group col-6">
                <label for="nick">Nick</label>
                <input type="text" id="nick" class="form-control" placeholder="{{$user->nick}}">
            </div>

            <div class="form-group col-12">
                <label for="email">email</label>
                <input type="email" id="email" class="form-control" placeholder="{{$user->email}}">
            </div>

            <div class="form-group col-3">
                <label for="nick">Age</label>
                <input type="text" id="age" class="form-control" placeholder="{{$user->age}}">
            </div>

            <div class="form-group col-5">
                <label for="nick">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Enter your new password">
            </div>

            <div class="form-group col-4">
                <label for="nick">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control" placeholder="Repeat the new password">
            </div>
        </div>
        <input type="submit" value="Actualizar" class="btn btn-primary btn-lg mt-3">
    </div>
</form>

