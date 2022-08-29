# Plugin Chazki para Magento 2

# Cómo instalar la extensión?

En el directorio raiz del proyecto de magento que tiene instalado, ejecutar los siguientes comandos: 

- composer require chazki-entregas/plugin-integracion-magento-tonny
- composer update
- bin/magento module:status

- bin/magento module:enable Chazki_ChazkiArg --clear-static-content
- bin/magento module:status
- bin/magento setup:upgrade
- bin/magento setup:di:compile
- bin/magento module:status Chazki_ChazkiArg
- sudo chmod -R 777 .

