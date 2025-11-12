# Utilitaires CSS - LHSQC

## 📋 Vue d'ensemble

Ce système d'utilitaires CSS permet un développement rapide et cohérent du site de hockey LHSQC.

## 🎨 Utilitaires de base

### Couleurs

#### Couleurs de fond
```css
.bg-primary          /* Couleur primaire */
.bg-primary-light    /* Couleur primaire claire */
.bg-primary-dark     /* Couleur primaire foncée */
.bg-secondary        /* Couleur secondaire */
.bg-tertiary         /* Couleur tertiaire */
.bg-success          /* Couleur succès */
.bg-warning          /* Couleur avertissement */
.bg-danger           /* Couleur danger */
.bg-info             /* Couleur info */
.bg-white            /* Blanc */
.bg-black            /* Noir */
```

#### Couleurs de texte
```css
.text-primary        /* Texte couleur primaire */
.text-secondary      /* Texte couleur secondaire */
.text-tertiary       /* Texte couleur tertiaire */
.text-success        /* Texte succès */
.text-warning        /* Texte avertissement */
.text-danger         /* Texte danger */
.text-info           /* Texte info */
.text-white          /* Texte blanc */
.text-black          /* Texte noir */
```

#### Couleurs de bordure
```css
.border-primary      /* Bordure primaire */
.border-secondary    /* Bordure secondaire */
.border-success      /* Bordure succès */
.border-warning      /* Bordure avertissement */
.border-danger       /* Bordure danger */
.border-info         /* Bordure info */
```

### Espacement

#### Padding
```css
.p-0, .p-1, .p-2, .p-3, .p-4, .p-5, .p-6, .p-8, .p-10, .p-12
.px-0, .px-1, .px-2, .px-3, .px-4, .px-5, .px-6  /* Horizontal */
.py-0, .py-1, .py-2, .py-3, .py-4, .py-5, .py-6  /* Vertical */
```

#### Margin
```css
.m-0, .m-1, .m-2, .m-3, .m-4, .m-5, .m-6, .m-8, .m-10, .m-12
.mx-0, .mx-1, .mx-2, .mx-3, .mx-4, .mx-5, .mx-6, .mx-auto  /* Horizontal */
.my-0, .my-1, .my-2, .my-3, .my-4, .my-5, .my-6  /* Vertical */
```

### Tailles

#### Largeur
```css
.w-full             /* 100% */
.w-auto             /* Auto */
.w-fit              /* Fit content */
.w-max              /* Max content */
.w-min              /* Min content */
.w-1/2              /* 50% */
.w-1/3              /* 33.333% */
.w-2/3              /* 66.667% */
.w-1/4              /* 25% */
.w-3/4              /* 75% */
```

#### Hauteur
```css
.h-full             /* 100% */
.h-auto             /* Auto */
.h-fit              /* Fit content */
.h-screen           /* 100vh */
```

### Display et Flexbox

#### Display
```css
.block              /* display: block */
.inline             /* display: inline */
.inline-block       /* display: inline-block */
.flex               /* display: flex */
.inline-flex        /* display: inline-flex */
.grid               /* display: grid */
.inline-grid        /* display: inline-grid */
.hidden             /* display: none */
```

#### Flexbox
```css
.flex-row           /* flex-direction: row */
.flex-col           /* flex-direction: column */
.flex-wrap          /* flex-wrap: wrap */
.flex-nowrap        /* flex-wrap: nowrap */

.justify-start      /* justify-content: flex-start */
.justify-end        /* justify-content: flex-end */
.justify-center     /* justify-content: center */
.justify-between    /* justify-content: space-between */
.justify-around     /* justify-content: space-around */
.justify-evenly     /* justify-content: space-evenly */

.items-start        /* align-items: flex-start */
.items-end          /* align-items: flex-end */
.items-center       /* align-items: center */
.items-baseline     /* align-items: baseline */
.items-stretch      /* align-items: stretch */

.flex-1             /* flex: 1 1 0% */
.flex-auto          /* flex: 1 1 auto */
.flex-initial       /* flex: 0 1 auto */
.flex-none          /* flex: none */
```

### Texte

#### Alignement
```css
.text-left          /* text-align: left */
.text-center        /* text-align: center */
.text-right         /* text-align: right */
.text-justify       /* text-align: justify */
```

#### Tailles
```css
.text-xs            /* Extra small */
.text-sm            /* Small */
.text-base          /* Base */
.text-lg            /* Large */
.text-xl            /* Extra large */
.text-2xl           /* 2x large */
.text-3xl           /* 3x large */
```

#### Poids
```css
.font-light         /* font-weight: 300 */
.font-normal        /* font-weight: 400 */
.font-medium        /* font-weight: 500 */
.font-semibold      /* font-weight: 600 */
.font-bold          /* font-weight: 700 */
.font-extrabold     /* font-weight: 800 */
```

