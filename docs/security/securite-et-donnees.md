# Sécurité, confidentialité et gouvernance

Privacy by design, minimisation, finalité explicite, moindre privilège, traçabilité et conservation limitée. Faire valider les obligations applicables au Bénin et dans chaque pays par un conseil compétent et les autorités concernées.

## Multi-tenant
Tenant déterminé côté serveur via adhésion active. Toute lecture, écriture, export, téléchargement et tâche asynchrone vérifie l'organisation. Tests anti-fuite y compris UUID, filtres, jobs et exports.

## Identité
Hachage robuste des mots de passe, MFA pour rôles sensibles lorsque possible, limitation des tentatives, révocation des sessions, rotation des secrets. Aucun token dans le frontend durable sans justification.

## Données personnelles et sensibles
Collecter uniquement le nécessaire ; définir base légale, information, consentement lorsque requis, droits, rétention et suppression/anonymisation. Exclure par défaut santé, sexualité, violences, biométrie, opinions, données pénales et données identifiantes de mineurs. Toute activation nécessite analyse d'impact et validation juridique/éthique.

## PWA et appareils
Ne pas mettre en cache les données sensibles par défaut. Prévoir expiration/effacement à la déconnexion et avertissement sur appareils partagés/perdus. IndexedDB n'est pas un coffre-fort.

## API et fichiers
HTTPS, validation serveur, rate limiting, CORS limité, CSRF selon authentification, bucket privé, URL signées courtes, contrôle d'accès, validation MIME/taille et protection contre fichiers malveillants.

## Audit et incidents
Journaliser acteur, action, objet et date sans recopier les données sensibles. Procédure de triage, confinement, révocation, restauration et notification selon obligations.

## Exploitation
Sauvegardes chiffrées et restaurations testées, mises à jour, scans de vulnérabilités, environnements séparés, revue des accès et plan de continuité.
