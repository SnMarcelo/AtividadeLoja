<?php 
include 'header.php';?>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card py-3 px-2">
                            <h3 class="text-center mb-3 mt-2">CADASTRO</h3>
                            

                            <form action="process/registrodados.php" method="post" class="myform">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome" name="Nome">
                                    <input type="text" class="form-control" placeholder="Celular" name="Celular">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Usuario" name="Usuario">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Senha" name="Senha">
                                </div>

                                <div class="form-group mt-3">

                                    <button type="submit" class="btn btn-block btn-primary btn-lg"><small><i
                                                class="far fa-user pr-2"></i> Cadastrar </small></button>                      
                                </div>
                            </form>

                            <div class="row mx-auto ">
                                <div class="col-4">
                                    <i class="fab fa-twitter"></i>
                                </div>
                                <div class="col-4">
                                    <i class="fab fa-facebook"></i>
                                </div>
                                <div class="col-4">
                                    <i class="fab fa-google"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>





<?php include 'footer.php'; ?>