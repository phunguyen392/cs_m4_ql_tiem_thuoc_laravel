
<html>
<body>
    <div class="form-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="form-group">

                <h2 style="color:blue">SignIn</h2>
                @include('admin.includes.global.alert')
                <form action="{{ route('postlogin') }}" method="POST">
                    @csrf
                    <div class="input-form text-center">
                        <label for="email" style="color:blue">Email:</label>
                        <input class="custom-input text-center" type="email" id="email" name="email"
                            placeholder="Email Enter" required>
                        @error('email')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-form text-center">
                        <label style="color: blue" for="password">Password:</label>
                        <input class="custom-input text-center" type="password" id="password" name="password"
                            placeholder="Password Enter" required>
                        @error('password')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-form">
                        <input class="custom-input" type="submit" value="SignIn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</body>

</html>
