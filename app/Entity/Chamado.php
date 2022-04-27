<?php

namespace App\Entity;
use App\Db\DataBase;
use PDO;

class Chamado {

    /**
     *  Identificar do chamado
     * @var integer
     */
    public $id;

    /**
     * Titulo do chamado
     *
     * @var string
     */
    public $titulo;

    /**
     * Descrição dp chamdo
     *  @var string
     */

    public $descricao;


    /**
     *  Status do chamdo
     *  @var  string(aberto/fechado)
     */

    public $status;

    /**
     * Data de criação do chamado
     *  @var  date
     */

    public $dataAbertura;


    /**
     * Quem fez o chamdo
     * @var string  
     */

    public $solicitante;



    /**
     * Metodo responsavel por cadastar a nova vaga
     * @return boolean
     */

    public function cadastrar(){
        $this->date = date('Y-m-d H:i:s');
        $dataBase = new DataBase('chamadas');
        $this->id = $dataBase->insert([
                        'titulo' => $this->titulo,
                        'descricao' => $this->descricao,
                        'status' => $this->status,
                        'data_abertura' => $this->dataAbertura,
                        'responsavel' => $this->solicitante,

        ]);

    }

    /**
     * Método responsavel por atualizar a vaga no banco
     *  @return boolean
     */


    public function atualizarChamado(){
        return (new DataBase('chamadas'))->update('id = '.$this->id,[
                                'titulo' => $this->titulo,
                                'descricao' => $this->descricao,
                                'status' => $this->status,
                                'data_abertura' => $this->dataAbertura,
                                'responsavel' => $this->solicitante,



        ]);   
    }



    /**
     * Método responsavel por excluir uma chamada no banco
     * @return boolean 
     */


    public function excluirChamada(){
        return (new DataBase('chamadas'))-> delete('id = '.$this ->id);  
    }



     /**
   * Método responsável por obter as vagas do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
    public static function getChamadas($where = null, $order = null, $limit = null){
        return (new DataBase('chamadas'))->select($where,$order,$limit)
                                         ->fetchAll(PDO::FETCH_CLASS,self::class);
    }


    public static function getChamada($id){
        return (new Database('chamadas'))->select('id = '.$id)
                                         ->fetchObject(self::class);
      }

}