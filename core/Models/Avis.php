<?php
namespace Models;

class Avis extends AbstractModel implements JsonSerializable
{

    protected string $nomDeLaTable = "avis";

    private $id;
    private $content;
    private $velo_id;
    private $user_id;



    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content ;
    }

    public function getVeloId()
    {
        return $this->velo_id;
    }
    public function setVeloId($velo_id)
    {
        $this->velo_id = $velo_id ;
    }

    public function findAllByVelo(Velo $velo)
    {
        $sql = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable}
            WHERE velo_id = :velo_id
        ");

        $sql->execute([
            "velo_id"=>$velo->getId()
        ]);

        $avis = $sql->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $avis;
    }

    public function save(Avis $avis)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}
                (user_id, content, velo_id) VALUES (:user_id, :content, :velo_id)
        ");
        $sql->execute([
            "user_id"=>$avis->user_id ,
            "content"=>$avis->content ,
            "velo_id"=>$avis->velo_id ,
        ]);


    }

    public function update(Avis $avis){

        $sql = $this->pdo->prepare("UPDATE {$this->nomDeLaTable}
            SET author = :author , content = :content
            WHERE id = :id
        ");

        $sql->execute([
            "author"=>$avis->author,
            "content"=>$avis->content,
            "id"=>$avis->id
        ]);

    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return User
     */
    public function getAuthor():User
    {
        $modelUser = new \Models\User();
        return $modelUser->findById($this->user_id);

    }

    public function jsonSerialize():mixed
    {
        return[
            "id" => $this->id,
            "author"=> $this->author,
            "content"=> $this->content
        ];

    }


}