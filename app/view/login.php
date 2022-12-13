
<?php require_once Path::VIEW_CABECERA?>



<div class="container container-principal container-login">

<div class="row">

<div class="col-12 mb-5 mr-0 col-md-6 mr-md-5 mb-md-0" >
    <!--Imagen de <a href="https://www.freepik.es/vector-gratis/somos-senal-abierta_8373641.htm#query=welcome&position=47&from_view=search&track=sph">Freepik</a>-->
    <img src="public/assets/img/3868478.jpg" alt="Imagen de bienvenida" id="imagen-bienvenida">
</div>

<div class="col-12 ml-0 col-md-6 ml-md-5 ">
        <form action="<?=Redirect::COMPROBAR_USUARIO?>" method="post">
            <div class="row">
                <div class="col-2">
                    <label for="loginMail">Email: </label>
                    <br> <br>
                    <label for="loginPassword">Password: </label>
                </div>

                <div class="col-6">
                    <input class="longInput" type="email" name="loginMail" id="loginMail"> <br> <br>
                    <input class="longInput" type="password" name="loginPassword" id="loginPassword"> <br> <br>

                </div>

            </div>

        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
    <br>
    <p>¿No está usted registrado? <a href="<?=Redirect::DATOS_USUARIO?>">Regístrese</a></p>

</div>







</div>

</div>

<?php require_once Path::VIEW_PIE ?>