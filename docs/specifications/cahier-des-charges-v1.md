# Cahier des charges fonctionnel — SDS ImpactOS V1

## 1. Finalité
Relier planification, exécution, suivi-évaluation (MEAL) et reporting des projets d'ONG, y compris sur le terrain avec une connectivité limitée.

## 2. Profils
Administrateur plateforme ; administrateur d'organisation ; direction/coordination ; chef de projet ; responsable MEAL ; agent terrain ; lecteur/bailleur à accès explicitement limité.

## 3. Modules fonctionnels
### Organisation et accès
Organisations, invitations, adhésions, rôles et permissions configurables. Toute opération métier est bornée au tenant authentifié.

### Référentiels
Zones géographiques hiérarchiques, bailleurs, secteurs, types d'activités et unités de mesure.

### Projets
Code, titre, description, bailleur, dates, budget indicatif, devise, zones, objectifs, statut, équipe et documents.

### Activités
Planification, calendrier, responsable, équipe, lieu, période, livrables et preuves. Workflow initial : brouillon, soumis, à corriger, validé, réalisé, clôturé. Transitions contrôlées par permission et journalisées.

### Collecte terrain PWA
Consultation des tâches assignées ; brouillons hors ligne ; outbox ; UUID et clé d'idempotence ; reprise après coupure ; accusé de réception ; états local/en attente/synchronisé/en erreur ; conflits présentés sans écrasement silencieux.

### Bénéficiaires
Registre minimal et participations aux activités. Privilégier les identifiants pseudonymes. Les données sensibles (santé, violences, sexualité, biométrie, statut légal) sont exclues par défaut. Les données de mineurs exigent analyse spécifique et validation juridique/éthique avant activation.

### MEAL
Indicateurs (définition, unité, source, fréquence, désagrégations autorisées), valeurs de référence, cibles par période, résultats, commentaires, preuves et validation. Historique des corrections.

### Documents et preuves
Téléversement privé, métadonnées, rattachement aux projets/activités/résultats, contrôle d'accès, limites de taille et types autorisés. Liens temporaires.

### Tableaux de bord et rapports
Avancement, activités, indicateurs, résultats, échéances et alertes. Exports CSV/XLSX/PDF selon permissions, filtres et période. Traçabilité des chiffres.

### Intégrations
Finance Pro par API documentée et authentification dédiée ; CSV contrôlé en mode transitoire. Connecteurs KoboToolbox/ODK après validation des cas d'usage.

## 4. Hors périmètre
Comptabilité générale, paie, ERP, banque, application native, constructeur universel de formulaires, traitement automatisé de données sensibles, IA décisionnelle et remplacement de KoboToolbox/ODK/ActivityInfo/DHIS2.

## 5. Exigences non fonctionnelles
Isolation multi-tenant testée ; moindre privilège ; audit ; HTTPS ; sauvegardes chiffrées et restaurables ; API versionnée ; limitation de débit ; synchronisation idempotente ; interface responsive et accessible ; logs sans données sensibles ; tests unitaires, intégration, sécurité et offline.

## 6. Critères d'acceptation
1. Aucune organisation ne lit/modifie les données d'une autre.
2. Invitations, rôles et permissions fonctionnent.
3. Projet, objectifs, activités et équipe sont gérables.
4. Saisie hors ligne puis synchronisation sans doublon.
5. Conflits détectés et présentés.
6. Indicateurs, cibles et résultats validables.
7. Documents privés et autorisés.
8. Dashboards/exports respectent les permissions.
9. Finance Pro fonctionne sur environnement de test ou CSV contrôlé documenté.
10. Tests critiques et restauration validés.

## 7. Validation produit
Objectifs exploratoires internes : 20 entretiens, 5 organisations pilotes et 3 engagements concrets de paiement. Ce ne sont pas des données de marché. Revoir les hypothèses après entretiens et démonstrations.

## 8. Calendrier
Un plan initial de 24 semaines peut servir d'hypothèse de travail, à recalibrer selon l'équipe, la complexité technique et les retours des pilotes.
