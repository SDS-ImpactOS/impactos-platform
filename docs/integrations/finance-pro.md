# Intégration Finance Pro

Finance Pro reste le système comptable de référence. ImpactOS ne duplique pas le grand livre et ne se connecte jamais directement à la base de données Finance Pro.

## Flux cible
1. Autorisation explicite de l'organisation.
2. Compte technique à privilèges minimaux.
3. Échange via API versionnée et documentée.
4. Rapprochement des identifiants projets/catégories.
5. Synchronisations/imports journalisés, idempotents et consultables.

Données candidates à confirmer avec l'API réelle : références projets, budgets autorisés, lignes budgétaires agrégées, dépenses agrégées, périodes et statuts. Ne pas présumer de l'existence des endpoints avant audit de l'API.

## Sécurité
Secrets côté serveur, jamais dans navigateur ou dépôt ; TLS ; rotation/révocation ; scopes minimaux ; journalisation et masquage.

## Repli CSV
Modèle versionné, aperçu avant validation, contrôles colonnes/devise/période, doublons détectés, rapport d'erreurs et provenance conservée.

## Mise en production
OpenAPI réelle, sandbox, contrat de données, pagination, limites de débit, reprise sur erreur et tests de rapprochement. Toute écriture vers Finance Pro reste hors périmètre tant qu'elle n'est pas explicitement autorisée et validée.
