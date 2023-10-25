
/*
 extrae email, list,reason,errorCode desde la tabla log_errors
 este script fue pensado para exportar los datos que no se capturaron en
 subscription_doppler_list_errors porque no existia la tabla.
*/

SELECT
  REGEXP_SUBSTR(description, '([a-zA-Z0-9._%+\-]+)@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,4}') AS email,
  CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(description, 'List Id : ', -1), '.', 1) AS SIGNED) AS list,
  description AS error_message,
  TRIM(SUBSTRING(description, LOCATE('Reason:', description) + LENGTH('Reason:'), LOCATE(' | errorCode=', description) - (LOCATE('Reason:', description) + LENGTH('Reason:')))) AS reason,
  CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(description, 'errorCode= ', -1), '.', 1) AS SIGNED) AS errorCode
FROM `log_errors`
WHERE function_name ='saveSubscriptionDoppler (Almacena en Lista)'
AND data != '{"user":null}';
