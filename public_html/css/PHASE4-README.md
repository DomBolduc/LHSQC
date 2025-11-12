# 🏒 LHSQC - Système CSS Moderne - Phase 4

## 📋 **Vue d'ensemble**

Cette phase introduit les composants avancés CSS pour le site de hockey LHSQC. Ces composants sont plus complexes et offrent des fonctionnalités avancées pour une expérience utilisateur moderne.

## 🎯 **Composants avancés disponibles**

### **1. Modales (`modals.css`)**
Système de modales moderne pour les popups et dialogues.

#### **Modale de base :**
```html
<div class="modal" id="myModal">
  <div class="modal__content">
    <div class="modal__header">
      <h3 class="modal__title">Titre de la modale</h3>
      <button class="modal__close">&times;</button>
    </div>
    <div class="modal__body">
      Contenu de la modale
    </div>
    <div class="modal__footer">
      <button class="btn btn--secondary">Annuler</button>
      <button class="btn btn--primary">Confirmer</button>
    </div>
  </div>
</div>
```

#### **Variantes de taille :**
- `.modal--small` : 400px max
- `.modal--medium` : 600px max
- `.modal--large` : 800px max
- `.modal--full` : 95% de l'écran

#### **Modales spécialisées hockey :**
- `.modal--player-profile` : Profil de joueur
- `.modal--trade` : Échange de joueurs
- `.modal--stats` : Statistiques détaillées

#### **Modales avec formulaires :**
```html
<div class="modal modal--form">
  <div class="modal__content">
    <div class="modal__header">
      <h3 class="modal__title">Modifier le joueur</h3>
      <button class="modal__close">&times;</button>
    </div>
    <div class="modal__body">
      <form class="form">
        <div class="form__group">
          <label class="form__label">Nom</label>
          <input type="text" class="form__input" />
        </div>
      </form>
    </div>
  </div>
</div>
```

#### **Modales de confirmation :**
```html
<div class="modal modal--confirm">
  <div class="modal__content">
    <div class="modal__body">
      <div class="modal__icon">⚠️</div>
      <p class="modal__message">Êtes-vous sûr de vouloir supprimer ce joueur ?</p>
    </div>
    <div class="modal__footer">
      <button class="btn btn--secondary">Annuler</button>
      <button class="btn btn--danger">Supprimer</button>
    </div>
  </div>
</div>
```

### **2. Formulaires (`forms.css`)**
Système de formulaires moderne et accessible.

#### **Formulaire de base :**
```html
<form class="form">
  <div class="form__group">
    <label class="form__label form__label--required">Nom du joueur</label>
    <input type="text" class="form__input" placeholder="Entrez le nom" />
  </div>
  
  <div class="form__row">
    <div class="form__col">
      <label class="form__label">Position</label>
      <select class="form__input form__select">
        <option>Centre</option>
        <option>Ailier</option>
        <option>Défenseur</option>
      </select>
    </div>
    <div class="form__col">
      <label class="form__label">Numéro</label>
      <input type="number" class="form__input" />
    </div>
  </div>
  
  <div class="form__group">
    <label class="form__label">Description</label>
    <textarea class="form__input form__textarea"></textarea>
  </div>
</form>
```

#### **Formulaires spécialisés hockey :**
- `.form--player-edit` : Édition de joueur
- `.form--trade` : Échange de joueurs
- `.form--lineup` : Composition d'équipe

#### **Formulaires avec validation :**
```html
<form class="form form--validation">
  <div class="form__group">
    <label class="form__label">Email</label>
    <input type="email" class="form__input" required />
    <div class="form__message form__message--error">
      <span class="form__message__icon">⚠️</span>
      Email invalide
    </div>
  </div>
</form>
```

#### **Formulaires avec icônes :**
```html
<div class="form__input-group">
  <input type="text" class="form__input" placeholder="Rechercher un joueur" />
  <span class="form__icon">🔍</span>
</div>
```

#### **Switches et checkboxes :**
```html
<label class="form__switch">
  <input type="checkbox" />
  <span class="form__switch__input"></span>
  Actif
</label>

<label class="form__checkbox">
  <input type="checkbox" />
  Accepter les conditions
</label>
```

#### **Upload de fichiers :**
```html
<div class="form__file">
  <input type="file" class="form__file__input" />
  <div class="form__file__label">
    <span class="form__file__icon">📁</span>
    <div class="form__file__text">
      <div class="form__file__text--primary">Cliquez pour sélectionner</div>
      <div class="form__file__text--secondary">ou glissez-déposez</div>
    </div>
  </div>
</div>
```

### **3. Alertes (`alerts.css`)**
Système d'alertes moderne pour les notifications.

#### **Alerte de base :**
```html
<div class="alert alert--success">
  <span class="alert__icon">✅</span>
  <div class="alert__content">
    <h4 class="alert__title">Succès !</h4>
    <p class="alert__message">Le joueur a été ajouté avec succès.</p>
  </div>
  <button class="alert__close">&times;</button>
</div>
```

