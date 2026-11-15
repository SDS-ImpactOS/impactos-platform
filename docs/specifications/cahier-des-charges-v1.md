# Cahier des charges fonctionnel — SDS ImpactOS V1

**Statut : version fonctionnelle validée.**  
**Produit :** SDS ImpactOS — plateforme de suivi-évaluation, de redevabilité et d'apprentissage (MEAL).  
**Éditeur :** Shalom Digital Solutions.  
**Marché initial :** ONG et associations ; pilote au Bénin ; ambition régionale.

## 1. Finalité et positionnement

SDS ImpactOS permet aux organisations de planifier leur dispositif MEAL, collecter et contrôler les données, mesurer les réalisations et résultats, documenter les preuves, conduire des évaluations et produire des rapports fiables.

ImpactOS et Finance Pro sont **deux produits complémentaires, utilisables séparément** :
- Finance Pro demeure le système de référence pour la gestion des projets opérationnels, activités opérationnelles, budgets, dépenses, banques, caisses et rapports financiers.
- ImpactOS demeure le système de référence pour les cadres de résultats, indicateurs, cibles, collectes, mesures, bénéficiaires nécessaires, vérifications, évaluations, redevabilité, apprentissage et rapports MEAL.
- ImpactOS référence les projets et activités provenant de Finance Pro ; il ne reproduit pas leur gestion opérationnelle.
- Une organisation sans Finance Pro peut utiliser ImpactOS de manière autonome en créant ou important les références nécessaires.

## 2. Profils et accès

- Administrateur plateforme.
- Administrateur d'organisation.
- Direction/coordination avec accès de consultation ou validation selon délégation.
- Responsable MEAL.
- Agent de collecte / enquêteur.
- Validateur de données.
- Évaluateur ou consultant à accès limité.
- Lecteur/bailleur avec accès explicitement limité.

Les rôles et permissions sont attribués dans le contexte de chaque organisation. Un même utilisateur peut avoir des rôles différents dans plusieurs organisations.

## 3. Modules fonctionnels V1

### 3.1 Identité, organisations et accès
Gestion des utilisateurs, organisations, invitations, adhésions, rôles et permissions. Le contexte organisationnel est déterminé côté serveur à partir de l'adhésion authentifiée. Toutes les opérations sont isolées par organisation.

### 3.2 Référentiel MEAL et références de projets
Gestion des programmes/cadres de suivi, des projets suivis et de leurs références : code, intitulé, période, organisation, zones et source de référence. Les projets provenant de Finance Pro sont liés par identifiant externe et synchronisés/importés avec autorisation. Les références locales sont possibles pour les organisations autonomes.

Les activités opérationnelles de Finance Pro ne sont pas recréées. ImpactOS peut conserver une référence externe et des métadonnées minimales utiles au suivi MEAL, sans gérer leur planification, affectation ou exécution administrative.

### 3.3 Cadre de résultats et indicateurs
- Théorie du changement et chaîne de résultats.
- Objectifs, effets (outcomes) et produits/réalisations (outputs).
- Indicateurs avec code, définition, unité, méthode de calcul, source de vérification et périodicité.
- Valeurs de référence (baseline), cibles par période et désagrégations autorisées.
- Historique des versions et changements de définition.

### 3.4 Collecte des données terrain
- Formulaires de collecte structurés et versionnés.
- Saisie web et PWA responsive.
- Brouillons et collecte hors connexion.
- Outbox locale, UUID d'opération et clé d'idempotence.
- Synchronisation différée, accusés de réception et reprise après coupure.
- États local, en attente, synchronisé, rejeté ou en conflit.
- Détection des doublons et conflits sans écrasement silencieux.
- Historique de soumission et contrôle des droits au moment de la synchronisation.

### 3.5 Bénéficiaires et groupes cibles
Registre minimal lorsque le suivi individuel est réellement nécessaire, groupes et participations, identifiants pseudonymisés et désagrégations pertinentes. Privilégier les données agrégées lorsque cela suffit. La collecte de données sensibles et de données identifiantes de mineurs est exclue par défaut et soumise à analyse et validation juridique/éthique avant activation.

### 3.6 Mesure et suivi des résultats
Enregistrement des valeurs réalisées par indicateur et période, comparaison aux cibles, calcul de progression selon une méthode explicitée, commentaires, désagrégations, provenance, statut de validation et historique des corrections.

