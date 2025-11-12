<?php  
require_once "STHSSetting.php"; 
require_once("helperTool.php");
?>


<!DOCTYPE html>

<html lang="en">

<head>
<script>
document.addEventListener("DOMContentLoaded", function() {
  // Vérifie si Font Awesome est chargé
  const faTest = window.getComputedStyle(document.createElement("i"), null);
  const hasFA = faTest.fontFamily && faTest.fontFamily.includes("Font Awesome");

  if (hasFA) {
    console.log("%c✅ Font Awesome est bien chargé (v6.6.0 détecté)", "color:green;font-weight:bold;");
  } else {
    console.warn("⚠️ Font Awesome ne semble pas chargé ou est bloqué. Vérifie le lien CDN ou les versions multiples.");
  }

  // Test visuel : crée un cœur temporaire en haut de page
  const icon = document.createElement("i");
  icon.className = "fa-solid fa-heart";
  icon.style.cssText = "color:red;font-size:24px;position:fixed;top:10px;right:10px;z-index:9999;";
  document.body.appendChild(icon);
});
</script>

    <meta name="author" content="SBQC, Special Blend Production" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="author" content="Special Blend Production" />
    <meta name="Decription" content="<?php echo $LeagueOwner . " - " . $MetaContent;?>" />

    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />

    <!-- ========================================
         NOUVEAUX CSS - PHASE 2 MIGRATION
         ======================================== -->
    <!-- 1. Variables CSS (TOUJOURS EN PREMIER) -->
    <link href="css/variables.css" rel="stylesheet" type="text/css" />
    
    <!-- 2. Base CSS -->
    <link href="css/base/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/base/typography.css" rel="stylesheet" type="text/css" />
    <link href="css/base/layout.css" rel="stylesheet" type="text/css" />
    
    <!-- 2.5. Uniformisation typographique -->
    <link href="css/base/typography-unified.css" rel="stylesheet" type="text/css" />
    
    <!-- 3. Composants CSS -->
    <link href="css/components/tables.css" rel="stylesheet" type="text/css" />
    <link href="css/components/buttons.css" rel="stylesheet" type="text/css" />
    <link href="css/components/navigation.css" rel="stylesheet" type="text/css" />
    <link href="css/components/cards.css" rel="stylesheet" type="text/css" />
    
    <!-- 4. Composants avancés CSS -->
    <link href="css/components/modals.css" rel="stylesheet" type="text/css" />
    <link href="css/components/forms.css" rel="stylesheet" type="text/css" />
    <link href="css/components/alerts.css" rel="stylesheet" type="text/css" />
    
    <!-- 4.5. Composants spécialisés -->
    <link href="css/components/games-scroller.css" rel="stylesheet" type="text/css" />
    <link href="css/components/footer.css" rel="stylesheet" type="text/css" />

    <!-- 4.6. Styles pour données vides / saison morte -->
    <style>
    .off-season-notice {
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        border: 1px solid #2196f3;
        border-radius: 8px;
        padding: 1rem;
        margin: 1rem 0;
        color: #1565c0;
        font-size: 0.9rem;
    }

    .off-season-notice i {
        color: #2196f3;
        margin-right: 0.5rem;
    }

    .off-season-notice strong {
        color: #0d47a1;
    }

    .empty-stats-row {
        opacity: 0.7;
        font-style: italic;
    }

    .empty-stats-row:hover {
        opacity: 1;
        background-color: rgba(0, 123, 255, 0.1);
    }
    </style>
    
    <!-- 5. Utilitaires CSS -->
    <link href="css/utilities/utilities.css" rel="stylesheet" type="text/css" />
    <link href="css/utilities/hockey-utilities.css" rel="stylesheet" type="text/css" />
    
    <!-- ========================================
         THÈME CSS - THÈME CLAIR UNIQUEMENT
         ======================================== -->
    <!-- Thème clair (par défaut) -->
    <link href="css/themes/theme-light.css" rel="stylesheet" type="text/css" />
    
    <!-- ========================================
      
    
    
    CSS EXISTANTS (COMPATIBILITÉ)
         ======================================== -->
    <link href="STHSMain.css" rel="stylesheet" type="text/css" />

    <!-- Google Fonts Roboto -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,700italic,700,400italic' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.min.js" integrity="sha256-Fb0zP4jE3JHqu+IBB9YktLcSjI1Zc6J2b6gTjB0LpoM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>


    <link href="/assets/fontawesome/css/all.min.css" rel="stylesheet">


    <link href="STHSMain-CSSOverwrite.css" rel="stylesheet" type="text/css" />
    <link href="css/nhlColors.css" rel="stylesheet" type="text/css" />
    <link href="css/modern-tabs.css" rel="stylesheet" type="text/css" />
    <link href="css/team-leaders-modern.css" rel="stylesheet" type="text/css" />

    <!-- Tableau Roster mobile scrollable -->
    <link href="css/roster-mobile-scroll.css" rel="stylesheet" type="text/css" />

    <!-- Cardbook responsive pour mobile -->
    <link href="css/cardbook-responsive.css" rel="stylesheet" type="text/css" />

    <!-- Navigation onglets ProTeam mobile en 2 lignes -->
    <link href="css/proteam-tabs-mobile.css" rel="stylesheet" type="text/css" />

    <!-- Onglet Lines responsive mobile -->
    <link href="css/lines-mobile-responsive.css" rel="stylesheet" type="text/css" />

    <script src="js/db2json.js"    type="text/javascript"></script>
    <script src="js/lhsqc_new.js"    type="text/javascript"></script>

    <!-- Script pour tableaux Roster mobile -->
    <script src="js/roster-mobile-scroll.js" defer></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Script pour réparer le dropdown des joueurs -->
    <script src="js/player-dropdown-fix.js" defer></script>




</head>

<body>
</body>
</html>