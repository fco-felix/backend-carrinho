<form action="<?=BASE_URL?>/login" method="post">
    Usuário:
    <div><input type="text" name="nome"></div>
    Senha:
    <div><input type="password" name="senha"></div>
    <br>
    <div><button type="submit">Entrar</button></div>
</form>

<p style="color:#f00"><?=$dadosView["erroLogin"] ?? ""?></p>