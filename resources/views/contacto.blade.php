@extends('layouts.app')
@section('content')

    <section class="two-column-fluid"> 
        <div class="outer clearfix">
            <article class="column left-column" style="background-image:url({{asset('images/resource/fluid-image-3.jpg')}});">
                <div class="content-box pull-right">    
                    <h2><span class="normal-font theme_color">Escribenos </span></h2>
                    <form>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Nombe</label>
                          <input type="email" class="form-control" id="inputEmail4" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Asunto</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="Asunto">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Email</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Mensaje</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comantarios"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>                
                <div class="clearfix"></div>
            </article>
            
            <article class="column right-column">
                
                
            </article>
        </div>
    </section>
@endsection