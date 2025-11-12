/* ========================================
   PLAYER DROPDOWN FIX
   ========================================
   
   Script pour réparer le menu dropdown de sélection
   des joueurs dans PlayerReport.php et GoalieReport.php
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    console.log('Player Dropdown Fix: Script loaded');

    // Diagnostic Bootstrap
    if (typeof bootstrap !== 'undefined') {
        console.log('Player Dropdown Fix: Bootstrap is available');
    } else {
        console.log('Player Dropdown Fix: Bootstrap not available, will use fallback');
    }

    // Attendre que Bootstrap soit complètement chargé
    setTimeout(function() {
        initializePlayerDropdown();
    }, 200);

    // Réessayer après un délai plus long si nécessaire
    setTimeout(function() {
        const dropdownButton = document.getElementById('playerDropdown');
        if (dropdownButton && !dropdownButton.hasAttribute('data-dropdown-initialized')) {
            console.log('Player Dropdown Fix: Retrying initialization...');
            initializePlayerDropdown();
        }
    }, 1000);
});

function initializePlayerDropdown() {
    const dropdownButton = document.getElementById('playerDropdown');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    if (!dropdownButton || !dropdownMenu) {
        console.log('Player Dropdown Fix: Elements not found');
        return;
    }

    // Éviter la double initialisation
    if (dropdownButton.hasAttribute('data-dropdown-initialized')) {
        console.log('Player Dropdown Fix: Already initialized');
        return;
    }

    console.log('Player Dropdown Fix: Elements found, initializing...');

    // Méthode 1: Forcer Bootstrap à fonctionner
    if (typeof bootstrap !== 'undefined') {
        try {
            // Vérifier si le dropdown existe déjà
            let dropdown = bootstrap.Dropdown.getInstance(dropdownButton);

            if (dropdown) {
                console.log('Player Dropdown Fix: Bootstrap dropdown exists, forcing it to work');
            } else {
                console.log('Player Dropdown Fix: Creating new Bootstrap dropdown');
                dropdown = new bootstrap.Dropdown(dropdownButton);
            }

            // Forcer l'événement click à fonctionner avec Bootstrap
            dropdownButton.addEventListener('click', function(event) {
                console.log('Player Dropdown Fix: Click intercepted, forcing Bootstrap toggle');
                event.preventDefault();
                event.stopPropagation();

                // Utiliser la méthode Bootstrap pour toggle
                dropdown.toggle();
            }, true); // Utiliser capture pour intercepter avant autres handlers

            console.log('Player Dropdown Fix: Bootstrap dropdown forced to work');
            dropdownButton.setAttribute('data-dropdown-initialized', 'true');
            return;

        } catch (error) {
            console.log('Player Dropdown Fix: Bootstrap method failed, using fallback', error);
        }
    }
    
    // Méthode 2: Fallback manuel si Bootstrap ne fonctionne pas
    let isOpen = false;

    // Fonction pour ouvrir/fermer le dropdown
    function toggleDropdown(event) {
        console.log('Player Dropdown Fix: Toggle function called', event.type);
        event.preventDefault();
        event.stopPropagation();

        if (isOpen) {
            console.log('Player Dropdown Fix: Closing dropdown');
            closeDropdown();
        } else {
            console.log('Player Dropdown Fix: Opening dropdown');
            openDropdown();
        }
    }
    
    function openDropdown() {
        dropdownMenu.classList.add('show');
        dropdownButton.setAttribute('aria-expanded', 'true');
        isOpen = true;
        
        // Positionner le menu
        const rect = dropdownButton.getBoundingClientRect();
        dropdownMenu.style.position = 'absolute';
        dropdownMenu.style.top = '100%';
        dropdownMenu.style.left = '0';
        dropdownMenu.style.zIndex = '9999';
        dropdownMenu.style.display = 'block';
        
        console.log('Player Dropdown Fix: Dropdown opened');
    }
    
    function closeDropdown() {
        dropdownMenu.classList.remove('show');
        dropdownButton.setAttribute('aria-expanded', 'false');
        isOpen = false;
        dropdownMenu.style.display = '';
        
        console.log('Player Dropdown Fix: Dropdown closed');
    }
    
    // Event listeners avec diagnostic
    console.log('Player Dropdown Fix: Adding click event listener');

    // Supprimer les anciens event listeners s'ils existent
    dropdownButton.removeEventListener('click', toggleDropdown);

    // Ajouter le nouvel event listener
    dropdownButton.addEventListener('click', toggleDropdown, true); // Utiliser capture phase

    // Alternative: aussi écouter mousedown au cas où
    dropdownButton.addEventListener('mousedown', function(event) {
        console.log('Player Dropdown Fix: Mousedown detected');
        // Empêcher le comportement par défaut qui pourrait interférer
        event.preventDefault();
    });

    // Fermer le dropdown quand on clique ailleurs
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            if (isOpen) {
                console.log('Player Dropdown Fix: Closing dropdown - outside click');
                closeDropdown();
            }
        }
    });
    
    // Fermer le dropdown avec Escape
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && isOpen) {
            closeDropdown();
        }
    });
    
    // Améliorer l'accessibilité
    dropdownButton.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            toggleDropdown(event);
        } else if (event.key === 'ArrowDown' && isOpen) {
            event.preventDefault();
            const firstItem = dropdownMenu.querySelector('.dropdown-item');
            if (firstItem) {
                firstItem.focus();
            }
        }
    });
    
    // Navigation au clavier dans le menu
    const dropdownItems = dropdownMenu.querySelectorAll('.dropdown-item');
    dropdownItems.forEach((item, index) => {
        item.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowDown') {
                event.preventDefault();
                const nextItem = dropdownItems[index + 1];
                if (nextItem) {
                    nextItem.focus();
                } else {
                    dropdownItems[0].focus(); // Retour au début
                }
            } else if (event.key === 'ArrowUp') {
                event.preventDefault();
                const prevItem = dropdownItems[index - 1];
                if (prevItem) {
                    prevItem.focus();
                } else {
                    dropdownItems[dropdownItems.length - 1].focus(); // Aller à la fin
                }
            } else if (event.key === 'Escape') {
                event.preventDefault();
                closeDropdown();
                dropdownButton.focus();
            }
        });
    });
    
    // Test immédiat pour vérifier si le click fonctionne
    setTimeout(function() {
        console.log('Player Dropdown Fix: Testing click functionality...');

        // Simuler un click pour tester
        const testEvent = new MouseEvent('click', {
            bubbles: true,
            cancelable: true,
            view: window
        });

        // Vérifier si l'événement est bien attaché
        const listeners = getEventListeners ? getEventListeners(dropdownButton) : null;
        console.log('Player Dropdown Fix: Event listeners:', listeners);

        // Ajouter un event listener de secours avec une méthode différente
        dropdownButton.onclick = function(event) {
            console.log('Player Dropdown Fix: Onclick fallback triggered');
            toggleDropdown(event);
        };

    }, 100);

    console.log('Player Dropdown Fix: Manual dropdown initialized');
    dropdownButton.setAttribute('data-dropdown-initialized', 'true');
}

// Fonction pour diagnostiquer le dropdown
function diagnoseDropdown() {
    const dropdownButton = document.getElementById('playerDropdown');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    console.log('=== DIAGNOSTIC DROPDOWN ===');
    console.log('Button element:', dropdownButton);
    console.log('Menu element:', dropdownMenu);

    if (dropdownButton) {
        console.log('Button attributes:', dropdownButton.attributes);
        console.log('Button classes:', dropdownButton.className);
        console.log('Button data-bs-toggle:', dropdownButton.getAttribute('data-bs-toggle'));
        console.log('Button aria-expanded:', dropdownButton.getAttribute('aria-expanded'));

        // Vérifier les styles qui pourraient bloquer les clics
        const computedStyle = window.getComputedStyle(dropdownButton);
        console.log('Button pointer-events:', computedStyle.pointerEvents);
        console.log('Button position:', computedStyle.position);
        console.log('Button z-index:', computedStyle.zIndex);

        // Vérifier si Bootstrap a initialisé le dropdown
        if (typeof bootstrap !== 'undefined') {
            const bsDropdown = bootstrap.Dropdown.getInstance(dropdownButton);
            console.log('Bootstrap dropdown instance:', bsDropdown);
        }
    }

    if (dropdownMenu) {
        console.log('Menu classes:', dropdownMenu.className);
        console.log('Menu display:', window.getComputedStyle(dropdownMenu).display);
    }
    console.log('=== FIN DIAGNOSTIC ===');
}

// Fonction pour réinitialiser le dropdown si nécessaire
function reinitializePlayerDropdown() {
    console.log('Player Dropdown Fix: Reinitializing...');
    diagnoseDropdown();
    setTimeout(function() {
        initializePlayerDropdown();
    }, 50);
}

// Exposer les fonctions globalement pour debug
window.reinitializePlayerDropdown = reinitializePlayerDropdown;
window.diagnoseDropdown = diagnoseDropdown;
window.forceDropdownClick = function() {
    const dropdownButton = document.getElementById('playerDropdown');
    if (dropdownButton) {
        console.log('Force clicking dropdown button...');
        dropdownButton.click();
    }
};
window.testBootstrapDropdown = function() {
    const dropdownButton = document.getElementById('playerDropdown');
    if (dropdownButton && typeof bootstrap !== 'undefined') {
        const dropdown = bootstrap.Dropdown.getInstance(dropdownButton);
        if (dropdown) {
            console.log('Testing Bootstrap dropdown toggle...');
            dropdown.toggle();
        } else {
            console.log('No Bootstrap dropdown instance found');
        }
    }
};

// Réinitialiser après les changements AJAX ou de contenu
if (typeof MutationObserver !== 'undefined') {
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                const addedNodes = Array.from(mutation.addedNodes);
                const hasDropdown = addedNodes.some(node => 
                    node.nodeType === 1 && 
                    (node.id === 'playerDropdown' || node.querySelector('#playerDropdown'))
                );
                
                if (hasDropdown) {
                    console.log('Player Dropdown Fix: Dropdown detected in DOM changes');
                    reinitializePlayerDropdown();
                }
            }
        });
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
}

/* ========================================
   STYLES CSS POUR LE DROPDOWN
   ======================================== */

