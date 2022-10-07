# ISSKS2223
## Proiektuaren deskripzioa
ISSKS (Informazio Sistemen Seguritatea Kudeatzeko Sistemak) irakasgairen Web Sistema arloko proiektua.
## Taldekideak
- Aingeru Bellido
- Ainhoa Sanchez
- Maitane Urruela
## Docker-en hedatzeko argibideak
### Requirements
- Docker instalatuta izatea
- Git instalatuta izatea
### Pausuak
1. Errepositorio hau makina lokalean klonatu.
2. Errepositorioa dagoen direktorioan gaudela ziurtatu.
3. "Dockerfile" bidez sortzen den irudia sortu: `docker build -t "web" .`
4. "docker-compose.yml" fitxategiak daukan kontainerrak sortu: `docker-compose up`
5. Datu basea phpMyAdmin bitartez importatu. Horretarako, proiektu honetan "database.sql" fitxategi bat eskaintzen da, hori kargatu behar da. Horretarako, "localhost:8890" idatzi zure nabigatzailean eta "admin" erabiltzailea eta "test" erabili programan sartu ahal izteko. Bertan, "Import" botoia agertuko da.
6. Zerbitzua eteteko, Ctrl+C erabili edo beste terminal batetik `docker-compose stop` erabili.
