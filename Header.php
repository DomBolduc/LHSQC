<?php  
require_once "STHSSetting.php"; 
require_once("helperTool.php");
?>


<!DOCTYPE html>

<html lang="en" data-theme="light">

<head>

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
    
    <!-- 5. Utilitaires CSS -->
    <link href="css/utilities/utilities.css" rel="stylesheet" type="text/css" />
    <link href="css/utilities/hockey-utilities.css" rel="stylesheet" type="text/css" />
    
    <!-- ========================================
         THÈMES CSS - PHASE 5
         ======================================== -->
    <!-- 5. Thème clair (par défaut) -->
    <link href="css/themes/theme-light.css" rel="stylesheet" type="text/css" />
    
    <!-- 6. Thème sombre -->
    <link href="css/themes/theme-dark.css" rel="stylesheet" type="text/css" />
    
    <!-- ========================================
         CSS EXISTANTS (COMPATIBILITÉ)
         ======================================== -->
    <link href="STHSMain.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />

    <!-- Google Fonts Roboto -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,700italic,700,400italic' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.min.js" integrity="sha256-Fb0zP4jE3JHqu+IBB9YktLcSjI1Zc6J2b6gTjB0LpoM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">  


    <link href="STHSMain-CSSOverwrite.css" rel="stylesheet" type="text/css" />
    <link href="css/nhlColors.css" rel="stylesheet" type="text/css" />
    <link href="css/modern-tabs.css" rel="stylesheet" type="text/css" />
    <link href="css/team-leaders-modern.css" rel="stylesheet" type="text/css" />

    <script src="js/db2json.js"    type="text/javascript"></script>
    <script src="js/lhsqc_new.js"    type="text/javascript"></script>

    <!-- ========================================
         SCRIPT DE BASCULE DE THÈME
         ======================================== -->
    <script>
        // Fonction pour basculer entre les thèmes
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            // Changer l'attribut data-theme
            html.setAttribute('data-theme', newTheme);
            
            // Sauvegarder la préférence
            localStorage.setItem('theme', newTheme);
            
            // Mettre à jour l'icône du bouton
            updateThemeIcon(newTheme);
            
            // Ajouter une classe pour l'animation de transition
            document.body.classList.add('theme-transition');
            setTimeout(() => {
                document.body.classList.remove('theme-transition');
            }, 300);
        }
        
        // Fonction pour mettre à jour l'icône
        function updateThemeIcon(theme) {
            const themeToggle = document.getElementById('theme-toggle');
            if (themeToggle) {
                const icon = themeToggle.querySelector('i');
                if (icon) {
                    icon.className = theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
                }
                themeToggle.setAttribute('title', theme === 'dark' ? 'Passer au thème clair' : 'Passer au thème sombre');
            }
        }
        
        // Fonction pour initialiser le thème
        function initTheme() {
            // Récupérer la préférence sauvegardée ou utiliser la préférence système
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            let theme = 'light'; // Par défaut
            
            if (savedTheme) {
                theme = savedTheme;
            } else if (prefersDark) {
                theme = 'dark';
            }
            
            // Appliquer le thème
            document.documentElement.setAttribute('data-theme', theme);
            updateThemeIcon(theme);
        }
        
        // Initialiser le thème au chargement
        document.addEventListener('DOMContentLoaded', initTheme);
        
        // Écouter les changements de préférence système
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (!localStorage.getItem('theme')) {
                const newTheme = e.matches ? 'dark' : 'light';
                document.documentElement.setAttribute('data-theme', newTheme);
                updateThemeIcon(newTheme);
            }
        });
    </script>

    <style>
        /* Styles pour le bouton de bascule de thème */
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background: var(--color-primary);
            color: var(--color-white);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            box-shadow: var(--shadow-lg);
            transition: all var(--transition-fast);
            display: none; /* DÉSACTIVÉ TEMPORAIREMENT */
            align-items: center;
            justify-content: center;
        }
        
        .theme-toggle:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-xl);
        }
        
        .theme-toggle:focus {
            outline: none;
            box-shadow: var(--focus-ring);
        }
        
        /* Animation de transition de thème */
        .theme-transition {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        /* Responsive pour le bouton */
        @media (max-width: 768px) {
            .theme-toggle {
                top: 10px;
                right: 10px;
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>

<body>
    <!-- ========================================
         BOUTON DE BASCULE DE THÈME
         ======================================== -->
    <button id="theme-toggle" class="theme-toggle" onclick="toggleTheme()" title="Passer au thème sombre">
        <i class="fas fa-moon"></i>
    </button>
</body>
</html>