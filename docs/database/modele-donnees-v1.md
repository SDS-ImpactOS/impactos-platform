# Modèle logique de données V1

Conventions : PostgreSQL, UUID, timestamps UTC, montants NUMERIC/DECIMAL et devise explicite. Toutes les tables métier sont rattachées à une organisation.

## Identité et accès
- `organizations(id, name, slug, status, timezone, created_at, updated_at)`
- `users(id, name, email, password_hash, status, created_at, updated_at)`
- `memberships(id, organization_id, user_id, status, joined_at)`
- `roles(id, organization_id nullable, code, name)`
- `permissions(id, code, description)`
- `membership_roles(membership_id, role_id)`
- `role_permissions(role_id, permission_id)`

## Référentiels et projets
- `locations(id, organization_id, parent_id, code, name, level)`
- `donors(id, organization_id, name, reference_code)`
- `projects(id, organization_id, donor_id nullable, code, title, description, start_date, end_date, status, currency, budget_amount)`
- `project_members(id, organization_id, project_id, membership_id, project_role)`
- `project_locations(id, organization_id, project_id, location_id)`
- `objectives(id, organization_id, project_id, code, description)`

## Activités et terrain
- `activities(id, organization_id, project_id, objective_id nullable, code, title, description, start_at, end_at, status, location_id nullable, owner_membership_id)`
- `activity_assignments(id, organization_id, activity_id, membership_id, assignment_role)`
- `activity_submissions(id, organization_id, activity_id, submitted_by, client_operation_id, payload_version, payload, status, submitted_at, reviewed_by, reviewed_at)`
- `activity_evidence(id, organization_id, activity_id, document_id, caption)`

## Bénéficiaires et MEAL
- `beneficiaries(id, organization_id, external_code, display_label, minimal_attributes jsonb, consent_status, status)`
- `beneficiary_participations(id, organization_id, beneficiary_id, activity_id, participation_date, attendance_status)`
- `indicators(id, organization_id, project_id, code, name, definition, unit, disaggregation_schema jsonb, frequency)`
- `indicator_targets(id, organization_id, indicator_id, period_start, period_end, target_value)`
- `indicator_results(id, organization_id, indicator_id, period_start, period_end, value, source, status, entered_by, validated_by, validated_at, evidence_document_id nullable)`

## Intégrations, documents, audit
- `integration_connections(id, organization_id, provider, status, credential_reference, configuration jsonb)`
- `finance_project_links(id, organization_id, project_id, finance_pro_reference, mapping jsonb, status)`
- `imports(id, organization_id, source, status, file_document_id, summary jsonb, created_by)`
- `documents(id, organization_id, storage_key, original_name, mime_type, size_bytes, checksum, uploaded_by, classification)`
- `audit_logs(id, organization_id, actor_user_id, action, subject_type, subject_id, metadata jsonb, occurred_at)`

## Contraintes
Unicités tenant-aware ; FK composites ou validations fortes contre relations entre tenants ; index sur tenant, FK, statuts et dates ; unicité `(organization_id, client_operation_id)` pour idempotence ; contrôles de période/devise/montants. JSONB réservé aux attributs réellement variables. Définir rétention, anonymisation et suppression avant collecte réelle.

Ce schéma est conceptuel : migrations et cardinalités détaillées à finaliser après validation des parcours pilotes.