#### Transformations
```css
.uppercase          /* text-transform: uppercase */
.lowercase          /* text-transform: lowercase */
.capitalize         /* text-transform: capitalize */
.underline          /* text-decoration: underline */
.no-underline       /* text-decoration: none */
```

### Bordures

#### Largeurs
```css
.border             /* border-width: 1px */
.border-0           /* border-width: 0 */
.border-2           /* border-width: 2px */
.border-4           /* border-width: 4px */
.border-8           /* border-width: 8px */

.border-t           /* border-top-width: 1px */
.border-r           /* border-right-width: 1px */
.border-b           /* border-bottom-width: 1px */
.border-l           /* border-left-width: 1px */
```

#### Rayons
```css
.rounded-none       /* border-radius: 0 */
.rounded-sm         /* border-radius: small */
.rounded            /* border-radius: medium */
.rounded-md         /* border-radius: medium */
.rounded-lg         /* border-radius: large */
.rounded-xl         /* border-radius: extra large */
.rounded-2xl        /* border-radius: 2x large */
.rounded-full       /* border-radius: full */
```

### Position

```css
.relative           /* position: relative */
.absolute           /* position: absolute */
.fixed              /* position: fixed */
.sticky             /* position: sticky */

.top-0              /* top: 0 */
.right-0            /* right: 0 */
.bottom-0           /* bottom: 0 */
.left-0             /* left: 0 */

.z-0, .z-10, .z-20, .z-30, .z-40, .z-50  /* z-index */
```

### Visibilité et Opacité

```css
.visible            /* visibility: visible */
.invisible          /* visibility: hidden */

.opacity-0          /* opacity: 0 */
.opacity-25         /* opacity: 0.25 */
.opacity-50         /* opacity: 0.5 */
.opacity-75         /* opacity: 0.75 */
.opacity-100        /* opacity: 1 */
```

### Curseur

```css
.cursor-auto        /* cursor: auto */
.cursor-default     /* cursor: default */
.cursor-pointer     /* cursor: pointer */
.cursor-wait        /* cursor: wait */
.cursor-text        /* cursor: text */
.cursor-move        /* cursor: move */
.cursor-not-allowed /* cursor: not-allowed */
```

### Transitions

```css
.transition         /* transition: all fast */
.transition-fast    /* transition: all fast */
.transition-medium  /* transition: all medium */
.transition-slow    /* transition: all slow */
```

## 🏒 Utilitaires Hockey

### Équipes

#### Classes d'équipes
```css
.team-montreal      /* Canadiens de Montréal */
.team-toronto       /* Maple Leafs de Toronto */
.team-boston        /* Bruins de Boston */
.team-detroit       /* Red Wings de Détroit */
.team-chicago       /* Blackhawks de Chicago */
```

#### Couleurs d'équipes
```css
.bg-team-primary    /* Fond couleur primaire équipe */
.bg-team-secondary  /* Fond couleur secondaire équipe */
.bg-team-accent     /* Fond couleur accent équipe */

.text-team-primary  /* Texte couleur primaire équipe */
.text-team-secondary /* Texte couleur secondaire équipe */
.text-team-accent   /* Texte couleur accent équipe */

.border-team-primary /* Bordure couleur primaire équipe */
.border-team-secondary /* Bordure couleur secondaire équipe */
.border-team-accent /* Bordure couleur accent équipe */
```

### Positions

#### Classes de positions
```css
.position-center    /* Centre */
.position-wing      /* Ailier */
.position-defense   /* Défenseur */
.position-goalie    /* Gardien */
```

#### Couleurs de positions
```css
.bg-position-center   /* Fond centre */
.bg-position-wing     /* Fond ailier */
.bg-position-defense  /* Fond défenseur */
.bg-position-goalie   /* Fond gardien */

.text-position-center   /* Texte centre */
.text-position-wing     /* Texte ailier */
.text-position-defense  /* Texte défenseur */
.text-position-goalie   /* Texte gardien */
```

### Statuts

#### Classes de statuts
```css
.status-active      /* Actif */
.status-inactive    /* Inactif */
.status-injured     /* Blessé */
.status-suspended   /* Suspendu */
.status-traded      /* Échangé */
```

#### Couleurs de statuts
```css
.bg-status-active     /* Fond actif */
.bg-status-inactive   /* Fond inactif */
.bg-status-injured    /* Fond blessé */
.bg-status-suspended  /* Fond suspendu */
.bg-status-traded     /* Fond échangé */

.text-status-active     /* Texte actif */
.text-status-inactive   /* Texte inactif */
.text-status-injured    /* Texte blessé */
.text-status-suspended  /* Texte suspendu */
.text-status-traded     /* Texte échangé */
```

