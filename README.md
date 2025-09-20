# Diario Digital
    usuario admin : admin@admin.com
    pass: admin123

## Base de datos : appweb_caba2024_diario_digital.sql
ULTIMA ACTUALIZACION : 17-10-2024

## app/config 
define('DB_PASSWORD', '');

## App_web_CABA_Grupo2_Diario_Digitalv01/.htacces (Verificar ruta)
RewriteBase /App_web_CABA_Grupo2_Diario_Digitalv01/public

## Tabla Lector (Provisorio)
```
    // se seatea la suscripcion en null por defecto 

    ALTER TABLE `lector`
    MODIFY `suscripcion_id` int(11) DEFAULT NULL;
```

### Integrantes del grupo: