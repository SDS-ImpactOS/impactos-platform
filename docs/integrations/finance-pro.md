# Intégration Finance Pro

Finance Pro et SDS ImpactOS sont deux produits complémentaires et autonomes.

## Responsabilités respectives
- **Finance Pro** : source de référence des projets opérationnels, activités opérationnelles, budgets, dépenses, banques, caisses et rapports financiers.
- **ImpactOS** : source de référence des cadres MEAL, indicateurs, cibles, collectes, mesures, données minimales de bénéficiaires, vérifications, évaluations, redevabilité, apprentissage et rapports MEAL.

ImpactOS ne duplique ni la comptabilité ni la gestion opérationnelle des projets et activités. Il conserve les références nécessaires au suivi-évaluation. Une organisation qui n'utilise pas Finance Pro peut créer ou importer ses références dans ImpactOS.

## Flux cible
1. Autorisation explicite de l'organisation.
2. Compte technique à privilèges minimaux.
3. Échange via API versionnée et documentée.
4. Rapprochement des identifiants projets/activités.
5. Synchronisations/imports journalisés, idempotents et consultables.

Données candidates à confirmer avec l'API réelle : identifiants et références des projets et activités, intitulés, périodes, zones et statuts nécessaires au suivi. Les données financières détaillées ne sont pas requises pour le périmètre MEAL V1. Tout affichage d'information financière agrégée fera l'objet d'une décision et d'un contrat de données séparés.

## Sécurité
Secrets côté serveur, jamais dans navigateur ou dépôt ; TLS ; rotation/révocation ; scopes minimaux ; journalisation et masquage. Aucun accès direct à la base Finance Pro.

## Repli CSV
Modèle versionné, aperçu avant validation, contrôles colonnes/période, doublons détectés, rapport d'erreurs et provenance conservée.

## Mise en production
OpenAPI réelle, sandbox, contrat de données, pagination, limites de débit, reprise sur erreur et tests de rapprochement. Toute écriture vers Finance Pro reste hors périmètre tant qu'elle n'est pas explicitement autorisée et validée.
