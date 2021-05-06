<?php

/**
 * Essa função realiza a leitura da tabela usuários no banco.
 */

function ler() {
  $sql = 'select * from usuarios';
  $connection = connection();
  $result = $connection->prepare($sql);
  $result->execute();
  return array_reverse($result->fetchAll(PDO::FETCH_OBJ));
};
