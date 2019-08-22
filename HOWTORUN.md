# Instruções
Para executar o projeto é necessário ter o Docker.

- Abra um terminal e digite o comando ``git clone https://github.com/RECOHA/desafio-fullstack.git`` para fazer download do projeto;
- Navege até a pasta recém criada e execute o comando ``docker-compose up -d``, isso levará alguns minutos para a preparação dos containers;
- Assim que estiver tudo finalizado, execute o comando ``docker exec app-php sh ./instalar.sh`` para instalar as dependências e configurar o Laravel;

- Após as instalações e configurações o CRUD estará funcionando e poderá ser acessado pela URL: http://localhost:8090/.