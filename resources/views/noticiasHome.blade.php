 @extends('layouts.homeLayout')

@section('contenido')
<div style="background: black">
 <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Noticias</h2>
            <h3 class="section-subheading text-muted">todas las noticias </h3>
          </div>
        </div>
        <div class="row">
@foreach($noticia as $key => $n)

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1{{$n->id_noticia}}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="http://localhost:81/appConjunto/storage/app/public/{{$n->imagen}}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>{{$n->titulo}}</h4>
              <p class="text-muted">{{$n->fecha}}</p>
            </div>
          </div>

        </div>
      </div>
    </section>
</div>

<!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1{{$n->id_noticia}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">{{$n->titulo}}</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="http://localhost:81/appConjunto/storage/app/public/{{$n->imagen}}" alt="">
                  <p>{{$n->cuerpo_noticia}}</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Threads</li>
                    <li>Category: Illustration</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endforeach
    @endsection