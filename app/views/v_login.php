<div class="col-12 py-5 text-center">
    <form action="<?= BASE_URL . "/login" ?>" method="POST" class="col-6 mx-auto">

        <div class="form-group">
            <input type="text" name="nome" class="form-control my-2" autofocus placeholder="Usuario">
            <input type="password" name="senha" class="form-control my-2" placeholder="Senha">
            <input type="submit" value="Entrar" class="btn btn-primary">
        </div>

        <span class="text-danger">
            <?$dadosView["erroLogin"] ?? "" ?>
        </span>
    </form>
</div>