// Ajouter des styles CSS dynamiquement si nécessaire
function addDropdownStyles() {
    const existingStyles = document.getElementById('player-dropdown-fix-styles');
    if (existingStyles) return;
    
    const styles = document.createElement('style');
    styles.id = 'player-dropdown-fix-styles';
    styles.textContent = `
        /* Styles pour le dropdown des joueurs */
        .dropdown {
            position: relative !important;
            display: inline-block !important;
        }
        
        .dropdown-menu {
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            z-index: 9999 !important;
            display: none !important;
            min-width: 200px !important;
            max-height: 300px !important;
            overflow-y: auto !important;
            background-color: white !important;
            border: 1px solid rgba(0,0,0,.15) !important;
            border-radius: 0.375rem !important;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175) !important;
            margin-top: 2px !important;
        }
        
        .dropdown-menu.show {
            display: block !important;
        }
        
        .dropdown-item {
            display: block !important;
            width: 100% !important;
            padding: 0.25rem 1rem !important;
            clear: both !important;
            font-weight: 400 !important;
            color: #212529 !important;
            text-align: inherit !important;
            text-decoration: none !important;
            white-space: nowrap !important;
            background-color: transparent !important;
            border: 0 !important;
            cursor: pointer !important;
        }
        
        .dropdown-item:hover,
        .dropdown-item:focus {
            color: #1e2125 !important;
            background-color: #e9ecef !important;
            text-decoration: none !important;
        }
        
        .dropdown-toggle::after {
            display: inline-block !important;
            margin-left: 0.255em !important;
            vertical-align: 0.255em !important;
            content: "" !important;
            border-top: 0.3em solid !important;
            border-right: 0.3em solid transparent !important;
            border-bottom: 0 !important;
            border-left: 0.3em solid transparent !important;
        }
        
        /* Responsive pour mobile */
        @media (max-width: 768px) {
            .dropdown-menu {
                min-width: 250px !important;
                max-height: 250px !important;
                font-size: 14px !important;
            }
            
            .dropdown-item {
                padding: 0.5rem 1rem !important;
                font-size: 14px !important;
            }
        }
    `;
    
    document.head.appendChild(styles);
    console.log('Player Dropdown Fix: Styles added');
}

// Ajouter les styles au chargement
document.addEventListener('DOMContentLoaded', function() {
    addDropdownStyles();
});
