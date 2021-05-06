<?php

/**
 * Essa função faz a leitura das duas tabelas existentes no banco
 */

function read() {
  $sql = "select coment.*, user.* from comentarios coment left join usuarios user 
          on coment.id = user.id";
  $connection = connection();
  $result = $connection->prepare($sql);
  $result->execute();
  return array_reverse($result->fetchAll(PDO::FETCH_OBJ));
};
