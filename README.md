# Desafio Indicar Amigo - API

API usando Laminas Mezzio

Luiz Carlos Belem `<belemlc@gmail.com>`
<small>(21) 97300-8600</small>

## Instalação
    Usando o Docker (recomendado)
        1) Fazer um clone da imagem: git clone https://github.com/belemlc/desafio-indique-amigo-api.git
        2) Acessar a raiz do projeto clonado
        3) Instalar bibliotecas: composer install
        4) executar o docker fazendo build da image: docker-compose up -d --build
        4) Api sendo executada em: http://localhost:8080
        5) Dados do postgres no docker-compose.yml


# Se precisar...

### Habilitar modo development do Mezzio para ajudar debugar 
Para habilitar 
```composer development-enable```

Para desabilitar 
```composer development-disabled```

### As entidades já foram mapeadas, caso adicione novas será preciso rodar o comando abaixo
``` docker exec -it app-desafio-indique-amigo vendor/doctrine/orm/bin/doctrine orm:convert-mapping --from-database annotation src/App/src/Entity```