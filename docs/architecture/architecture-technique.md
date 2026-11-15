# Architecture technique cible

## Style
Monolithe modulaire Laravel pour la V1 ; pas de microservices prématurés. Domaines séparés et contrats internes explicites.

## Composants
- React + TypeScript : web responsive et PWA.
- Service Worker : cache applicatif.
- IndexedDB : données locales et outbox.
- Laravel 13 : API REST `/api/v1`, authentification, autorisations et règles métier.
- MySQL en développement local ; PostgreSQL en staging et production.
- Stockage objet privé S3-compatible : documents et preuves.
- Queues Laravel ; Redis selon besoins mesurés.
- Finance Pro : système externe de gestion financière et des projets opérationnels.

## Modules backend
Identity/Tenancy, Organizations, MEAL Reference, Results Framework, Indicators, Data Collection, Beneficiaries (minimisation), Measurements, Data Quality & Verification, Accountability, Evaluation, Learning, Documents, Reporting, Integrations, Audit.

Les modules Projects/Activities ne constituent pas un second gestionnaire opérationnel : ImpactOS stocke des références MEAL et des liens externes vers Finance Pro, ainsi que des références locales pour les organisations autonomes.

## Multi-tenant
Chaque table métier porte `organization_id` directement ou via une relation dont l'appartenance est vérifiée. Le tenant est déterminé côté serveur par l'adhésion authentifiée, jamais accepté aveuglément depuis le client. Contraintes uniques composées, vérification des relations inter-tenant et tests anti-fuite. Ne pas dépendre de RLS PostgreSQL pour la sécurité applicative, car MySQL est utilisé en local.

## Compatibilité des bases
Les migrations et requêtes communes doivent fonctionner sur MySQL local et PostgreSQL en staging/production. Utiliser les types Laravel portables, contraintes et index compatibles. Éviter les requêtes SQL spécifiques, les colonnes JSONB, les extensions PostgreSQL et les fonctions propres à un moteur dans le cœur métier. Les données JSON doivent utiliser les abstractions Laravel et être testées sur les deux moteurs. UUID : utiliser une représentation compatible et uniforme ; vérifier le type effectivement généré par les migrations Laravel sur les deux moteurs. Tests CI sur les deux bases avant livraison. Toute optimisation spécifique à PostgreSQL doit être isolée et documentée.

## API
Préfixe `/api/v1`, JSON, validation stricte, pagination, filtres autorisés, erreurs homogènes, OpenAPI et clé d'idempotence pour synchronisation. Aucun secret ou chemin de stockage exposé.

## Synchronisation PWA
Chaque opération locale possède UUID, type, payload versionné et clé d'idempotence. Le serveur revérifie droits, schéma et état métier. Réponses : accepté, déjà traité, conflit ou rejet motivé. Reprise progressive, limites de taille, purge à la déconnexion. Données sensibles non mises en cache par défaut.

## Fichiers
Bucket privé, clés non prévisibles, URL signées courtes, validation MIME réelle, limites de taille et contrôle d'accès à chaque téléchargement.

## Observabilité et qualité
Logs structurés sans mots de passe, tokens ni données sensibles. Mesurer latence, erreurs API/jobs et échecs de synchronisation. Tests Laravel, React, E2E, autorisations tenant et réseau intermittent. CI : formatage, analyse statique, tests sur MySQL et PostgreSQL, audit dépendances et build.

## Déploiement
Environnements dev/staging/production séparés ; secrets hors dépôt ; health checks ; sauvegardes avant migrations risquées ; stratégie de rollback.
