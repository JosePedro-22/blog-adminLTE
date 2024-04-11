<x-guest-layout>
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                @if (session()->has('status'))
                    <div class="alert-danger mb-3 text-center">
                        {{session('status')}}
                    </div>
                @endif

                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="alert-danger">
                            {{$message}}
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password" value="" class="form-control" placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="alert-danger">
                            {{$message}}
                        </span>
                    @enderror
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Mantenha-me Conectado
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        </div>
                    </div>
                </form>
                <div class="social-auth-links text-center mt-2 mb-3">
                    <p>-  OU -</p>
                    <a href="#" class="btn btn-block btn-dark">
                        <i class="fab fa-github mr-2"></i> Entre com o GitHub
                    </a>
                </div>
            </div>

        </div>

    </div>
</x-guest-layout>
