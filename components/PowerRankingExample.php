<?php
// Exemple d'utilisation du composant Power Ranking
// Ce fichier montre comment intégrer le composant dans une page

// Inclure les fichiers nécessaires
include "Header.php";

// Définir le chemin de la base de données (à adapter selon votre configuration)
$DatabaseFile = "LHSQC-STHS.db";

// Inclure le composant Power Ranking
include "components/PowerRanking.php";
?>

<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <h1 style="text-align: center; color: #333; margin-bottom: 30px;">
        Exemple d'utilisation du Power Ranking
    </h1>
    
    <p style="text-align: center; color: #666; margin-bottom: 30px;">
        Ce composant affiche automatiquement les 3 meilleures équipes du power ranking 
        avec leurs statistiques et leur évolution de classement.
    </p>
    
    <!-- Le composant Power Ranking sera affiché ici -->
    
    <div style="background: #f5f5f5; padding: 20px; border-radius: 10px; margin-top: 30px;">
        <h3>Fonctionnalités du composant :</h3>
        <ul>
            <li>Affichage des 3 meilleures équipes du power ranking</li>
            <li>Logos des équipes (si disponibles)</li>
            <li>Statistiques principales (Points, Victoires, Défaites)</li>
            <li>Évolution du classement (hausse/baisse/stable)</li>
            <li>Design responsive et moderne</li>
            <li>Effets visuels au survol</li>
        </ul>
        
        <h3>Pour l'utiliser dans vos pages :</h3>
        <pre style="background: #333; color: #fff; padding: 15px; border-radius: 5px; overflow-x: auto;">
// 1. Définir le chemin de la base de données
$DatabaseFile = "LHSQC-STHS.db";

// 2. Inclure le composant
include "components/PowerRanking.php";
        </pre>
    </div>
</div>

<?php include "Footer.php"; ?> 