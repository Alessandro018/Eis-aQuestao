gabriel:
	git config --global user.name "gabrielpessoa"
	git config --global user.email gabrielpessoanascimento@gmail.com
alessandro:
	git config --global user.name "Alessandro018"
	git config --global user.email alessandrosilva325@gmail.com
tamires:
	git config --global user.name "siilvatamires"
	git config --global user.email tamiresmaria561@gmail.com
geovane:
	git config --global user.name "geovanejose"
	git config --global user.email geovanejose240899@gmail.com
robson:
	git config --global user.name "robson-gomes"
	git config --global user.email robson.gs2630@gmail.com
ricardo:
	git config --global user.name "ricardomlp"
	git config --global user.email cranioscaner@gmail.com
alex:
	git config --global user.name "AlexpGuedes"
	git config --global user.email alex.p.guedes1610@gmail.coma
alisson:
	git config --global user.name "AlissonThyago"
	git config --global user.email alissonthiagoamorim@gmail.com
guilherme:
	git config --global user.name "GuilhermeH6"
	git config --global user.email guilhermeholanda870@gmail.com
filipe:
	git config --global user.name "filipeandrev"
	git config --global user.email filipe.andrev7@gmail.com
conf:
	sudo apt-get install libapache2-mod-php7.3 php7.3-cgi php7.3-cli php7.3-curl php7.3-imap php7.3-gd php7.3-mysql php7.3-pgsql php7.3-sqlite3 php7.3-mbstring php7.3-json php7.3-bz2 php7.3-xmlrpc php7.3-gmp php7.3-xsl php7.3-soap php7.3-xml php7.3-zip php7.3-dba
	composer install --no-scripts
	npm install
	npm run prod
	cp .env.example .env # copia o example
	php artisan key:generate # gera a chave
	sudo apt-get install mysql-server-5.7 # instala o bd
	$(MAKE) bd-conf # roda a regra do bd-conf

bd-conf:
	mysql -u root -p --execute="drop database if exists Eaq; create database Eaq; drop user if exists 'eisaquestao'; create user 'eisaquestao' identified by 'eaq123'; grant all privileges on Eaq.* to 'eisaquestao';"
	sed -i 's/DB_DATABASE.*/DB_DATABASE=Eaq/' .env # ajusta o nome do banco no .env
	sed -i 's/DB_USERNAME.*/DB_USERNAME=eisaquestao/' .env # ajusta o nome de usuário no .env
	sed -i 's/DB_PASSWORD.*/DB_PASSWORD=eaq123/' .env # ajusta a senha no .env
	php artisan migrate:refresh --seed
	php artisan serve
