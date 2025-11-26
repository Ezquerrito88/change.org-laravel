@extends('layouts.public')

@section('content')

    <main class="hero-section">
        <section class="g pt-2 text-center container background-image d-none d-xxl-block ">
            <div class="row g-2 justify-content-center align-items-start mt-5 ">

                <div class="col-2 d-flex justify-content-start p-2 position-relative">
                    <img class="img-fluid rounded-circle round-img position-relative z-0 custom-shadow" src="https://static.change.org/homepageV3/img/changeorg_cuantovaleunavida_entregafirmas5.jpg" alt="Imagen de petición izquierda">
                    <div class="bg-light position-absolute custom-top-left-pill translate-middle px-5 border rounded-pill z-1 py-2 custom-pill">
                        <p class="m-0 d-flex align-items-center ">
                            <span class="text-danger fw-normal punto me-2">·</span> ¡Victoria!
                        </p>
                        <p class="m-0 fw-normal">159.929 firmas</p>
                    </div>
                </div>

                <div class="col-7 mt-5 mb-0">
                    <div class="px-3 py-3 middle-width">
                        <h1 class="title-font fw-bold">El cambio comienza aquí<span class="text-danger">.</span></h1>
                        <p class="fs-4 fw-normal mx-5">Únete a <span class="fw-bold">566.742.419</span> personas que están impulsando un cambio real en sus comunidades.</p>
                        <div class="d-flex gap-4 justify-content-center">
                            <a href="{{ route('peticiones.create') }}" class="btn btn-warning fw-bold fs-5 btn-yellow transition py-3 px-4">Crear una petición</a>
                            <button class="btn btn-outline-dark border rounded fw-bold fs-5 transition py-3 px-4">Comenzar con IA</button>
                        </div>
                    </div>
                </div>

                <div class="col-3 d-flex justify-content-start p-2 position-relative ">
                    <img class="img-fluid rounded-circle round-img position-relative z-0 custom-shadow" src="https://static.change.org/homepageV3/img/soloelpueblosalvaalpueblo5.JPG" alt="Imagen de petición derecha">
                    <div class="bg-light position-absolute top-75 custom-top-right-pill translate-middle px-5 border rounded-pill z-1 py-2 custom-pill">
                        <p class="m-0 d-flex align-items-center ">
                            <span class="text-danger fw-normal punto me-2">·</span> ¡Victoria!
                        </p>
                        <p class="m-0 fw-normal">162.846 firmas</p>
                    </div>
                </div>
            </div>

            <div class="row g-2 justify-content-center">
                <div class="col-12 d-flex justify-content-center flex-wrap mt-0">
                    <div class="col-6 p-2 position-relative  custom-div-three">
                        <img class="img-fluid rounded-circle round-img position-relative z-0 custom-shadow" src="https://static.change.org/homepageV3/img/desiderioysoledad_los3%20(1).jpg" alt="">
                        <div class="bg-light position-absolute top-75 start-50 translate-middle px-5 border rounded-pill z-1 py-2 custom-pill">
                            <p class="m-0 d-flex align-items-center ">
                                <span class="text-danger fw-normal punto me-2">·</span> ¡Victoria!
                            </p>
                            <p class="m-0 fw-normal">96.241 firmas</p>
                        </div>
                    </div>
                    <div class="col-6 p-2 position-relative custom-div-four">
                        <img class="img-fluid rounded-circle round-img position-relative z-0 custom-shadow" src="https://static.change.org/homepageV3/img/entrega_firmas_guardias_medicas_4r%20(1).jpg" alt="">
                        <div class="bg-light position-absolute top-75 start-50 translate-middle px-5 border rounded-pill z-1 py-2 custom-pill">
                            <p class="m-0 d-flex align-items-center ">
                                <span class="text-danger fw-normal punto me-2">·</span> ¡Victoria!
                            </p>
                            <p class="m-0 fw-normal">192.007 firmas</p>
                        </div>
                    </div>
                    <div class="col-6 p-2 position-relative custom-div-five ">
                        <img class="img-fluid rounded-circle round-img position-relative z-0 custom-shadow" src="https://static.change.org/homepageV3/img/pornagore_elpais.png" alt="">
                        <div class="bg-light position-absolute top-75 start-50 translate-middle px-5 border rounded-pill z-1 py-2 custom-pill">
                            <p class="m-0 d-flex align-items-center ">
                                <span class="text-danger fw-normal punto me-2">·</span> ¡Victoria!
                            </p>
                            <p class="m-0 fw-normal">141.337 firmas</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-light-subtle py-5 text-center ">
            <h2 class="fw-bold">Usar la plataforma de peticiones n.º 1 del mundo es fácil</h2>
            <div class="container my-5">
                <div class="row text-center how-it-works-line">
                    <div class="col-4 step-item">
                        <div class="step-circle-wrapper">
                            <div class="step-circle">1</div>
                            <div class="step-line"></div>
                        </div>
                        <p class="mt-3 fw-bold">Crea una petición en dos minutos</p>
                        <p class="small fw-normal">Más de 2.000 nuevas cada día</p>
                    </div>
                    <div class="col-4 step-item">
                        <div class="step-circle-wrapper">
                            <div class="step-circle">2</div>
                            <div class="step-line"></div>
                        </div>
                        <p class="mt-3 fw-bold">Consigue apoyo gracias a nuestra gran comunidad</p>
                        <p class=" small fw-normal">Más de 500.000 firmas diarias</p>
                    </div>
                    <div class="col-4 step-item">
                        <div class="step-circle-wrapper">
                            <div class="step-circle">3</div>
                        </div>
                        <p class="mt-3 fw-bold">Llega hasta los responsables</p>
                        <p class="fw-normal small">Más de 1.000 notificados a diario</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mt-5">
            <h2 class="fs-1 fw-bold">Apoya causas que te importan</h2>
            <p class="fw-normal fs-5">Encuentra peticiones que te conmuevan y alza tu voz para lograr el cambio.</p>

            <div class="d-flex flex-wrap justify-content-start">
                <a href="#" class="btn btn-outline-custom-blue text-18px me-2 my-1 d-flex align-items-center">
                    Sanidad <i class="bi bi-arrow-right ms-2"></i>
                </a>
                <a href="#" class="btn btn-outline-custom-blue text-18px me-2 my-1 d-flex align-items-center">
                    Animales <i class="bi bi-arrow-right ms-2"></i>
                </a>
                <a href="#" class="btn btn-outline-custom-blue text-18px me-2 my-1 d-flex align-items-center">
                    Medio Ambiente <i class="bi bi-arrow-right ms-2"></i>
                </a>
                <a href="#" class="btn btn-outline-custom-blue text-18px me-2 my-1 d-flex align-items-center">
                    Educación <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-4">
                <a href="{{ route('peticiones.show', ['id' => 1]) }}" class="text-decoration-none">
                    <div class="col">
                        <div class="card shadow p-0 h-100">
                            <img src="https://assets.change.org/photos/9/ca/rm/JACarMOCmNQsrUQ-800x450-noPad.jpg?1653998327" class="card-img-top border-bottom object-fit-cover" alt="Ley acoso escolar">
                            <div class="card-body">
                                <h5 class="card-title text-clamp fw-bold">Mi hija se sucidó... ¡LEY ACOSO ESCOLAR YA!</h5>
                                <p class="card-text text-blue mt-3">
                                    <i class="bi bi-pencil-fill me-2"></i> 259.830 firmas
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <section class="container my-5">
            <div class=" rounded d-flex flex-column flex-lg-row align-items-center bg-light">
                <div class="col-12 col-lg-6 p-3 p-lg-5 text-center text-lg-start">
                    <h2 class="fw-bold fs-2 text-dark">Apoya el cambio</h2>
                    <p class="text-secondary mb-4">
                        TuCausa.org es una organización independiente...
                    </p>
                    <a href="#" class="btn btn-outline-dark px-4 py-3 rounded fw-bold">Contribuir</a>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end pt-4 pt-lg-0">
                    <img src="https://static.change.org/homepageV3/homepage-sunrise-contribute@1x.png" alt="Donación" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </section>

    </main>

@endsection
