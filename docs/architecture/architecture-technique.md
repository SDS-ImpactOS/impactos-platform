# Architecture technique cible

## Style
Monolithe modulaire Laravel pour la V1 ; pas de microservices prématurés. Domaines séparés et contrats internes explicites.

## Composants
- React + TypeScript : web responsive et PWA.
- Service Worker : cache applicatif.
- IndexedDB : données locales et outbox.
- Laravel 13 : API REST `/api/v1`, authentification, autorisations et règles métier.
- PostgreSQL : données transactionnelles.
- Stockage objet privé S3-compatible : documents et preuves.
- Queues Laravel ; Redis selon besoins mesurés.
- Finance Pro : système comptable externe.

## Modules backend
Identity/Tenancy, Organizations, Access Control, Reference Data, Projects, Activities, Field Operations, Beneficiaries, MEAL, Documents, Reporting, Integrations, Audit.

## Multi-tenant
Chaque table métier porte `organization_id`. Le tenant est déterminé côté serveur par l'adhésion authentifiée, jamais accepté aveuglément depuis le client. Contraintes uniques composées, vérification des relations inter-tenant et tests anti-fuite. RLS PostgreSQL peut être étudié comme défense supplémentaire, sans remplacer les contrôles applicatifs.

## API
Préfixe `/api/v1`, JSON, validation stricte, pagination, filtres autorisés, erreurs homogènes, OpenAPI et clé d'idempotence pour synchronisation. Aucun secret ou chemin de stockage exposé.

## Synchronisation PWA
Chaque opération locale possède UUID, type, payload versionné et clé d'idempotence. Le serveur revérifie droits, schéma et état métier. Réponses : accepté, déjà traité, conflit ou rejet motivé. Reprise progressive, limites de taille, purge à la déconnexion. Données sensibles non mises en cache par défaut.

## Fichiers
Bucket privé, clés non prévisibles, URL signées courtes, validation MIME réelle, limites de taille et contrôle d'accès à chaque téléchargement.

## Observabilité et qualité
Logs structurés sans mots de passe, tokens ni données sensibles. Mesurer latence, erreurs API/jobs et échecs de synchronisation. Tests Laravel, React, E2E, autorisations tenant et réseau intermittent. CI : formatage, analyse statique, tests, audit dépendances et build.

## Déploiement
Environnements dev/staging/production séparés ; secrets hors dépôt ; health checks ; sauvegardes avant migrations risquées ; stratégie de rollback.
