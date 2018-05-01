
</style>
  
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">

 @csrf
                        <div class="row">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nombre" name="nombre" type="text" placeholder="nombre" 
                                class="form-control" value="{{ isset($usuario)?$usuario[0]['nombre']:''}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="apellido" name="apellido" type="text" placeholder="apellido" class="form-control" value="{{ isset($usuario)?$usuario[0]['apellido']:''}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="telefono_fijo" name="telefono_fijo" type="text" placeholder="telefono fijo" class="form-control" value="{{ isset($usuario)?$usuario[0]['telefono_fijo']:''}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-mobile bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="telefono_celular" name="telefono_celular" type="text" placeholder="telefono_celular" class="form-control" value="{{ isset($usuario)?$usuario[0]['telefono_celular']:''}}">
                            </div>
                        </div>
                        <br>
                                                <div class="row">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" placeholder="fecha de nacimiento" class="form-control" value="{{ isset($usuario)?$usuario[0]['fecha_nacimiento']:''}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-square  bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="correo" name="correo" type="email" placeholder="correo" class="form-control" value="{{ isset($usuario)?$usuario[0]['correo']:''}}">
                            </div>
                        </div>
                                                <br>
                                                @if(!isset($usuario))
                        <div class="row">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-key bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="password" name="password" type="password" placeholder="contraceña" class="form-control">
                            </div>
                        </div>
                        <br>   
                                     
                        <div class="row">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-key bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="password2" name="password2" type="password" placeholder="contraceña" class="form-control">
                            </div>
                        </div>  
                        <br>   
                        @endif                   
                        <div class="row">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-puzzle-piece bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="interior" name="interior" type="number" placeholder="interior" class="form-control" value="{{isset($usuario)?$usuario[0]['interior']:''}}">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-address-card bigicon"></i></span>
                            <div class="col-md-8">


                        @foreach($roles as $r)

                            <div class="checkbox">
                                <label><input  id="rol{{$r->nombre}}" name="rol{{$r->nombre}}" data-descripcion="{{$r->descripcion}}" type="checkbox" value="{{$r->id_rol}}"
                                    @if(isset($rolU))
                            @foreach($rolU as $ru)
                                    {{$r->id_rol}}
                       
                                     <?php 
                                    if (isset($usuario)) {
                                        if ($ru->id_rol == $r->id_rol) {
                                            ?>checked<?php
                                        }
                                    }?>
                            @endforeach
                            @endif

                                    >{{$r->nombre}}</label>
                            </div>
                        @endforeach

                            </div>
                        </div>
                        <br>
                       
            </div>
        </div>
    </div>
</div