# Environnements et déploiement

## Environnements
- Local : Docker Compose et données fictives.
- CI : tests et analyse statique à chaque PR.
- Staging : proche production, données synthétiques.
- Production : données réelles, accès restreints, sauvegardes et supervision.

## Configuration
Créer un `.env.example` sans secret. Variables typiques : `APP_ENV`, `APP_KEY`, `APP_URL`, `DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, `QUEUE_CONNECTION`, `CACHE_STORE`, `FILESYSTEM_DISK`, `S3_ENDPOINT`, `S3_BUCKET`, `S3_ACCESS_KEY_ID`, `S3_SECRET_ACCESS_KEY`.

## CI/CD
Dépendances verrouillées, formatage, analyse statique, tests unitaires/feature, build frontend, audit dépendances et artefacts. Staging après validation ; production après approbation.

## Base et fichiers
Sauvegarder avant migration risquée ; tester les restaurations. Bucket privé distinct par environnement, aucune clé partagée entre staging et production. Migrations destructives selon stratégie expand/contract.

## Exploitation
Health checks, erreurs API/jobs, échecs de synchronisation, latence et capacité de stockage. Documenter escalade, rotation des secrets, incidents et rollback.
