# Backlog V1 — périmètre MEAL

P0 = indispensable au pilote ; P1 = important ; P2 = après validation. Estimations à réaliser en équipe.

| ID | Priorité | Élément | Critère de sortie |
|---|---|---|---|
| IMP-001 | P0 | Initialisation Laravel/API | Health check, config, tests, CI |
| IMP-002 | P0 | Initialisation React/TS | Build, routing, tests |
| IMP-003 | P0 | Organisations/adhésions | Création et invitation sécurisées |
| IMP-004 | P0 | Authentification/permissions | Rôles par organisation et tests |
| IMP-005 | P0 | Isolation multi-tenant | Tests anti-fuite sur toutes les ressources |
| IMP-006 | P0 | Référentiel MEAL | Programmes, projets de suivi, zones et références externes |
| IMP-007 | P0 | Cadre de résultats | Chaîne de résultats et objectifs |
| IMP-008 | P0 | Indicateurs et cibles | Définitions, baselines, méthodes et périodes |
| IMP-009 | P0 | PWA shell/cache | Installation et mode dégradé |
| IMP-010 | P0 | Formulaires et outbox | Brouillons, idempotence, reprise et conflits |
| IMP-011 | P0 | Soumissions et mesures | Enregistrement, contrôle et validation |
| IMP-012 | P0 | Qualité et preuves | Vérification, documents privés, historique |
| IMP-013 | P1 | Bénéficiaires minimaux | Pseudonymisation, minimisation et accès restreint |
| IMP-014 | P1 | Tableaux de bord MEAL | Indicateurs traçables et filtres |
| IMP-015 | P1 | Rapports et exports | CSV/XLSX/PDF selon permissions |
| IMP-016 | P1 | Redevabilité | Retours/réclamations et workflow restreint |
| IMP-017 | P1 | Évaluation et apprentissage | Constats, recommandations et leçons |
| IMP-018 | P1 | Finance Pro | API sandbox ou CSV contrôlé, références seulement |
| IMP-019 | P1 | Compatibilité DB | Suite de tests MySQL et PostgreSQL |
| IMP-020 | P1 | Tests E2E terrain | Coupure, reprise, doublon, conflit |
| IMP-021 | P2 | Connecteur Kobo/ODK | Flux validé sur cas pilote |

## Definition of Done
PR revue ; tests ajoutés ; autorisations tenant vérifiées ; migration testée sur MySQL et PostgreSQL ; documentation API mise à jour ; aucun secret/donnée sensible dans les logs ; critères démontrés en staging.
