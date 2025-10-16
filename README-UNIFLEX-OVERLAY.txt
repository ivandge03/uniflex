UniFlex Overlay (Laravel API)
-----------------------------
Този пакет съдържа файлове, които да копираш върху съществуващо Laravel репо
(например форк на github.com/koyeb/example-laravel). След като ги добавиш и комитнеш:
  1) Увери се, че в Koyeb имаш настроени DB_* променливите за Neon и APP_KEY.
  2) Procfile ще изпълни: migrate + db:seed.
  3) Public URL:
     - /api/health  -> {"ok":true}
     - POST /api/login {"email":"student@uniflex.test","password":"Stud!234"}
     - GET /api/me   (Authorization: Bearer <token>)
     - POST /api/logout
     - /api/courses (GET/POST), /api/courses/{id} (GET), enroll, assignments, submit, grade
  4) Статична страница: /uniflex-test.html

Инсталационни стъпки:
  - Качи цялото съдържание на overlay-а в корена на твоето Laravel репо.
  - Комитни и push-вай в GitHub.
  - В Koyeb → Redeploy latest.
