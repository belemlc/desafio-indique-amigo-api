# Desafio Indicar Amigo

# Usar com modo de desenvolvimento

Habilitar 
```composer development-enable```

Desabilitar 
```composer development-disabled```

### Mapear as entidades gerando anotaions
``` docker exec -it app-desafio-indique-amigo vendor/doctrine/orm/bin/doctrine orm:convert-mapping --from-database annotation src/App/src/Entity```