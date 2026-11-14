# Backlog initial V1

P0 = indispensable au pilote ; P1 = important ; P2 = après validation. Estimations à réaliser en équipe.

| ID | Priorité | Élément | Critère de sortie |
|---|---|---|---|
| IMP-001 | P0 | Initialisation Laravel/API | Health check, config, tests, CI |
| IMP-002 | P0 | Initialisation React/TS | Build, routing, tests |
| IMP-003 | P0 | Organisations/adhésions | Création et invitation sécurisées |
| IMP-004 | P0 | Authentification/permissions | Tests par rôle |
| IMP-005 | P0 | Isolation multi-tenant | Tests anti-fuite |
| IMP-006 | P0 | Référentiels | Zones et bailleurs tenant-aware |
| IMP-007 | P0 | Projets/objectifs | CRUD, équipe, statuts |
| IMP-008 | P0 | Activités/affectations | Planification et workflow |
| IMP-009 | P0 | PWA shell/cache | Installation et mode dégradé |
| IMP-010 | P0 | Outbox/synchronisation | Idempotence, reprise, conflits |
| IMP-011 | P0 | Indicateurs/cibles | Définitions et périodes |
| IMP-012 | P0 | Résultats/validation MEAL | Historique et preuves |
| IMP-013 | P0 | Documents privés | Autorisations et liens temporaires |
| IMP-014 | P1 | Bénéficiaires minimaux | Minimisation et accès restreint |
| IMP-015 | P1 | Tableaux de bord | Indicateurs traçables |
| IMP-016 | P1 | Exports | CSV/XLSX/PDF selon permissions |
| IMP-017 | P1 | Finance Pro | API sandbox ou CSV contrôlé |
| IMP-018 | P1 | Audit/alertes | Événements sensibles traçables |
| IMP-019 | P1 | Tests E2E terrain | Coupure, reprise, doublon, conflit |
| IMP-020 | P2 | Connecteur Kobo/ODK | Flux validé sur cas pilote |

## Definition of Done
PR revue ; tests ajoutés ; autorisations vérifiées ; migration documentée ; aucun secret/donnée sensible dans les logs ; documentation API mise à jour ; critères démontrés en staging.
