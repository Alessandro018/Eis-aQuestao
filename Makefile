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

conf:
	sudo apt-get install php7.2 php7.2-mbstring php7.2-mysql php7.2-intl php7.2-xml composer # isso só serve pra sistemas que usam o apt
	composer install --no-scripts
	# npm install
	# npm run dev
	cp .env.example .env # copia o example
	php artisan key:generate # gera a chave
	sudo apt-get install mysql-server-5.7 # instala o bd
	$(MAKE) bd-conf # roda a regra do bd-conf

bd-conf:
	mysql -u root -p --execute="drop database if exists SME; create database SME; drop user if exists 'estudante'; create user 'estudante' identified by 'Estudante2019@'; grant all privileges on SME.* to 'estudante';"
	sed -i 's/DB_DATABASE.*/DB_DATABASE=SME/' .env # ajusta o nome do banco no .env
	sed -i 's/DB_USERNAME.*/DB_USERNAME=estudante/' .env # ajusta o nome de usuário no .env
	sed -i 's/DB_PASSWORD.*/DB_PASSWORD=Estudante2019@/' .env # ajusta a senha no .env
	php artisan migrate:refresh --seed
	php artisan serve
