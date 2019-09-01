@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Use our EndPoint!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Model Categoria!
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-hover">
                                    <thead>
                                    <tr>                        
                                        <th scope="col">method</th>
                                        <th scope="col">URI</th>
                                        <th scope="col">Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>                        
                                        <td>GET|HEAD</td>
                                        <td>api/categoria</td>
                                        <td>categoria.index</td>
                                    </tr>
                                    <tr>
                                        <td>POST</td>
                                        <td>api/categoria</td>
                                        <td>categoria.store</td>
                                    </tr>
                                    <tr>
                                        <td> GET|HEAD</td>
                                        <td>api/categoria/{categorium}</td>
                                        <td>categoria.show</td>
                                    </tr>                        
                                    <tr>
                                        <td>PUT|PATCH</td>
                                        <td>api/categoria/{categorium}</td>
                                        <td>categoria.update</td>
                                    </tr>
                                    <tr>
                                        <td> DELETE</td>
                                        <td>api/categoria/{categorium}</td>
                                        <td>categoria.destroy</td>
                                    </tr>
                
                                    </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Model Url!
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                                <table class="table table-hover">
                                        <thead>
                                        <tr>                        
                                            <th scope="col">method</th>
                                            <th scope="col">URI</th>
                                            <th scope="col">Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>                        
                                            <td>GET|HEAD</td>
                                            <td>api/url</td>
                                            <td>url.index</td>
                                        </tr>
                                        <tr>
                                            <td>POST</td>
                                            <td>api/url</td>
                                            <td>url.store</td>
                                        </tr>
                                        <tr>
                                            <td> GET|HEAD</td>
                                            <td>api/url/{url}</td>
                                            <td>url.show</td>
                                        </tr>                        
                                        <tr>
                                            <td>PUT|PATCH</td>
                                            <td>api/url/{url}</td>
                                            <td>url.update</td>
                                        </tr>
                                        <tr>
                                            <td> DELETE</td>
                                            <td>api/url/{url}</td>
                                            <td>url.destroy</td>
                                        </tr>
                                        <tr>                        
                                            <td>GET|HEAD</td>
                                            <td>api/url_any_user/{user_id}</td>
                                            <td>url_any_user</td>
                                        </tr>
                                        <tr>                        
                                            <td>GET|HEAD</td>
                                            <td>api/url_login_user</td>
                                            <td>url_login_user</td>
                                        </tr>
                    
                                        </tbody>
                                  </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Model Grupo!
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                           <table class="table table-hover">
                                        <thead>
                                        <tr>                        
                                            <th scope="col">method</th>
                                            <th scope="col">URI</th>
                                            <th scope="col">Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>                        
                                            <td>GET|HEAD</td>
                                            <td>api/grupo</td>
                                            <td>grupo.index</td>
                                        </tr>
                                        <tr>
                                            <td>POST</td>
                                            <td>api/grupo</td>
                                            <td>grupo.store</td>
                                        </tr>
                                        <tr>
                                            <td> GET|HEAD</td>
                                            <td>api/grupo/{grupo}</td>
                                            <td>grupo.show</td>
                                        </tr>                        
                                        <tr>
                                            <td>PUT|PATCH</td>
                                            <td>api/grupo/{grupo}</td>
                                            <td>grupo.update</td>
                                        </tr>
                                        <tr>
                                            <td> DELETE</td>
                                            <td>api/grupo/{grupo}</td>
                                            <td>grupo.destroy</td>
                                        </tr>
                    
                                        </tbody>
                                  </table>
                        </div>
                      </div>
                    </div>
                    <div class="card"> 
                        <div class="card-header" id="headingFour">
                          <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Model User!
                            </button>
                          </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                          <div class="card-body">
                             <table class="table table-hover">
                                          <thead>
                                          <tr>                        
                                              <th scope="col">method</th>
                                              <th scope="col">URI</th>
                                              <th scope="col">Name</th>
                                          </tr>
                                          </thead>
                                          <tbody>                                          
                                          <tr>
                                              <td>POST</td>
                                              <td>api/login</td>
                                              <td>api.login</td>
                                          </tr>
                                          <tr>
                                              <td>POST</td>
                                              <td>api/logout</td>
                                              <td>api.logout</td>
                                          </tr>
                                          <tr>
                                              <td>POST</td>
                                              <td>api/regiter</td>
                                              <td>api.register</td>
                                          </tr>
                                          <tr>
                                              <td>POST</td>
                                              <td>login</td>
                                              <td>login</td>
                                          </tr>                                          
                                          <tr>
                                              <td> GET|HEAD</td>
                                              <td>login</td>
                                              <td>login</td>
                                          </tr> 
                                          <tr>
                                              <td>POST</td>
                                              <td>logout</td>
                                              <td>logout</td>
                                          </tr>                       
                                          <tr>
                                              <td>POST</td>
                                              <td>password/email</td>
                                              <td>password.email</td>
                                          </tr> 
                                          <tr>
                                              <td> GET|HEAD</td>
                                              <td>password/reset</td>
                                              <td>password.request</td>
                                          </tr>
                                          <tr>
                                              <td>POST</td>
                                              <td>password/reset</td>
                                              <td>password.update</td>
                                          </tr> 
                                          <tr>
                                              <td> GET|HEAD</td>
                                              <td>password/reset/{token}</td>
                                              <td>password.reset</td>
                                          </tr>  
                                          <tr>
                                              <td> GET|HEAD</td>
                                              <td>register</td>
                                              <td>register</td>
                                          </tr> 
                                          <tr>
                                              <td> POST</td>
                                              <td>register</td>
                                              <td></td>
                                          </tr>   
                                          <tr>
                                            <td> GET|HEAD</td>
                                            <td>api/showAuthenticate</td>
                                            <td>showAuthenticate</td>
                                        </tr> 
                                        <tr>
                                            <td> GET|HEAD</td>
                                            <td>api/user</td>
                                            <td>user.index</td>
                                        </tr> 
                                        <tr>
                                            <td> GET|HEAD</td>
                                            <td>api/user/{user}</td>
                                            <td>user.show</td>
                                        </tr> 
                                        <tr>
                                            <td> PUT|PATCH</td>
                                            <td>api/user/{user}</td>
                                            <td>user.update</td>
                                        </tr> 
                                        <tr>
                                            <td> DELETE</td>
                                            <td>api/user/{user}</td>
                                            <td>user.destroy</td>
                                        </tr> 
                      
                                          </tbody>
                                    </table>
                          </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                Model Noticia!
                            </button>
                            </h2>
                        </div>
                    
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-hover">
                                        <thead>
                                        <tr>                        
                                            <th scope="col">method</th>
                                            <th scope="col">URI</th>
                                            <th scope="col">Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>                        
                                            <td>GET|HEAD</td>
                                            <td>api/noticia</td>
                                            <td>noticia.index</td>
                                        </tr>
                                        <tr>
                                            <td>POST</td>
                                            <td>api/noticia</td>
                                            <td>noticia.store</td>
                                        </tr>
                                        <tr>
                                            <td> GET|HEAD</td>
                                            <td>api/noticia/{noticia}</td>
                                            <td>noticia.show</td>
                                        </tr>                        
                                        <tr>
                                            <td>PUT|PATCH</td>
                                            <td>api/noticia/{noticia}</td>
                                            <td>noticia.update</td>
                                        </tr>
                                        <tr>
                                            <td> DELETE</td>
                                            <td>api/noticia/{noticia}</td>
                                            <td>noticia.destroy</td>
                                        </tr>
                    
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                    Model Recurso!
                                </button>
                                </h2>
                            </div>
                        
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table class="table table-hover">
                                            <thead>
                                            <tr>                        
                                                <th scope="col">method</th>
                                                <th scope="col">URI</th>
                                                <th scope="col">Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>                        
                                                <td>GET|HEAD</td>
                                                <td>api/recurso</td>
                                                <td>recurso.index</td>
                                            </tr>
                                            <tr>
                                                <td>POST</td>
                                                <td>api/recurso</td>
                                                <td>recurso.store</td>
                                            </tr>
                                            <tr>
                                                <td> GET|HEAD</td>
                                                <td>api/recurso/{recurso}</td>
                                                <td>recurso.show</td>
                                            </tr>                        
                                            <tr>
                                                <td>PUT|PATCH</td>
                                                <td>api/recurso/{recurso}</td>
                                                <td>recurso.update</td>
                                            </tr>
                                            <tr>
                                                <td> DELETE</td>
                                                <td>api/recurso/{recurso}</td>
                                                <td>recurso.destroy</td>
                                            </tr>
                        
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>

                    <div class="card">
                            <div class="card-header" id="headingSeven">
                                <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                    Model Referido!
                                </button>
                                </h2>
                            </div>
                        
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table class="table table-hover">
                                            <thead>
                                            <tr>                        
                                                <th scope="col">method</th>
                                                <th scope="col">URI</th>
                                                <th scope="col">Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>                        
                                                <td>GET|HEAD</td>
                                                <td>api/referido</td>
                                                <td>referido.index</td>
                                            </tr>
                                            <tr>
                                                <td>POST</td>
                                                <td>api/referido</td>
                                                <td>referido.store</td>
                                            </tr>
                                            <tr>
                                                <td> GET|HEAD</td>
                                                <td>api/referido/{referido}</td>
                                                <td>referido.show</td>
                                            </tr>                        
                                            <tr>
                                                <td>PUT|PATCH</td>
                                                <td>api/referido/{referido}</td>
                                                <td>referido.update</td>
                                            </tr>
                                            <tr>
                                                <td> DELETE</td>
                                                <td>api/referido/{referido}</td>
                                                <td>referido.destroy</td>
                                            </tr>
                        
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
