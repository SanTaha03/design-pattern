## Table des matières

- [Réponses aux questions](#réponses-aux-questions)
- [Design pattern Prototype](#design-pattern-prototype)
  - [Contexte](#contexte)
  - [Avantages/Inconvénients](#avantagesinconvénients)
  - [Diagramme de classes UML](#diagramme-de-classes-uml)
  - [Lancer le projet](#lancer-le-projet)
  - [Code source](#code-source)

---

## Réponses aux questions

### Première question

#### Avantages de programmer vers une interface

Programmer vers une interface présente plusieurs avantages, tels que :

1. **Abstraction et Flexibilité :** En programmant vers une interface, vous créez une abstraction qui permet au code client d'interagir avec des objets sans se soucier de leurs implémentations concrètes. Cela rend le code plus flexible, car vous pouvez changer l'implémentation sous-jacente sans impacter le code client.

2. **Découplage :** Le code client n'est pas directement lié à une implémentation particulière, réduisant ainsi les dépendances et le couplage. Cela facilite la modification ou la substitution des implémentations sans affecter le reste du code.

3. **Extensibilité :** Ajouter de nouvelles fonctionnalités devient plus simple. Vous pouvez créer de nouvelles implémentations qui respectent l'interface existante, ce qui permet d'étendre les fonctionnalités sans changer le code existant.

4. **Facilité de Test :** Les interfaces facilitent la substitution d'objets par des objets mocks ou des simulateurs pendant les tests, ce qui simplifie les tests unitaires et facilite l'isolation des composants.

#### Exemple en PHP

```php
// Interface
interface Notification {
    public function sendNotification(): string;
}

// Implémentations
class EmailNotification implements Notification {
    public function sendNotification(): string {
        return "Email sent";
    }
}

class SMSNotification implements Notification {
    public function sendNotification(): string {
        return "SMS sent";
   }

// Client Code
class NotificationClient {
    private $notification;

    public function __construct(Notification $notification) {
        $this->notification = $notification;
    }

    public function doSomething() {
        // Utilisation de l'interface sans se soucier de l'implémentation sous-jacente
        $result = $this->notification->sendNotification();
        echo $result;
    }
}

// Utilisation du client avec différentes implémentations
$emailNotification = new EmailNotification();
$clientWithEmail = new NotificationClient($emailNotification);
$clientWithEmail->doSomething(); // Output: Email sent

$smsNotification = new SMSNotification();
$clientWithSMS = new NotificationClient($smsNotification);
$clientWithSMS->doSomething(); // Output: SMS sent
```

Dans cet exemple, le client (`NotificationClient`) utilise l'interface `Notification` sans se soucier de l'implémentation sous-jacente.

### Deuxième question

#### Préférence pour la composition plutôt que l'héritage

La préférence pour la composition plutôt que l'héritage repose sur plusieurs principes de conception tels que la flexibilité, la réutilisabilité et la facilité de maintenance. Les raisons incluent :

1. **Flexibilité :** La composition permet une plus grande flexibilité en évitant le couplage fort associé à l'héritage. Les objets peuvent être combinés de différentes manières, facilitant la modification et la réutilisation du code.

2. **Éviter le Couplage Fort :** L'héritage crée un couplage fort entre la classe parente et la classe dérivée, ce qui peut rendre le système fragile. La composition permet d'éviter ce couplage fort.

3. **Réutilisabilité :** La composition favorise la réutilisabilité du code en permettant aux objets d'être assemblés de manière dynamique pour former de nouvelles fonctionnalités. Cela évite le besoin de créer de nombreuses classes dérivées pour chaque combinaison possible.

4. **Facilité de Maintenance :** La composition facilite la maintenance car les modifications peuvent être apportées à des composants individuels sans affecter l'ensemble du système. Cela rend le code plus modulaire et plus facile à comprendre.

5. **Principe de Substitution de Liskov :** La composition est souvent plus conforme au principe de substitution de Liskov, évitant ainsi des problèmes de conception.

#### Exemple en PHP

```php
// Composants
class Moteur {
    public function demarrer() {
        echo "Moteur démarré\n";
    }
}

class Roues {
    public function rouler() {
        echo "Roues en mouvement\n";
    }
}

// Classe utilisant la composition
class Voiture {
    private $moteur;
    private $roues;

    public function __construct() {
        $this->moteur = new Moteur();
        $this->roues = new Roues();
    }

    public function demarrerVoiture() {
        $this->moteur->demarrer();
        $this->roues->rouler();
    }
}

// Code client
$voiture = new Voiture();
$voiture->demarrerVoiture();
```

Dans cet exemple, la classe `Voiture` utilise la composition en intégrant les composants `Roues` et `Moteur`. Cela permet de créer une voiture en combinant ces fonctionnalités sans hériter d'une classe spécifique.

### Troisième question

#### Interface en programmation orientée objet

En programmation orientée objet, une interface est un contrat définissant un ensemble de méthodes que les classes doivent implémenter. Elle ne contient généralement pas d'implémentation de ces méthodes, mais plutôt les signatures (noms, types de retour, types de paramètres) auxquelles les classes doivent se conformer. Les interfaces permettent de définir un ensemble de comportements sans imposer une hiérarchie de classes spécifique.

---

## Design pattern Prototype

### Contexte

Le design pattern Prototype est particulièrement utile dans des situations où la création d'une instance est complexe ou consommatrice en temps. Plutôt que de construire de nouvelles instances à partir de rien, le pattern Prototype permet de cloner des objets existants, évitant ainsi la duplication de code d'initialisation redondant.

### Avantages/Inconvénients

#### Avantages

1. **Clonage sans Couplage Fort :** Permet de cloner des objets sans les coupler à leurs classes concrètes, offrant ainsi une alternative à l'héritage.

2. **Évite la Duplication de Code :** En clonant des prototypes préconstruits, on se débarrasse du code d'initialisation redondant.

3. **Création d'Objets Complexes Facilitée :** Permet de créer des objets complexes plus facilement en clonant des prototypes existants.

#### Inconvénients

1. **Clonage d'Objets Complexes avec Références Circulaires :** Cloner des objets complexes dotés de références circulaires peut se révéler très difficile.

### Diagramme de classes UML
<img width="454" alt="image" src="https://github.com/SanTaha03/design-pattern/assets/114475615/1065e084-101f-456e-8e42-9431e3a288f7">



### Lancer le projet<a name="lancer-le-projet"></a>
1. Assurez-vous que PHP est installé sur votre système.
2. Copiez le code source fourni dans un fichier `index.php`.
3. Exécutez le script PHP en utilisant la commande suivante dans le terminal :
   ```bash
   php index.php
   ```

### Code source<a name="code-source"></a>
```php
<?php

namespace JeuPrototype;

// Interface du prototype
interface PrototypePersonnage
{
    public function cloner(): PrototypePersonnage;
    public function afficherStats(): void;
}

// Prototype concret : Guerrier
class Guerrier implements PrototypePersonnage
{
    private $nom;
    private $sante;
    private $degatsAttaque;

    public function __construct($nom, $sante, $degatsAttaque)
    {
        $this->nom = $nom;
        $this->sante = $sante;
        $this->degatsAttaque = $degatsAttaque;
    }

    public function cloner(): PrototypePersonnage
    {
        return new self($this->nom, $this->sante, $this->degatsAttaque);
    }

    public function afficherStats(): void
    {
        echo "Guerrier - Nom : {$this->nom}, Santé : {$this->sante}, Dégâts d'attaque : {$this->degatsAttaque}\n";
    }
}

// Prototype concret : Mage
class Mage implements PrototypePersonnage
{
    private $nom;
    private $sante;
    private $puissanceMagique;

    public function __construct($nom, $sante, $puissanceMagique)
    {
        $this->nom = $nom;
        $this->sante = $sante;
        $this->puissanceMagique = $puissanceMagique;
    }

    public function cloner(): PrototypePersonnage
    {
        return new self($this->nom, $this->sante, $this->puissanceMagique);
    }

    public function afficherStats(): void
    {
        echo "Mage - Nom : {$this->nom}, Santé : {$this->sante}, Puissance Magique : {$this->puissanceMagique}\n";
    }
}

// Code client
function codeClient()
{
    $prototypeGuerrier = new Guerrier("Aldric", 100, 25);
    $prototypeMage = new Mage("Elara", 80, 30);

    // Création de personnages basés sur les prototypes
    $guerrier1 = $prototypeGuerrier->cloner();
    $mage1 = $prototypeMage->cloner();

    $guerrier2 = $prototypeGuerrier->cloner();
    $guerrier2->afficherStats(); // Affichage des statistiques du guerrier 2

    $mage3 = $prototypeMage->cloner();
    $mage3->afficherStats(); // Affichage des statistiques du mage 3
}

codeClient();
```
