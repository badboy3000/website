<?php
/* 
* $Id: admin.php v 1.0 12 July 2003 Catwolf Exp $
* Module: WF-FAQ
* Version: v1.00
* Release Date: 12 July 2003
* Author: Catzwolf
* Licence: GNU
*/

//Main ADmin Section

define('_AM_FAQMANINTRO','Bienvenido a la mesa de control de WF-FAQ');


/*
* Uni Lang defines
*/
define('_AM_SUBMIT','Enviar');
define('_AM_CREATE','Crear');
define('_AM_YES','S�');
define('_AM_NO','No');
define('_AM_DELETE','Borrar');
define('_AM_MODIFY','Modificar');
define('_AM_UPDATED','�La base de datos se actualiz� correctamente!');
define('_AM_NOTUPDATED','�Hubo un error al actualizar la base de datos!');
define('_AM_CATCREATED','�La nueva categor�a fue creada y salvada!');
define('_AM_CATMODIFY','�La categor�a fue modificada y salvada!');
/*
* Lang defines for functions.php
*/
define('_AM_FADMINHEAD','Manejo de WF-FAQ');
define('_AM_FADMINCATH','Manejo de categor�as de WF-FAQ');
define('_AM_FNEWCAT','�ndice de categor�as de las preguntas');
define('_AM_FNEWCATTXT','Crear, editar o borrar una categor�a de preguntas. O volver al �ndice de categor�as de preguntas.');
define('_AM_FNEWFAQ','�ndice de preguntas');
define('_AM_FNEWFAQTXT','Crear, editar o borrar una pregunta. O volver al �ndice de preguntas.');
define('_AM_FVAL','Autorizar nuevos env�os');
define('_AM_FVALTXT',"Te permite borrar o autorizar las nuevas preguntas enviadas.");
/*
* Lang defines for Category.php
*/
define('_AM_FRECOUNT','Contar otra vez las preguntas');
define('_AM_FRECOUNTTXT','Te permite recontar el n�mero de preguntas en cada categor�a.');
define('_AM_CREATIN','Crear en');
define('_AM_CATNAME','Nombre de categor�a');
define('_AM_CATDESCRIPT','Descripci�n de categor�a');
define('_AM_NOCATTOEDIT','No hay categor�a qu� editar.');
define('_AM_MODIFYCAT','Modificar categor�a');
define('_AM_DELCAT','Borrar categor�a');
define('_AM_ADDCAT','Agregar categor�a');
define('_AM_MODIFYTHISCAT','�Modificar esta categor�a?');
define('_AM_DELETETHISCAT','�Borrar esta categor�a?');
define('_AM_CATISDELETED','La categor�a %s ha sido borrada');

/*
* Lang defines for topics.php
*/
define('_AM_TOPICSADMIN','Manejo de preguntas');
define('_AM_NOTCTREATEDACAT','�No puedes agregar una pregunta si no creas antes una categor�a de preguntas!');
define('_AM_ADDFAQ','Crear nueva pregunta');
define('_AM_CREATEIN','Crear en');
define('_AM_TOPICQ','Pregunta');
define('_AM_TOPICA','Respuesta');
define('_AM_SUMMARY','Sumario');
define('_AM_MODIFYFAQ','Editar pregunta');
define('_AM_MODIFYEXSITFAQ','Editar pregunta');
define('_AM_MODIFYTHISFAQ','Editar esta pregunta');
define('_AM_DELFAQ','Borrar pregunta');
define('_AM_DELTHISFAQ','Borrar esta pregunta');
define('_AM_NOTOPICTOEDIT','No hay preguntas qu� editar en la base de datos');
define('_AM_DELETETHISTOPIC','�Borrar esta pregunta?');
define('_AM_TOPICISDELETED','La pregunta %s ha sido borrada');
define('_AM_FAQCREATED','La pregunta fue creada y salvada');
define('_AM_FAQNOTCREATED','ERROR: La pregunta NO se cre� ni salv�');
define('_AM_FAQMODIFY','La pregunta fue modificada y salvada');
define('_AM_FAQNOTMODIFY','ERROR: La pregunta NO se edit� ni salv�');

define('_AM_SUBALLOW','Permitir');
define('_AM_SUBDELETE','Borrar');
define('_AM_SUBRETURN','Volver a mesa de control');
define('_AM_SUBRETURNTO','Volver a nuevos env�os');
define('_AM_AUTHOR','Autor');
define('_AM_PUBLISHED','Publicaci�n');
define('_AM_SUBPREVIEW','La vista de control de WF-FAQ');
define('_AM_SUBADMINPREV','Esta es la vista previa de control de esta pregunta.');
define('_AM_DBUPDATED','La base de datos que contiene las preguntas ha sido actualizada');
/*
*  Copyright and Support.  Please do not remove this line as this is part of the only copyright agreement for using WF-FAQ 
*/
define('_AM_VISITSUPPORT', 'Visita el sitio web de WF-Section para informaci�n, actualizaci�n y ayuda sobre su uso.<br /> WF-FAQ v1 Catzwolf &copy; 2003 <a href="http://wfsections.xoops2.com/" target="_blank">WF-FAQ</a>');

?>