# 🏒 LHSQC - Système CSS Moderne - Phase 3

## 📋 **Vue d'ensemble**

Cette phase introduit un système de composants CSS moderne et responsive pour le site de hockey LHSQC. Tous les composants sont optimisés pour mobile-first et utilisent les variables CSS définies dans `variables.css`.

## 🎯 **Composants disponibles**

### **1. Tables (`tables.css`)**
Système de tableaux moderne pour les statistiques de hockey.

#### **Classes de base :**
```html
<table class="table">
  <thead>
    <tr>
      <th class="col-rank">#</th>
      <th class="col-team">Équipe</th>
      <th class="col-number">PJ</th>
      <th class="col-number">PTS</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="col-rank">1</td>
      <td class="col-team team-name">Canadiens</td>
      <td class="col-number">82</td>
      <td class="col-number">105</td>
    </tr>
  </tbody>
</table>
```

#### **Variantes :**
- `.table--stats` : Tableau compact pour statistiques
- `.table--standings` : Tableau pour classements
- `.table--compact` : Version compacte
- `.table--sortable` : Avec tri

#### **Classes spécialisées :**
- `.col-rank` : Colonne de rang
- `.col-team` : Colonne d'équipe
- `.col-number` : Colonne numérique
- `.col-percentage` : Colonne de pourcentage
- `.col-action` : Colonne d'action

### **2. Buttons (`buttons.css`)**
Système de boutons moderne avec nombreuses variantes.

#### **Classes de base :**
```html
<button class="btn btn--primary">Bouton Principal</button>
<a href="#" class="btn btn--secondary">Bouton Secondaire</a>
```

#### **Variantes de couleur :**
- `.btn--primary` : Bouton principal (bleu)
- `.btn--secondary` : Bouton secondaire (gris)
- `.btn--success` : Bouton succès (vert)
- `.btn--danger` : Bouton danger (rouge)
- `.btn--warning` : Bouton avertissement (orange)
- `.btn--info` : Bouton info (bleu clair)

#### **Variantes outline :**
- `.btn--outline-primary`
- `.btn--outline-secondary`
- `.btn--outline-success`
- `.btn--outline-danger`

#### **Tailles :**
- `.btn--sm` : Petit
- `.btn--lg` : Grand
- `.btn--xl` : Très grand

#### **Boutons spécialisés hockey :**
- `.btn--team` : Style équipe avec gradient
- `.btn--player` : Style joueur
- `.btn--stats` : Style statistiques

#### **Boutons avec icônes :**
```html
<button class="btn btn--icon btn--primary">
  <svg class="icon">...</svg>
</button>
```

### **3. Navigation (`navigation.css`)**
Système de navigation moderne et responsive.

#### **Navigation de base :**
```html
<nav class="nav nav--horizontal">
  <ul class="nav">
    <li class="nav__item">
      <a href="#" class="nav__link nav__link--active">Accueil</a>
    </li>
    <li class="nav__item">
      <a href="#" class="nav__link">Équipes</a>
    </li>
  </ul>
</nav>
```

#### **Navigation avec dropdown :**
```html
<li class="nav__item nav__dropdown">
  <a href="#" class="nav__link nav__dropdown-toggle">Statistiques</a>
  <ul class="nav__dropdown-menu">
    <li><a href="#" class="nav__dropdown-item">Joueurs</a></li>
    <li><a href="#" class="nav__dropdown-item">Équipes</a></li>
  </ul>
</li>
```

#### **Variantes :**
- `.nav--horizontal` : Navigation horizontale
- `.nav--vertical` : Navigation verticale
- `.nav--tabs` : Navigation avec onglets
- `.nav--pills` : Navigation avec pills
- `.nav--hockey` : Style spécialisé hockey

#### **Breadcrumbs :**
```html
<nav class="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb__item">
      <a href="#" class="breadcrumb__link">Accueil</a>
    </li>
    <li class="breadcrumb__item">
      <a href="#" class="breadcrumb__link">Équipes</a>
    </li>
    <li class="breadcrumb__item breadcrumb__item--active">
      <span class="breadcrumb__link">Canadiens</span>
    </li>
  </ol>
</nav>
```

#### **Pagination :**
```html
<nav class="pagination">
  <ul class="pagination">
    <li class="pagination__item">
      <a href="#" class="pagination__link pagination__link--prev">Précédent</a>
    </li>
    <li class="pagination__item">
      <a href="#" class="pagination__link pagination__link--active">1</a>
    </li>
    <li class="pagination__item">
      <a href="#" class="pagination__link">2</a>
    </li>
    <li class="pagination__item">
      <a href="#" class="pagination__link pagination__link--next">Suivant</a>
    </li>
  </ul>
</nav>
```

### **4. Cards (`cards.css`)**
Système de cartes moderne pour afficher les informations.

#### **Carte de base :**
```html
<div class="card">
  <div class="card__header">
    <h3 class="card__title">Titre de la carte</h3>
    <p class="card__subtitle">Sous-titre</p>
  </div>
  <div class="card__body">
    <div class="card__content">
      Contenu de la carte
    </div>
  </div>
  <div class="card__footer">
    Actions
  </div>
</div>
```

#### **Carte joueur :**
```html
<div class="card card--player">
  <div class="card__header">
    <img src="player.jpg" alt="Joueur" class="card__avatar">
    <div class="card__info">
      <h3 class="card__name">Connor McDavid</h3>
      <p class="card__position">Centre</p>
      <p class="card__team">Edmonton Oilers</p>
    </div>
  </div>
  <div class="card__body">
    <!-- Statistiques du joueur -->
  </div>
</div>
```

#### **Carte équipe :**
```html
<div class="card card--team">
  <div class="card__header">
    <img src="team-logo.png" alt="Logo équipe" class="card__logo">
    <h3 class="card__title">Canadiens de Montréal</h3>
    <p class="card__subtitle">Division Atlantique</p>
  </div>
  <div class="card__body">
    <!-- Informations de l'équipe -->
  </div>
</div>
```

#### **Carte statistiques :**
```html
<div class="card card--stats">
  <div class="card__header">
    <h3 class="card__title">Buts marqués</h3>
  </div>
  <div class="card__body">
    <div class="card__value">45</div>
    <div class="card__label">Cette saison</div>
  </div>
</div>
```

#### **Carte avec liste :**
```html
<div class="card">
  <div class="card__body">
    <ul class="card__list">
      <li class="card__list-item">
        <span class="card__list-label">Buts</span>
        <span class="card__list-value">25</span>
      </li>
      <li class="card__list-item">
        <span class="card__list-label">Passes</span>
        <span class="card__list-value card__list-value--highlight">35</span>
      </li>
    </ul>
  </div>
</div>
```

#### **Carte avec actions :**
```html
<div class="card">
  <div class="card__body">
    Contenu de la carte
    <div class="card__actions">
      <a href="#" class="card__action card__action--primary">Voir profil</a>
      <a href="#" class="card__action">Statistiques</a>
    </div>
  </div>
</div>
```

## 📱 **Responsive Design**

Tous les composants sont optimisés pour mobile-first :

- **Desktop** : Affichage complet
- **Tablet (768px)** : Adaptations pour tablette
- **Mobile (480px)** : Version mobile optimisée

## 🎨 **Utilisation des variables CSS**

Tous les composants utilisent les variables CSS définies dans `variables.css` :

```css
/* Exemple d'utilisation */
.btn--primary {
  background: var(--color-primary);
  color: var(--color-white);
  padding: var(--spacing-3) var(--spacing-6);
  border-radius: var(--border-radius-md);
  font-size: var(--font-size-sm);
  font-weight: var(--font-weight-medium);
}
```

## 🔧 **Migration progressive**

Pour migrer progressivement vers ces nouveaux composants :

1. **Remplacez les classes existantes** par les nouvelles
2. **Testez sur mobile** à chaque modification
3. **Gardez la compatibilité** avec l'existant
4. **Utilisez les variantes** pour personnaliser

## 📚 **Exemples d'utilisation**

### **Tableau de classement :**
```html
<div class="table-container">
  <table class="table table--standings table--sortable">
    <thead>
      <tr>
        <th class="col-rank">#</th>
        <th class="col-team">Équipe</th>
        <th class="col-number">PJ</th>
        <th class="col-number">PTS</th>
        <th class="col-percentage">%</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="col-rank">1</td>
        <td class="col-team team-name playoff-spot">Canadiens</td>
        <td class="col-number">82</td>
        <td class="col-number">105</td>
        <td class="col-percentage">.640</td>
      </tr>
    </tbody>
  </table>
</div>
```

### **Navigation principale :**
```html
<nav class="nav nav--hockey">
  <ul class="nav nav--horizontal">
    <li class="nav__item">
      <a href="#" class="nav__link nav__link--active">Accueil</a>
    </li>
    <li class="nav__item nav__dropdown">
      <a href="#" class="nav__link nav__dropdown-toggle">Équipes</a>
      <ul class="nav__dropdown-menu">
        <li><a href="#" class="nav__dropdown-item">Pro</a></li>
        <li><a href="#" class="nav__dropdown-item">Farm</a></li>
      </ul>
    </li>
    <li class="nav__item">
      <a href="#" class="nav__link">Statistiques</a>
    </li>
  </ul>
</nav>
```

### **Grille de joueurs :**
```html
<div class="grid grid--3-cols">
  <div class="card card--player">
    <div class="card__header">
      <img src="player1.jpg" alt="Joueur" class="card__avatar">
      <div class="card__info">
        <h3 class="card__name">Connor McDavid</h3>
        <p class="card__position">Centre</p>
        <p class="card__team">Edmonton Oilers</p>
      </div>
    </div>
    <div class="card__body">
      <ul class="card__list">
        <li class="card__list-item">
          <span class="card__list-label">Buts</span>
          <span class="card__list-value">25</span>
        </li>
        <li class="card__list-item">
          <span class="card__list-label">Passes</span>
          <span class="card__list-value">35</span>
        </li>
      </ul>
    </div>
    <div class="card__footer">
      <div class="card__actions">
        <a href="#" class="card__action card__action--primary">Profil</a>
        <a href="#" class="card__action">Stats</a>
      </div>
    </div>
  </div>
</div>
```

## 🚀 **Prochaines étapes**

- **Phase 4** : Composants avancés (modales, formulaires, etc.)
- **Phase 5** : Thèmes et personnalisation
- **Phase 6** : Optimisation et performance

---

**Note :** Ces composants sont conçus pour être utilisés avec Bootstrap existant. Ils peuvent coexister sans conflit. 