### Événements

#### Classes d'événements
```css
.event-goal         /* But */
.event-assist       /* Passe décisive */
.event-penalty      /* Pénalité */
.event-powerplay    /* Avantage numérique */
.event-shorthanded  /* Infériorité numérique */
```

#### Couleurs d'événements
```css
.bg-event-goal        /* Fond but */
.bg-event-assist      /* Fond passe décisive */
.bg-event-penalty     /* Fond pénalité */
.bg-event-powerplay   /* Fond avantage numérique */
.bg-event-shorthanded /* Fond infériorité numérique */

.text-event-goal        /* Texte but */
.text-event-assist      /* Texte passe décisive */
.text-event-penalty     /* Texte pénalité */
.text-event-powerplay   /* Texte avantage numérique */
.text-event-shorthanded /* Texte infériorité numérique */
```

### Divisions

#### Classes de divisions
```css
.division-atlantic     /* Division Atlantique */
.division-metropolitan /* Division Métropolitaine */
.division-central      /* Division Centrale */
.division-pacific      /* Division Pacifique */
```

#### Couleurs de divisions
```css
.bg-division-atlantic     /* Fond Atlantique */
.bg-division-metropolitan /* Fond Métropolitaine */
.bg-division-central      /* Fond Centrale */
.bg-division-pacific      /* Fond Pacifique */

.text-division-atlantic     /* Texte Atlantique */
.text-division-metropolitan /* Texte Métropolitaine */
.text-division-central      /* Texte Centrale */
.text-division-pacific      /* Texte Pacifique */
```

### Statistiques

```css
.stat-positive      /* Statistique positive */
.stat-negative      /* Statistique négative */
.stat-neutral       /* Statistique neutre */
.stat-leader        /* Leader statistique */
.stat-record        /* Record */
```

### Jeu

#### États de jeu
```css
.game-live          /* Jeu en direct */
.game-finished      /* Jeu terminé */
.game-scheduled     /* Jeu programmé */
.game-postponed     /* Jeu reporté */
```

#### Scores
```css
.score-winning      /* Score gagnant */
.score-losing       /* Score perdant */
.score-tied         /* Score égalité */
```

### Animations

```css
.slide-in           /* Animation de glissement */
.bounce             /* Animation de rebond */
```

## 📱 Utilitaires Responsive

### Breakpoints
- **sm**: 640px et plus
- **md**: 768px et plus  
- **lg**: 1024px et plus
- **xl**: 1280px et plus

### Exemples
```css
.sm:hidden          /* Masqué sur small et plus */
.md:flex            /* Flex sur medium et plus */
.lg:grid            /* Grid sur large et plus */
.xl:block           /* Block sur extra large et plus */
```

## ♿ Accessibilité

### Mode contraste élevé
```css
/* Appliqué automatiquement avec @media (prefers-contrast: high) */
```

### Mode mouvement réduit
```css
/* Appliqué automatiquement avec @media (prefers-reduced-motion: reduce) */
```

## 💡 Exemples d'utilisation

### Carte de joueur
```html
<div class="card p-4 bg-white border border-secondary rounded-lg">
  <div class="flex items-center justify-between mb-3">
    <h3 class="text-lg font-semibold text-primary">Connor McDavid</h3>
    <span class="position-center px-2 py-1 rounded text-sm">C</span>
  </div>
  <div class="stat-positive text-xl font-bold">97</div>
  <div class="text-secondary text-sm">Points</div>
</div>
```

### État de jeu
```html
<div class="game-live px-3 py-2 rounded text-center">
  <span class="text-white font-semibold">EN DIRECT</span>
</div>
```

### Statistiques d'équipe
```html
<div class="team-montreal bg-team-primary text-team-accent p-4 rounded">
  <h2 class="text-xl font-bold">Canadiens de Montréal</h2>
  <div class="stat-leader">1er - Division Atlantique</div>
</div>
```

## 🔧 Personnalisation

### Ajouter une nouvelle équipe
```css
.team-nouvelle-equipe {
  --team-primary: #couleur-primaire;
  --team-secondary: #couleur-secondaire;
  --team-accent: #couleur-accent;
}
```

### Créer un nouvel utilitaire
```css
.mon-utilitaire {
  /* Propriétés CSS */
}
```

## 📚 Bonnes pratiques

1. **Utiliser les classes utilitaires** plutôt que du CSS inline
2. **Combiner les classes** pour créer des styles complexes
3. **Respecter la hiérarchie** des couleurs et espacements
4. **Tester la responsivité** avec les breakpoints
5. **Penser à l'accessibilité** avec les modes contraste et mouvement réduit 