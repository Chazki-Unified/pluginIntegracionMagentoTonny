# Plugin Chazki para Magento 2

# Cómo instalar la extensión?

En el directorio raiz del proyecto de magento que tiene instalado, ejecutar los siguientes comandos: 

```
composer require chazki-entregas/plugin-integracion-magento-tonny
composer update
bin/magento module:status
bin/magento module:enable Chazki_ChazkiArg --clear-static-content
bin/magento module:status
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento module:status Chazki_ChazkiArg
sudo chmod -R 777 .
```
Luego entrar al dashboard de admin, (la uri te dan al terminar de instalar el proyecto base de magento, sino lo guardaste, se encuentra guardado en el archivo nombreProyecto/app/etc/env.php, en la linea 4 generalmente 
``` 
'frontName' => 'uri' 
```

Luego de dirigirte al url ``` 127.0.0.1/nombreProyecto/uri ```, se ingresa las credenciales para poder de username y password que se declararon al crear proyecto base de magento.

- Se debe configurar en Stores/Sales/Shipping Settings -> llenar la data de la seccion de ```Chazki```, recargar el cache 
- Se debe Store/Sales/Delivery Methods, y llenar la data de los 2 metodos de envio (Next Day, Same Day), recargar el cache

** Los csv y el enterpriseKey la debe proporcionar Chazki.

- Se debe agregar un digito en el ultimo digito de las versiones del proyecto de Magento, ``` nombreProyecto/vendor/alternative-chazki/pluginchazkimagento/etc/module.xml ```. como por ejemplo de ```1.0.1``` -> ```1.0.2```

- Se debe de configurar si es que no se realizo el cliente antes, la configuracion del pais (lugar que se encuentra), para saber que tipos de valores por defecto se enviaran en el request, en ```Store/General/Locale Options``` y se debe cambiar solo los 2 campos de ```Timezone y Local``` , que son los dos primeros, recargar el cache.

Con los pasos anteriores ya estaria configurado, y el usuario final debe hacer el flujo de compra de articulos , luego el encargado del dashboard de magento debe entrar a ```Sales/Orders``` seleccionar el pedido a gestionar, al tab de ```Ship```.

Llenar los campos de ```Shipping Information``` donde se debe seleccionar en el select a ```Chazki``` de forma obligatoria, sino no hara la peticion de forma correcta al api de tony, solo se cambiaria el Number (del trackCode), que se recomienda poner por el numero que aparece al comienzo de la pagina donde dice ```Order # 000000N (The order confirmation email is not sent)```.

Para mas detalle de los pasos mencionados anteriro con imagenes incluidos, revise el siguiente pdf

