# Décisions d'architecture (ADR)

- **ADR-001 — Monolithe modulaire (accepté V1)** : réduit la charge opérationnelle d'une équipe de trois ; extraction uniquement sur preuve de besoin.
- **ADR-002 — React + TypeScript (accepté)** : socle web/PWA typé.
- **ADR-003 — PWA offline-first (accepté sous conditions)** : IndexedDB, outbox, idempotence, conflits visibles ; pas de données sensibles en cache par défaut.
- **ADR-004 — PostgreSQL (accepté)** : transactions, contraintes, JSONB limité ; RLS à étudier comme défense supplémentaire.
- **ADR-005 — Finance Pro source comptable (accepté)** : API ou import contrôlé ; aucun accès direct à sa base.
- **ADR-006 — Multi-tenant logique (accepté)** : `organization_id`, contexte serveur, politiques et tests anti-fuite.
- **ADR-007 — Stockage objet privé (accepté)** : S3-compatible, liens temporaires signés.
- **ADR-008 — Monorepo V1 (accepté)** : cohérence et coordination simplifiées.

Toute modification importante doit être documentée par un ADR avec contexte, options et conséquences.
