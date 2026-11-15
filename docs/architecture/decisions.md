# Décisions d'architecture (ADR)

- **ADR-001 — Monolithe modulaire (accepté V1)** : réduit la charge opérationnelle d'une équipe de trois ; extraction uniquement sur preuve de besoin.
- **ADR-002 — React + TypeScript (accepté)** : socle web/PWA typé.
- **ADR-003 — PWA offline-first (accepté sous conditions)** : IndexedDB, outbox, idempotence, conflits visibles ; pas de données sensibles en cache par défaut.
- **ADR-004 — Bases selon environnement (accepté)** : MySQL en développement local ; PostgreSQL en staging et production. Le code métier et les migrations doivent rester compatibles avec les deux moteurs et être testés sur chacun.
- **ADR-005 — Finance Pro source financière et opérationnelle (accepté)** : Finance Pro conserve projets opérationnels, activités, budgets, dépenses, banques et caisses ; ImpactOS est propriétaire des données MEAL. API ou import contrôlé ; aucun accès direct à la base Finance Pro.
- **ADR-006 — Multi-tenant logique (accepté)** : `organization_id`, contexte serveur, politiques et tests anti-fuite.
- **ADR-007 — Stockage objet privé (accepté)** : S3-compatible, liens temporaires signés.
- **ADR-008 — Monorepo V1 (accepté)** : cohérence et coordination simplifiées.
- **ADR-009 — Périmètre MEAL (accepté)** : ImpactOS ne duplique pas la gestion opérationnelle des projets et activités ; il conserve les références nécessaires au suivi-évaluation et fonctionne également sans Finance Pro.

Toute modification importante doit être documentée par un ADR avec contexte, options et conséquences.
