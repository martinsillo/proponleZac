<?php

if(!isset($_SESSION)){
?>
<script type="text/javascript">
location.href="index.html";
</script>
<?php
}
   if(isset($_GET["token"])){

   switch($_GET["token"]){
   	/*--------------- Planeacion--------------------------------*/
	    case md5(0):
		include("planeacion/info_gral.php");
		break;
		case md5(1):
		include("planeacion/marco_estrategico.php");
		break;
		case md5(2):
		include("planeacion/marco_estrategico_guarda.php");
		break;
		case md5(3):
		include("planeacion/proyectos/proyecto.php");
		break;
		case md5(4):
		include("planeacion/proyectos/nuevo.php");
		break;
		case md5(5):
		include("planeacion/proyectos/guarda_proyecto.php");
		break;
		case md5(6):
		include("planeacion/detalle_usuario.php");
		break;
		case md5(66):
		include("planeacion/actualiza_trimestre.php");
		break;
		case md5(7):
		include("planeacion/actualiza_usuario.php");
		break;
		default:
		case md5(8):
		include("planeacion/proyectos/editar_proyecto.php");
		break;
		default:
		case md5(9):
		include("planeacion/proyectos/actualiza_proyecto.php");
		break;
		default:
		case md5(10):
		include("planeacion/proyectos/indicadores.php");
		break;
		case md5(11):
		include("planeacion/proyectos/editar_indicador.php");
		break;
		case md5(12):
		include("planeacion/indicadores/guarda_indicador.php");
		break;
		case md5(13):
		include("planeacion/proyectos/componentes.php");
		break;
		case md5(14):
		include("planeacion/proyectos/nuevo_componente.php");
		break;
		case md5(15):
		include("planeacion/proyectos/editar_componente.php");
		break;
		case md5(16):
		include("planeacion/proyectos/guardar_componente.php");
		break;
		case md5(17):
		include("planeacion/proyectos/actualiza_componente.php");
		break;
		case md5(18):
		include("planeacion/proyectos/eliminar_componente.php");
		break;
		case md5(19):
		include("planeacion/proyectos/acciones.php");
		break;
		case md5(20):
		include("planeacion/proyectos/nueva_accion.php");
		break;
		case md5(21):
		include("planeacion/proyectos/editar_accion.php");
		break;
		case md5(22):
		include("planeacion/proyectos/guardar_accion.php");
		break;
		case md5(23):
		include("planeacion/proyectos/actualizar_accion.php");
		break;
		case md5(24):
		include("planeacion/proyectos/eliminar_accion.php");
		break;
		case md5(25):
		include("planeacion/proyectos/info_proyecto.php");
		break;
		case md5(26):
		include("planeacion/proyectos/aprobar_proyecto.php");
		break;
		case md5(27):
		include("planeacion/proyectos/borrar_proyecto.php");
		break;

/*---------------------- menu obras ----------------------------*/
		case md5(28):
		include("planeacion/obras/obra.php");
		break;
		case md5(29):
		include("planeacion/obras/nueva_obra.php");
		break;
		case md5(30):
		include("planeacion/obras/mostrar_obra.php");
		break;
		case md5(31):
		include("planeacion/obras/editar_obra.php");
		break;
		case md5(32):
		include("planeacion/obras/lista_obra.php");
		break;
		case md5(33):
		include("planeacion/obras/mostrar_obra_fuente.php");
		break;
		case md5(34):
		include("planeacion/obras/nuevo_origen.php");
		break;
case md5(39):
		include("planeacion/obras/editar_obra_fuente.php");
		break;
		/*---------------------estfin----------------------*/
		case md5(35):
		include("planeacion/actualiza_edofin.php");
		break;
		case md5(36):
		include("planeacion/edo_fin_info.php");
		break;
		case md5(37):
		include("planeacion/proyectos/activa_proyecto.php");
		break;
		case md5(38):
		include("planeacion/proyectos/inactiva_proyecto.php");
		break;
				case md5(90):
		include("planeacion/proyectos/info_componente.php");
		break;
		case md5(91):
		include("planeacion/proyectos/aprobar_proyecto.php");
		break;
		case md5(92):
		include("planeacion/proyectos/actualiza_indicador.php");
		break;


       // INDICADORES //

        case md5(100):
        include("administrador/indicadores/indicadores_evaluacion.php");
        break;

        case md5(101):
        include("administrador/indicadores/info_indicador.php");
        break;

        case md5(102):
        include("administrador/indicadores/edit_indicador.php");
        break;

        case md5(103):
        include("administrador/indicadores/califica_indicador.php");
        break;
        /*
        case md5(104):
        include("administrador/indicador_ed_form.php");
        break;

        case md5(105):
        include("administrador/indicador_ed.php");
        break;
        */
        case md5(106):
        include("planeacion/indicadores/indicador_del.php");
        break;

        case md5(107):
        include("planeacion/indicadores/res_indicadores.php");
        break;

        case md5(RIPDF):
        include("planeacion/indicadores/res_indicadores_info_pdf.php");
        break;





      // indicadores proyectos anteriores fin y proposito
    /*case md5(100):
      include("administrador/indicadores_evaluacion.php");
      break;
    case md5(101):
      include("administrador/info_indicador.php");
      break;
    case md5(102):
      include("administrador/edit_indicador.php");
      break;
     case md5(103):
      include("administrador/califica_indicador.php");
      break;
 case md5(104):
      include("administrador/indicador_ed_form.php");
      break;
        case md5(105):
      include("administrador/indicador_ed.php");
      break;
        case md5(106):
      include("administrador/indicador_del.php");
      break;
case md5(107):
      include("planeacion/res_indicadores.php");
      break;*/
/*----------------------- MENU RESULTRADOS -------------------------------*/

        /************** Resultados - Dependencia - POA Dependencia ****************/

        case md5(RD): //Resultados Dependencia
		  include("planeacion/resultados/resultados_dependencia.php");
		break;

        case md5(RPD): //Resultados POA Dependencia
		  include("planeacion/resultados/resultados_POA_dependencia.php");
		break;

        case md5(RPxD): // Resultados Proyectos por Dependencia
		  include("planeacion/resultados/resultados_proyectos_dependencia.php");
		break;

        case md5(RCxPD): //Resultados Componentes por Proyecto
		  include("planeacion/resultados/resultados_componentes_proyecto.php");
		break;

        case md5(RAxCPD):
		  include("planeacion/resultados/resultados_acciones_componente.php");
		break;

        /************** Resultados - POA x Sector ***********************************/
       	case md5(RPxS):
            include("planeacion/resultados/resultadosPoaXSector.php");
        break;

        case  md5(RPxSD):
	       include("planeacion/resultados/resultadosPoaXSector_Depen.php");
        break;

        case md5(RPxSP):
            include("planeacion/resultados/resultadosPoaXSector_Proy.php");
        break;

        case md5(RPxSC):
            include("planeacion/resultados/resultadosPoaXSector_Comp.php");
        break;

        case md5(RPxSA):
            include("planeacion/resultados/resultadosPoaXSector_Acc.php");
        break;

        /****************** Resultados - POA X Ejes ********************************/
        case md5(RPxE):
            include("planeacion/resultados/resultadosPoaXEjes.php");
        break;

        /****************** Resultados - % Dependencias ***************************/
        case md5(RxSD):
		  include("planeacion/resultados/resultadosSemaforoDepen.php");
		break;

        /****************** Resultados - % Proyecto *******************************/
        case md5(RxSP):
		  include("planeacion/resultados/resultadosSemaforoProy.php");
        break;


        /*************** TERMINA MENU RESULTADOS **********************************/

	/*-------------------reportes------------------------------------*/
	case md5('r'):
		include("planeacion/reportes_poa_main.php");
		break;
	case md5('i'):
		include("planeacion/indicadores.php");
		break;
		case md5('p'):
		include("planeacion/repo_proy.php");
		break;
		case md5('g'):
		include("planeacion/repo_gral.php");
		break;

	case md5('rof'):
		include("rpts/rpt_res_ofi_graf.php");
		break;

	case md5('3x1'):
		include("planeacion/avances/rpt_3x1.php");
		break;


	/*---------------------- evaluación ----------------------------*/
 case md5(E0):
            include("administrador/evaluacion/evaluacion.php");
        break;

        case md5(E1):
	       include("administrador/evaluacion/evaluar.php");
        break;

        case md5(E2):
            include("administrador/evaluacion/componentes.php");
        break;

        case md5(E3):
	       include("administrador/evaluacion/acciones.php");
        break;
/*----------------------------------------------------------*/

/*-------------------------------avenec fis/fin*/
                case md5('Avz14'):
                        include("planeacion/avances/avances.php");

                break;

                      	case md5('Avzg'):
                        include("planeacion/avances/guardar_ejercido.php");

                break;

                case md5('Avzr'):
                        include("planeacion/avances/borrar_ejercido.php");

                break;

                      	case md5('addAvz14'):
                        include("planeacion/avances/agregar_ejercido.php");

                break;

                      	case md5('addAvz14r'):
                        include("planeacion/avances/rpt_avances.php");

                break;
        /*-------------------------------avenec fis/fin*/


/*-----------------------------cuenta publica*/
        case md5('viewC_pu'):
                        include("planeacion/cuenta_publica/cuenta_publica.php");

                break;

                      	case md5('addC_pu'):
                        include("planeacion/cuenta_publica/agregar_cuenta_p.php");

                break;

                      	case md5('rptC_pu'):
                        include("planeacion/cuenta_publica/rpt_cuenta.php");

                break;


        /*-----------------------------termina cuenta publica*/

	//-----------fise oficios--------------------//

				case md5('fiseOOf1'):
                        include("planeacion/fise_of_info.php");
                break;

			//----------------fise oficios---------------------//

/*----extraordinaro---*/
case md5('ext4'):

		include("extraordinario.php");

		break;

/*****-------*/



/*----catalogo---*/

case md5('prg_tipo'):



		include("planeacion/catalogos/programas.php");



		break;



/*****-------*/

case md5(R0):
		  include("planeacion/reportes/ejercicios_anteriores.php");
        break;


        case md5(CM0):
		  include("municipal/municipios.php");
        break;

        case md5(CM1):
        		  include("municipalDep/municipios.php");
                break;

        case md5(CM2):
        		  include("municipalDep/dependencias.php");
                break;

	case md5("about"):
                include 'about.php';
                break;
       case md5("estrategias_rpt"):
            include('estrategias_rpt.php');
            break;

		default:
        include("planeacion/info_gral.php");
	   }
   }else {
	   include("planeacion/info_gral.php");
   }
 ?>
