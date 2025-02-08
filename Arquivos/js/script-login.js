// Inicializar a API de autenticação do Google
function handleCredentialResponse(response) {
    console.log("Credential recebido: ", response.credential);
    // Aqui você pode enviar o token para o backend e autenticar o usuário
}

window.onload = function () {
    google.accounts.id.initialize({
        client_id: "SUA_GOOGLE_CLIENT_ID", // Substitua pelo seu Client ID do Google
        callback: handleCredentialResponse
    });

    google.accounts.id.renderButton(
        document.getElementById("google-sign-in"),
        { theme: "outline", size: "large" }  // Personalize o botão de login
    );

    google.accounts.id.prompt(); // Exibe o prompt de login de forma automática
};
