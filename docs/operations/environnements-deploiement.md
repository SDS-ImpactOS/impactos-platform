# Environnements et déploiement

## Environnements et bases de données
- **Local : MySQL** (Docker Compose recommandé) et données fictives.
- **CI : MySQL et PostgreSQL** ; exécuter les tests et migrations sur les deux moteurs.
- **Staging : PostgreSQL**, proche de la production et avec données synthétiques.
- **Production : PostgreSQL**, données réelles, accès restreints, sauvegardes et supervision.

La parité de moteur entre local et production n'est pas identique. En conséquence, les migrations, requêtes, contraintes, index et types doivent rester portables. Toute fonctionnalité PostgreSQL spécifique doit être isolée, documentée et testée dans CI/staging. Ne pas supposer que le succès sur MySQL garantit le comportement PostgreSQL.

## Configuration
Créer un `.env.example` sans secret. Variables typiques : `APP_ENV`, `APP_KEY`, `APP_URL`, `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, `QUEUE_CONNECTION`, `CACHE_STORE`, `FILESYSTEM_DISK`, `S3_ENDPOINT`, `S3_BUCKET`, `S3_ACCESS_KEY_ID`, `S3_SECRET_ACCESS_KEY`.

Exemple local : `DB_CONNECTION=mysql`.  
Exemple staging/production : `DB_CONNECTION=pgsql`.

## CI/CD
Dépendances verrouillées, formatage, analyse statique, tests unitaires/feature sur MySQL et PostgreSQL, build frontend, audit dépendances et artefacts. Staging après validation ; production après approbation.

## Base et fichiers
Sauvegarder avant migration risquée ; tester les restaurations. Bucket privé distinct par environnement, aucune clé partagée entre staging et production. Migrations destructives selon stratégie expand/contract. Vérifier la restauration PostgreSQL de production sur une instance de test PostgreSQL.

## Exploitation
Health checks, erreurs API/jobs, échecs de synchronisation, latence et capacité de stockage. Documenter escalade, rotation des secrets, incidents et rollback.
