<?php
// gitwebhook.php
$secret = "beckie"; // choisis un mot de passe simple, ex: "lhsqc2025"

// Vérifie que la requête vient de GitHub
if ($_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    // Lis le corps brut 
    $payload = file_get_contents('php://input');
    $signature = 'sha256=' . hash_hmac('sha256', $payload, $secret);

    if (hash_equals($signature, $_SERVER['HTTP_X_HUB_SIGNATURE_256'])) {
        // Fait le pull et le déploiement
        shell_exec('cd /home/lhsqc542/repo_lhsqc && git pull origin main');
        shell_exec('/bin/rsync -av --delete /home/lhsqc542/repo_lhsqc/public_html/ /home/lhsqc542/public_html/');
        file_put_contents('/home/lhsqc542/webhook.log', date("Y-m-d H:i:s")." - Déploiement OK\n", FILE_APPEND);
        http_response_code(200);
        echo "OK";
        exit;
    } else {
        file_put_contents('/home/lhsqc542/webhook.log', date("Y-m-d H:i:s")." - Signature invalide\n", FILE_APPEND);
    }
}
http_response_code(403);
echo "Non autorisé";
