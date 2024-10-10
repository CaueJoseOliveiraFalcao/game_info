<main>
    <h1>Registro</h1>
    <form action="/register" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name">
        <label for="email">Email:</label>
        <input type="email" name="email">
        <label for="password">Senha:</label>
        <input type="password" name="password">
        <input type="submit">
    </form>
</main>
