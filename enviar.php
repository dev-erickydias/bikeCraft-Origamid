<?php
/**
 * Bikcraft - Secure Form Handler
 * Handles contact/budget form submissions via PHPMailer
 */

// ============================================================
// CONFIGURATION
// ============================================================

$email_envio = ''; // E-mail receptor — preencher com e-mail real
$email_pass  = ''; // Senha do e-mail (ou app password)
$site_name   = 'Bikcraft';
$site_url    = 'https://bikcraft.com';
$host_smtp   = 'smtp.gmail.com';
$host_port   = '465';

// ============================================================
// SECURITY: Only accept POST requests
// ============================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('Método não permitido.');
}

// ============================================================
// SECURITY: Rate limiting (basic session-based)
// ============================================================

session_start();
$now = time();
$cooldown = 30; // seconds between submissions

if (isset($_SESSION['last_submit']) && ($now - $_SESSION['last_submit']) < $cooldown) {
    http_response_code(429);
    exit('Aguarde antes de enviar novamente.');
}

// ============================================================
// HONEYPOT ANTI-SPAM CHECK
// ============================================================

$leaveblank = isset($_POST['leaveblank']) ? $_POST['leaveblank'] : '';
$dontchange = isset($_POST['dontchange']) ? $_POST['dontchange'] : '';

if ($leaveblank !== '' || $dontchange !== 'http://') {
    // Silently reject spam — don't reveal detection method
    http_response_code(200);
    echo renderResponse('Formulário recebido', 'Obrigado pelo contato.', '#89bb50', $site_url);
    exit;
}

// ============================================================
// INPUT VALIDATION & SANITIZATION
// ============================================================

// Sanitize all inputs
$nome     = sanitizeInput($_POST['nome'] ?? '');
$email    = sanitizeEmail($_POST['email'] ?? '');
$telefone = sanitizeInput($_POST['telefone'] ?? '');
$mensagem = sanitizeInput($_POST['mensagem'] ?? '');

// Validate required fields
$errors = [];

if (empty($nome) || mb_strlen($nome) < 2 || mb_strlen($nome) > 100) {
    $errors[] = 'Nome inválido.';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'E-mail inválido.';
}

if (mb_strlen($telefone) > 20) {
    $errors[] = 'Telefone inválido.';
}

if (empty($mensagem) || mb_strlen($mensagem) > 2000) {
    $errors[] = 'Mensagem inválida (máx. 2000 caracteres).';
}

// Check for email header injection attempts
if (preg_match('/[\r\n]/', $nome) || preg_match('/[\r\n]/', $email)) {
    http_response_code(400);
    exit('Dados inválidos.');
}

if (!empty($errors)) {
    http_response_code(400);
    echo renderResponse(
        'Erro na validação',
        htmlspecialchars(implode(' ', $errors), ENT_QUOTES, 'UTF-8'),
        '#e74c3c',
        $site_url
    );
    exit;
}

// ============================================================
// CHECK CONFIGURATION
// ============================================================

if (empty($email_envio) || empty($email_pass)) {
    http_response_code(500);
    echo renderResponse(
        'Erro de configuração',
        'O formulário não está configurado corretamente. Envie diretamente para contato@bikcraft.com',
        '#e74c3c',
        $site_url
    );
    exit;
}

// ============================================================
// SEND EMAIL VIA PHPMAILER
// ============================================================

$_SESSION['last_submit'] = $now;

// Escape values for HTML email body
$nome_safe     = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
$email_safe    = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$telefone_safe = htmlspecialchars($telefone, ENT_QUOTES, 'UTF-8');
$mensagem_safe = nl2br(htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'));

$body_content = "De: {$nome_safe}<br>E-mail: {$email_safe}<br>Telefone: {$telefone_safe}<br><br>Mensagem:<br>{$mensagem_safe}";

require('./PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Host       = $host_smtp;
$mail->SMTPAuth   = true;
$mail->SMTPSecure = 'ssl';
$mail->Username   = $email_envio;
$mail->Password   = $email_pass;
$mail->Port       = (int) $host_port;

$mail->From     = $email_envio;
$mail->FromName = 'Formulário ' . $site_name;

$mail->addAddress($email_envio);

// Use sanitized email for reply-to
$mail->addReplyTo($email, $nome_safe);

$mail->isHTML(true);
$mail->WordWrap = 70;
$mail->Subject  = 'Formulário - ' . $site_name . ' - ' . $nome_safe;
$mail->Body     = $body_content;
$mail->AltBody  = strip_tags(str_replace('<br>', "\n", $body_content));

if (!$mail->send()) {
    http_response_code(500);
    echo renderResponse(
        'Erro no envio',
        'Ocorreu um erro. Tente novamente ou envie para ' . htmlspecialchars($email_envio, ENT_QUOTES, 'UTF-8'),
        '#e74c3c',
        $site_url
    );
} else {
    echo renderResponse(
        'Formulário Enviado',
        'Em breve entraremos em contato com você. Obrigado!',
        '#2ecc71',
        $site_url
    );
}

// ============================================================
// HELPER FUNCTIONS
// ============================================================

/**
 * Sanitize a generic text input
 */
function sanitizeInput(string $value): string {
    $value = trim($value);
    $value = strip_tags($value);
    return $value;
}

/**
 * Sanitize an email input
 */
function sanitizeEmail(string $value): string {
    $value = trim($value);
    $value = filter_var($value, FILTER_SANITIZE_EMAIL);
    return $value;
}

/**
 * Render a styled HTML response page with auto-redirect
 */
function renderResponse(string $title, string $message, string $color, string $redirectUrl): string {
    $safeTitle   = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $safeUrl     = htmlspecialchars($redirectUrl, ENT_QUOTES, 'UTF-8');
    // $message is already escaped by the caller

    return <<<HTML
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="5;url={$safeUrl}">
    <title>{$safeTitle} — Bikcraft</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: #0a0a0a;
            color: #fff;
            text-align: center;
            padding: 2rem;
        }
        .msg { max-width: 480px; }
        .msg h2 { font-size: 1.5rem; color: {$color}; margin-bottom: 0.5rem; }
        .msg p { font-size: 1rem; color: rgba(255,255,255,0.7); line-height: 1.6; }
        .msg small { display: block; margin-top: 1rem; color: rgba(255,255,255,0.4); font-size: 0.8rem; }
    </style>
</head>
<body>
    <div class="msg">
        <h2>{$safeTitle}</h2>
        <p>{$message}</p>
        <small>Redirecionando em 5 segundos... <a href="{$safeUrl}" style="color:#fec63e;">Voltar agora</a></small>
    </div>
</body>
</html>
HTML;
}
?>
