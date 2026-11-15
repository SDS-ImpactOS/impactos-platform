# SDS ImpactOS

Plateforme SaaS spécialisée dans le suivi-évaluation, la redevabilité et l'apprentissage (MEAL) des projets de développement. Pilote initial : Bénin ; ambition commerciale régionale.

## Positionnement V1
SDS ImpactOS et Finance Pro sont deux produits complémentaires et autonomes :
- **Finance Pro** reste propriétaire des projets opérationnels, activités opérationnelles, budgets, dépenses, banques, caisses et rapports financiers.
- **SDS ImpactOS** est propriétaire du référentiel MEAL, des indicateurs, cibles, collectes terrain, données de résultats, bénéficiaires strictement nécessaires, vérifications, évaluations, rapports MEAL, redevabilité et apprentissage.
- ImpactOS référence les projets et activités Finance Pro sans reconstruire leur gestion opérationnelle. Il peut aussi fonctionner sans Finance Pro grâce à la création/import de références locales.

## Décisions techniques V1
- Backend Laravel 13, API REST versionnée `/api/v1`.
- Frontend React + TypeScript + Vite.
- PWA offline-first : Service Worker, IndexedDB, outbox, synchronisation idempotente et gestion explicite des conflits.
- **MySQL en développement local ; PostgreSQL en staging et production.**
- Migrations, requêtes et fonctionnalités conçues pour rester compatibles avec les deux moteurs. Toute fonctionnalité spécifique à PostgreSQL doit être isolée et testée.
- UUID pour les identifiants métier lorsque pertinent ; conserver le type d'identifiant utilisateur existant tant qu'une migration dédiée n'est pas justifiée.
- Timestamps stockés en UTC ; stockage objet privé compatible S3.
- Monolithe modulaire ; dépôt monorepo.
- Finance Pro intégré uniquement par API autorisée et documentée ou import contrôlé ; aucun accès direct à sa base.
- Interopérabilité progressive avec KoboToolbox/ODK ; ImpactOS ne cherche pas à les remplacer.

## Documentation
Voir `docs/README.md` pour l'index complet. Les règles métier, contraintes légales et hypothèses commerciales doivent être confirmées auprès des ONG pilotes.

Ne jamais versionner de secrets, fichiers `.env` réels, données bénéficiaires ou exports de production.
