<main>
    <h1>Login</h1>
    <form action="/login" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email">
        <label for="password">Senha:</label>
        <input type="password" name="password">
        <input type="submit">
    </form>
</main>
