# SDS ImpactOS
Plateforme SaaS de pilotage intégré des projets et programmes d'ONG en Afrique de l'Ouest. Pilote initial : Bénin.

## Décisions V1
- Cible initiale : ONG ; ambition commerciale régionale ; équipe de 3 développeurs.
- Backend Laravel 13, API REST versionnée ; frontend React + TypeScript.
- PWA offline-first : Service Worker, IndexedDB, outbox, synchronisation idempotente et conflits visibles.
- PostgreSQL, UUID, timestamps UTC ; stockage objet privé compatible S3.
- Monolithe modulaire ; dépôt monorepo.
- Finance Pro demeure le système comptable de référence. Intégration via API autorisée ou import contrôlé, jamais par accès direct à sa base.
- Interopérabilité progressive avec KoboToolbox/ODK ; ImpactOS ne cherche pas à les remplacer.

## Documentation
Voir `docs/README.md` pour l'index complet. Ce dépôt constitue le cadrage initial : les règles métier, contraintes légales et hypothèses commerciales restent à valider auprès des ONG pilotes.

Ne jamais versionner de secrets, fichiers `.env` réels, données bénéficiaires ou exports de production.
