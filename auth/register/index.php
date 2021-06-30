<? require_once $_SERVER['DOCUMENT_ROOT'] . '/backdata/header.php'; ?>
<h1>Регистрация</h1>
<div class="row">
    <div class="col-6">
        <form action="/backdata/front/register.php" method="post" target="area">
            <div class="mb-3">
                <label for="Llogin" class="form-label">Имя</label>
                <input type="text" class="form-control" id="Lname" name="NAME" required>
                <div id="emailHelp" class="form-text">Настоящее</div>
            </div>
            <div class="mb-3">
                <label for="Llogin" class="form-label">Логин</label>
                <input type="text" class="form-control" id="Llogin" name="LOGIN" required>
                <div id="emailHelp" class="form-text">Логин или почту</div>
            </div>
            <div class="mb-3">
                <label for="Llogin" class="form-label">Почта</label>
                <input type="email" class="form-control" id="Lemail" name="EMAIL" required>
                <div id="emailHelp" class="form-text">Логин или почту</div>
            </div>
            <div class="mb-3">
                <label for="Lpass" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="Lpass" name="PASS" required>
                <div id="emailHelp" class="form-text">Минимум 6 символов (нет)</div>
            </div>
            <div class="mb-3">
                <label for="LpassD" class="form-label">Подтвердите пароль</label>
                <input type="password" class="form-control" id="LpassD" name="PASS_CONFIRM" required>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary">Регистрация</button>
                <a href="/auth/" class="btn btn-primary">Авторизация</a>
            </div>
        </form>
    </div>
    <div class="col-6">
        <p><iframe name="area" width="500" height="200"></iframe></p>
    </div>
</div>
<? require_once $_SERVER['DOCUMENT_ROOT'] . '/backdata/footer.php'; ?>