#### **Variantes de couleur :**
- `.alert--success` : Succès (vert)
- `.alert--error` : Erreur (rouge)
- `.alert--warning` : Avertissement (orange)
- `.alert--info` : Information (bleu)
- `.alert--primary` : Primaire (bleu principal)

#### **Alertes spécialisées hockey :**
- `.alert--trade` : Échange de joueurs
- `.alert--injury` : Blessure de joueur
- `.alert--milestone` : Record ou accomplissement
- `.alert--game` : Information de match

#### **Alertes avec actions :**
```html
<div class="alert alert--warning alert--actionable">
  <span class="alert__icon">⚠️</span>
  <div class="alert__content">
    <h4 class="alert__title">Échange en attente</h4>
    <p class="alert__message">Un échange est en attente de confirmation.</p>
    <div class="alert__actions">
      <button class="alert__action">Voir détails</button>
      <button class="alert__action alert__action--primary">Confirmer</button>
    </div>
  </div>
</div>
```

#### **Alertes flottantes :**
```html
<div class="alert alert--floating alert--success">
  <span class="alert__icon">✅</span>
  <div class="alert__content">
    <h4 class="alert__title">Modification sauvegardée</h4>
  </div>
</div>
```

#### **Alertes avec timer :**
```html
<div class="alert alert--timer alert--info">
  <span class="alert__icon">⏰</span>
  <div class="alert__content">
    <h4 class="alert__title">Session expirée</h4>
    <p class="alert__message">Votre session expire dans 5 minutes.</p>
  </div>
</div>
```

## 📱 **Responsive Design**

Tous les composants avancés sont optimisés pour mobile-first :

- **Desktop** : Fonctionnalités complètes
- **Tablet (768px)** : Adaptations pour tablette
- **Mobile (480px)** : Version mobile optimisée

## 🎨 **Utilisation des variables CSS**

Tous les composants utilisent les variables CSS définies dans `variables.css` :

```css
/* Exemple d'utilisation */
.modal__content {
  background: var(--color-bg-primary);
  border-radius: var(--border-radius-lg);
  box-shadow: var(--shadow-xl);
  padding: var(--spacing-4);
}
```

## 🔧 **Exemples d'utilisation avancée**

### **Modale de profil joueur :**
```html
<div class="modal modal--player-profile">
  <div class="modal__content">
    <div class="modal__header">
      <h3 class="modal__title">Profil de Connor McDavid</h3>
      <button class="modal__close">&times;</button>
    </div>
    <div class="modal__body">
      <div class="card card--player">
        <div class="card__header">
          <img src="mcdavid.jpg" alt="McDavid" class="card__avatar">
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
              <span class="card__list-value">45</span>
            </li>
            <li class="card__list-item">
              <span class="card__list-label">Passes</span>
              <span class="card__list-value">67</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
```

### **Formulaire d'échange :**
```html
<form class="form form--trade">
  <div class="form__section">
    <h3 class="form__section__title">Équipe A</h3>
    <div class="form__row">
      <div class="form__col">
        <label class="form__label">Joueur à échanger</label>
        <select class="form__input form__select">
          <option>Connor McDavid</option>
        </select>
      </div>
      <div class="form__col">
        <label class="form__label">Compensation</label>
        <input type="text" class="form__input" placeholder="Choix de draft" />
      </div>
    </div>
  </div>
  
  <div class="form__section">
    <h3 class="form__section__title">Équipe B</h3>
    <div class="form__row">
      <div class="form__col">
        <label class="form__label">Joueur à recevoir</label>
        <select class="form__input form__select">
          <option>Nathan MacKinnon</option>
        </select>
      </div>
    </div>
  </div>
</form>
```

### **Système d'alertes complet :**
```html
<div class="alert-container">
  <div class="alert alert--trade alert--floating">
    <span class="alert__icon">🔄</span>
    <div class="alert__content">
      <h4 class="alert__title">ÉCHANGE PROPOSÉ</h4>
      <p class="alert__message">Montréal propose un échange avec Toronto.</p>
      <div class="alert__actions">
        <button class="alert__action">Voir détails</button>
        <button class="alert__action alert__action--primary">Répondre</button>
      </div>
    </div>
  </div>
  
  <div class="alert alert--milestone alert--floating">
    <span class="alert__icon">🏆</span>
    <div class="alert__content">
      <h4 class="alert__title">NOUVEAU RECORD !</h4>
      <p class="alert__message">Connor McDavid bat le record de points en une saison.</p>
    </div>
  </div>
</div>
```

## 🚀 **Prochaines étapes**

- **Phase 5** : Thèmes et personnalisation
- **Phase 6** : Optimisation et performance
- **Phase 7** : Composants spécifiques hockey

---

**Note :** Ces composants avancés offrent une expérience utilisateur moderne et professionnelle pour le site de hockey. 