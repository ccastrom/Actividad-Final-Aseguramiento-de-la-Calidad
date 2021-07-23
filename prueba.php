/**
 * 
 * <?php
                                                                    $sql = "SELECT
                                                                COUNT(CASE WHEN id_fk_fabricante LIKE 1 THEN 1 END) AS count1,
                                                                COUNT(CASE WHEN id_fk_fabricante LIKE 2 THEN 1 END) AS count2,
                                                                COUNT(CASE WHEN id_fk_fabricante LIKE 3 THEN 1 END) AS count3
                                                            FROM arma; ";
                                                                    $result = $ConexionBD->query($sql);
                                                                    while ($registro = $result->fetch_array()) {
                                                                    }



                                                                    ?>
 */
 