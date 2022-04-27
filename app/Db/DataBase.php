<?php

namespace App\Db;

use \PDO;
use PDOException;
use \App\Db\arry;

class DataBase {

    /**
     * Host do banco de dados
     * @var string
     */
    const host = 'localhost';

    /**
     * Nome do banco de dados
     * @var string
     */
    const name= 'test';

    /**
     * Uusartio do banco
     * @var  string 
     */
    const  user = 'root';

    /**
     * Seha do banco de dados 
     * @var string
     */
    const pass = '';


    /**
     * Nome da table a ser manipulada
     */
    private $table;

    /**
     * Instancia de conexao com o banco de dados 
     * @var PDO
     */
    private $connection; 

    public function __construct($table = null){
      $this->table = $table;
      $this->setConnection();
    }
  
    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection(){
      try{
        $this->connection = new PDO('mysql:host='.self::host.';dbname='.self::name,self::user,self::pass);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        die('ERROR: '.$e->getMessage());
      }
    }
  
    /**
     * Método responsável por executar queries dentro do banco de dados
     * @param  string $query
     * @param  array  $params
     * @return PDOStatement
     */
    public function execute($query,$params = []){
      try{
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
      }catch(PDOException $e){
        die('ERROR: '.$e->getMessage());
      }
    }


 /**
   * Método responsável por inserir dados no banco
   * @param  array $values [ field => value ]
   * @return integer ID inserido
   */
  public function insert($values){
    //DADOS DA QUERY
    $fields = array_keys($values);
    $binds  = array_pad([],count($fields),'?');

    //MONTA A QUERY
    $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

    //EXECUTA O INSERT
    $this->execute($query,array_values($values));

    //RETORNA O ID INSERIDO
    return $this->connection->lastInsertId();
  }

  /**
   * Método responsavel por execultar atualizações no banco de dados
   *  @param string $where
   * @param array $values [field => value]
   *  @return boolean 
   * 
   */

  public function update($where, $values){
    //Dados da query

    $fields = array_keys($values);

    //Monta query
    $query = 'UPDATE '.$this->table.' SET '. implode('=?,',$fields).' =?  WHERE '.$where;
   
    //Execultar a query
    $this->execute($query, array_values($values));
     return true;


  }


  /**
   *  Método responsavel por excluir dados no bacno
   *  @param string $where
   * @return boolean
   * 
   */
  public function delete($where){
    //Monta query
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
    //Execulta query
    $this->execute($query);

    //retorna sucesso
    return true;
  



  }








  /**
   * Método responsável por executar uma consulta no banco
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @param  string $fields
   * @return PDOStatement
   */
  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    //DADOS DA QUERY
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    //MONTA A QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    //EXECUTA A QUERY
    return $this->execute($query);
  }




}   