### 3.7 Qualité, vérification et preuves
Contrôles de cohérence, revue et validation des données, demandes de correction, pièces justificatives et sources de vérification. Les fichiers sont privés et accessibles uniquement aux personnes autorisées.

### 3.8 Redevabilité
Mécanisme de retours, suggestions et réclamations, catégorisation, attribution, suivi du traitement et clôture. Les dossiers potentiellement sensibles sont soumis à des restrictions d'accès et règles de conservation spécifiques.

### 3.9 Évaluation et apprentissage
Évaluations périodiques, questions évaluatives, constats, conclusions, recommandations, leçons apprises, bonnes pratiques et actions d'amélioration.

### 3.10 Tableaux de bord et rapports MEAL
Tableaux de bord filtrables par organisation, projet de suivi, période, indicateur et zone selon permissions. Rapports narratifs et analytiques ; exports CSV/XLSX/PDF autorisés ; chiffres traçables vers leurs mesures et sources. Les rapports financiers restent dans Finance Pro.

### 3.11 Intégrations
- Finance Pro : API documentée et autorisée, ou import CSV contrôlé en transition.
- KoboToolbox/ODK : interopérabilité ciblée après validation des cas d'usage ; ImpactOS ne vise pas à remplacer ces outils.
- Import/export avec aperçu, validation, rapport d'erreurs, détection des doublons et journalisation.

## 4. Hors périmètre V1

- Comptabilité générale, budgets détaillés, dépenses, banques, caisses, trésorerie, facturation et paiements.
- Création et gestion opérationnelle complète des projets et activités.
- Planification opérationnelle, calendrier d'exécution, affectation des tâches et gestion RH.
- ERP, paie et achats.
- Application mobile native.
- Traitement automatisé de données sensibles, IA décisionnelle et constructeur universel de formulaires.
- Remplacement de KoboToolbox, ODK, ActivityInfo ou DHIS2.

## 5. Exigences non fonctionnelles

- Isolation multi-tenant systématique et tests anti-fuite.
- Authentification sécurisée, moindre privilège, journalisation et révocation des accès.
- API REST versionnée `/api/v1`, validation serveur, pagination et limitation de débit.
- PWA offline-first, idempotence, reprise et conflits visibles.
- Stockage privé, liens temporaires signés, validation des fichiers.
- Timestamps UTC, sauvegardes chiffrées et restaurations testées.
- Interface responsive et accessible ; logs sans secrets ni données personnelles inutiles.
- **Compatibilité MySQL en local et PostgreSQL en staging/production** : migrations et requêtes portables, tests automatisés sur les deux moteurs, absence de dépendance implicite à JSONB, extensions PostgreSQL ou comportements SQL propres à un seul moteur.
- Toute fonctionnalité spécifique à un moteur doit être isolée, documentée et couverte par des tests sur l'environnement cible.

## 6. Critères d'acceptation

1. Un utilisateur peut appartenir à plusieurs organisations avec des rôles différents.
2. Aucune organisation ne peut lire ou modifier les données d'une autre.
3. Les références de projets et activités Finance Pro peuvent être associées sans dupliquer leur gestion opérationnelle.
4. Une organisation sans Finance Pro peut créer/importer ses références et utiliser ImpactOS.
5. Les indicateurs disposent d'une définition, unité, méthode de calcul, source et périodicité.
6. Les cibles, valeurs réalisées, désagrégations et validations sont traçables.
7. La collecte hors ligne est synchronisée sans doublon ; les conflits sont présentés explicitement.
8. Les preuves et documents sont privés et soumis aux autorisations.
9. Les tableaux de bord et exports respectent les permissions et permettent de retrouver les sources des chiffres.
10. Les rapports MEAL sont distincts des rapports financiers.
11. Les tests métier et d'isolation passent sur MySQL local et PostgreSQL cible.
12. Les sauvegardes et procédures de restauration sont testées avant la mise en production.

## 7. Validation produit

Les objectifs exploratoires internes (20 entretiens, 5 organisations pilotes et 3 engagements concrets de paiement) restent des hypothèses de validation commerciale, et non des données de marché. Ils seront réévalués après les entretiens et démonstrations.

## 8. Calendrier

Le plan initial de 24 semaines constitue une hypothèse de travail à recalibrer selon les ressources de l'équipe, les priorités du pilote, les intégrations et les retours terrain.
