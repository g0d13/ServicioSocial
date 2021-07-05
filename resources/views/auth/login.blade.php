<x-guest-layout>
    <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center form-bg-image" data-background-lg="../../assets/img/illustrations/signin.svg">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                        <div class="text-center text-md-center mb-4 mt-md-0">
                            <h1 class="mb-0 h3">Inicia sesion</h1>
                        </div>
                        <form action="{{ route('login') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="email">Tu correo</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" placeholder="Correo" id="email" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group mb-4">
                                    <label for="password">Tu Contraseña</label>
                                    <div class="input-group">
                                        <input type="password" name="password" placeholder="Contraseña" class="form-control" id="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-gray-800">Iniciar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
