<?php
    require 'db.php';

    /*Nombre de la Tabla */
    $sTabla = "Movadoj";

    /* Array que contiene los nombres de las columnas de la tabla */
    $aColumnas = array('Nombre', 'Apellido_Uno','Apellido_Dos','F_Entrada'.'H_Entrada','F_Salida','H_Salida');

    /* Columna indexada */ 
    $aIndexColumn ="Nombre";

    // Paginación

    $sLimit = "";
    if(isset($_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".$_GET['iDisplayStart'].", ".$_GET['iDisplayLength'];
    }

    //Ordenación
    if(isset($_GET['iSortCol_0'] ))
    {
        $sOrder = "ORDER BY  ";
        for( $i=0; $i<intval($_GET['iSortingCols']); $i++)
        {
            if($_GET['bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true")
            {
                $sOrder .= $aColumnas[intval($_GET['iSortCol_'-$i] )]." 
                ".$_GET['sSortDir_'.$i] .", ";    
            }
        }
        
        $sOrder = substr_replace($sOrder, "", -2 );
        if($sOrder == "ORDER BY" )
        {
            $SoRDER = "";
        }
    }

    //Filtración
    $sWhere = "";
    if( $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0; $i<count($aColumnas) ; $i++)
        {
            $sWhere .= $aColumnas[$i]." LIKE '%".$_GET['sSearch']."%' OR ";
        }    
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }
    
    //Filtrado de columna individual
    for ($i=0; $i<count($aColumnas) ; $i++)
    {
        if ( $sWhere == "")
        {
            $sWhere .= " WHERE ";
        }else
        {
            $sWhere .= " AND ";
        }
        $sWhere .= $aColumnas[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
    }

    //Obtener datos para mostrar SQL queries
    $sQuery = "
    SELECT SQL_CALC_FOUND_ROWS".str_replace(" , ", " ", implode(", ", $aColumnas))."
    FROM $sTabla
    $sWhere
    $sOrder
    $sLimit
    ";
    $sResult = $mysqli->query($sQuery);
    


?>