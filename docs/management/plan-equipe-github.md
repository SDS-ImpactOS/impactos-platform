# Équipe et workflow GitHub

## Répartition indicative
- D1 — Lead backend/architecture : Laravel, DB, tenancy, API, Finance Pro, revues sensibles.
- D2 — Frontend/PWA : React/TypeScript, UX, Service Worker, IndexedDB, outbox, sync.
- D3 — Full-stack/QA/DevOps : tests transversaux, Docker, CI/CD, observabilité, imports/exports, documentation.

## Git
Monorepo V1. `main` protégée, aucun push direct. Branches `feature/IMP-123-description`, `fix/IMP-123-description`, `docs/description`, `chore/description`. PR obligatoire avec contexte, solution, tests, captures UI et risques. Une approbation minimum ; deux pour sécurité, tenancy, permissions et migrations sensibles. CI obligatoire ; squash merge ; tags et notes de version.

## Labels
`type:feature`, `type:bug`, `type:docs`, `type:security`, `priority:P0/P1/P2`, `area:backend/frontend/pwa/database/infra/meal/integration`.

## Secrets
GitHub Actions secrets/environments. Ne jamais committer `.env`, clés API, tokens, dumps ou données de bénéficiaires. Accès selon le moindre privilège.
