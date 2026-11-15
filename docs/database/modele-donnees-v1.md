# Modèle logique de données V1

Modèle conceptuel du périmètre MEAL. Il ne constitue pas encore le script SQL final.

## Conventions et compatibilité
- MySQL en développement local ; PostgreSQL en staging et production.
- Migrations Laravel portables et tests automatisés sur les deux moteurs.
- UUID pour les entités métier lorsque pertinent ; conserver le type actuel de `users.id` (BIGINT) sauf décision et migration explicites.
- Timestamps UTC ; montants financiers détaillés hors périmètre ImpactOS.
- Utiliser les types JSON portables de Laravel ; ne pas imposer JSONB dans le schéma commun.
- Toutes les données métier appartiennent à une organisation, directement ou par relation contrôlée.

## Identité et accès
- `organizations(id, name, slug, status, timezone, created_at, updated_at)`
- `users(id, name, email, password, status, created_at, updated_at)` — identifiant utilisateur existant à conserver.
- `organization_user(id, organization_id, user_id, status, joined_at, created_at, updated_at)`
- Rôles/permissions Spatie avec Teams ; clé d'équipe configurée sur `organization_id`. La migration publiée doit être adaptée et vérifiée avant exécution.

## Référentiel MEAL
- `meal_programs(id, organization_id, code, name, description, start_date, end_date, status)`
- `meal_projects(id, organization_id, program_id nullable, source, external_project_id nullable, code, title, start_date, end_date, status)`
- `external_references(id, organization_id, provider, entity_type, external_id, local_entity_type, local_entity_id, sync_status, last_synced_at)`
- `locations(id, organization_id, parent_id nullable, code, name, level)`

`meal_projects` conserve le contexte de suivi-évaluation. Les projets opérationnels restent dans Finance Pro ; les projets autonomes peuvent être créés/importés dans ImpactOS.

## Cadre de résultats et indicateurs
- `result_chains(id, organization_id, meal_project_id, level, parent_id nullable, code, statement)`
- `indicators(id, organization_id, meal_project_id, result_chain_id nullable, code, name, definition, unit, calculation_method, source, frequency, disaggregation_schema)`
- `indicator_baselines(id, organization_id, indicator_id, value, reference_date, notes)`
- `indicator_targets(id, organization_id, indicator_id, period_start, period_end, target_value)`
- `indicator_measurements(id, organization_id, indicator_id, period_start, period_end, value, disaggregation, source, status, entered_by, validated_by nullable, validated_at nullable)`

## Collecte et bénéficiaires
- `forms(id, organization_id, meal_project_id nullable, name, version, schema, status)`
- `form_fields(id, organization_id, form_id, field_key, field_type, configuration)`
- `submissions(id, organization_id, form_id, client_operation_id, payload_version, payload, status, submitted_by, submitted_at, reviewed_by nullable, reviewed_at nullable)`
- `beneficiaries(id, organization_id, external_code, display_label, minimal_attributes, consent_status, status)`
- `beneficiary_participations(id, organization_id, beneficiary_id, meal_project_id, external_activity_id nullable, participation_date, participation_status)`

Le suivi individuel ne doit être activé que s'il est nécessaire. Préférer les données agrégées et pseudonymisées.

## Qualité, preuves, redevabilité et apprentissage
- `verification_records(id, organization_id, measurement_id, reviewer_id, status, comments, reviewed_at)`
- `documents(id, organization_id, storage_key, original_name, mime_type, size_bytes, checksum, uploaded_by, classification)`
- `evidence_links(id, organization_id, document_id, entity_type, entity_id, caption)`
- `feedback_cases(id, organization_id, meal_project_id nullable, category, description_protected, status, assigned_to nullable, received_at, closed_at nullable)`
- `evaluations(id, organization_id, meal_project_id, title, evaluation_type, period_start, period_end, status)`
- `evaluation_findings(id, organization_id, evaluation_id, finding, evidence_reference, recommendation)`
- `lessons_learned(id, organization_id, meal_project_id nullable, title, description, source, created_by)`
- `improvement_actions(id, organization_id, lesson_id nullable, recommendation, owner_user_id nullable, due_date nullable, status)`

## Intégrations et audit
- `integration_connections(id, organization_id, provider, status, credential_reference, configuration)`
- `sync_logs(id, organization_id, provider, direction, entity_type, status, started_at, finished_at, summary)`
- `audit_logs(id, organization_id, actor_user_id, action, subject_type, subject_id, metadata, occurred_at)`

## Contraintes
Unicités tenant-aware ; clés étrangères et validations contre relations entre tenants ; index sur tenant, clés étrangères, statuts et dates ; unicité `(organization_id, client_operation_id)` pour idempotence. JSON réservé aux attributs variables et schémas de formulaires. Les types, index, contraintes et requêtes doivent être vérifiés sur MySQL et PostgreSQL. Définir rétention, anonymisation et suppression avant collecte réelle.

Le schéma détaillé, cardinalités et migrations seront finalisés après validation des parcours pilotes et inspection de la migration Spatie.
