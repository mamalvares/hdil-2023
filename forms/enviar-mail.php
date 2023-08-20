<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Define as informações do destinatário do email
  $to = "alexandre@hdil.com.br";
  $subject = $_POST["subject"];

  // Define as informações do remetente do email
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Monta o corpo do email
  $body = "De: $name\n\n";
  $body .= "Email: $email\n\n";
  $body .= "Mensagem:\n$message";

  // Configura o cabeçalho do email
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

  // Tenta enviar o email
  if (mail($to, $subject, $body, $headers)) {
    // Envia uma resposta de sucesso para o formulário
    header("Location: enviar-mail.php?success=1#contact");
    exit; // Termina a execução do script após o redirecionamento
  } else {
    // Adicione mensagens de depuração para entender o erro
    echo "Erro ao enviar o email!";
    echo error_get_last()['message'];

    // Envia uma resposta de erro para o formulário
    header("Location: enviar-mail.php?success=0#contact");
    exit; // Termina a execução do script após o redirecionamento
  }

}
?>
